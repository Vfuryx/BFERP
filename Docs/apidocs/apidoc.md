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

## 显示单条标记颜色 [GET /api/markcolors/:id]


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

## 更改一组标记颜色状态 [PUT /api/markcolors/editstatus]


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
                        "total": 2,
                        "count": 2,
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

## 显示单条记账类型 [GET /api/acctypes/:id]


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

## 更改一组记账类型状态 [PUT /api/acctypes/editstatus]


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
                            "name": "费用类别",
                            "status": 1,
                            "created_at": "2018-06-25 10:45:30",
                            "updated_at": "2018-06-25 10:45:30"
                        },
                        "name": "费用类型",
                        "code": "费用类型代码",
                        "is_default": 1,
                        "status": 1,
                        "remark": "费用类型代码备注",
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
                "id": 1,
                "fee_category_id": "1",
                "name": "费用类型",
                "code": "费用类型代码",
                "is_default": "1",
                "status": "1",
                "remark": "费用类型代码备注",
                "created_at": "2018-06-14 15:31:33",
                "updated_at": "2018-06-14 15:31:33",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条费用类型 [GET /api/feetypes/:id]


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
                "name": "费用类型",
                "code": "费用类型代码",
                "is_default": 1,
                "status": 1,
                "remark": "费用类型代码备注",
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
                "code": "费用类型代码1",
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

## 更改一组费用类型状态 [PUT /api/feetypes/editstatus]


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
                        "name": "配送方式",
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
                "name": "配送方式",
                "status": "1",
                "created_at": "2018-06-14 14:39:45",
                "updated_at": "2018-06-14 14:39:45",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条配送方式 [GET /api/distmets/:id]


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
                "name": "配送方式",
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
                "name": "配送方式1",
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

## 更改一组配送方式状态 [PUT /api/distmets/editstatus]


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

## 显示单条费用类别 [GET /api/feecates/:id]


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

## 更改一组费用类别状态 [PUT /api/feecates/editstatus]


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

## 显示单条运费类型 [GET /api/freighttypes/:id]


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

## 更改一组运费类型状态 [PUT /api/freighttypes/editstatus]


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

## 显示单条商品类别 [GET /api/goodscates/:id]


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

## 更改一组商品类别状态 [PUT /api/goodscates/editstatus]


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

## 显示单条城市信息 [GET /api/cityinfos/:id]


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

## 更改一组城市信息状态 [PUT /api/cityinfos/editstatus]


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

## 显示单条损坏商品 [GET /api/damagedgoods/:id]


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

## 更改一组损坏商品状态 [PUT /api/damagedgoods/editstatus]


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

## 显示单条物流区域 [GET /api/logisticsareas/:id]


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

## 更改一组物流区域状态 [PUT /api/logisticsareas/editstatus]


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

## 显示单条物流 [GET /api/logistics/:id]


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

## 更改一组物流状态 [PUT /api/logistics/editstatus]


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

## 显示单条仓库 [GET /api/warehouses/:id]


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

## 更改一组仓库状态 [PUT /api/warehouses/editstatus]


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

## 显示单条供应商 [GET /api/suppliers/:id]


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

## 更改一组供应商状态 [PUT /api/suppliers/editstatus]


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

## 显示单条店铺 [GET /api/shops/:id]


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

## 更改一组店铺状态 [PUT /api/shops/editstatus]


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

## 显示单条系列 [GET /api/series/:id]


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

## 更改一组系列状态 [PUT /api/series/editstatus]


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

## 显示单条打印报表 [GET /api/printreports/:id]


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

## 更改一组打印报表状态 [PUT /api/printreports/editstatus]


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

## 显示单条平台类型 [GET /api/platforms/:id]


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

## 更改一组平台类型状态 [PUT /api/platforms/editstatus]


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

# departments [/api]
部门资源

## 获取所有部门 [GET /api/departments{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "dept_no": "部门代码",
                        "name": "部门名称",
                        "p_dept": 0,
                        "remark": "备注",
                        "is_verify": 1,
                        "status": 1,
                        "created_at": "2018-07-05 17:37:17",
                        "updated_at": "2018-07-05 17:37:17"
                    },
                    {
                        "id": 2,
                        "dept_no": "部门代码1",
                        "name": "部门名称",
                        "p_dept": 1,
                        "remark": "备注",
                        "is_verify": 1,
                        "status": 1,
                        "created_at": "2018-07-05 17:39:24",
                        "updated_at": "2018-07-05 17:39:24"
                    },
                    {
                        "id": 3,
                        "dept_no": "部门代码3",
                        "name": "部门名称3",
                        "p_dept": 0,
                        "remark": "备注",
                        "is_verify": 1,
                        "status": 1,
                        "created_at": "2018-07-05 17:42:06",
                        "updated_at": "2018-07-05 17:42:06"
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

## 新增部门 [POST /api/departments]


+ Parameters
    + dept_no: (string, required) - 部门代码
    + name: (string, required) - 部门名称
    + p_dept: (integer, required) - 所属主部门
    + remark: (string, optional) - 备注
    + is_verify: (integer, optional) - 是否已经验证
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "dept_no": [
                        "部门代码不能重复"
                    ],
                    "p_dept": [
                        "需要添加的id在数据库中未找到或未启用或未验证"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "dept_no": "部门代码",
                "name": "部门名称",
                "p_dept": "0",
                "remark": "备注",
                "is_verify": "1",
                "status": "1",
                "created_at": "2018-07-05 17:42:06",
                "updated_at": "2018-07-05 17:42:06",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条部门 [GET /api/departments/:id]


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
                "dept_no": "部门代码",
                "name": "部门名称",
                "p_dept": 0,
                "remark": "备注",
                "is_verify": 1,
                "status": 1,
                "created_at": "2018-07-05 17:37:17",
                "updated_at": "2018-07-05 17:37:17"
            }

## 修改部门 [PATCH /api/departments/:id]


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
                    "dept_no": [
                        "部门代码不能重复"
                    ],
                    "p_dept": [
                        "需要添加的id在数据库中未找到或未启用或未验证"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "dept_no": "部门代码",
                "name": "部门名称",
                "p_dept": 0,
                "remark": "备注",
                "is_verify": 1,
                "status": 1,
                "created_at": "2018-07-05 17:37:17",
                "updated_at": "2018-07-05 17:37:17"
            }

## 删除部门 [DELETE /api/departments/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组部门 [DELETE /api/departments]


+ Parameters
    + ids: (string, required) - 部门id组 格式: 1,2,3,4 

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

## 更改一组部门状态 [PUT /api/departments/editstatus]


+ Parameters
    + ids: (string, required) - 部门id组 格式: 1,2,3,4 
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

# goods [/api]
商品资源

## 获取所有商品 [GET /api/goods{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "commodity_code": "商品编码",
                        "jd_sn": "京东编码",
                        "vips_sn": "唯品会编码",
                        "factory_model": "工厂型号",
                        "short_name": "商品简称",
                        "nick": "卖家昵称",
                        "supplier": {
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
                            "email": "935661686@qq.com",
                            "remark": "备注",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-07 15:05:24",
                            "updated_at": "2018-07-07 15:05:24"
                        },
                        "category": {
                            "id": 1,
                            "code": "商品类别代码",
                            "name": "商品类别名",
                            "description": "详情",
                            "remark": "备注",
                            "status": 1,
                            "created_at": "2018-07-07 15:05:38",
                            "updated_at": "2018-07-07 15:05:38"
                        },
                        "remark": "备注",
                        "title": "商品标题",
                        "img": "商品图片",
                        "url": "https://www.taobao.com/",
                        "status": "1",
                        "is_stop_pro": "1",
                        "productspecs": [
                            {
                                "id": 2,
                                "goods_id": 1,
                                "spec_code": "规格编码",
                                "jd_specs_code": "京东规格编码",
                                "vips_specs_code": "唯品会规格编码",
                                "tb_price": "10.00",
                                "cost": "10.00",
                                "price": "10.00",
                                "highest_price": "10.00",
                                "lowest_price": "10.00",
                                "warehouse_cost": "10.00",
                                "assembly_price": "10.00",
                                "discount": "1.00",
                                "commission": "1.00",
                                "is_combination": 1,
                                "package_quantity": 10,
                                "package_costs": "10.00",
                                "wooden_frame_costs": "10.00",
                                "purchase_freight": "10.00",
                                "inventory_warning": 10,
                                "purchase_days_warning": 1,
                                "available_warning": 10,
                                "distribution_method_id": 1,
                                "bar_code": "条形码",
                                "img_url": "http://image.img.com",
                                "spec": "规格",
                                "color": "颜色",
                                "materials": "材质",
                                "function": "功能",
                                "special": "特殊",
                                "other": "其他",
                                "length": 10,
                                "width": 10,
                                "height": 10,
                                "volume": 10,
                                "weight": 10,
                                "remark": "备注",
                                "finished_pro": 1,
                                "is_stop_pro": 0,
                                "created_at": "2018-07-09 18:01:34",
                                "updated_at": "2018-07-09 18:01:34",
                                "deleted_at": null,
                                "combinations": [
                                    {
                                        "id": 1,
                                        "product_specs_id": 2,
                                        "com_pro_specs_id": 1,
                                        "count": 1,
                                        "status": 1,
                                        "created_at": "2018-07-09 18:01:34",
                                        "updated_at": "2018-07-09 18:01:34",
                                        "deleted_at": null,
                                        "com_pro_spec": {
                                            "id": 1,
                                            "goods_id": 11,
                                            "spec_code": "规格编码10",
                                            "jd_specs_code": "京东规格编码",
                                            "vips_specs_code": "唯品会规格编码",
                                            "tb_price": "10.00",
                                            "cost": "10.00",
                                            "price": "10.00",
                                            "highest_price": "10.00",
                                            "lowest_price": "10.00",
                                            "warehouse_cost": "10.00",
                                            "assembly_price": "10.00",
                                            "discount": "1.00",
                                            "commission": "1.00",
                                            "is_combination": 1,
                                            "package_quantity": 10,
                                            "package_costs": "10.00",
                                            "wooden_frame_costs": "10.00",
                                            "purchase_freight": "10.00",
                                            "inventory_warning": 10,
                                            "purchase_days_warning": 1,
                                            "available_warning": 10,
                                            "distribution_method_id": 1,
                                            "bar_code": "条形码2",
                                            "img_url": "http://image.img.com",
                                            "spec": "规格",
                                            "color": "颜色",
                                            "materials": "材质",
                                            "function": "功能",
                                            "special": "特殊",
                                            "other": "其他",
                                            "length": 10,
                                            "width": 10,
                                            "height": 10,
                                            "volume": 10,
                                            "weight": 10,
                                            "remark": "备注",
                                            "finished_pro": 1,
                                            "is_stop_pro": 0,
                                            "created_at": "2018-07-09 11:07:53",
                                            "updated_at": "2018-07-09 11:07:53",
                                            "deleted_at": null
                                        }
                                    },
                                    {
                                        "id": 2,
                                        "product_specs_id": 2,
                                        "com_pro_specs_id": 1,
                                        "count": 1,
                                        "status": 1,
                                        "created_at": "2018-07-09 18:01:34",
                                        "updated_at": "2018-07-09 18:01:34",
                                        "deleted_at": null,
                                        "com_pro_spec": {
                                            "id": 1,
                                            "goods_id": 11,
                                            "spec_code": "规格编码10",
                                            "jd_specs_code": "京东规格编码",
                                            "vips_specs_code": "唯品会规格编码",
                                            "tb_price": "10.00",
                                            "cost": "10.00",
                                            "price": "10.00",
                                            "highest_price": "10.00",
                                            "lowest_price": "10.00",
                                            "warehouse_cost": "10.00",
                                            "assembly_price": "10.00",
                                            "discount": "1.00",
                                            "commission": "1.00",
                                            "is_combination": 1,
                                            "package_quantity": 10,
                                            "package_costs": "10.00",
                                            "wooden_frame_costs": "10.00",
                                            "purchase_freight": "10.00",
                                            "inventory_warning": 10,
                                            "purchase_days_warning": 1,
                                            "available_warning": 10,
                                            "distribution_method_id": 1,
                                            "bar_code": "条形码2",
                                            "img_url": "http://image.img.com",
                                            "spec": "规格",
                                            "color": "颜色",
                                            "materials": "材质",
                                            "function": "功能",
                                            "special": "特殊",
                                            "other": "其他",
                                            "length": 10,
                                            "width": 10,
                                            "height": 10,
                                            "volume": 10,
                                            "weight": 10,
                                            "remark": "备注",
                                            "finished_pro": 1,
                                            "is_stop_pro": 0,
                                            "created_at": "2018-07-09 11:07:53",
                                            "updated_at": "2018-07-09 11:07:53",
                                            "deleted_at": null
                                        }
                                    }
                                ]
                            },
                            {
                                "id": 3,
                                "goods_id": 1,
                                "spec_code": "规格编码2",
                                "jd_specs_code": "京东规格编码2",
                                "vips_specs_code": "唯品会规格编码2",
                                "tb_price": "10.00",
                                "cost": "10.00",
                                "price": "10.00",
                                "highest_price": "10.00",
                                "lowest_price": "10.00",
                                "warehouse_cost": "10.00",
                                "assembly_price": "10.00",
                                "discount": "1.00",
                                "commission": "1.00",
                                "is_combination": 0,
                                "package_quantity": 10,
                                "package_costs": "10.00",
                                "wooden_frame_costs": "10.00",
                                "purchase_freight": "10.00",
                                "inventory_warning": 10,
                                "purchase_days_warning": 1,
                                "available_warning": 10,
                                "distribution_method_id": 1,
                                "bar_code": "条形码2",
                                "img_url": "http://image.img.com",
                                "spec": "规格",
                                "color": "颜色",
                                "materials": "材质",
                                "function": "功能",
                                "special": "特殊",
                                "other": "其他",
                                "length": 10,
                                "width": 10,
                                "height": 10,
                                "volume": 10,
                                "weight": 10,
                                "remark": "备注",
                                "finished_pro": 1,
                                "is_stop_pro": 0,
                                "status": 1,
                                "created_at": "2018-07-09 18:01:35",
                                "updated_at": "2018-07-09 18:01:35",
                                "deleted_at": null,
                                "combinations": []
                            }
                        ],
                        "created_at": "2018-07-09 18:01:34",
                        "updated_at": "2018-07-09 18:01:34"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "http://127.0.0.1:8000/api/goods?page=1"
                        }
                    }
                }
            }

