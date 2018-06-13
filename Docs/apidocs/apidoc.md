FORMAT: 1A

# API文档

# Captchas [/api]
验证码资源标识

## 获取验证码 [POST /api/captchas]


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

# MarkColors [/api]
标记颜色资源

## 获取所有标记颜色 [GET /api/markcolors]


+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "markcode": "CANCELORDER",
                        "markname": "取消订单",
                        "color": "#555555",
                        "description": "描述",
                        "status": 0,
                        "created_at": "2018-06-11 15:04:17",
                        "updated_at": "2018-06-11 15:04:17"
                    },
                    {
                        "id": 2,
                        "markcode": "TESTMARK",
                        "markname": "测试挖",
                        "color": "#888888",
                        "description": "我不是描述",
                        "status": 0,
                        "created_at": "2018-06-12 09:52:16",
                        "updated_at": "2018-06-12 09:52:16"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 5,
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/markcolors?page=2"
                        }
                    }
                }
            }

## 新增标记颜色 [POST /api/markcolors]


+ Parameters
    + markcode: (string, required) - 标记代码
    + markname: (string, required) - 标记名称
    + color: (string, required) - 颜色
    + description: (string, optional) - 描述
    + status: (string, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "status": [
                        "颜色必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 7,
                "markcode": "MARKCODE0",
                "markname": "标记名称0",
                "color": "颜色值0",
                "description": "描述0",
                "status": "1",
                "created_at": "2018-06-13 19:03:59",
                "updated_at": "2018-06-13 19:03:59",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条标记颜色 [POST /api/markcolors/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 7,
                "markcode": "MARKCODE0",
                "markname": "标记名称0",
                "color": "颜色值0",
                "description": "描述0",
                "status": "1",
                "created_at": "2018-06-13 19:03:59",
                "updated_at": "2018-06-13 19:03:59"
            }

## 修改标记颜色 [PATCH /api/markcolors/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "markcode": [
                        "标记代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 7,
                "markcode": "MARKCODE0",
                "markname": "标记名称0",
                "color": "颜色值0",
                "description": "描述0",
                "status": "1",
                "created_at": "2018-06-13 19:03:59",
                "updated_at": "2018-06-13 19:03:59"
            }

## 删除标记颜色 [DELETE /api/markcolors/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "message": "删除成功",
                "code": 1,
                "status_code": 200
            }

# Authorizations [/api]
登录资源

## 用户登录 [POST /api/authorizations]


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