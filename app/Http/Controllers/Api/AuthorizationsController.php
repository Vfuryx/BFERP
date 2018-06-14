<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;

/**
* 登录资源
* @Resource("Authorizations",uri="/api")
*/
class AuthorizationsController extends Controller
{
    /**
     * 用户登录 
     *  
     * @Post("/authorizations") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({"username":"用户名","password":"密码","captcha_key":"验证码键值","captcha_code":"验证码"}),
     *      @Response(201, body={"access_token":"(token值)","token_type":"Bearer","expires_in":"3600(过期时间)"}),
     *      @Response(401, body={"message":"验证码错误","status_code":401}),
     *      @Response(422, body={"message":"验证码已失效","status_code":422}),
     *      @Response(401, body={"message":"用户名或密码错误","status_code":401}),
     *      @Response(422, body={"message":"422 Unprocessable Entity","errors":{"password":"密码最低为6位"},"status_code":422}),
     * })
     */ 
    public function store(AuthorizationRequest $request)
    {
        $captchaData = \Cache::get($request->captcha_key);
        if (!$captchaData) {
            return $this->response->error('验证码已失效', 422);
        }
        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }
        // 清除验证码缓存
        \Cache::forget($request->captcha_key);

        $username = $request->username;
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['username'] = $username;

        $credentials['password'] = $request->password;

        if (!$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }
    /**
     * 获取授权用户信息 
     *  
     * @Post("/me") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Request(headers={"Authorization":"bearer+空格+token值"}),
     *      @Response(200, body={"id":2,"username":"admin","email":"admin@admin.com","created_at":"2018-06-13 11:31:16","updated_at":"2018-06-13 11:31:16"}),
     *      @Response(401, body={"message":"Token not provided","status_code":401}),
     * })
     */ 
    public function me()
    {
        return response()->json(auth()->user());
    }
    /**
     * 刷新token 
     *  
     * @Put("/authorizations/current") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Request(headers={"Authorization":"bearer+空格+token值"}),
     *      @Response(201, body={"access_token":"(token值)","token_type":"Bearer","expires_in":"3600(过期时间)"}),
     *      @Response(500, body={"message":"The token has been blacklisted","status_code":500}),
     * })
     */ 
    public function update()
    {
        $token = \Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    /**
     * 退出登录 成功则返回状态码204
     *  
     * @Put("/authorizations/current") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Request(headers={"Authorization":"bearer+空格+token值"}),
     *      @Response(500, body={"message": "Token has expired","status_code": 500}),
     * })
     */ 
    public function destroy()
    {
        \Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
