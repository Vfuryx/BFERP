FORMAT: 1A

# API文档

# Captchas [/api]
验证码资源标识

## 获取验证码 [POST /api/captchas]


+ Response 201 (application/json)
    + Body

            {
                "captcha_key": "captcha-21t9UpJDWdZ3I7r(验证码键值，返回时必须作为参数返回)",
                "expired_at": "2018-06-13 16:15:36（过期时间）",
                "captcha_image_content": "(base64格式验证码图片地址)"
            }

# MarkColors [/api]
标记颜色资源

## 获取所有标记颜色 [GET /api/markcolors{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

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
                        "count": 5,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/markcolors?page=1"
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
    + status: (integer, optional) - 状态(0:停用，1:启用)
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

+ Response 204 (application/json)
    + Body

            []

## 删除一组标记颜色 [DELETE /api/markcolors]


+ Parameters
    + ids: (string, required) - 标记颜色id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组标记颜色状态 [PUT /api/markcolors]


+ Parameters
    + ids: (string, required) - 标记颜色id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# AccountingTypes [/api]
记账类型资源

## 获取所有记账类型 [GET /api/acctypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "记账类型1",
                        "status": 1,
                        "created_at": "2018-06-14 13:59:42",
                        "updated_at": "2018-06-14 13:59:42"
                    },
                    {
                        "id": 2,
                        "name": "记账类型2",
                        "status": 0,
                        "created_at": "2018-06-14 13:59:46",
                        "updated_at": "2018-06-14 13:59:46"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 3,
                        "count": 3,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "http://127.0.0.1:8000/api/acctypes?page=1"
                        }
                    }
                }
            }

## 新增记账类型 [POST /api/acctypes]


+ Parameters
    + name: (string, required) - 记账类型名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "记账类型名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "记账类型1",
                "status": "1",
                "created_at": "2018-06-14 13:43:37",
                "updated_at": "2018-06-14 13:43:37",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条记账类型 [POST /api/acctypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "记账类型1",
                "status": 1,
                "created_at": "2018-06-14 13:59:42",
                "updated_at": "2018-06-14 13:59:42"
            }

## 修改记账类型 [PATCH /api/acctypes/:id]


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
                    "name": [
                        "记账类型名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "记账类型10",
                "status": "1",
                "created_at": "2018-06-14 13:59:42",
                "updated_at": "2018-06-14 14:06:30"
            }

## 删除记账类型 [DELETE /api/acctypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组记账类型 [DELETE /api/acctypes]


+ Parameters
    + ids: (string, required) - 记账类型id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组记账类型状态 [PUT /api/acctypes]


+ Parameters
    + ids: (string, required) - 记账类型id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# feetypes [/api]
费用类型资源

## 获取所有费用类型 [GET /api/feetypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "fee_category": {
                            "id": 1,
                            "name": "费用类别1",
                            "status": 1,
                            "created_at": "2018-06-25 10:45:30",
                            "updated_at": "2018-06-25 10:45:30"
                        },
                        "name": "费用类型1",
                        "code": "费用类型代码1",
                        "is_default": 1,
                        "status": 1,
                        "remark": "费用类型代码1备注",
                        "created_at": "2018-06-14 15:28:13",
                        "updated_at": "2018-06-14 15:28:13"
                    },
                    {
                        "id": 2,
                        "fee_category": {
                            "id": 2,
                            "name": "费用类别2",
                            "status": 1,
                            "created_at": "2018-06-25 10:45:32",
                            "updated_at": "2018-06-25 10:45:32"
                        },
                        "name": "费用类型2",
                        "code": "费用类型代码2",
                        "is_default": 1,
                        "status": 1,
                        "remark": "费用类型代码2备注",
                        "created_at": "2018-06-14 15:31:33",
                        "updated_at": "2018-06-14 15:31:33"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 13,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增费用类型 [POST /api/feetypes]


+ Parameters
    + fee_category_id: (integer, required) - 费用类别id
    + name: (string, required) - 费用名称
    + code: (string, required) - 费用代码
    + remark: (string, optional) - 费用类别备注
    + is_default: (integer, optional) - 是否默认
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "fee_category_id": [
                        "需要添加的id在数据库中未找到"
                    ],
                    "code": [
                        "费用代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "fee_category_id": "1",
                "name": "费用类型2",
                "code": "费用类型代码2",
                "is_default": "1",
                "status": "1",
                "remark": "费用类型代码2备注",
                "created_at": "2018-06-14 15:31:33",
                "updated_at": "2018-06-14 15:31:33",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条费用类型 [POST /api/feetypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "fee_category_id": 1,
                "name": "费用类型1",
                "code": "费用类型代码1",
                "is_default": 1,
                "status": 1,
                "remark": "费用类型代码1备注",
                "created_at": "2018-06-14 15:28:13",
                "updated_at": "2018-06-14 15:28:13"
            }

## 修改费用类型 [PATCH /api/feetypes/:id]


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
                    "code": [
                        "费用代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "fee_category_id": "1",
                "name": "费用类型1",
                "code": "费用类型代码10",
                "is_default": "1",
                "status": "1",
                "remark": "费用类型代码1备注",
                "created_at": "2018-06-14 15:28:13",
                "updated_at": "2018-06-14 15:46:06"
            }

## 删除费用类型 [DELETE /api/feetypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组费用类型 [DELETE /api/feetypes]


+ Parameters
    + ids: (string, required) - 费用类型id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组费用类型状态 [PUT /api/feetypes]


+ Parameters
    + ids: (string, required) - 费用类型id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# DistributionMethods [/api]
配送方式资源

## 获取所有配送方式 [GET /api/distmets{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "配送方式1",
                        "status": "1",
                        "created_at": "2018-06-14 14:39:45",
                        "updated_at": "2018-06-14 14:39:45"
                    },
                    {
                        "id": 2,
                        "name": "配送方式2",
                        "status": "1",
                        "created_at": "2018-06-14 14:42:23",
                        "updated_at": "2018-06-14 14:42:23"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 3,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/distmets?page=1"
                        }
                    }
                }
            }

## 新增配送方式 [POST /api/distmets]


+ Parameters
    + name: (string, required) - 配送方式名
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "配送方式名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送方式1",
                "status": "1",
                "created_at": "2018-06-14 14:39:45",
                "updated_at": "2018-06-14 14:39:45",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条配送方式 [POST /api/distmets/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送方式1",
                "status": "1",
                "created_at": "2018-06-14 14:39:45",
                "updated_at": "2018-06-14 14:45:14"
            }

