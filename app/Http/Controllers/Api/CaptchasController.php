<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

/**
 * 图片验证码
*/
class CaptchasController extends Controller
{
    public function store(CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);

        $captcha = $captchaBuilder->build();
        $expiredAt = now()->addMinutes(2);
        \Cache::put($key, [ 'code' => $captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_image_content' => $captcha->inline()
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
