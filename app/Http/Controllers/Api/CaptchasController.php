<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

/**
* 验证码资源标识
* @Resource("Captchas",uri="/api/captchas")
*/
class CaptchasController extends Controller
{
    /**
     * 获取验证码 
     *  
     * @Post("/api/captchas") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({"noparam":"无参数"}),
     *      @Response(201, body={"captcha_key":"captcha-21t9UpJDWdZ3I7r(验证码键值，返回时必须作为参数返回)","expired_at":"2018-06-13 16:15:36（过期时间）","captcha_image_content":"(base64格式验证码图片地址)"}, statusCode=201)
     * })
     */ 
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