## 新增商品 [POST /api/goods]


+ Parameters
    + commodity_code: (string, required) - 商品编码
    + jd_sn: (string, required) - 京东编码
    + vips_sn: (string, required) - 唯品会编码
    + factory_model: (string, required) - 工厂型号
    + short_name: (string, required) - 商品简称
    + nick: (string, required) - 卖家昵称（店铺昵称）
    + supplier_id: (integer, required) - 供应商id
    + category_id: (integer, required) - 产品类别id
    + remark: (string, optional) - 备注
    + title: (string, required) - 商品标题
    + img: (string, required) - 商品图片
    + url: (url, required) - 商品网址
    + is_stop_pro: (integer, optional) - 是否停产 默认 0 = 不停产  1 = 停产
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + productspecs[0][spec_code]: (string, required) - 规格编码
    + productspecs[0][jd_specs_code]: (string, optional) - 京东规格编码
    + productspecs[0][vips_specs_code]: (string, optional) - 唯品会规格编码
    + productspecs[0][tb_price]: (numeric, required) - 淘宝价格
    + productspecs[0][cost]: (numeric, required) - 成本价格
    + productspecs[0][price]: (numeric, required) - 售价
    + productspecs[0][highest_price]: (numeric, required) - 最高售价
    + productspecs[0][lowest_price]: (numeric, required) - 最低售价
    + productspecs[0][warehouse_cost]: (numeric, optional) - 仓库成本
    + productspecs[0][assembly_price]: (numeric, optional) - 装配价格
    + productspecs[0][discount]: (numeric, optional) - 折扣
    + productspecs[0][commission]: (numeric, optional) - 金佣点
    + productspecs[0][is_combination]: (integer, required) - 是否组合
    + productspecs[0][package_quantity]: (integer, optional) - 包件数量
    + productspecs[0][package_costs]: (numeric, optional) - 打包费用
    + productspecs[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + productspecs[0][purchase_freight]: (numeric, optional) - 采购运费
    + productspecs[0][inventory_warning]: (integer, required) - 库存预警(数量)
    + productspecs[0][purchase_days_warning]: (integer, required) - 采购预警天数
    + productspecs[0][available_warning]: (integer, required) - 可售数预警
    + productspecs[0][distribution_method_id]: (integer, required) - 配送类别
    + productspecs[0][bar_code]: (string, optional) - 条形码
    + productspecs[0][img_url]: (url, optional) - 图片地址
    + productspecs[0][spec]: (string, required) - 规格
    + productspecs[0][color]: (string, optional) - 颜色
    + productspecs[0][materials]: (string, optional) - 材质
    + productspecs[0][function]: (string, optional) - 功能
    + productspecs[0][special]: (string, optional) - 特殊
    + productspecs[0][other]: (string, optional) - 其他
    + productspecs[0][length]: (numeric, optional) - 长度（mm）
    + productspecs[0][width]: (numeric, optional) - 宽度（mm）
    + productspecs[0][height]: (numeric, optional) - 高度（mm）
    + productspecs[0][volume]: (numeric, optional) - 体积(m²)
    + productspecs[0][weight]: (numeric, optional) - 重量
    + productspecs[0][remark]: (string, optional) - 备注
    + productspecs[0][finished_pro]: (integer, optional) - 是否成品 0 不是 1 是
    + productspecs[0][is_stop_pro]: (integer, optional) - 是否停产 0 不是 1 是
    + productspecs[0][combinations][0][com_pro_specs_id]: (integer, required) - 组合产品规格id
    + productspecs[0][combinations][0][count]: (integer, required) - 组合件数

+ Request (application/json)
    + Body

            {
                "commodity_code": "商品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "nick": "卖家昵称",
                "supplier_id": 1,
                "category_id": 1,
                "remark": "备注",
                "title": "商品标题",
                "img": "商品图片",
                "url": "https://www.taobao.com/",
                "status": 1,
                "nis_stop_proick": 1,
                "productspecs[0][spec_code]": "规格编码1",
                "productspecs[0][jd_specs_code]": "京东规格编码",
                "productspecs[0][vips_specs_code]": "唯品会规格编码",
                "productspecs[0][tb_price]": "10",
                "productspecs[0][highest_price]": "10",
                "productspecs[0][price]": "10",
                "productspecs[0][lowest_price]": "10",
                "productspecs[0][warehouse_cost]": "10",
                "productspecs[0][assembly_price]": "10",
                "productspecs[0][discount]": "1",
                "productspecs[0][commission]": "1",
                "productspecs[0][is_combination]": "1",
                "productspecs[0][package_quantity]": "10",
                "productspecs[0][package_costs]": "10",
                "productspecs[0][wooden_frame_costs]": "10",
                "productspecs[0][purchase_freight]": "10",
                "productspecs[0][inventory_warning]": "10",
                "productspecs[0][purchase_days_warning]": "10",
                "productspecs[0][available_warning]": "10",
                "productspecs[0][distribution_method_id]": "1",
                "productspecs[0][bar_code]": "条形码",
                "productspecs[0][img_url]": "http://image.img.com/image",
                "productspecs[0][spec]": "规格",
                "productspecs[0][color]": "颜色",
                "productspecs[0][materials]": "材质",
                "productspecs[0][function]": "功能",
                "productspecs[0][special]": "特殊",
                "productspecs[0][other]": "其他",
                "productspecs[0][length]": "10",
                "productspecs[0][width]": "10",
                "productspecs[0][height]": "10",
                "productspecs[0][volume]": "10",
                "productspecs[0][weight]": "10",
                "productspecs[0][remark]": "备注",
                "productspecs[0][finished_pro]": "1",
                "productspecs[0][is_stop_pro]": "0",
                "productspecs[0][combinations][0][com_pro_specs_id]": "1",
                "productspecs[0][combinations][0][count]": "10"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "url": [
                        "商品网址必须有效的url"
                    ],
                    "category_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "supplier_id": [
                        "供应商id必须int类型"
                    ],
                    "productspecs": [
                        "产品规格必须是json格式"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 20,
                "commodity_code": "商品编码1",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "nick": "卖家昵称",
                "supplier": {
                    "id": 1,
                    "name": "1",
                    "company": "1",
                    "code": "1",
                    "province": "1",
                    "city": "1",
                    "district": "1",
                    "address": "1",
                    "zipcode": "1",
                    "contacts": "1",
                    "phone": "1",
                    "mobile": "132131343242",
                    "fax": "1",
                    "email": "132@re.cn",
                    "remark": "1",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-17 17:54:01",
                    "updated_at": "2018-07-17 17:54:01"
                },
                "category": {
                    "id": 1,
                    "code": "1",
                    "name": "1",
                    "description": "1",
                    "remark": "1",
                    "status": 1,
                    "created_at": "2018-07-17 17:54:34",
                    "updated_at": "2018-07-17 17:54:34"
                },
                "remark": "备注",
                "title": "商品标题",
                "img": "https://www.taobao.com/img",
                "url": "https://www.taobao.com/",
                "status": "1",
                "is_stop_pro": "0",
                "productspecs": [
                    {
                        "id": 7,
                        "goods_id": 20,
                        "spec_code": "规格编码1",
                        "jd_specs_code": "京东规格编码",
                        "vips_specs_code": "唯品会规格编码",
                        "tb_price": "10.00",
                        "cost": "0.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_combination": 1,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 10,
                        "available_warning": 10,
                        "distribution_method_id": 1,
                        "bar_code": "条形码",
                        "img_url": "http://image.img.com/image",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "length": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": 1,
                        "is_stop_pro": 0,
                        "created_at": "2018-07-25 15:06:12",
                        "updated_at": "2018-07-25 15:06:12",
                        "combinations": [
                            {
                                "id": 8,
                                "product_specs_id": 7,
                                "com_pro_specs_id": 1,
                                "count": 10,
                                "created_at": "2018-07-25 15:06:13",
                                "updated_at": "2018-07-25 15:06:13",
                                "com_pro_spec": {
                                    "id": 1,
                                    "goods_id": 1,
                                    "spec_code": "规格编码",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "1.00",
                                    "cost": "1.00",
                                    "price": "1.00",
                                    "highest_price": "1.00",
                                    "lowest_price": "1.00",
                                    "warehouse_cost": "1.00",
                                    "assembly_price": "1.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 0,
                                    "package_quantity": 1,
                                    "package_costs": "1.00",
                                    "wooden_frame_costs": "1.00",
                                    "purchase_freight": "1.00",
                                    "inventory_warning": 1,
                                    "purchase_days_warning": 1,
                                    "available_warning": 1,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码",
                                    "img_url": "http://image.img.com/image",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 1,
                                    "width": 1,
                                    "height": 1,
                                    "volume": 1,
                                    "weight": 1,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "created_at": "2018-07-25 11:01:45",
                                    "updated_at": "2018-07-25 11:01:48"
                                }
                            }
                        ]
                    }
                ],
                "created_at": "2018-07-25 15:06:12",
                "updated_at": "2018-07-25 15:06:12",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条商品 [GET /api/goods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 20,
                "commodity_code": "商品编码1",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "nick": "卖家昵称",
                "supplier": {
                    "id": 1,
                    "name": "1",
                    "company": "1",
                    "code": "1",
                    "province": "1",
                    "city": "1",
                    "district": "1",
                    "address": "1",
                    "zipcode": "1",
                    "contacts": "1",
                    "phone": "1",
                    "mobile": "132131343242",
                    "fax": "1",
                    "email": "132@re.cn",
                    "remark": "1",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-17 17:54:01",
                    "updated_at": "2018-07-17 17:54:01"
                },
                "category": {
                    "id": 1,
                    "code": "1",
                    "name": "1",
                    "description": "1",
                    "remark": "1",
                    "status": 1,
                    "created_at": "2018-07-17 17:54:34",
                    "updated_at": "2018-07-17 17:54:34"
                },
                "remark": "备注",
                "title": "商品标题",
                "img": "https://www.taobao.com/img",
                "url": "https://www.taobao.com/",
                "status": "1",
                "is_stop_pro": "0",
                "productspecs": [
                    {
                        "id": 7,
                        "goods_id": 20,
                        "spec_code": "规格编码1",
                        "jd_specs_code": "京东规格编码",
                        "vips_specs_code": "唯品会规格编码",
                        "tb_price": "10.00",
                        "cost": "0.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_combination": 1,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 10,
                        "available_warning": 10,
                        "distribution_method_id": 1,
                        "bar_code": "条形码",
                        "img_url": "http://image.img.com/image",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "length": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": 1,
                        "is_stop_pro": 0,
                        "created_at": "2018-07-25 15:06:12",
                        "updated_at": "2018-07-25 15:06:12",
                        "combinations": [
                            {
                                "id": 8,
                                "product_specs_id": 7,
                                "com_pro_specs_id": 1,
                                "count": 10,
                                "created_at": "2018-07-25 15:06:13",
                                "updated_at": "2018-07-25 15:06:13",
                                "com_pro_spec": {
                                    "id": 1,
                                    "goods_id": 1,
                                    "spec_code": "规格编码",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "1.00",
                                    "cost": "1.00",
                                    "price": "1.00",
                                    "highest_price": "1.00",
                                    "lowest_price": "1.00",
                                    "warehouse_cost": "1.00",
                                    "assembly_price": "1.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 0,
                                    "package_quantity": 1,
                                    "package_costs": "1.00",
                                    "wooden_frame_costs": "1.00",
                                    "purchase_freight": "1.00",
                                    "inventory_warning": 1,
                                    "purchase_days_warning": 1,
                                    "available_warning": 1,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码",
                                    "img_url": "http://image.img.com/image",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 1,
                                    "width": 1,
                                    "height": 1,
                                    "volume": 1,
                                    "weight": 1,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "created_at": "2018-07-25 11:01:45",
                                    "updated_at": "2018-07-25 11:01:48"
                                }
                            }
                        ]
                    }
                ],
                "created_at": "2018-07-25 15:06:12",
                "updated_at": "2018-07-25 15:06:12"
            }

## 修改商品 [PATCH /api/goods/:id]


+ Parameters
    + commodity_code: (string, optional) - 商品编码
    + jd_sn: (string, optional) - 京东编码
    + vips_sn: (string, optional) - 唯品会编码
    + factory_model: (string, optional) - 工厂型号
    + short_name: (string, optional) - 商品简称
    + nick: (string, optional) - 卖家昵称（店铺昵称）
    + supplier_id: (integer, optional) - 供应商id
    + category_id: (integer, optional) - 产品类别id
    + remark: (string, optional) - 备注
    + title: (string, optional) - 商品标题
    + img: (string, optional) - 商品图片
    + url: (url, optional) - 商品网址
    + is_stop_pro: (integer, optional) - 是否停产 默认 0 = 不停产  1 = 停产
        + Default: 0
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + productspecs[0][id]: (integer, optional) - 规格id ( 存在 id 视为更新，不存在视为插入 )
    + productspecs[0][spec_code]: (string, optional) - 规格编码
    + productspecs[0][jd_specs_code]: (string, optional) - 京东规格编码
    + productspecs[0][vips_specs_code]: (string, optional) - 唯品会规格编码
    + productspecs[0][tb_price]: (numeric, optional) - 淘宝价格
    + productspecs[0][cost]: (numeric, optional) - 成本价格
    + productspecs[0][price]: (numeric, optional) - 售价
    + productspecs[0][highest_price]: (numeric, optional) - 最高售价
    + productspecs[0][lowest_price]: (numeric, optional) - 最低售价
    + productspecs[0][warehouse_cost]: (numeric, optional) - 仓库成本
    + productspecs[0][assembly_price]: (numeric, optional) - 装配价格
    + productspecs[0][discount]: (numeric, optional) - 折扣
    + productspecs[0][commission]: (numeric, optional) - 金佣点
    + productspecs[0][is_combination]: (integer, optional) - 是否组合
    + productspecs[0][package_quantity]: (integer, optional) - 包件数量
    + productspecs[0][package_costs]: (numeric, optional) - 打包费用
    + productspecs[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + productspecs[0][purchase_freight]: (numeric, optional) - 采购运费
    + productspecs[0][inventory_warning]: (integer, optional) - 库存预警(数量)
    + productspecs[0][purchase_days_warning]: (integer, optional) - 采购预警天数
    + productspecs[0][available_warning]: (integer, optional) - 可售数预警
    + productspecs[0][distribution_method_id]: (integer, optional) - 配送类别
    + productspecs[0][bar_code]: (string, optional) - 条形码
    + productspecs[0][img_url]: (url, optional) - 图片地址
    + productspecs[0][spec]: (string, optional) - 规格
    + productspecs[0][color]: (string, optional) - 颜色
    + productspecs[0][materials]: (string, optional) - 材质
    + productspecs[0][function]: (string, optional) - 功能
    + productspecs[0][special]: (string, optional) - 特殊
    + productspecs[0][other]: (string, optional) - 其他
    + productspecs[0][length]: (numeric, optional) - 长度（mm）
    + productspecs[0][width]: (numeric, optional) - 宽度（mm）
    + productspecs[0][height]: (numeric, optional) - 高度（mm）
    + productspecs[0][volume]: (numeric, optional) - 体积(m²)
    + productspecs[0][weight]: (numeric, optional) - 重量
    + productspecs[0][remark]: (string, optional) - 备注
    + productspecs[0][finished_pro]: (integer, optional) - 是否成品 0 不是 1 是
    + productspecs[0][is_stop_pro]: (integer, optional) - 是否停产 0 不是 1 是
    + productspecs[0][combinations][0][id]: (integer, optional) - 组合id ( 存在 id 视为更新，不存在视为插入 )
    + productspecs[0][combinations][0][com_pro_specs_id]: (integer, optional) - 组合产品规格id
    + productspecs[0][combinations][0][count]: (integer, optional) - 组合件数

+ Request (application/json)
    + Body

            {
                "commodity_code": "商品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "nick": "卖家昵称",
                "supplier_id": 1,
                "category_id": 1,
                "remark": "备注",
                "title": "商品标题",
                "img": "商品图片",
                "url": "https://www.taobao.com/",
                "status": 1,
                "nis_stop_proick": 1,
                "productspecs[0][id]": "2",
                "productspecs[0][spec_code]": "规格编码1",
                "productspecs[0][jd_specs_code]": "京东规格编码",
                "productspecs[0][vips_specs_code]": "唯品会规格编码",
                "productspecs[0][tb_price]": "10",
                "productspecs[0][highest_price]": "10",
                "productspecs[0][price]": "10",
                "productspecs[0][lowest_price]": "10",
                "productspecs[0][warehouse_cost]": "10",
                "productspecs[0][assembly_price]": "10",
                "productspecs[0][discount]": "1",
                "productspecs[0][commission]": "1",
                "productspecs[0][is_combination]": "1",
                "productspecs[0][package_quantity]": "10",
                "productspecs[0][package_costs]": "10",
                "productspecs[0][wooden_frame_costs]": "10",
                "productspecs[0][purchase_freight]": "10",
                "productspecs[0][inventory_warning]": "10",
                "productspecs[0][purchase_days_warning]": "10",
                "productspecs[0][available_warning]": "10",
                "productspecs[0][distribution_method_id]": "1",
                "productspecs[0][bar_code]": "条形码",
                "productspecs[0][img_url]": "http://image.img.com/image",
                "productspecs[0][spec]": "规格",
                "productspecs[0][color]": "颜色",
                "productspecs[0][materials]": "材质",
                "productspecs[0][function]": "功能",
                "productspecs[0][special]": "特殊",
                "productspecs[0][other]": "其他",
                "productspecs[0][length]": "10",
                "productspecs[0][width]": "10",
                "productspecs[0][height]": "10",
                "productspecs[0][volume]": "10",
                "productspecs[0][weight]": "10",
                "productspecs[0][remark]": "备注",
                "productspecs[0][finished_pro]": "1",
                "productspecs[0][is_stop_pro]": "0",
                "productspecs[0][combinations][0][id]": "2",
                "productspecs[0][combinations][0][com_pro_specs_id]": "1",
                "productspecs[0][combinations][0][count]": "10"
            }

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
                    "url": [
                        "商品网址必须有效的url"
                    ],
                    "category_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "supplier_id": [
                        "供应商id必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "commodity_code": "商品编码1",
                "jd_sn": "京东编码1",
                "vips_sn": "唯品会编码1",
                "factory_model": "工厂型号1",
                "short_name": "商品简称1",
                "nick": "卖家昵称1",
                "supplier": {
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
                    "email": "935661686@qq.com",
                    "remark": "备注",
                    "is_scan": 1,
                    "status": 1,
                    "auto_valuation": 1,
                    "created_at": "2018-07-07 09:57:48",
                    "updated_at": "2018-07-07 09:57:48"
                },
                "category": {
                    "id": 1,
                    "code": "商品类别代码",
                    "name": "商品类别名",
                    "description": "详情",
                    "remark": "备注",
                    "status": 1,
                    "created_at": "2018-07-07 09:58:22",
                    "updated_at": "2018-07-07 09:58:22"
                },
                "remark": "备注1",
                "title": "商品标题1",
                "img": "商品图片1",
                "url": "https://www.taobao.com/",
                "status": "1",
                "is_stop_pro": "1",
                "productspecs": [
                    {
                        "id": 2,
                        "goods_id": 1,
                        "spec_code": "规格编码",
                        "jd_specs_code": "京东规格编码",
                        "vips_specs_code": "唯品会规格编码",
                        "tb_price": "10.00",
                        "cost": "10.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_combination": 1,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 1,
                        "available_warning": 10,
                        "distribution_method_id": 1,
                        "bar_code": "条形码",
                        "img_url": "http://image.img.com",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "length": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": 1,
                        "is_stop_pro": 0,
                        "status": 1,
                        "created_at": "2018-07-09 18:01:34",
                        "updated_at": "2018-07-09 18:01:34",
                        "deleted_at": null,
                        "combinations": [
                            {
                                "id": 1,
                                "product_specs_id": 2,
                                "com_pro_specs_id": 1,
                                "count": 1,
                                "status": 1,
                                "created_at": "2018-07-09 18:01:34",
                                "updated_at": "2018-07-09 18:01:34",
                                "deleted_at": null,
                                "com_pro_spec": {
                                    "id": 1,
                                    "goods_id": 11,
                                    "spec_code": "规格编码10",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 1,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 1,
                                    "available_warning": 10,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码2",
                                    "img_url": "http://image.img.com",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "status": 1,
                                    "created_at": "2018-07-09 11:07:53",
                                    "updated_at": "2018-07-09 11:07:53",
                                    "deleted_at": null
                                }
                            },
                            {
                                "id": 2,
                                "product_specs_id": 2,
                                "com_pro_specs_id": 1,
                                "count": 1,
                                "status": 1,
                                "created_at": "2018-07-09 18:01:34",
                                "updated_at": "2018-07-09 18:01:34",
                                "deleted_at": null,
                                "com_pro_spec": {
                                    "id": 1,
                                    "goods_id": 11,
                                    "spec_code": "规格编码10",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 1,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 1,
                                    "available_warning": 10,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码2",
                                    "img_url": "http://image.img.com",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "status": 1,
                                    "created_at": "2018-07-09 11:07:53",
                                    "updated_at": "2018-07-09 11:07:53",
                                    "deleted_at": null
                                }
                            },
                            {
                                "id": 3,
                                "product_specs_id": 2,
                                "com_pro_specs_id": 1,
                                "count": 1,
                                "status": 1,
                                "created_at": "2018-07-09 18:01:34",
                                "updated_at": "2018-07-09 18:01:34",
                                "deleted_at": null,
                                "com_pro_spec": {
                                    "id": 1,
                                    "goods_id": 11,
                                    "spec_code": "规格编码10",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 1,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 1,
                                    "available_warning": 10,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码2",
                                    "img_url": "http://image.img.com",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "status": 1,
                                    "created_at": "2018-07-09 11:07:53",
                                    "updated_at": "2018-07-09 11:07:53",
                                    "deleted_at": null
                                }
                            }
                        ]
                    },
                    {
                        "id": 3,
                        "goods_id": 1,
                        "spec_code": "规格编码2",
                        "jd_specs_code": "京东规格编码2",
                        "vips_specs_code": "唯品会规格编码2",
                        "tb_price": "10.00",
                        "cost": "10.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_combination": 0,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 1,
                        "available_warning": 10,
                        "distribution_method_id": 1,
                        "bar_code": "条形码2",
                        "img_url": "http://image.img.com",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "length": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": 1,
                        "is_stop_pro": 0,
                        "status": 1,
                        "created_at": "2018-07-09 18:01:35",
                        "updated_at": "2018-07-09 18:01:35",
                        "deleted_at": null,
                        "combinations": []
                    }
                ],
                "created_at": "2018-07-07 09:59:36",
                "updated_at": "2018-07-07 10:06:01"
            }

## 删除商品 [DELETE /api/goods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组商品 [DELETE /api/goods]


+ Parameters
    + ids: (string, required) - 商品id组 格式: 1,2,3,4 

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

## 更改一组商品状态 [PUT /api/goods/editstatus]


+ Parameters
    + ids: (string, required) - 商品id组 格式: 1,2,3,4 
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

# productspecs [/api]
产品规格资源

## 获取所有产品规格 [GET /api/productspecs{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "goods": {
                            "id": 1,
                            "commodity_code": "商品编码",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "nick": "卖家昵称1",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "商品图片",
                            "url": "https://www.taobao.com/",
                            "status": 1,
                            "is_stop_pro": 1,
                            "created_at": "2018-07-07 09:59:36",
                            "updated_at": "2018-07-07 10:06:01",
                            "deleted_at": null
                        },
                        "spec_code": "规格编码",
                        "jd_specs_code": "京东规格编码",
                        "vips_specs_code": "唯品会规格编码",
                        "tb_price": "10.00",
                        "cost": "10.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_combination": 0,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 1,
                        "available_warning": 10,
                        "distribution_method": {
                            "id": 1,
                            "name": "配送方式",
                            "status": 1,
                            "created_at": "2018-07-07 10:40:40",
                            "updated_at": "2018-07-07 10:40:40"
                        },
                        "bar_code": "条形码",
                        "img_url": "http://image.img.com",
                        "spec": "规格1",
                        "color": "颜色1",
                        "materials": "材质1",
                        "function": "功能1",
                        "special": "特殊1",
                        "other": "其他1",
                        "length": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": 1,
                        "is_stop_pro": 0,
                        "status": 1,
                        "created_at": "2018-07-07 10:41:02",
                        "updated_at": "2018-07-07 10:51:12"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "http://127.0.0.1:8000/api/productspecs?page=1"
                        }
                    }
                }
            }

