<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('tymon.jwt.absent', function () {
            // return response()->json([
            //     'code' => -100,
            //     'msg' => '未提供 Token, 请重新登录',
            //     'data' => '',
            // ]);
            return $this->errorResponse(401,'未提供 Token, 请重新登录');
        });

        Event::listen('tymon.jwt.invalid', function () {
            // return response()->json([
            //     'code' => -100,
            //     'msg' => '无效的 Token, 请重新登录',
            //     'data' => '',
            // ]);
            return $this->errorResponse(401,'无效的 Token, 请重新登录');
        });

        Event::listen('tymon.jwt.expired', function () {
            // return response()->json([
            //     'code' => -100,
            //     'msg' => 'Token 已经过期, 请重新登录',
            //     'data' => '',
            // ]);
            return $this->errorResponse(401,'Token 已经过期, 请重新登录');
        });

        Event::listen('tymon.jwt.user_not_found', function () {
            return $this->errorResponse(401,'没有找到登录用户');
        });
    }
}
