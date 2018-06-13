<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Transformers\UserTransformer;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $captchaData = \Cache::get($request->captcha_key);

        if (!$captchaData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->captcha_key);
        return $this->response->item($user, new UserTransformer())
            ->setStatusCode(201);
        return $this->response->created();
    }
}