## 显示单条产品规格 [GET /api/productspecs/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 3,
                "goods": {
                    "id": 1,
                    "commodity_code": "商品编码1",
                    "jd_sn": "京东编码1",
                    "vips_sn": "唯品会编码1",
                    "factory_model": "工厂型号1",
                    "short_name": "商品简称1",
                    "nick": "卖家昵称1",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注1",
                    "title": "商品标题1",
                    "img": "商品图片1",
                    "url": "https://www.taobao.com/",
                    "status": 1,
                    "is_stop_pro": 1,
                    "created_at": "2018-07-07 09:59:36",
                    "updated_at": "2018-07-07 10:06:01",
                    "deleted_at": null
                },
                "spec_code": "规格编码1",
                "jd_specs_code": "京东规格编码1",
                "vips_specs_code": "唯品会规格编码1",
                "tb_price": "10.00",
                "cost": "10.00",
                "price": "10.00",
                "highest_price": "10.00",
                "lowest_price": "10.00",
                "warehouse_cost": "10.00",
                "assembly_price": "10.00",
                "discount": "1.00",
                "commission": "1.00",
                "is_combination": 0,
                "package_quantity": 10,
                "package_costs": "10.00",
                "wooden_frame_costs": "10.00",
                "purchase_freight": "10.00",
                "inventory_warning": 10,
                "purchase_days_warning": 1,
                "available_warning": 10,
                "distribution_method": {
                    "id": 1,
                    "name": "配送方式",
                    "status": 1,
                    "created_at": "2018-07-07 10:40:40",
                    "updated_at": "2018-07-07 10:40:40"
                },
                "bar_code": "条形码1",
                "img_url": "http://image.img.com",
                "spec": "规格1",
                "color": "颜色1",
                "materials": "材质1",
                "function": "功能1",
                "special": "特殊1",
                "other": "其他1",
                "length": 10,
                "width": 10,
                "height": 10,
                "volume": 10,
                "weight": 10,
                "remark": "备注",
                "finished_pro": 1,
                "is_stop_pro": 0,
                "status": 1,
                "created_at": "2018-07-07 10:41:02",
                "updated_at": "2018-07-07 10:51:12"
            }

