FORMAT: 1A

# API文档

# Captchas [/api/captchas]
验证码资源标识

## 获取验证码 [POST /api/captchas/api/captchas]


+ Request (application/json)
    + Body

            {
                "noparam": "无参数"
            }

+ Response 201 (application/json)
    + Body

            {
                "captcha_key": "captcha-21t9UpJDWdZ3I7r(验证码键值，返回时必须作为参数返回)",
                "expired_at": "2018-06-13 16:15:36（过期时间）",
                "captcha_image_content": "(base64格式验证码图片地址)"
            }

# Authorizations [/api/authorizations]
登录资源标识

## 用户登录 [POST /api/authorizations/api/authorizations]


+ Request (application/json)
    + Body

            {
                "username": "用户名",
                "password": "密码",
                "captcha_key": "验证码键值",
                "captcha_code": "验证码"
            }

+ Response 201 (application/json)
    + Body

            {
                "access_token": "(token值)",
                "token_type": "Bearer",
                "expires_in": "3600(过期时间)"
            }

+ Response 401 (application/json)
    + Body

            {
                "message": "验证码错误",
                "status_code": 401
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "验证码已失效",
                "status_code": 422
            }

+ Response 401 (application/json)
    + Body

            {
                "message": "用户名或密码错误",
                "status_code": 401
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "password": "密码最低为6位"
                },
                "status_code": 422
            }