## 修改配送方式 [PATCH /api/distmets/:id]


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
                    "name": [
                        "配送方式名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送方式10",
                "status": "1",
                "created_at": "2018-06-14 14:39:45",
                "updated_at": "2018-06-14 14:40:45"
            }

## 删除配送方式 [DELETE /api/distmets/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组配送方式 [DELETE /api/distmets]


+ Parameters
    + ids: (string, required) - 配送方式id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组配送方式状态 [PUT /api/distmets]


+ Parameters
    + ids: (string, required) - 配送方式id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# FeeCategories [/api]
费用类别资源

## 获取所有费用类别 [GET /api/feecates{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "费用类别1",
                        "status": 1,
                        "created_at": "2018-06-25 10:45:30",
                        "updated_at": "2018-06-25 10:45:30"
                    },
                    {
                        "id": 2,
                        "name": "费用类别2",
                        "status": 1,
                        "created_at": "2018-06-25 10:45:32",
                        "updated_at": "2018-06-25 10:45:32"
                    }
                ]
            }

## 新增费用类别 [POST /api/feecates]


+ Parameters
    + name: (string, required) - 费用类别名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "费用类别名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "费用类别1",
                "status": 1,
                "created_at": "2018-06-14 15:02:10",
                "updated_at": "2018-06-14 15:02:10",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条费用类别 [POST /api/feecates/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "费用类别1",
                "status": 1,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:01:51"
            }

## 修改费用类别 [PATCH /api/feecates/:id]


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
                    "name": [
                        "费用类别名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "费用类别10",
                "status": 1,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:07:56"
            }

## 删除费用类别 [DELETE /api/feecates/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组费用类别 [DELETE /api/feecates]


+ Parameters
    + ids: (string, required) - 费用类别id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组费用类别状态 [PUT /api/feecates]


+ Parameters
    + ids: (string, required) - 费用类别id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# FreightTypes [/api]
运费类型资源

## 获取所有运费类型 [GET /api/freighttypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 2,
                        "name": "运费类型名1",
                        "is_default": 1,
                        "status": 1,
                        "created_at": "2018-06-14 15:59:10",
                        "updated_at": "2018-06-14 15:59:10"
                    },
                    {
                        "id": 3,
                        "name": "运费类型名2",
                        "is_default": 1,
                        "status": 1,
                        "created_at": "2018-06-14 15:59:12",
                        "updated_at": "2018-06-14 15:59:12"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 5,
                        "count": 5,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/freighttypes?page=1"
                        }
                    }
                }
            }

## 新增运费类型 [POST /api/freighttypes]


+ Parameters
    + name: (string, required) - 运费类型名称
    + is_default: (integer, optional) - 是否默认
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "name": {
                    "status": [
                        "运费名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 3,
                "name": "运费类型名1",
                "is_default": "1",
                "status": "1",
                "created_at": "2018-06-14 15:59:12",
                "updated_at": "2018-06-14 15:59:12",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条运费类型 [POST /api/freighttypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 2,
                "name": "运费类型名1",
                "is_default": 1,
                "status": 1,
                "created_at": "2018-06-14 15:59:10",
                "updated_at": "2018-06-14 15:59:10"
            }

## 修改运费类型 [PATCH /api/freighttypes/:id]


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
                    "name": [
                        "运费名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "name": "运费类型名1",
                "is_default": "1",
                "status": "1",
                "created_at": "2018-06-14 15:59:10",
                "updated_at": "2018-06-14 15:59:10"
            }

## 删除运费类型 [DELETE /api/freighttypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组运费类型 [DELETE /api/freighttypes]


+ Parameters
    + ids: (string, required) - 运费类型id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组运费类型状态 [PUT /api/freighttypes]


+ Parameters
    + ids: (string, required) - 运费类型id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# GoodsCategories [/api]
商品类别资源

## 获取所有商品类别 [GET /api/goodscates{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "code": "商品类别代码1",
                        "name": "商品类别名1",
                        "status": 1,
                        "description": "商品类别详情1",
                        "remark": "商品类别备注1",
                        "created_at": "2018-06-14 16:33:26",
                        "updated_at": "2018-06-14 16:33:26"
                    },
                    {
                        "id": 2,
                        "code": "商品类别代码2",
                        "name": "商品类别名2",
                        "status": 1,
                        "description": "商品类别详情2",
                        "remark": "商品类别备注2",
                        "created_at": "2018-06-14 16:40:44",
                        "updated_at": "2018-06-14 16:40:44"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 5,
                        "count": 5,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/goodscates?page=1"
                        }
                    }
                }
            }

## 新增商品类别 [POST /api/goodscates]


+ Parameters
    + code: (string, required) - 商品类别代码
    + name: (string, required) - 商品类别名称
    + description: (string, optional) - 描述
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "status": [
                        "商品类别代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "code": "商品类别代码1",
                "name": "商品类别名1",
                "status": "1",
                "description": "商品类别详情1",
                "remark": "商品类别备注1",
                "created_at": "2018-06-14 16:33:26",
                "updated_at": "2018-06-14 16:33:26",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条商品类别 [POST /api/goodscates/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "code": "商品类别代码1",
                "name": "商品类别名1",
                "status": 1,
                "description": "商品类别详情1",
                "remark": "商品类别备注1",
                "created_at": "2018-06-14 16:33:26",
                "updated_at": "2018-06-14 16:33:26"
            }

## 修改商品类别 [PATCH /api/goodscates/:id]


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
                    "code": [
                        "商品类别代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 3,
                "code": "商品类别代码30",
                "name": "商品类别名30",
                "status": "1",
                "description": "商品类别详情30",
                "remark": "商品类别备注30",
                "created_at": "2018-06-14 16:40:54",
                "updated_at": "2018-06-14 16:43:00"
            }

## 删除商品类别 [DELETE /api/goodscates/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组商品类别 [DELETE /api/goodscates]


+ Parameters
    + ids: (string, required) - 商品类别id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组商品类别状态 [PUT /api/goodscates]


+ Parameters
    + ids: (string, required) - 商品类别id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# StorageTypes [/api]
入库类型资源

## 获取所有入库类型 [GET /api/storagetypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "入库类型1",
                        "status": 1,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "入库类型2",
                        "status": 1,
                        "created_at": "2018-06-14 16:55:36",
                        "updated_at": "2018-06-14 16:55:36"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 5,
                        "count": 5,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/storagetypes?page=1"
                        }
                    }
                }
            }