## 删除产品规格 [DELETE /api/productspecs/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组产品规格 [DELETE /api/productspecs]


+ Parameters
    + ids: (string, required) - 产品规格id组 格式: 1,2,3,4 

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

## 更改一组产品规格状态 [PUT /api/productspecs/editstatus]


+ Parameters
    + ids: (string, required) - 产品规格id组 格式: 1,2,3,4 
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

# combinations [/api]
组合资源

## 获取所有组合 [GET /api/combinations{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "product_specs": {
                            "id": 3,
                            "goods_id": 1,
                            "spec_code": "规格编码1",
                            "jd_specs_code": "京东规格编码1",
                            "vips_specs_code": "唯品会规格编码1",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码1",
                            "img_url": "http://image.img.com",
                            "spec": "规格1",
                            "color": "颜色1",
                            "materials": "材质1",
                            "function": "功能1",
                            "special": "特殊1",
                            "other": "其他1",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-07 10:41:02",
                            "updated_at": "2018-07-07 10:51:12",
                            "deleted_at": null
                        },
                        "com_pro_specs": {
                            "id": 4,
                            "goods_id": 1,
                            "spec_code": "规格编码2",
                            "jd_specs_code": "京东规格编码2",
                            "vips_specs_code": "唯品会规格编码2",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格2",
                            "color": "颜色2",
                            "materials": "材质2",
                            "function": "功能2",
                            "special": "特殊2",
                            "other": "其他2",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-07 11:29:49",
                            "updated_at": "2018-07-07 11:29:49",
                            "deleted_at": null
                        },
                        "count": 1,
                        "status": 1,
                        "created_at": "2018-07-06 16:59:20",
                        "updated_at": "2018-07-06 16:59:20"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "http://127.0.0.1:8000/api/combinations?page=1"
                        }
                    }
                }
            }

## 显示单条组合 [GET /api/combinations/:id]


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
                "product_specs": {
                    "id": 3,
                    "goods_id": 1,
                    "spec_code": "规格编码1",
                    "jd_specs_code": "京东规格编码1",
                    "vips_specs_code": "唯品会规格编码1",
                    "tb_price": "10.00",
                    "cost": "10.00",
                    "price": "10.00",
                    "highest_price": "10.00",
                    "lowest_price": "10.00",
                    "warehouse_cost": "10.00",
                    "assembly_price": "10.00",
                    "discount": "1.00",
                    "commission": "1.00",
                    "is_combination": 0,
                    "package_quantity": 10,
                    "package_costs": "10.00",
                    "wooden_frame_costs": "10.00",
                    "purchase_freight": "10.00",
                    "inventory_warning": 10,
                    "purchase_days_warning": 1,
                    "available_warning": 10,
                    "distribution_method_id": 1,
                    "bar_code": "条形码1",
                    "img_url": "http://image.img.com",
                    "spec": "规格1",
                    "color": "颜色1",
                    "materials": "材质1",
                    "function": "功能1",
                    "special": "特殊1",
                    "other": "其他1",
                    "length": 10,
                    "width": 10,
                    "height": 10,
                    "volume": 10,
                    "weight": 10,
                    "remark": "备注",
                    "finished_pro": 1,
                    "is_stop_pro": 0,
                    "status": 1,
                    "created_at": "2018-07-07 10:41:02",
                    "updated_at": "2018-07-07 10:51:12",
                    "deleted_at": null
                },
                "com_pro_specs": {
                    "id": 4,
                    "goods_id": 1,
                    "spec_code": "规格编码2",
                    "jd_specs_code": "京东规格编码2",
                    "vips_specs_code": "唯品会规格编码2",
                    "tb_price": "10.00",
                    "cost": "10.00",
                    "price": "10.00",
                    "highest_price": "10.00",
                    "lowest_price": "10.00",
                    "warehouse_cost": "10.00",
                    "assembly_price": "10.00",
                    "discount": "1.00",
                    "commission": "1.00",
                    "is_combination": 0,
                    "package_quantity": 10,
                    "package_costs": "10.00",
                    "wooden_frame_costs": "10.00",
                    "purchase_freight": "10.00",
                    "inventory_warning": 10,
                    "purchase_days_warning": 1,
                    "available_warning": 10,
                    "distribution_method_id": 1,
                    "bar_code": "条形码2",
                    "img_url": "http://image.img.com",
                    "spec": "规格2",
                    "color": "颜色2",
                    "materials": "材质2",
                    "function": "功能2",
                    "special": "特殊2",
                    "other": "其他2",
                    "length": 10,
                    "width": 10,
                    "height": 10,
                    "volume": 10,
                    "weight": 10,
                    "remark": "备注",
                    "finished_pro": 1,
                    "is_stop_pro": 0,
                    "status": 1,
                    "created_at": "2018-07-07 11:29:49",
                    "updated_at": "2018-07-07 11:29:49",
                    "deleted_at": null
                },
                "count": 1,
                "status": 1,
                "created_at": "2018-07-06 16:59:20",
                "updated_at": "2018-07-06 16:59:20"
            }

## 删除组合 [DELETE /api/combinations/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组组合 [DELETE /api/combinations]


+ Parameters
    + ids: (string, required) - 组合id组 格式: 1,2,3,4 

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

# goodsdownloads [/api]
下载商品资源

## 获取所有下载商品 [GET /api/goodsdownloads]


+ Parameters
    + shop_id: (integer, required) - 店铺id
    + dl_type: (string, required) - 下载类型 seller在售商品，inventory库存商品
    + commodity_code: (string, optional) - 商品编码
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "PS": "安照erp做出界面，暂时还没数据"
                    }
                ]
            }

# orderdownloads [/api]
订单下载资源

## 获取所有订单下载 [GET /api/orderdownloads]


+ Parameters
    + shop_id: (integer, required) - 交易编号
    + start_created: (date, required) - 起始日期
    + end_created: (date, required) - 结束日期
    + buyer_nick: (string, optional) - 买家昵称
        + Default: all
    + tid: (integer, optional) - 交易编号
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "PS": "安照erp做出界面，暂时还没数据"
                    }
                ]
            }

# stocks [/api]
库存资源

## 获取所有库存 [GET /api/stocks{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称1",
                            "province": "仓库地（省）1",
                            "city": "仓库地（市）1",
                            "district": "仓库地（区）1sfd",
                            "address": "仓库地（地址）1fdf",
                            "is_default": 0,
                            "status": 1,
                            "created_at": "2018-07-07 15:44:00",
                            "updated_at": "2018-07-07 18:29:12"
                        },
                        "goods": {
                            "id": 161,
                            "commodity_code": "商品编码",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "商品图片",
                            "url": "https://www.taobao.com/",
                            "status": 1,
                            "is_stop_pro": 1,
                            "created_at": "2018-07-13 18:48:47",
                            "updated_at": "2018-07-13 18:48:47",
                            "deleted_at": null
                        },
                        "pro_specs": {
                            "id": 66,
                            "goods_id": 161,
                            "spec_code": "规格编码",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-16 11:53:01",
                            "updated_at": "2018-07-16 11:53:01",
                            "deleted_at": null
                        },
                        "quantity": 10,
                        "status": 1,
                        "created_at": "2018-07-16 17:08:11",
                        "updated_at": "2018-07-16 17:08:11"
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

## 新增库存 [POST /api/stocks]


+ Parameters
    + stocks[0][warehouse_id]: (integer, required) - 仓库id
    + stocks[0][goods_id]: (integer, required) - 商品id
    + stocks[0][pro_specs_id]: (integer, required) - 产品规格id
    + stocks[0][quantity]: (integer, required) - 库存数
    + stocks[0][status]: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "pro_specs_id": [
                        "产品规格id不能重复"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 3,
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称1",
                    "province": "仓库地（省）1",
                    "city": "仓库地（市）1",
                    "district": "仓库地（区）1sfd",
                    "address": "仓库地（地址）1fdf",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-07 15:44:00",
                    "updated_at": "2018-07-07 18:29:12"
                },
                "goods": {
                    "id": 161,
                    "commodity_code": "商品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "商品图片",
                    "url": "https://www.taobao.com/",
                    "status": 1,
                    "is_stop_pro": 1,
                    "created_at": "2018-07-13 18:48:47",
                    "updated_at": "2018-07-13 18:48:47",
                    "deleted_at": null
                },
                "pro_specs": {
                    "id": 68,
                    "goods_id": 161,
                    "spec_code": "规格编码3",
                    "jd_specs_code": "京东规格编码",
                    "vips_specs_code": "唯品会规格编码",
                    "tb_price": "10.00",
                    "cost": "10.00",
                    "price": "10.00",
                    "highest_price": "10.00",
                    "lowest_price": "10.00",
                    "warehouse_cost": "10.00",
                    "assembly_price": "10.00",
                    "discount": "1.00",
                    "commission": "1.00",
                    "is_combination": 0,
                    "package_quantity": 10,
                    "package_costs": "10.00",
                    "wooden_frame_costs": "10.00",
                    "purchase_freight": "10.00",
                    "inventory_warning": 10,
                    "purchase_days_warning": 1,
                    "available_warning": 10,
                    "distribution_method_id": 1,
                    "bar_code": "条形码2",
                    "img_url": "http://image.img.com",
                    "spec": "规格",
                    "color": "颜色",
                    "materials": "材质",
                    "function": "功能",
                    "special": "特殊",
                    "other": "其他",
                    "length": 10,
                    "width": 10,
                    "height": 10,
                    "volume": 10,
                    "weight": 10,
                    "remark": "备注",
                    "finished_pro": 1,
                    "is_stop_pro": 0,
                    "status": 1,
                    "created_at": "2018-07-16 11:53:20",
                    "updated_at": "2018-07-16 11:53:20",
                    "deleted_at": null
                },
                "quantity": "10",
                "status": "1",
                "created_at": "2018-07-16 17:18:36",
                "updated_at": "2018-07-16 17:18:36",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条库存 [GET /api/stocks/:id]


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
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称1",
                    "province": "仓库地（省）1",
                    "city": "仓库地（市）1",
                    "district": "仓库地（区）1sfd",
                    "address": "仓库地（地址）1fdf",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-07 15:44:00",
                    "updated_at": "2018-07-07 18:29:12"
                },
                "goods": {
                    "id": 161,
                    "commodity_code": "商品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "商品图片",
                    "url": "https://www.taobao.com/",
                    "status": 1,
                    "is_stop_pro": 1,
                    "created_at": "2018-07-13 18:48:47",
                    "updated_at": "2018-07-13 18:48:47",
                    "deleted_at": null
                },
                "pro_specs": {
                    "id": 66,
                    "goods_id": 161,
                    "spec_code": "规格编码",
                    "jd_specs_code": "京东规格编码",
                    "vips_specs_code": "唯品会规格编码",
                    "tb_price": "10.00",
                    "cost": "10.00",
                    "price": "10.00",
                    "highest_price": "10.00",
                    "lowest_price": "10.00",
                    "warehouse_cost": "10.00",
                    "assembly_price": "10.00",
                    "discount": "1.00",
                    "commission": "1.00",
                    "is_combination": 0,
                    "package_quantity": 10,
                    "package_costs": "10.00",
                    "wooden_frame_costs": "10.00",
                    "purchase_freight": "10.00",
                    "inventory_warning": 10,
                    "purchase_days_warning": 1,
                    "available_warning": 10,
                    "distribution_method_id": 1,
                    "bar_code": "条形码2",
                    "img_url": "http://image.img.com",
                    "spec": "规格",
                    "color": "颜色",
                    "materials": "材质",
                    "function": "功能",
                    "special": "特殊",
                    "other": "其他",
                    "length": 10,
                    "width": 10,
                    "height": 10,
                    "volume": 10,
                    "weight": 10,
                    "remark": "备注",
                    "finished_pro": 1,
                    "is_stop_pro": 0,
                    "status": 1,
                    "created_at": "2018-07-16 11:53:01",
                    "updated_at": "2018-07-16 11:53:01",
                    "deleted_at": null
                },
                "quantity": 10,
                "status": 1,
                "created_at": "2018-07-16 17:08:11",
                "updated_at": "2018-07-16 17:08:11"
            }

## 删除库存 [DELETE /api/stocks/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组库存 [DELETE /api/stocks]


+ Parameters
    + ids: (string, required) - 库存id组 格式: 1,2,3,4 

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

## 更改一组库存状态 [PUT /api/stocks/editstatus]


+ Parameters
    + ids: (string, required) - 库存id组 格式: 1,2,3,4 
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

## 根据仓库获取可写入的产品 [GET /api/stocks/saveableproduct]


+ Parameters
    + warehouses_id: (integer, required) - 仓库id

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "warehouses_id": [
                        "仓库id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "goods_id": 19,
                        "product_spec_id": 3,
                        "commodity_code": "1",
                        "short_name": "1",
                        "pro_specs": "spec_code",
                        "spec": "1",
                        "color": "1",
                        "materials": "1"
                    },
                    {
                        "goods_id": 19,
                        "product_spec_id": 3,
                        "short_name": "1",
                        "pro_specs": "spec_code",
                        "spec": "1",
                        "color": "1",
                        "materials": "1"
                    }
                ]
            }

# purchases [/api]
采购单资源

## 获取所有采购单 [GET /api/purchases{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 91,
                        "purchase_order_no": "PO2018071912575762929",
                        "purchase_status": "新建",
                        "order_no": "",
                        "user_id": 1,
                        "receiver": "收货人3",
                        "receiver_address": "收货地址3",
                        "warehouse_id": 1,
                        "promise_delivery_time": null,
                        "salesman": "",
                        "source": "",
                        "client_name": "",
                        "buyer_nick": "",
                        "order_address": "",
                        "is_submit": 0,
                        "is_print": 0,
                        "is_check": 0,
                        "is_change": 0,
                        "remark": "备注3",
                        "status": 1,
                        "purchase_details": [
                            {
                                "id": 5,
                                "purchases_id": 91,
                                "product_specs_id": 2,
                                "purchase_quantity": 10,
                                "shops_id": 1,
                                "suppliers_id": 1,
                                "purchase_cost": "10.00",
                                "purchase_freight": "10.00",
                                "warehouse_cost": "10.00",
                                "commission": "10.00",
                                "discount": "10.00",
                                "colour_num": "色号",
                                "paint": "油漆",
                                "wooden_frame_costs": "0.00",
                                "arrival_time": "2018-06-10 00:00:00",
                                "remark": "备注",
                                "created_at": "2018-07-19 12:57:58",
                                "updated_at": "2018-07-19 12:57:58"
                            }
                        ],
                        "created_at": "2018-07-19 12:57:58",
                        "updated_at": "2018-07-19 12:57:58"
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

## 新增采购单 [POST /api/purchases]


+ Parameters
    + receiver: (string, required) - 收货人
    + receiver_address: (string, required) - 收货地址
    + warehouse_id: (integer, required) - 仓库id
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + purchase_details[0][product_specs_id]: (integer, required) - 产品规格id
    + purchase_details[0][purchase_quantity]: (integer, required) - 采购数
    + purchase_details[0][shops_id]: (integer, required) - 采购店铺id
    + purchase_details[0][suppliers_id]: (integer, required) - 供应商id
    + purchase_details[0][purchase_cost]: (numeric, required) - 采购成本
    + purchase_details[0][purchase_freight]: (numeric, required) - 采购运费
    + purchase_details[0][warehouse_cost]: (numeric, required) - 仓库成本
    + purchase_details[0][commission]: (numeric, optional) - 金佣点
    + purchase_details[0][discount]: (numeric, optional) - 折扣
    + purchase_details[0][colour_num]: (string, optional) - 色号
    + purchase_details[0][paint]: (string, optional) - 油漆
    + purchase_details[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + purchase_details[0][arrival_time]: (dateTime, optional) - 到货时间
    + purchase_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "receiver": "收货人",
                    "receiver_address": "收货地址",
                    "warehouse_id": "1",
                    "remark": "备注",
                    "status": "1",
                    "purchase_details[0][product_specs_id]": 1,
                    "purchase_details[0][purchase_quantity]": 10,
                    "purchase_details[0][shops_id]": 1,
                    "purchase_details[0][suppliers_id]": 1,
                    "purchase_details[0][purchase_cost]": 10,
                    "purchase_details[0][purchase_freight]": 10,
                    "purchase_details[0][warehouse_cost]": 10,
                    "purchase_details[0][commission]": 10,
                    "purchase_details[0][discount]": 10,
                    "purchase_details[0][colour_num]": "色号",
                    "purchase_details[0][paint]": "油漆",
                    "purchase_details[0][wooden_frame_costs]": 10,
                    "purchase_details[0][arrival_time]": "2018-6-10 00:00:00",
                    "purchase_details[0][remark]": "备注"
                }
            ]

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "receiver": [
                        "收货人必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 91,
                "purchase_order_no": "PO2018071912575762929",
                "purchase_status": "新建",
                "order_no": null,
                "user_id": 1,
                "receiver": "收货人3",
                "receiver_address": "收货地址3",
                "warehouse_id": "1",
                "promise_delivery_time": null,
                "salesman": null,
                "source": null,
                "client_name": null,
                "buyer_nick": null,
                "order_address": null,
                "is_submit": null,
                "is_print": null,
                "is_check": null,
                "is_change": null,
                "remark": "备注3",
                "status": "1",
                "purchase_details": [
                    {
                        "id": 5,
                        "purchases_id": 91,
                        "product_specs_id": 2,
                        "purchase_quantity": 10,
                        "shops_id": 1,
                        "suppliers_id": 1,
                        "purchase_cost": "10.00",
                        "purchase_freight": "10.00",
                        "warehouse_cost": "10.00",
                        "commission": "10.00",
                        "discount": "10.00",
                        "colour_num": "色号",
                        "paint": "油漆",
                        "wooden_frame_costs": "0.00",
                        "arrival_time": "2018-06-10 00:00:00",
                        "remark": "备注",
                        "created_at": "2018-07-19 12:57:58",
                        "updated_at": "2018-07-19 12:57:58"
                    }
                ],
                "created_at": "2018-07-19 12:57:58",
                "updated_at": "2018-07-19 12:57:58",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条采购单 [GET /api/purchases/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 91,
                "purchase_order_no": "PO2018071912575762929",
                "purchase_status": "新建",
                "order_no": "",
                "user_id": 1,
                "receiver": "收货人3",
                "receiver_address": "收货地址3",
                "warehouse_id": 1,
                "promise_delivery_time": null,
                "salesman": "",
                "source": "",
                "client_name": "",
                "buyer_nick": "",
                "order_address": "",
                "is_submit": 0,
                "is_print": 0,
                "is_check": 0,
                "is_change": 0,
                "remark": "备注3",
                "status": 1,
                "purchase_details": [
                    {
                        "id": 5,
                        "purchases_id": 91,
                        "product_specs_id": 2,
                        "purchase_quantity": 10,
                        "shops_id": 1,
                        "suppliers_id": 1,
                        "purchase_cost": "10.00",
                        "purchase_freight": "10.00",
                        "warehouse_cost": "10.00",
                        "commission": "10.00",
                        "discount": "10.00",
                        "colour_num": "色号",
                        "paint": "油漆",
                        "wooden_frame_costs": "0.00",
                        "arrival_time": "2018-06-10 00:00:00",
                        "remark": "备注",
                        "created_at": "2018-07-19 12:57:58",
                        "updated_at": "2018-07-19 12:57:58"
                    }
                ],
                "created_at": "2018-07-19 12:57:58",
                "updated_at": "2018-07-19 12:57:58"
            }

## 修改采购单 [PATCH /api/purchases/:id]


+ Parameters
    + receiver: (string, optional) - 收货人
    + receiver_address: (string, optional) - 收货地址
    + warehouse_id: (integer, optional) - 仓库id
    + remark: (string, optional) - 备注
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + purchase_details[0][id]: (integer, optional) - 采购详情id
    + purchase_details[0][product_specs_id]: (integer, optional) - 产品规格id
    + purchase_details[0][purchase_quantity]: (integer, optional) - 采购数
    + purchase_details[0][shops_id]: (integer, optional) - 采购店铺id
    + purchase_details[0][suppliers_id]: (integer, optional) - 供应商id
    + purchase_details[0][purchase_cost]: (numeric, optional) - 采购成本
    + purchase_details[0][purchase_freight]: (numeric, optional) - 采购运费
    + purchase_details[0][warehouse_cost]: (numeric, optional) - 仓库成本
    + purchase_details[0][commission]: (numeric, optional) - 金佣点
    + purchase_details[0][discount]: (numeric, optional) - 折扣
    + purchase_details[0][colour_num]: (string, optional) - 色号
    + purchase_details[0][paint]: (string, optional) - 油漆
    + purchase_details[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + purchase_details[0][arrival_time]: (dateTime, optional) - 到货时间
    + purchase_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "receiver": "收货人",
                    "receiver_address": "收货地址",
                    "warehouse_id": "1",
                    "remark": "备注",
                    "status": "1",
                    "purchase_details[0][id]": 1,
                    "purchase_details[0][product_specs_id]": 1,
                    "purchase_details[0][purchase_quantity]": 10,
                    "purchase_details[0][shops_id]": 1,
                    "purchase_details[0][suppliers_id]": 1,
                    "purchase_details[0][purchase_cost]": 10,
                    "purchase_details[0][purchase_freight]": 10,
                    "purchase_details[0][warehouse_cost]": 10,
                    "purchase_details[0][commission]": 10,
                    "purchase_details[0][discount]": 10,
                    "purchase_details[0][colour_num]": "色号",
                    "purchase_details[0][paint]": "油漆",
                    "purchase_details[0][wooden_frame_costs]": 10,
                    "purchase_details[0][arrival_time]": "2018-6-10 00:00:00",
                    "purchase_details[0][remark]": "备注"
                }
            ]

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
                    "receiver": [
                        "收货人必须string类型"
                    ],
                    "receiver_address": [
                        "收货地址必填"
                    ],
                    "warehouse_id": [
                        "仓库id必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "purchase_order_no": "PO2018071718055128755",
                "purchase_status": "新建",
                "order_no": "",
                "user_id": 1,
                "receiver": "收货人1",
                "receiver_address": "收货地址1",
                "warehouse_id": "1",
                "promise_delivery_time": null,
                "salesman": "",
                "source": "",
                "client_name": "",
                "buyer_nick": "",
                "order_address": "",
                "is_submit": 0,
                "is_print": 0,
                "is_check": 0,
                "is_change": 0,
                "remark": "备注1",
                "status": "1",
                "created_at": "2018-07-17 18:05:51",
                "updated_at": "2018-07-17 18:33:06"
            }