## 新增入库类型 [POST /api/storagetypes]


+ Parameters
    + name: (string, required) - 入库类型名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "入库类型名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 3,
                "name": "入库类型3",
                "status": "1",
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条入库类型 [POST /api/storagetypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "入库类型1",
                "status": 1,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改入库类型 [PATCH /api/storagetypes/:id]


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
                    "name": [
                        "入库类型名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "入库类型10",
                "status": "1",
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除入库类型 [DELETE /api/storagetypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组入库类型 [DELETE /api/storagetypes]


+ Parameters
    + ids: (string, required) - 入库类型id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组入库类型状态 [PUT /api/storagetypes]


+ Parameters
    + ids: (string, required) - 入库类型id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# cityinfos [/api]
城市信息资源

## 获取所有城市信息 [GET /api/cityinfos{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "logistics": {
                            "id": 1,
                            "code": "物流代码1",
                            "name": "物流名称1",
                            "report_id": 1,
                            "logistics_area_id": 1,
                            "expected_days": 1,
                            "phone": "1333333333",
                            "address": "物流地址",
                            "freight_type_id": 1,
                            "remark": "",
                            "status": 1,
                            "created_at": "2018-07-02 17:40:39",
                            "updated_at": "2018-07-02 17:40:42"
                        },
                        "province": "省",
                        "city": "市",
                        "district": "区",
                        "address": "提货地址",
                        "phone": "13333333333",
                        "price": "100.00",
                        "weight_univalent": "100.00",
                        "expected_days": 1,
                        "route": 1,
                        "is_free_shipping": 1,
                        "remark": "1",
                        "status": 1,
                        "created_at": "2018-07-02 17:44:32",
                        "updated_at": "2018-07-02 17:44:32"
                    },
                    {
                        "id": 2,
                        "logistics": {
                            "id": 1,
                            "code": "物流代码1",
                            "name": "物流名称1",
                            "report_id": 1,
                            "logistics_area_id": 1,
                            "expected_days": 1,
                            "phone": "1333333333",
                            "address": "物流地址",
                            "freight_type_id": 1,
                            "remark": "",
                            "status": 1,
                            "created_at": "2018-07-02 17:40:39",
                            "updated_at": "2018-07-02 17:40:42"
                        },
                        "province": "省2",
                        "city": "市2",
                        "district": "区2",
                        "address": "提货地址2",
                        "phone": "13333333333",
                        "price": "100.00",
                        "weight_univalent": "100.00",
                        "expected_days": 1,
                        "route": 1,
                        "is_free_shipping": 1,
                        "remark": "1",
                        "status": 1,
                        "created_at": "2018-07-02 17:58:56",
                        "updated_at": "2018-07-02 17:58:56"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增城市信息 [POST /api/cityinfos]


+ Parameters
    + logistics_id: (integer, required) - 物流id
    + province: (string, required) - 省
    + city: (string, required) - 市
    + district: (string, required) - 区
    + address: (string, required) - 提货地址
    + phone: (string, required) - 提货电话
    + price: (numeric, required) - 物流费用
    + weight_univalent: (numeric, required) - 重量单价
    + expected_days: (integer, required) - 城市到达天数
    + route: (integer, optional) - 中转或直达：0=中转，1=直达
        + Default: 1
    + is_free_shipping: (integer, optional) - 是否包邮
        + Default: 0
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "logistics_id": [
                        "物流id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "logistics": {
                    "id": 1,
                    "code": "物流代码1",
                    "name": "物流名称1",
                    "report_id": 1,
                    "logistics_area_id": 1,
                    "expected_days": 1,
                    "phone": "1333333333",
                    "address": "物流地址",
                    "freight_type_id": 1,
                    "remark": "",
                    "status": 1,
                    "created_at": "2018-07-02 17:40:39",
                    "updated_at": "2018-07-02 17:40:42"
                },
                "province": "省",
                "city": "市",
                "district": "区",
                "address": "提货地址",
                "phone": "13333333333",
                "price": "100.00",
                "weight_univalent": "100.00",
                "expected_days": "1",
                "route": "1",
                "is_free_shipping": "1",
                "remark": "1",
                "status": "1",
                "created_at": "2018-07-02 17:44:32",
                "updated_at": "2018-07-02 17:44:32",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条城市信息 [POST /api/cityinfos/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "logistics": {
                    "id": 1,
                    "code": "物流代码1",
                    "name": "物流名称1",
                    "report_id": 1,
                    "logistics_area_id": 1,
                    "expected_days": 1,
                    "phone": "1333333333",
                    "address": "物流地址",
                    "freight_type_id": 1,
                    "remark": "",
                    "status": 1,
                    "created_at": "2018-07-02 17:40:39",
                    "updated_at": "2018-07-02 17:40:42"
                },
                "province": "省",
                "city": "市",
                "district": "区",
                "address": "提货地址",
                "phone": "13333333333",
                "price": "100.00",
                "weight_univalent": "100.00",
                "expected_days": 1,
                "route": 1,
                "is_free_shipping": 1,
                "remark": "1",
                "status": 1,
                "created_at": "2018-07-02 17:44:32",
                "updated_at": "2018-07-02 17:44:32"
            }

## 修改城市信息 [PATCH /api/cityinfos/:id]


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
                    "logistics_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "province": [
                        "省必须string类型"
                    ],
                    "price": [
                        "物流费用必须是数字"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "logistics": {
                    "id": 1,
                    "code": "物流代码1",
                    "name": "物流名称1",
                    "report_id": 1,
                    "logistics_area_id": 1,
                    "expected_days": 1,
                    "phone": "1333333333",
                    "address": "物流地址",
                    "freight_type_id": 1,
                    "remark": "",
                    "status": 1,
                    "created_at": "2018-07-02 17:40:39",
                    "updated_at": "2018-07-02 17:40:42"
                },
                "province": "省5",
                "city": "市5",
                "district": "区5",
                "address": "提货地址5",
                "phone": "13333333333",
                "price": "100.00",
                "weight_univalent": "100.00",
                "expected_days": "1",
                "route": "1",
                "is_free_shipping": "1",
                "remark": "1",
                "status": "1",
                "created_at": "2018-07-02 17:44:32",
                "updated_at": "2018-07-02 18:06:55"
            }

## 删除城市信息 [DELETE /api/cityinfos/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组城市信息 [DELETE /api/cityinfos]


+ Parameters
    + ids: (string, required) - 城市信息id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组城市信息状态 [PUT /api/cityinfos]


+ Parameters
    + ids: (string, required) - 城市信息id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# damagedgoods [/api]
损坏商品资源

## 获取所有损坏商品 [GET /api/damagedgoods{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "order_no": "订单号",
                        "good_sn": "商品编码",
                        "standard_code": "规格编码",
                        "quantity": 10,
                        "money": "1001.10",
                        "remark": "备注",
                        "created_at": "2018-07-03 15:55:41",
                        "updated_at": "2018-07-03 15:55:41"
                    },
                    {
                        "id": 2,
                        "order_no": "订单号2",
                        "good_sn": "商品编码2",
                        "standard_code": "规格编码2",
                        "quantity": 10,
                        "money": "1001.10",
                        "remark": "备注",
                        "created_at": "2018-07-03 15:55:47",
                        "updated_at": "2018-07-03 15:55:47"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增损坏商品 [POST /api/damagedgoods]


+ Parameters
    + order_no: (string, required) - 订单号
    + good_sn: (string, required) - 商品编码
    + standard_code: (string, required) - 规格编码
    + quantity: (integer, required) - 损坏数量
    + money: (numeric, required) - 损坏金额
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "order_no": [
                        "订单号必填"
                    ],
                    "good_sn": [
                        "商品编码必填"
                    ],
                    "standard_code": [
                        "规格编码必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "order_no": "订单号1",
                "good_sn": "商品编码1",
                "standard_code": "规格编码1",
                "quantity": "10",
                "money": "1001.1",
                "remark": "备注",
                "created_at": "2018-07-03 15:41:04",
                "updated_at": "2018-07-03 15:41:04",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条损坏商品 [POST /api/damagedgoods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "order_no": "订单号",
                "good_sn": "商品编码",
                "standard_code": "规格编码",
                "quantity": 10,
                "money": "1001.10",
                "remark": "备注",
                "created_at": "2018-07-03 15:55:41",
                "updated_at": "2018-07-03 15:55:41"
            }

## 修改损坏商品 [PATCH /api/damagedgoods/:id]


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
                    "status": [
                        "状态必须int类型"
                    ],
                    "order_no": [
                        "订单号必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "order_no": "订单号",
                "good_sn": "商品编码",
                "standard_code": "规格编码",
                "quantity": 10,
                "money": "1001.10",
                "remark": "备注",
                "created_at": "2018-07-03 15:55:41",
                "updated_at": "2018-07-03 15:55:41"
            }

## 删除损坏商品 [DELETE /api/damagedgoods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组损坏商品 [DELETE /api/damagedgoods]


+ Parameters
    + ids: (string, required) - 损坏商品id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组损坏商品状态 [PUT /api/damagedgoods]


+ Parameters
    + ids: (string, required) - 损坏商品id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# logisticsareas [/api]
物流区域资源

## 获取所有物流区域 [GET /api/logisticsareas{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "code": "区域代码1",
                        "name": "区域名称1",
                        "status": 1,
                        "created_at": "2018-07-03 16:29:28",
                        "updated_at": "2018-07-03 16:29:28"
                    },
                    {
                        "id": 2,
                        "code": "区域代码2",
                        "name": "区域名称2",
                        "status": 1,
                        "created_at": "2018-07-03 16:35:55",
                        "updated_at": "2018-07-03 16:35:55"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增物流区域 [POST /api/logisticsareas]


+ Parameters
    + code: (string, required) - 区域代码
    + name: (string, required) - 区域名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "code": [
                        "区域代码不能重复"
                    ],
                    "name": [
                        "区域名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "code": "区域代码1",
                "name": "区域名称1",
                "status": "1",
                "created_at": "2018-07-03 16:29:28",
                "updated_at": "2018-07-03 16:29:28",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条物流区域 [POST /api/logisticsareas/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "code": "区域代码1",
                "name": "区域名称1",
                "status": 1,
                "created_at": "2018-07-03 16:29:28",
                "updated_at": "2018-07-03 16:29:28"
            }

## 修改物流区域 [PATCH /api/logisticsareas/:id]


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
                    "status": [
                        "状态必须int类型"
                    ],
                    "code": [
                        "区域代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "code": "区域代码10",
                "name": "区域名称10",
                "status": "1",
                "created_at": "2018-07-03 16:29:28",
                "updated_at": "2018-07-03 16:38:32"
            }

## 删除物流区域 [DELETE /api/logisticsareas/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组物流区域 [DELETE /api/logisticsareas]


+ Parameters
    + ids: (string, required) - 物流区域id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组物流区域状态 [PUT /api/logisticsareas]


+ Parameters
    + ids: (string, required) - 物流区域id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# logistics [/api]
物流资源

## 获取所有物流 [GET /api/logistics{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "code": "物流代码",
                        "name": "物流名称",
                        "report": {
                            "id": 1,
                            "file": "报表文件",
                            "name": "报表名称",
                            "paper_format": "报表格式",
                            "status": 1,
                            "created_at": "2018-07-03 17:50:46",
                            "updated_at": "2018-07-03 17:50:49"
                        },
                        "logistics_area": {
                            "id": 3,
                            "code": "区域代码1",
                            "name": "区域名称1",
                            "status": 1,
                            "created_at": "2018-07-03 17:49:38",
                            "updated_at": "2018-07-03 17:49:38"
                        },
                        "expected_days": 10,
                        "phone": "物流电话",
                        "address": "物流地址",
                        "freight_type": {
                            "id": 1,
                            "name": "运费名称1",
                            "status": 1,
                            "is_default": 1,
                            "created_at": "2018-07-03 17:51:25",
                            "updated_at": "2018-07-03 17:51:25"
                        },
                        "remark": "备注",
                        "status": 1,
                        "created_at": "2018-07-03 17:52:28",
                        "updated_at": "2018-07-03 17:52:28"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增物流 [POST /api/logistics]


+ Parameters
    + code: (string, required) - 物流代码
    + name: (string, required) - 物流名称
    + report_id: (integer, required) - 报表格式id
    + logistics_area_id: (integer, required) - 物流区域id
    + expected_days: (integer, required) - 预计天数
    + phone: (string, required) - 物流电话
    + address: (string, required) - 物流地址
    + freight_type_id: (integer, required) - 运费类型id
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "report_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "logistics_area_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "freight_type_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "expected_days": [
                        "预计天数必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "code": "物流代码",
                "name": "物流名称",
                "report": {
                    "id": 1,
                    "file": "报表文件",
                    "name": "报表名称",
                    "paper_format": "报表格式",
                    "status": 1,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "logistics_area": {
                    "id": 3,
                    "code": "区域代码1",
                    "name": "区域名称1",
                    "status": 1,
                    "created_at": "2018-07-03 17:49:38",
                    "updated_at": "2018-07-03 17:49:38"
                },
                "expected_days": "10",
                "phone": "物流电话",
                "address": "物流地址",
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": 1,
                    "is_default": 1,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
                "remark": "备注",
                "status": "1",
                "created_at": "2018-07-03 17:52:28",
                "updated_at": "2018-07-03 17:52:28",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条物流 [POST /api/logistics/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "code": "物流代码",
                "name": "物流名称",
                "report": {
                    "id": 1,
                    "file": "报表文件",
                    "name": "报表名称",
                    "paper_format": "报表格式",
                    "status": 1,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "logistics_area": {
                    "id": 3,
                    "code": "区域代码1",
                    "name": "区域名称1",
                    "status": 1,
                    "created_at": "2018-07-03 17:49:38",
                    "updated_at": "2018-07-03 17:49:38"
                },
                "expected_days": 10,
                "phone": "物流电话",
                "address": "物流地址",
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": 1,
                    "is_default": 1,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
                "remark": "备注",
                "status": 1,
                "created_at": "2018-07-03 17:52:28",
                "updated_at": "2018-07-03 17:52:28"
            }

## 修改物流 [PATCH /api/logistics/:id]


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
                    "report_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "logistics_area_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "freight_type_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "code": [
                        "物流代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "code": "物流代码1",
                "name": "物流名称1",
                "report": {
                    "id": 1,
                    "file": "报表文件",
                    "name": "报表名称",
                    "paper_format": "报表格式",
                    "status": 1,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "logistics_area": {
                    "id": 3,
                    "code": "区域代码1",
                    "name": "区域名称1",
                    "status": 1,
                    "created_at": "2018-07-03 17:49:38",
                    "updated_at": "2018-07-03 17:49:38"
                },
                "expected_days": "10",
                "phone": "物流电话1",
                "address": "物流地址1",
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": 1,
                    "is_default": 1,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
                "remark": "备注",
                "status": "1",
                "created_at": "2018-07-03 17:52:28",
                "updated_at": "2018-07-03 18:30:59"
            }

## 删除物流 [DELETE /api/logistics/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组物流 [DELETE /api/logistics]


+ Parameters
    + ids: (string, required) - 物流id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组物流状态 [PUT /api/logistics]


+ Parameters
    + ids: (string, required) - 物流id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# warehouses [/api]
仓库资源

## 获取所有仓库 [GET /api/warehouses{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "仓库名称1",
                        "province": "仓库地（省）1",
                        "city": "仓库地（市）1",
                        "district": "仓库地（区）1",
                        "address": "仓库地（地址）1",
                        "is_default": 1,
                        "status": 1,
                        "created_at": "2018-07-04 10:06:35",
                        "updated_at": "2018-07-04 10:06:35"
                    },
                    {
                        "id": 2,
                        "name": "仓库名称2",
                        "province": "仓库地（省）2",
                        "city": "仓库地（市）2",
                        "district": "仓库地（区）2",
                        "address": "仓库地（地址）2",
                        "is_default": 0,
                        "status": 1,
                        "created_at": "2018-07-04 10:15:49",
                        "updated_at": "2018-07-04 10:20:04"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增仓库 [POST /api/warehouses]


+ Parameters
    + name: (string, required) - 仓库名称
    + province: (string, required) - 仓库地（省）
    + city: (string, required) - 仓库地（市）
    + district: (string, required) - 仓库地（区）
    + address: (string, required) - 仓库地（地址）
    + is_default: (integer, optional) - 是否默认
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_default": [
                        "是否默认必须int类型"
                    ],
                    "status": [
                        "状态必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "仓库名称1",
                "province": "仓库地（省）1",
                "city": "仓库地（市）1",
                "district": "仓库地（区）1",
                "address": "仓库地（地址）1",
                "is_default": "1",
                "status": "1",
                "created_at": "2018-07-04 10:06:35",
                "updated_at": "2018-07-04 10:06:35",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条仓库 [POST /api/warehouses/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 2,
                "name": "仓库名称2",
                "province": "仓库地（省）2",
                "city": "仓库地（市）2",
                "district": "仓库地（区）2",
                "address": "仓库地（地址）2",
                "is_default": 0,
                "status": 1,
                "created_at": "2018-07-04 10:15:49",
                "updated_at": "2018-07-04 10:20:04"
            }

## 修改仓库 [PATCH /api/warehouses/:id]


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
                    "is_default": [
                        "是否默认必须int类型"
                    ],
                    "status": [
                        "状态必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "name": "仓库名称2",
                "province": "仓库地（省）2",
                "city": "仓库地（市）2",
                "district": "仓库地（区）2",
                "address": "仓库地（地址）2",
                "is_default": "0",
                "status": "1",
                "created_at": "2018-07-04 10:15:49",
                "updated_at": "2018-07-04 10:20:04"
            }

## 删除仓库 [DELETE /api/warehouses/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组仓库 [DELETE /api/warehouses]


+ Parameters
    + ids: (string, required) - 仓库id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组仓库状态 [PUT /api/warehouses]


+ Parameters
    + ids: (string, required) - 仓库id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# suppliers [/api]
供应商资源

## 获取所有供应商 [GET /api/suppliers{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "供应商名称",
                        "company": "供应商公司",
                        "code": "公司代码",
                        "province": "省",
                        "city": "市",
                        "district": "区",
                        "address": "地址",
                        "zipcode": "邮编",
                        "contacts": "联系人",
                        "phone": "电话",
                        "mobile": "手机",
                        "fax": "传真",
                        "email": "邮箱",
                        "remark": "备注",
                        "is_scan": 1,
                        "status": 1,
                        "auto_valuation": 1,
                        "created_at": "2018-07-05 10:55:27",
                        "updated_at": "2018-07-05 10:55:27"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增供应商 [POST /api/suppliers]


+ Parameters
    + name: (string, required) - 供应商名称
    + company: (string, required) - 供应商公司
    + code: (string, required) - 公司代码
    + province: (string, required) - 省
    + city: (string, required) - 市
    + district: (string, required) - 区
    + address: (string, required) - 地址
    + zipcode: (string, required) - 邮编
    + phone: (string, required) - 电话
    + mobile: (string, required) - 手机
    + fax: (string, required) - 传真
    + email: (string, required) - 邮箱
    + remark: (string, optional) - 备注
    + is_scan: (integer, optional) - 是否启用扫描
        + Default: 1
    + auto_valuation: (integer, optional) - 是否采购自动计价
        + Default: 1
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "code": [
                        "公司代码不能重复"
                    ],
                    "is_scan": [
                        "是否启用扫描必须int类型"
                    ],
                    "auto_valuation": [
                        "是否采购自动计价必须int类型"
                    ],
                    "status": [
                        "状态必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "供应商名称",
                "company": "供应商公司",
                "code": "公司代码",
                "province": "省",
                "city": "市",
                "district": "区",
                "address": "地址",
                "zipcode": "邮编",
                "contacts": "联系人",
                "phone": "电话",
                "mobile": "手机",
                "fax": "传真",
                "email": "邮箱",
                "remark": "备注",
                "is_scan": "1",
                "status": "1",
                "auto_valuation": "1",
                "created_at": "2018-07-05 10:55:27",
                "updated_at": "2018-07-05 10:55:27",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条供应商 [POST /api/suppliers/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "供应商名称",
                "company": "供应商公司",
                "code": "公司代码",
                "province": "省",
                "city": "市",
                "district": "区",
                "address": "地址",
                "zipcode": "邮编",
                "contacts": "联系人",
                "phone": "电话",
                "mobile": "手机",
                "fax": "传真",
                "remark": "备注",
                "is_scan": 1,
                "status": 1,
                "auto_valuation": 1,
                "created_at": "2018-07-04 11:11:39",
                "updated_at": "2018-07-04 11:11:39"
            }

## 修改供应商 [PATCH /api/suppliers/:id]


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
                    "code": [
                        "费用代码不能重复"
                    ],
                    "logistics_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "price": [
                        "物流费用必须是数字"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "供应商名称",
                "company": "供应商公司",
                "code": "公司代码",
                "province": "省",
                "city": "市",
                "district": "区",
                "address": "地址",
                "zipcode": "邮编",
                "contacts": "联系人",
                "phone": "电话",
                "mobile": "手机",
                "fax": "传真",
                "email": "邮箱",
                "remark": "备注",
                "is_scan": 1,
                "status": 1,
                "auto_valuation": 1,
                "created_at": "2018-07-05 10:55:27",
                "updated_at": "2018-07-05 10:55:27"
            }

## 删除供应商 [DELETE /api/suppliers/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组供应商 [DELETE /api/suppliers]


+ Parameters
    + ids: (string, required) - 供应商id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组供应商状态 [PUT /api/suppliers]


+ Parameters
    + ids: (string, required) - 供应商id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# shops [/api]
店铺资源

## 获取所有店铺 [GET /api/shops{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "nick": "卖家昵称",
                        "title": "店铺标题",
                        "session_key": "SessionKey",
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称1",
                            "province": "仓库地（省）1",
                            "city": "仓库地（市）1",
                            "district": "仓库地（区）1",
                            "address": "仓库地（地址）1",
                            "is_default": 1,
                            "status": 1,
                            "created_at": "2018-07-05 10:49:24",
                            "updated_at": "2018-07-05 10:49:24"
                        },
                        "shop_account": "店铺账号1",
                        "shop_passwd": "店铺密码1",
                        "rebate": "10.00",
                        "principal": "店铺负责人1",
                        "principal_mobile": "负责人电话1",
                        "province": "发货地（省）1",
                        "city": "发货地（市）1",
                        "district": "发货地（区）",
                        "address": "发货地（地址）",
                        "gross_profit_rate": "10.00",
                        "platform": {
                            "id": 1,
                            "name": "平台类型名称1",
                            "status": 1,
                            "created_at": "2018-07-05 10:49:30",
                            "updated_at": "2018-07-05 10:49:30"
                        },
                        "is_waybill": 2,
                        "status": 1,
                        "created_at": "2018-07-05 10:49:44",
                        "updated_at": "2018-07-05 10:49:44"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增店铺 [POST /api/shops]


+ Parameters
    + nick: (string, required) - 卖家昵称
    + title: (string, required) - 店铺标题
    + session_key: (string, required) - SessionKey
    + warehouse_id: (integer, required) - 默认仓库
    + shop_account: (string, required) - 店铺账号
    + shop_passwd: (string, required) - 店铺密码
    + rebate: (string, required) - 返点（%）
    + principal: (string, required) - 店铺负责人
    + principal_mobile: (string, required) - 负责人电话
    + province: (string, required) - 发货地（省）
    + city: (string, required) - 发货地（市）
    + district: (string, required) - 发货地（区）
    + address: (string, required) - 发货地（地址）
    + gross_profit_rate: (string, required) - 毛利率（%）
    + platform_id: (integer, required) - 平台类型
    + is_waybill: (integer, optional) - 电子面单
        + Default: 1
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "warehouse_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "platform_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "nick": "卖家昵称",
                "title": "店铺标题",
                "session_key": "SessionKey",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称1",
                    "province": "仓库地（省）1",
                    "city": "仓库地（市）1",
                    "district": "仓库地（区）1",
                    "address": "仓库地（地址）1",
                    "is_default": 1,
                    "status": 1,
                    "created_at": "2018-07-05 10:49:24",
                    "updated_at": "2018-07-05 10:49:24"
                },
                "shop_account": "店铺账号",
                "shop_passwd": "店铺密码",
                "rebate": "10.00",
                "principal": "店铺负责人",
                "principal_mobile": "负责人电话",
                "province": "发货地（省）",
                "city": "发货地（市）",
                "district": "发货地（区）",
                "address": "发货地（地址）",
                "gross_profit_rate": "10.00",
                "platform": {
                    "id": 1,
                    "name": "平台类型名称1",
                    "status": 1,
                    "created_at": "2018-07-05 10:49:30",
                    "updated_at": "2018-07-05 10:49:30"
                },
                "is_waybill": "2",
                "status": "1",
                "created_at": "2018-07-05 10:49:44",
                "updated_at": "2018-07-05 10:49:44",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条店铺 [POST /api/shops/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "店铺名称",
                "session_key": "SessionKey",
                "warehouse": {
                    "id": 4,
                    "name": "仓库名称4",
                    "province": "仓库地（省）4",
                    "city": "仓库地（市）4",
                    "district": "仓库地（区）4",
                    "address": "仓库地（地址）4",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-04 10:26:13",
                    "updated_at": "2018-07-04 10:48:23"
                },
                "shop_account": "店铺账号",
                "shop_passwd": "店铺密码",
                "rebate": "10.00",
                "principal": "店铺负责人",
                "principal_mobile": "负责人电话",
                "province": "发货地（省）",
                "city": "发货地（市）",
                "district": "发货地（区）",
                "address": "发货地（地址）",
                "gross_profit_rate": "10.00",
                "platform": {
                    "id": 1,
                    "name": "平台名称1",
                    "status": 1,
                    "created_at": "2018-07-04 12:54:52",
                    "updated_at": "2018-07-04 12:54:55"
                },
                "is_waybill": 1,
                "status": 1,
                "created_at": "2018-07-04 12:56:57",
                "updated_at": "2018-07-04 12:56:57"
            }

## 修改店铺 [PATCH /api/shops/:id]


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
                    "warehouse_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "platform_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "nick": "卖家昵称",
                "title": "店铺标题",
                "session_key": "SessionKey",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称1",
                    "province": "仓库地（省）1",
                    "city": "仓库地（市）1",
                    "district": "仓库地（区）1",
                    "address": "仓库地（地址）1",
                    "is_default": 1,
                    "status": 1,
                    "created_at": "2018-07-05 10:49:24",
                    "updated_at": "2018-07-05 10:49:24"
                },
                "shop_account": "店铺账号10",
                "shop_passwd": "店铺密码10",
                "rebate": "10.00",
                "principal": "店铺负责人10",
                "principal_mobile": "负责人电话10",
                "province": "发货地（省）10",
                "city": "发货地（市）10",
                "district": "发货地（区）10",
                "address": "发货地（地址）10",
                "gross_profit_rate": "10.00",
                "platform": {
                    "id": 1,
                    "name": "平台类型名称1",
                    "status": 1,
                    "created_at": "2018-07-05 10:49:30",
                    "updated_at": "2018-07-05 10:49:30"
                },
                "is_waybill": 2,
                "status": 1,
                "created_at": "2018-07-05 10:49:44",
                "updated_at": "2018-07-05 10:49:44"
            }

## 删除店铺 [DELETE /api/shops/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组店铺 [DELETE /api/shops]


+ Parameters
    + ids: (string, required) - 店铺id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组店铺状态 [PUT /api/shops]


+ Parameters
    + ids: (string, required) - 店铺id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# series [/api]
系列资源

## 获取所有系列 [GET /api/series{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "suppliers": {
                            "id": 1,
                            "name": "供应商名称4",
                            "company": "供应商公司4",
                            "code": "公司代码4",
                            "province": "省4",
                            "city": "市4",
                            "district": "区4",
                            "address": "地址4",
                            "zipcode": "邮编4",
                            "contacts": "联系人4",
                            "phone": "电话4",
                            "mobile": "手机4",
                            "fax": "传真4",
                            "remark": "备注4",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-04 11:11:39",
                            "updated_at": "2018-07-04 11:22:29"
                        },
                        "code": "系列代码",
                        "name": "系列名称",
                        "description": "系列描述",
                        "remark": "备注",
                        "status": 1,
                        "created_at": "2018-07-04 14:03:49",
                        "updated_at": "2018-07-04 14:03:49"
                    },
                    {
                        "id": 2,
                        "suppliers": {
                            "id": 1,
                            "name": "供应商名称4",
                            "company": "供应商公司4",
                            "code": "公司代码4",
                            "province": "省4",
                            "city": "市4",
                            "district": "区4",
                            "address": "地址4",
                            "zipcode": "邮编4",
                            "contacts": "联系人4",
                            "phone": "电话4",
                            "mobile": "手机4",
                            "fax": "传真4",
                            "remark": "备注4",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-04 11:11:39",
                            "updated_at": "2018-07-04 11:22:29"
                        },
                        "code": "系列代码2",
                        "name": "系列名称",
                        "description": "系列描述",
                        "remark": "备注",
                        "status": 1,
                        "created_at": "2018-07-04 14:09:51",
                        "updated_at": "2018-07-04 14:09:51"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增系列 [POST /api/series]


+ Parameters
    + suppliers_id: (integer, required) - 供应商id
    + code: (string, required) - 系列代码
    + name: (string, required) - 系列名称
    + description: (string, optional) - 系列描述
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "suppliers_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "code": [
                        "系列代码不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "suppliers": {
                    "id": 1,
                    "name": "供应商名称4",
                    "company": "供应商公司4",
                    "code": "公司代码4",
                    "province": "省4",
                    "city": "市4",
                    "district": "区4",
                    "address": "地址4",
                    "zipcode": "邮编4",
                    "contacts": "联系人4",
                    "phone": "电话4",
                    "mobile": "手机4",
                    "fax": "传真4",
                    "remark": "备注4",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-04 11:11:39",
                    "updated_at": "2018-07-04 11:22:29"
                },
                "code": "系列代码",
                "name": "系列名称",
                "description": "系列描述",
                "remark": "备注",
                "status": "1",
                "created_at": "2018-07-04 14:03:49",
                "updated_at": "2018-07-04 14:03:49",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条系列 [POST /api/series/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "suppliers": {
                    "id": 1,
                    "name": "供应商名称4",
                    "company": "供应商公司4",
                    "code": "公司代码4",
                    "province": "省4",
                    "city": "市4",
                    "district": "区4",
                    "address": "地址4",
                    "zipcode": "邮编4",
                    "contacts": "联系人4",
                    "phone": "电话4",
                    "mobile": "手机4",
                    "fax": "传真4",
                    "remark": "备注4",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-04 11:11:39",
                    "updated_at": "2018-07-04 11:22:29"
                },
                "code": "系列代码",
                "name": "系列名称",
                "description": "系列描述",
                "remark": "备注",
                "status": 1,
                "created_at": "2018-07-04 14:03:49",
                "updated_at": "2018-07-04 14:03:49"
            }