## 删除采购单 [DELETE /api/purchases/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购单 [DELETE /api/purchases]


+ Parameters
    + ids: (string, required) - 采购单id组 格式: 1,2,3,4 

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

## 更改一组采购单状态 [PUT /api/purchases/editstatus]


+ Parameters
    + ids: (string, required) - 采购单id组 格式: 1,2,3,4 
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

## 提交 [PUT /api/purchases/:id/submit]


+ Parameters
    + is_submit: (integer, required) - 是否提交

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_submit": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 打印 [PUT /api/purchases/:id/print]


+ Parameters
    + is_print: (integer, required) - 是否打印

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_print": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 审核 [PUT /api/purchases/:id/check]


+ Parameters
    + is_check: (integer, required) - 是否审核

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_check": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# purchasedetails [/api]
采购单详情资源

## 删除采购单详情 [DELETE /api/purchasedetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购单详情 [DELETE /api/purchasedetails]


+ Parameters
    + ids: (string, required) - 采购单详情id组 格式: 1,2,3,4 

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

# stockintypes [/api]
入库类型资源

## 获取所有入库类型 [GET /api/stockintypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "入库类型",
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
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/stockintypes?page=1"
                        }
                    }
                }
            }

## 新增入库类型 [POST /api/stockintypes]


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
                "id": 1,
                "name": "入库类型",
                "status": "1",
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条入库类型 [GET /api/stockintypes/:id]


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
                "name": "入库类型",
                "status": 1,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改入库类型 [PATCH /api/stockintypes/:id]


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

## 删除入库类型 [DELETE /api/stockintypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组入库类型 [DELETE /api/stockintypes]


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

## 更改一组入库类型状态 [PUT /api/stockintypes/editstatus]


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

# stockins [/api]
入库单资源

## 获取所有入库单 [GET /api/stockins{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 6,
                        "stock_in_no": "IS2018072017031542256",
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "测试",
                            "is_default": 0,
                            "status": 1,
                            "created_at": "2018-07-17 17:39:54",
                            "updated_at": "2018-07-19 14:13:27"
                        },
                        "stock_in_type": {
                            "id": 1,
                            "name": "入库类型名称1",
                            "status": 1,
                            "created_at": "2018-07-19 17:51:13",
                            "updated_at": "2018-07-19 17:58:07"
                        },
                        "creator": 1,
                        "submitter": null,
                        "submit_at": null,
                        "checker": null,
                        "check_at": null,
                        "warehouer": null,
                        "stock_in_at": null,
                        "is_submit": null,
                        "is_check": null,
                        "is_stock_in": null,
                        "status": "0",
                        "stock_in_details": [
                            {
                                "id": 9,
                                "stock_ins_id": 6,
                                "purchases_id": 1,
                                "product_specs_id": 1,
                                "stock_in_quantity": 5,
                                "remark": "备注",
                                "created_at": "2018-07-20 17:03:15",
                                "updated_at": "2018-07-20 17:03:15",
                                "purchase_details_id": {
                                    "id": 1,
                                    "purchases_id": 13,
                                    "purchase_item_status": "新建",
                                    "product_specs_id": 1,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "10.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "colour_num": "色号",
                                    "paint": "油漆",
                                    "wooden_frame_costs": "0.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注",
                                    "created_at": "2018-07-21 16:22:05",
                                    "updated_at": "2018-07-21 16:22:05"
                                },
                                "product_spec": {
                                    "id": 1,
                                    "goods_id": 1,
                                    "spec_code": "规格编码3",
                                    "jd_specs_code": "京东规格编码",
                                    "vips_specs_code": "唯品会规格编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_combination": 0,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 1,
                                    "available_warning": 10,
                                    "distribution_method_id": 1,
                                    "bar_code": "条形码2",
                                    "img_url": "http://image.img.com",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "length": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": 1,
                                    "is_stop_pro": 0,
                                    "status": 1,
                                    "created_at": "2018-07-18 17:42:36",
                                    "updated_at": "2018-07-18 17:42:36"
                                }
                            }
                        ],
                        "created_at": "2018-07-20 17:03:15",
                        "updated_at": "2018-07-20 17:03:15"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/stockins?page=1"
                        }
                    }
                }
            }

## 新增入库单 [POST /api/stockins]


+ Parameters
    + warehouse_id: (integer, required) - 仓库id
    + stock_in_types_id: (integer, required) - 入库类型id
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + stock_in_details[0][purchase_details_id]: (integer, required) - 采购单详情id
    + stock_in_details[0][product_specs_id]: (integer, required) - 产品规格id
    + stock_in_details[0][stock_in_quantity]: (integer, required) - 入库数量
    + stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "status": 1,
                    "stock_in_details[0][purchase_details_id]": 1,
                    "stock_in_details[0][product_specs_id]": 1,
                    "stock_in_details[0][stock_in_quantity]": 10,
                    "stock_in_details[0][remark]": "备注"
                }
            ]

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "warehouse_id": [
                        "仓库id必填"
                    ],
                    "stock_in_types_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 6,
                "stock_in_no": "IS2018072017031542256",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "测试",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-17 17:39:54",
                    "updated_at": "2018-07-19 14:13:27"
                },
                "stock_in_type": {
                    "id": 1,
                    "name": "入库类型名称1",
                    "status": 1,
                    "created_at": "2018-07-19 17:51:13",
                    "updated_at": "2018-07-19 17:58:07"
                },
                "creator": 1,
                "submitter": null,
                "submit_at": null,
                "checker": null,
                "check_at": null,
                "warehouer": null,
                "stock_in_at": null,
                "is_submit": null,
                "is_check": null,
                "is_stock_in": null,
                "status": "0",
                "stock_in_details": [
                    {
                        "id": 9,
                        "stock_ins_id": 6,
                        "purchases_id": 1,
                        "product_specs_id": 1,
                        "stock_in_quantity": 5,
                        "remark": "备注",
                        "created_at": "2018-07-20 17:03:15",
                        "updated_at": "2018-07-20 17:03:15",
                        "purchase_details_id": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "10.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-21 16:22:05"
                        },
                        "product_spec": {
                            "id": 1,
                            "goods_id": 1,
                            "spec_code": "规格编码3",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-18 17:42:36",
                            "updated_at": "2018-07-18 17:42:36"
                        }
                    }
                ],
                "created_at": "2018-07-20 17:03:15",
                "updated_at": "2018-07-20 17:03:15",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条入库单 [GET /api/stockins/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 6,
                "stock_in_no": "IS2018072017031542256",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "测试",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-17 17:39:54",
                    "updated_at": "2018-07-19 14:13:27"
                },
                "stock_in_type": {
                    "id": 1,
                    "name": "入库类型名称1",
                    "status": 1,
                    "created_at": "2018-07-19 17:51:13",
                    "updated_at": "2018-07-19 17:58:07"
                },
                "creator": 1,
                "submitter": null,
                "submit_at": null,
                "checker": null,
                "check_at": null,
                "warehouer": null,
                "stock_in_at": null,
                "is_submit": null,
                "is_check": null,
                "is_stock_in": null,
                "status": "0",
                "stock_in_details": [
                    {
                        "id": 9,
                        "stock_ins_id": 6,
                        "purchases_id": 1,
                        "product_specs_id": 1,
                        "stock_in_quantity": 5,
                        "remark": "备注",
                        "created_at": "2018-07-20 17:03:15",
                        "updated_at": "2018-07-20 17:03:15",
                        "purchase_details_id": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "10.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-21 16:22:05"
                        },
                        "product_spec": {
                            "id": 1,
                            "goods_id": 1,
                            "spec_code": "规格编码3",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-18 17:42:36",
                            "updated_at": "2018-07-18 17:42:36"
                        }
                    }
                ],
                "created_at": "2018-07-20 17:03:15",
                "updated_at": "2018-07-20 17:03:15"
            }

## 修改入库单 [PATCH /api/stockins/:id]


+ Parameters
    + warehouse_id: (integer, optional) - 仓库id
    + stock_in_types_id: (integer, optional) - 入库类型id
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + stock_in_details[0][id]: (integer, optional) - 入库单详情id (存在则视为更新 不存在视为插入)
    + stock_in_details[0][purchase_details_id]: (integer, optional) - 采购单详情id
    + stock_in_details[0][product_specs_id]: (integer, optional) - 产品规格id
    + stock_in_details[0][stock_in_quantity]: (integer, optional) - 入库数量
    + stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "status": 1,
                    "stock_in_details[0][id]": 1,
                    "stock_in_details[0][purchase_details_id]": 1,
                    "stock_in_details[0][product_specs_id]": 1,
                    "stock_in_details[0][stock_in_quantity]": 10,
                    "stock_in_details[0][remark]": "备注"
                }
            ]

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
                        "仓库id必填"
                    ],
                    "stock_in_types_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 6,
                "stock_in_no": "IS2018072017031542256",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "测试",
                    "is_default": 0,
                    "status": 1,
                    "created_at": "2018-07-17 17:39:54",
                    "updated_at": "2018-07-19 14:13:27"
                },
                "stock_in_type": {
                    "id": 1,
                    "name": "入库类型名称1",
                    "status": 1,
                    "created_at": "2018-07-19 17:51:13",
                    "updated_at": "2018-07-19 17:58:07"
                },
                "creator": 1,
                "submitter": null,
                "submit_at": null,
                "checker": null,
                "check_at": null,
                "warehouer": null,
                "stock_in_at": null,
                "is_submit": null,
                "is_check": null,
                "is_stock_in": null,
                "status": "0",
                "stock_in_details": [
                    {
                        "id": 9,
                        "stock_ins_id": 6,
                        "purchases_id": 1,
                        "product_specs_id": 1,
                        "stock_in_quantity": 5,
                        "remark": "备注",
                        "created_at": "2018-07-20 17:03:15",
                        "updated_at": "2018-07-20 17:03:15",
                        "purchase_details_id": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "10.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-21 16:22:05"
                        },
                        "product_spec": {
                            "id": 1,
                            "goods_id": 1,
                            "spec_code": "规格编码3",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-18 17:42:36",
                            "updated_at": "2018-07-18 17:42:36"
                        }
                    }
                ],
                "created_at": "2018-07-20 17:03:15",
                "updated_at": "2018-07-20 17:03:15"
            }

## 删除入库单 [DELETE /api/stockins/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组入库单 [DELETE /api/stockins]


+ Parameters
    + ids: (string, required) - 入库单id组 格式: 1,2,3,4 

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

## 更改一组入库单状态 [PUT /api/stockins/editstatus]


+ Parameters
    + ids: (string, required) - 入库单id组 格式: 1,2,3,4 
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

## 提交 [PUT /api/purchases/:id/submit]


+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_submit": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 打印 [PUT /api/purchases/:id/print]


+ Response 422 (application/json)
    + Body

            {
                "message": "打印出错，是否未提交未审核或重复打印",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 审核 [PUT /api/purchases/:id/check]


+ Response 422 (application/json)
    + Body

            {
                "message": "审核出错，是否未提交或重复审核",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 入库 [PUT /api/purchases/:id/stockin]


+ Response 422 (application/json)
    + Body

            {
                "message": "入库出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# stockindetails [/api]
入库单资源

## 获取所有入库单 [GET /api/stockindetails{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "stock_in": {
                            "id": 1,
                            "stock_in_no": "IS2018072013065251993",
                            "warehouse_id": 1,
                            "stock_in_types_id": 1,
                            "creator": "1",
                            "submitter": "",
                            "submit_at": null,
                            "checker": "",
                            "check_at": null,
                            "warehouer": "",
                            "stock_in_at": null,
                            "is_submit": 0,
                            "is_check": 0,
                            "is_stock_in": 0,
                            "status": 1,
                            "created_at": "2018-07-20 13:06:52",
                            "updated_at": "2018-07-20 13:06:52"
                        },
                        "purchase_details_id": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "10.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-21 16:22:05"
                        },
                        "product_spec": {
                            "id": 1,
                            "goods_id": 1,
                            "spec_code": "规格编码3",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-18 17:42:36",
                            "updated_at": "2018-07-18 17:42:36"
                        },
                        "stock_in_quantity": 10,
                        "created_at": "2018-07-20 16:06:32",
                        "updated_at": "2018-07-20 16:13:43"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": ""
                        }
                    }
                }
            }

## 删除入库单 [DELETE /api/stockindetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组入库单 [DELETE /api/stockindetails]


+ Parameters
    + ids: (string, required) - 入库单id组 格式: 1,2,3,4 

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

# cancelpurchases [/api]
取消采购资源

## 获取所有取消采购 [GET /api/cancelpurchases{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 19,
                        "cancel_purchases_no": "CP2018072316423654591",
                        "purchase": {
                            "id": 13,
                            "purchase_order_no": "PO2018072116220517242",
                            "purchase_status": "新建",
                            "order_no": "",
                            "user_id": 1,
                            "print_at": null,
                            "receiver": "收货人3",
                            "receiver_address": "收货地址3",
                            "warehouse_id": 1,
                            "promise_delivery_time": null,
                            "salesman": "",
                            "source": "",
                            "client_name": "",
                            "buyer_nick": "",
                            "order_address": "",
                            "is_submit": 0,
                            "is_print": 0,
                            "is_check": 0,
                            "is_change": 1,
                            "remark": "备注5",
                            "status": 1,
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        },
                        "creator": "admin",
                        "submitter": null,
                        "submit_at": null,
                        "is_submit": null,
                        "cancel_purchase_details": [
                            {
                                "id": 14,
                                "cancel_purchases_id": 19,
                                "purchase_details_id": 1,
                                "cancel_purchase_quantity": 1,
                                "created_at": "2018-07-23 16:42:37",
                                "updated_at": "2018-07-23 16:42:37",
                                "purchase_detail": {
                                    "id": 1,
                                    "purchases_id": 13,
                                    "purchase_item_status": "新建",
                                    "product_specs_id": 1,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "0.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "colour_num": "色号",
                                    "paint": "油漆",
                                    "wooden_frame_costs": "0.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注",
                                    "created_at": "2018-07-21 16:22:05",
                                    "updated_at": "2018-07-23 16:26:19"
                                }
                            },
                            {
                                "id": 15,
                                "cancel_purchases_id": 19,
                                "purchase_details_id": 2,
                                "cancel_purchase_quantity": 1,
                                "created_at": "2018-07-23 16:42:37",
                                "updated_at": "2018-07-23 16:42:37",
                                "purchase_detail": {
                                    "id": 2,
                                    "purchases_id": 13,
                                    "purchase_item_status": "新建",
                                    "product_specs_id": 1,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "0.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "colour_num": "色号",
                                    "paint": "油漆",
                                    "wooden_frame_costs": "0.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注",
                                    "created_at": "2018-07-21 16:22:05",
                                    "updated_at": "2018-07-23 16:26:19"
                                }
                            }
                        ],
                        "created_at": "2018-07-23 16:42:36",
                        "updated_at": "2018-07-23 16:42:36"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/cancelpurchases?page=1"
                        }
                    }
                }
            }

## 新增取消采购 [POST /api/cancelpurchases]


+ Parameters
    + purchases_id: (integer, required) - 采购单id
    + cancel_purchase_details[*][purchase_details_id]: (integer, required) - 采购详细id
    + cancel_purchase_details[*][cancel_purchase_quantity]: (integer, required) - 取消采购数

+ Request (application/json)
    + Body

            [
                {
                    "purchases_id": 13,
                    "cancel_purchase_details[0][purchase_details_id]": 1,
                    "cancel_purchase_details[0][cancel_purchase_quantity]": 5,
                    "cancel_purchase_details[1][purchase_details_id]": 2,
                    "cancel_purchase_details[1][cancel_purchase_quantity]": 5
                }
            ]

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "cancel_purchase_details.0.cancel_purchase_quantity": [
                        "取消采购数必须int类型"
                    ],
                    "purchases_id": [
                        "需要添加的id在数据库中未找到或未启用或已完成"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 19,
                "cancel_purchases_no": "CP2018072316423654591",
                "purchase": {
                    "id": 13,
                    "purchase_order_no": "PO2018072116220517242",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "收货人3",
                    "receiver_address": "收货地址3",
                    "warehouse_id": 1,
                    "promise_delivery_time": null,
                    "salesman": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": 0,
                    "is_print": 0,
                    "is_check": 0,
                    "is_change": 1,
                    "remark": "备注5",
                    "status": 1,
                    "created_at": "2018-07-21 16:22:05",
                    "updated_at": "2018-07-23 16:26:19"
                },
                "creator": "admin",
                "submitter": null,
                "submit_at": null,
                "is_submit": null,
                "cancel_purchase_details": [
                    {
                        "id": 14,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 1,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 15,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 2,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    }
                ],
                "created_at": "2018-07-23 16:42:36",
                "updated_at": "2018-07-23 16:42:36",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条取消采购 [GET /api/cancelpurchases/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 19,
                "cancel_purchases_no": "CP2018072316423654591",
                "purchase": {
                    "id": 13,
                    "purchase_order_no": "PO2018072116220517242",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "收货人3",
                    "receiver_address": "收货地址3",
                    "warehouse_id": 1,
                    "promise_delivery_time": null,
                    "salesman": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": 0,
                    "is_print": 0,
                    "is_check": 0,
                    "is_change": 1,
                    "remark": "备注5",
                    "status": 1,
                    "created_at": "2018-07-21 16:22:05",
                    "updated_at": "2018-07-23 16:26:19"
                },
                "creator": "admin",
                "submitter": null,
                "submit_at": null,
                "is_submit": null,
                "cancel_purchase_details": [
                    {
                        "id": 14,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 1,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 15,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 2,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    }
                ],
                "created_at": "2018-07-23 16:42:36",
                "updated_at": "2018-07-23 16:42:36"
            }

## 修改取消采购 [PATCH /api/cancelpurchases/:id]


+ Parameters
    + purchases_id: (integer, required) - 采购单id
    + cancel_purchase_details[*][id]: (integer, optional) - 取消采购 id (不存在 id 则视为新建)
    + cancel_purchase_details[*][purchase_details_id]: (integer, required) - 采购详细id
    + cancel_purchase_details[*][cancel_purchase_quantity]: (integer, required) - 取消采购数

+ Request (application/json)
    + Body

            [
                {
                    "purchases_id": 13,
                    "cancel_purchase_details[0][id]": 14,
                    "cancel_purchase_details[0][purchase_details_id]": 1,
                    "cancel_purchase_details[0][cancel_purchase_quantity]": 1,
                    "cancel_purchase_details[1][purchase_details_id]": 2,
                    "cancel_purchase_details[1][cancel_purchase_quantity]": 1
                }
            ]

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
                        "仓库id必填"
                    ],
                    "stock_in_types_id": [
                        "需要添加的id在数据库中未找到或未启用"
                    ],
                    "stock_in_details": [
                        "取消采购详情必须json类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 19,
                "cancel_purchases_no": "CP2018072316423654591",
                "purchase": {
                    "id": 13,
                    "purchase_order_no": "PO2018072116220517242",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "收货人3",
                    "receiver_address": "收货地址3",
                    "warehouse_id": 1,
                    "promise_delivery_time": null,
                    "salesman": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": 0,
                    "is_print": 0,
                    "is_check": 0,
                    "is_change": 1,
                    "remark": "备注5",
                    "status": 1,
                    "created_at": "2018-07-21 16:22:05",
                    "updated_at": "2018-07-23 16:26:19"
                },
                "creator": "admin",
                "submitter": null,
                "submit_at": null,
                "is_submit": null,
                "cancel_purchase_details": [
                    {
                        "id": 14,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 1,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 15,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 2,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 16,
                        "cancel_purchases_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 17:01:21",
                        "updated_at": "2018-07-23 17:01:21",
                        "purchase_detail": {
                            "id": 2,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    }
                ],
                "created_at": "2018-07-23 16:42:36",
                "updated_at": "2018-07-23 16:42:36"
            }

## 删除取消采购 [DELETE /api/cancelpurchases/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组取消采购 [DELETE /api/cancelpurchases]


+ Parameters
    + ids: (string, required) - 取消采购id组 格式: 1,2,3,4 

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

## 更改一组取消采购状态 [PUT /api/cancelpurchases/editstatus]


+ Parameters
    + ids: (string, required) - 取消采购id组 格式: 1,2,3,4 
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

## 提交 [PUT /api/purchases/:id/submit]


+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_submit": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# cancelpurchasedetails [/api]
取消采购单详情资源

## 获取所有取消采购单详情 [GET /api/cancelpurchasedetails{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "stock_in": {
                            "id": 1,
                            "stock_in_no": "IS2018072013065251993",
                            "warehouse_id": 1,
                            "stock_in_types_id": 1,
                            "creator": "1",
                            "submitter": "",
                            "submit_at": null,
                            "checker": "",
                            "check_at": null,
                            "warehouer": "",
                            "stock_in_at": null,
                            "is_submit": 0,
                            "is_check": 0,
                            "is_stock_in": 0,
                            "status": 1,
                            "created_at": "2018-07-20 13:06:52",
                            "updated_at": "2018-07-20 13:06:52"
                        },
                        "purchase_details_id": {
                            "id": 1,
                            "purchases_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "10.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-21 16:22:05"
                        },
                        "product_spec": {
                            "id": 1,
                            "goods_id": 1,
                            "spec_code": "规格编码3",
                            "jd_specs_code": "京东规格编码",
                            "vips_specs_code": "唯品会规格编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_combination": 0,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 1,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "条形码2",
                            "img_url": "http://image.img.com",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "length": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": 1,
                            "is_stop_pro": 0,
                            "status": 1,
                            "created_at": "2018-07-18 17:42:36",
                            "updated_at": "2018-07-18 17:42:36"
                        },
                        "stock_in_quantity": 10,
                        "created_at": "2018-07-20 16:06:32",
                        "updated_at": "2018-07-20 16:13:43"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": ""
                        }
                    }
                }
            }

## 删除取消采购单详情 [DELETE /api/cancelpurchasedetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组取消采购单详情 [DELETE /api/cancelpurchasedetails]


+ Parameters
    + ids: (string, required) - 取消采购单详情id组 格式: 1,2,3,4 

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

# purchasereturns [/api]
采购退货资源

## 获取所有采购退货 [GET /api/purchasereturns{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "purchase_return_no": "RG2018072411440706967",
                        "creator": "admin",
                        "is_submit": 0,
                        "submitter": "",
                        "submit_at": null,
                        "is_check": 0,
                        "checker": "",
                        "check_at": null,
                        "is_print": 0,
                        "remark": "采购退货单备注",
                        "status": 1,
                        "purchase_return_details": [
                            {
                                "id": 1,
                                "purchase_returns_id": 1,
                                "stocks_id": 1,
                                "purchase_return_quantity": 10,
                                "suppliers_id": 1,
                                "price_differences": "1.00",
                                "purchase_return_types_id": 1,
                                "created_at": "2018-07-24 11:44:07",
                                "updated_at": "2018-07-24 11:44:07",
                                "stock": {
                                    "id": 1,
                                    "warehouse_id": 1,
                                    "goods_id": 1,
                                    "pro_specs_id": 1,
                                    "quantity": 20,
                                    "status": 1,
                                    "created_at": "2018-07-21 18:20:53",
                                    "updated_at": "2018-07-21 18:27:38"
                                },
                                "supplier": {
                                    "id": 1,
                                    "name": "1",
                                    "company": "1",
                                    "code": "1",
                                    "province": "1",
                                    "city": "1",
                                    "district": "1",
                                    "address": "1",
                                    "zipcode": "1",
                                    "contacts": "1",
                                    "phone": "1",
                                    "mobile": "132131343242",
                                    "fax": "1",
                                    "email": "132@re.cn",
                                    "remark": "1",
                                    "is_scan": 1,
                                    "status": 1,
                                    "auto_valuation": 1,
                                    "created_at": "2018-07-17 17:54:01",
                                    "updated_at": "2018-07-17 17:54:01"
                                },
                                "purchase_return_types": {
                                    "id": 1,
                                    "name": "采购退货类型名称",
                                    "status": 1,
                                    "created_at": "2018-07-24 10:24:13",
                                    "updated_at": "2018-07-24 10:24:13"
                                }
                            }
                        ],
                        "created_at": "2018-07-24 11:44:07",
                        "updated_at": "2018-07-24 11:44:07"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/purchasereturns?page=1"
                        }
                    }
                }
            }

## 新增采购退货 [POST /api/purchasereturns]