## 修改系列 [PATCH /api/series/:id]


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
                    "code": [
                        "费用代码不能重复"
                    ],
                    "logistics_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "price": [
                        "物流费用必须是数字"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "suppliers": {
                    "id": 1,
                    "name": "供应商名称4",
                    "company": "供应商公司4",
                    "code": "公司代码4",
                    "province": "省4",
                    "city": "市4",
                    "district": "区4",
                    "address": "地址4",
                    "zipcode": "邮编4",
                    "contacts": "联系人4",
                    "phone": "电话4",
                    "mobile": "手机4",
                    "fax": "传真4",
                    "remark": "备注4",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-04 11:11:39",
                    "updated_at": "2018-07-04 11:22:29"
                },
                "code": "系列代码10",
                "name": "系列名称10",
                "description": "系列描述10",
                "remark": "备注10",
                "status": "1",
                "created_at": "2018-07-04 14:03:49",
                "updated_at": "2018-07-04 14:13:21"
            }

## 删除系列 [DELETE /api/series/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组系列 [DELETE /api/series]


+ Parameters
    + ids: (string, required) - 系列id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组系列状态 [PUT /api/series]


+ Parameters
    + ids: (string, required) - 系列id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# printreports [/api]
打印报表资源

## 获取所有打印报表 [GET /api/printreports{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "file": "报表文件",
                        "name": "报表名称",
                        "paper_format": "报表格式",
                        "status": 1,
                        "created_at": "2018-07-03 17:50:46",
                        "updated_at": "2018-07-03 17:50:49"
                    },
                    {
                        "id": 2,
                        "file": "报表文件",
                        "name": "报表名称",
                        "paper_format": "报表格式",
                        "status": 1,
                        "created_at": "2018-07-04 14:27:11",
                        "updated_at": "2018-07-04 14:27:11"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增打印报表 [POST /api/printreports]


+ Parameters
    + file: (string, required) - 报表文件
    + name: (string, required) - 报表名称
    + paper_format: (string, required) - 报表格式
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "file": [
                        "报表文件必填"
                    ],
                    "name": [
                        "报表名称必填"
                    ],
                    "paper_format": [
                        "报表格式必填"
                    ],
                    "status": [
                        "状态必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "file": "报表文件",
                "name": "报表名称",
                "paper_format": "报表格式",
                "status": "1",
                "created_at": "2018-07-04 14:27:11",
                "updated_at": "2018-07-04 14:27:11",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条打印报表 [POST /api/printreports/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "file": "报表文件",
                "name": "报表名称",
                "paper_format": "报表格式",
                "status": 1,
                "created_at": "2018-07-03 17:50:46",
                "updated_at": "2018-07-03 17:50:49"
            }

## 修改打印报表 [PATCH /api/printreports/:id]


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
                    "code": [
                        "费用代码不能重复"
                    ],
                    "logistics_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "price": [
                        "物流费用必须是数字"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "file": "报表文件10",
                "name": "报表名称10",
                "paper_format": "报表格式10",
                "status": "1",
                "created_at": "2018-07-03 17:50:46",
                "updated_at": "2018-07-04 14:31:34"
            }

## 删除打印报表 [DELETE /api/printreports/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组打印报表 [DELETE /api/printreports]


+ Parameters
    + ids: (string, required) - 打印报表id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组打印报表状态 [PUT /api/printreports]


+ Parameters
    + ids: (string, required) - 打印报表id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# platforms [/api]
平台类型资源

## 获取所有平台类型 [GET /api/platforms{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "平台名称1",
                        "status": 1,
                        "created_at": "2018-07-04 12:54:52",
                        "updated_at": "2018-07-04 12:54:55"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增平台类型 [POST /api/platforms]


+ Parameters
    + name: (string, required) - 平台类型名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "平台类型名称必填"
                    ],
                    "status": [
                        "状态必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "name": "平台类型名称",
                "status": "1",
                "created_at": "2018-07-04 14:44:39",
                "updated_at": "2018-07-04 14:44:39",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条平台类型 [POST /api/platforms/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 1,
                "name": "平台名称1",
                "status": 1,
                "created_at": "2018-07-04 12:54:52",
                "updated_at": "2018-07-04 12:54:55"
            }

## 修改平台类型 [PATCH /api/platforms/:id]


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
                    "status": [
                        "状态必须int类型"
                    ],
                    "name": [
                        "平台类型名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "平台类型名称10",
                "status": "1",
                "created_at": "2018-07-04 12:54:52",
                "updated_at": "2018-07-04 14:51:08"
            }

## 删除平台类型 [DELETE /api/platforms/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组平台类型 [DELETE /api/platforms]


+ Parameters
    + ids: (string, required) - 平台类型id组 格式: 1,2,3,4 

+ Response 500 (application/json)
    + Body

            {
                "message": "删除错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 更改一组平台类型状态 [PUT /api/platforms]


+ Parameters
    + ids: (string, required) - 平台类型id组 格式: 1,2,3,4 
    + status: (integer, required) - 状态(0:停用，1:启用)

+ Response 500 (application/json)
    + Body

            {
                "message": "更改错误",
                "code": 500,
                "status_code": 500
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "ids": [
                        "id组必填"
                    ],
                    "status": [
                        "状态必填"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

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

## 获取登录用户信息 [POST /api/me]


+ Request (application/json)
    + Headers

            Authorization: bearer+空格+token值

+ Response 200 (application/json)
    + Body

            {
                "id": 2,
                "username": "admin",
                "email": "admin@admin.com",
                "created_at": "2018-06-13 11:31:16",
                "updated_at": "2018-06-13 11:31:16"
            }

+ Response 401 (application/json)
    + Body

            {
                "message": "Token not provided",
                "status_code": 401
            }

## 刷新token [PUT /api/authorizations/current]


+ Request (application/json)
    + Headers

            Authorization: bearer+空格+token值

+ Response 201 (application/json)
    + Body

            {
                "access_token": "(token值)",
                "token_type": "Bearer",
                "expires_in": "3600(过期时间)"
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "The token has been blacklisted",
                "status_code": 500
            }

## 退出登录 成功则返回状态码204 [PUT /api/authorizations/current]


+ Request (application/json)
    + Headers

            Authorization: bearer+空格+token值

+ Response 500 (application/json)
    + Body

            {
                "message": "Token has expired",
                "status_code": 500
            }