+ Parameters
    + remark: (string, optional) - 采购退货单备注
    + status: (integer, optional) - 状态
        + Default: 1
    + purchase_return_details[0][stocks_id]: (integer, required) - 库存id
    + purchase_return_details[0][purchase_return_quantity]: (integer, required) - 采购退货数
    + purchase_return_details[0][suppliers_id]: (integer, required) - 供应商id
    + purchase_return_details[0][price_differences]: (numeric, required) - 差价
    + purchase_return_details[0][purchase_return_types_id]: (integer, required) - 采购退货类型id

+ Request (application/json)
    + Body

            [
                {
                    "remark": "采购退货单备注",
                    "status": 1,
                    "purchase_return_details[0][stocks_id]": 1,
                    "purchase_return_details[0][purchase_return_quantity]": 12,
                    "purchase_return_details[0][suppliers_id]": 1,
                    "purchase_return_details[0][price_differences]": 1,
                    "purchase_return_details[0][purchase_return_types_id]": 1
                }
            ]

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
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
                "purchase_return_no": "RG2018072411440706967",
                "creator": "admin",
                "is_submit": null,
                "submitter": null,
                "submit_at": null,
                "is_check": null,
                "checker": null,
                "check_at": null,
                "is_print": null,
                "remark": "采购退货单备注",
                "status": 1,
                "purchase_return_details": [
                    {
                        "id": 1,
                        "purchase_returns_id": 1,
                        "stocks_id": 1,
                        "purchase_return_quantity": 10,
                        "suppliers_id": 1,
                        "price_differences": "1.00",
                        "purchase_return_types_id": 1,
                        "created_at": "2018-07-24 11:44:07",
                        "updated_at": "2018-07-24 11:44:07",
                        "stock": {
                            "id": 1,
                            "warehouse_id": 1,
                            "goods_id": 1,
                            "pro_specs_id": 1,
                            "quantity": 20,
                            "status": 1,
                            "created_at": "2018-07-21 18:20:53",
                            "updated_at": "2018-07-21 18:27:38"
                        },
                        "supplier": {
                            "id": 1,
                            "name": "1",
                            "company": "1",
                            "code": "1",
                            "province": "1",
                            "city": "1",
                            "district": "1",
                            "address": "1",
                            "zipcode": "1",
                            "contacts": "1",
                            "phone": "1",
                            "mobile": "132131343242",
                            "fax": "1",
                            "email": "132@re.cn",
                            "remark": "1",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-17 17:54:01",
                            "updated_at": "2018-07-17 17:54:01"
                        },
                        "purchase_return_types": {
                            "id": 1,
                            "name": "采购退货类型名称",
                            "status": 1,
                            "created_at": "2018-07-24 10:24:13",
                            "updated_at": "2018-07-24 10:24:13"
                        }
                    }
                ],
                "created_at": "2018-07-24 11:44:07",
                "updated_at": "2018-07-24 11:44:07",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条采购退货 [GET /api/purchasereturns/:id]


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
                "purchase_return_no": "RG2018072411440706967",
                "creator": "admin",
                "is_submit": 0,
                "submitter": "",
                "submit_at": null,
                "is_check": 0,
                "checker": "",
                "check_at": null,
                "is_print": 0,
                "remark": "采购退货单备注",
                "status": 1,
                "purchase_return_details": [
                    {
                        "id": 1,
                        "purchase_returns_id": 1,
                        "stocks_id": 1,
                        "purchase_return_quantity": 10,
                        "suppliers_id": 1,
                        "price_differences": "1.00",
                        "purchase_return_types_id": 1,
                        "created_at": "2018-07-24 11:44:07",
                        "updated_at": "2018-07-24 11:44:07",
                        "stock": {
                            "id": 1,
                            "warehouse_id": 1,
                            "goods_id": 1,
                            "pro_specs_id": 1,
                            "quantity": 20,
                            "status": 1,
                            "created_at": "2018-07-21 18:20:53",
                            "updated_at": "2018-07-21 18:27:38"
                        },
                        "supplier": {
                            "id": 1,
                            "name": "1",
                            "company": "1",
                            "code": "1",
                            "province": "1",
                            "city": "1",
                            "district": "1",
                            "address": "1",
                            "zipcode": "1",
                            "contacts": "1",
                            "phone": "1",
                            "mobile": "132131343242",
                            "fax": "1",
                            "email": "132@re.cn",
                            "remark": "1",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-17 17:54:01",
                            "updated_at": "2018-07-17 17:54:01"
                        },
                        "purchase_return_types": {
                            "id": 1,
                            "name": "采购退货类型名称",
                            "status": 1,
                            "created_at": "2018-07-24 10:24:13",
                            "updated_at": "2018-07-24 10:24:13"
                        }
                    }
                ],
                "created_at": "2018-07-24 11:44:07",
                "updated_at": "2018-07-24 11:44:07"
            }

## 修改采购退货 [PATCH /api/purchasereturns/:id]


+ Parameters
    + remark: (string, optional) - 采购退货单备注
    + status: (integer, optional) - 状态
    + purchase_return_details[0][id]: (integer, optional) - 采购退货id (不存在 id 则视为新建)
    + purchase_return_details[0][stocks_id]: (integer, optional) - 库存id
    + purchase_return_details[0][purchase_return_quantity]: (integer, optional) - 采购退货数
    + purchase_return_details[0][suppliers_id]: (integer, optional) - 供应商id
    + purchase_return_details[0][price_differences]: (numeric, optional) - 差价
    + purchase_return_details[0][purchase_return_types_id]: (integer, optional) - 采购退货类型id

+ Request (application/json)
    + Body

            [
                {
                    "remark": "采购退货单备注",
                    "status": 1,
                    "purchase_return_details[0][id]": 1,
                    "purchase_return_details[0][stocks_id]": 1,
                    "purchase_return_details[0][purchase_return_quantity]": 12,
                    "purchase_return_details[0][suppliers_id]": 1,
                    "purchase_return_details[0][price_differences]": 1,
                    "purchase_return_details[0][purchase_return_types_id]": 1
                }
            ]

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
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 19,
                "cancel_$purchasereturns_no": "CP2018072316423654591",
                "purchase": {
                    "id": 13,
                    "purchase_order_no": "PO2018072116220517242",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "收货人3",
                    "receiver_address": "收货地址3",
                    "warehouse_id": 1,
                    "promise_delivery_time": null,
                    "salesman": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": 0,
                    "is_print": 0,
                    "is_check": 0,
                    "is_change": 1,
                    "remark": "备注5",
                    "status": 1,
                    "created_at": "2018-07-21 16:22:05",
                    "updated_at": "2018-07-23 16:26:19"
                },
                "creator": "admin",
                "submitter": null,
                "submit_at": null,
                "is_submit": null,
                "cancel_purchase_details": [
                    {
                        "id": 14,
                        "cancel_$purchasereturns_id": 19,
                        "purchase_details_id": 1,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 1,
                            "$purchasereturns_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 15,
                        "cancel_$purchasereturns_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 16:42:37",
                        "updated_at": "2018-07-23 16:42:37",
                        "purchase_detail": {
                            "id": 2,
                            "$purchasereturns_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    },
                    {
                        "id": 16,
                        "cancel_$purchasereturns_id": 19,
                        "purchase_details_id": 2,
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-07-23 17:01:21",
                        "updated_at": "2018-07-23 17:01:21",
                        "purchase_detail": {
                            "id": 2,
                            "$purchasereturns_id": 13,
                            "purchase_item_status": "新建",
                            "product_specs_id": 1,
                            "purchase_quantity": 10,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "0.00",
                            "purchase_freight": "10.00",
                            "warehouse_cost": "10.00",
                            "commission": "10.00",
                            "discount": "10.00",
                            "colour_num": "色号",
                            "paint": "油漆",
                            "wooden_frame_costs": "0.00",
                            "arrival_time": "2018-06-10 00:00:00",
                            "remark": "备注",
                            "created_at": "2018-07-21 16:22:05",
                            "updated_at": "2018-07-23 16:26:19"
                        }
                    }
                ],
                "created_at": "2018-07-23 16:42:36",
                "updated_at": "2018-07-23 16:42:36"
            }

## 删除采购退货 [DELETE /api/purchasereturns/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购退货 [DELETE /api/purchasereturns]


+ Parameters
    + ids: (string, required) - 采购退货id组 格式: 1,2,3,4 

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

## 更改一组采购退货状态 [PUT /api/purchasereturns/editstatus]


+ Parameters
    + ids: (string, required) - 采购退货id组 格式: 1,2,3,4 
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

## 提交 [PUT /api/purchasereturns/:id/submit]


+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "is_submit": [
                        "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
                    ]
                },
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 退审 [PUT /api/purchasereturns/:id/check]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 审核 [PUT /api/purchasereturns/:id/check]


+ Response 422 (application/json)
    + Body

            {
                "message": "审核出错，是否未提交或重复审核",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 打印 [PUT /api/purchasereturns/:id/print]


+ Response 422 (application/json)
    + Body

            {
                "message": "打印出错，是否未提交未审核或重复打印",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# purchasereturntypes [/api]
采购退货类型资源

## 获取所有采购退货类型 [GET /api/purchasereturntypes{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "采购退货类型",
                        "status": 1,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "采购退货类型2",
                        "status": 1,
                        "created_at": "2018-06-14 16:55:36",
                        "updated_at": "2018-06-14 16:55:36"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 2,
                        "count": 2,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/purchasereturntypes?page=1"
                        }
                    }
                }
            }

## 新增采购退货类型 [POST /api/purchasereturntypes]


+ Parameters
    + name: (string, required) - 采购退货类型名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "采购退货类型名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "采购退货类型",
                "status": "1",
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条采购退货类型 [GET /api/purchasereturntypes/:id]


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
                "name": "采购退货类型",
                "status": 1,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改采购退货类型 [PATCH /api/purchasereturntypes/:id]


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
                        "采购退货类型名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "采购退货类型10",
                "status": "1",
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除采购退货类型 [DELETE /api/purchasereturntypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购退货类型 [DELETE /api/purchasereturntypes]


+ Parameters
    + ids: (string, required) - 采购退货类型id组 格式: 1,2,3,4 

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

## 更改一组采购退货类型状态 [PUT /api/purchasereturntypes/editstatus]


+ Parameters
    + ids: (string, required) - 采购退货类型id组 格式: 1,2,3,4 
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

# purchasereturndetails [/api]
取消采购单详情资源

## 获取所有取消采购单详情 [GET /api/purchasereturndetails{?status}]


+ Parameters
    + status: (integer, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "purchase_return": {
                            "id": 1,
                            "purchase_return_no": "RG2018072411440706967",
                            "creator": "admin",
                            "is_submit": 1,
                            "submitter": "",
                            "submit_at": null,
                            "is_check": 1,
                            "checker": "admin",
                            "check_at": "2018-07-24 15:00:53",
                            "is_print": 1,
                            "remark": "采购退货单备注1",
                            "status": 1,
                            "created_at": "2018-07-24 11:44:07",
                            "updated_at": "2018-07-24 15:00:53"
                        },
                        "stock": {
                            "id": 1,
                            "warehouse_id": 1,
                            "goods_id": 1,
                            "pro_specs_id": 1,
                            "quantity": 8,
                            "status": 1,
                            "created_at": "2018-07-21 18:20:53",
                            "updated_at": "2018-07-24 15:00:53"
                        },
                        "purchase_return_quantity": 12,
                        "supplier": {
                            "id": 1,
                            "name": "1",
                            "company": "1",
                            "code": "1",
                            "province": "1",
                            "city": "1",
                            "district": "1",
                            "address": "1",
                            "zipcode": "1",
                            "contacts": "1",
                            "phone": "1",
                            "mobile": "132131343242",
                            "fax": "1",
                            "email": "132@re.cn",
                            "remark": "1",
                            "is_scan": 1,
                            "status": 1,
                            "auto_valuation": 1,
                            "created_at": "2018-07-17 17:54:01",
                            "updated_at": "2018-07-17 17:54:01"
                        },
                        "price_differences": "1.00",
                        "purchase_return_type": {
                            "id": 1,
                            "name": "采购退货类型名称",
                            "status": 1,
                            "created_at": "2018-07-24 10:24:13",
                            "updated_at": "2018-07-24 10:24:13"
                        },
                        "created_at": "2018-07-24 11:44:07",
                        "updated_at": "2018-07-24 12:50:25"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 10,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": ""
                        }
                    }
                }
            }

## 删除取消采购单详情 [DELETE /api/purchasereturndetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组取消采购单详情 [DELETE /api/purchasereturndetails]


+ Parameters
    + ids: (string, required) - 取消采购单详情id组 格式: 1,2,3,4 

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