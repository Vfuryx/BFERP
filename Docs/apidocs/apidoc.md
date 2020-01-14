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
    + status: (boolean, optional) - 获取的状态
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
                        "status": false,
                        "created_at": "2018-06-11 15:04:17",
                        "updated_at": "2018-06-11 15:04:17"
                    },
                    {
                        "id": 2,
                        "markcode": "TESTMARK",
                        "markname": "测试挖",
                        "color": "#888888",
                        "description": "我不是描述",
                        "status": false,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "记账类型1",
                        "status": true,
                        "created_at": "2018-06-14 13:59:42",
                        "updated_at": "2018-06-14 13:59:42"
                    },
                    {
                        "id": 2,
                        "name": "记账类型2",
                        "status": false,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有费用类型 [GET /api/feetypes[?status=true&include=feeCategory]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "fee_category": {
                            "id": 1,
                            "name": "费用类别",
                            "status": true,
                            "created_at": "2018-06-25 10:45:30",
                            "updated_at": "2018-06-25 10:45:30"
                        },
                        "name": "费用类型",
                        "code": "费用类型代码",
                        "is_default": true,
                        "status": true,
                        "remark": "费用类型代码备注",
                        "created_at": "2018-06-14 15:28:13",
                        "updated_at": "2018-06-14 15:28:13"
                    },
                    {
                        "id": 2,
                        "fee_category": {
                            "id": 2,
                            "name": "费用类别2",
                            "status": true,
                            "created_at": "2018-06-25 10:45:32",
                            "updated_at": "2018-06-25 10:45:32"
                        },
                        "name": "费用类型2",
                        "code": "费用类型代码2",
                        "is_default": true,
                        "status": true,
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
    + is_default: (boolean, optional) - 是否默认
        + Default: 0
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "is_default": true,
                "status": true,
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
                "is_default": true,
                "status": true,
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
                "is_default": true,
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "配送方式",
                        "status": true,
                        "created_at": "2018-06-14 14:39:45",
                        "updated_at": "2018-06-14 14:39:45"
                    },
                    {
                        "id": 2,
                        "name": "配送方式2",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "费用类别1",
                        "status": true,
                        "created_at": "2018-06-25 10:45:30",
                        "updated_at": "2018-06-25 10:45:30"
                    },
                    {
                        "id": 2,
                        "name": "费用类别2",
                        "status": true,
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 2,
                        "name": "运费类型名1",
                        "is_default": true,
                        "status": true,
                        "created_at": "2018-06-14 15:59:10",
                        "updated_at": "2018-06-14 15:59:10"
                    },
                    {
                        "id": 3,
                        "name": "运费类型名2",
                        "is_default": true,
                        "status": true,
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
    + is_default: (boolean, optional) - 是否默认
        + Default: 0
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "is_default": true,
                "status": true,
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
                "is_default": true,
                "status": true,
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
                "is_default": true,
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "code": "商品类别代码1",
                        "name": "商品类别名1",
                        "status": true,
                        "description": "商品类别详情1",
                        "remark": "商品类别备注1",
                        "created_at": "2018-06-14 16:33:26",
                        "updated_at": "2018-06-14 16:33:26"
                    },
                    {
                        "id": 2,
                        "code": "商品类别代码2",
                        "name": "商品类别名2",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有城市信息 [GET /api/cityinfos[?status=true&include=logistics]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + include: (string, optional) - 加载关联的数据

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
                            "status": true,
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
                        "is_free_shipping": true,
                        "remark": "1",
                        "status": true,
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
                            "status": true,
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
                        "is_free_shipping": true,
                        "remark": "1",
                        "status": true,
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
                    "status": true,
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
                "is_free_shipping": true,
                "remark": "1",
                "status": true,
                "created_at": "2018-07-02 17:44:32",
                "updated_at": "2018-07-02 17:44:32"
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "code": "区域代码1",
                        "name": "区域名称1",
                        "status": true,
                        "created_at": "2018-07-03 16:29:28",
                        "updated_at": "2018-07-03 16:29:28"
                    },
                    {
                        "id": 2,
                        "code": "区域代码2",
                        "name": "区域名称2",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有物流 [GET /api/logistics[?status=true&include=cityInfos,printReport,freightType]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + include: (string, optional) - 加载关联的数据

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
                            "status": true,
                            "created_at": "2018-07-03 17:50:46",
                            "updated_at": "2018-07-03 17:50:49"
                        },
                        "expected_days": 10,
                        "phone": "物流电话",
                        "address": "物流地址",
                        "cityInfos": {
                            "data": [
                                {
                                    "id": 1,
                                    "logistics_id": 1,
                                    "province": "省",
                                    "city": "市",
                                    "district": "区",
                                    "address": "提货地址",
                                    "phone": "23333333333",
                                    "price": "100.00",
                                    "weight_univalent": "110.00",
                                    "expected_days": 1,
                                    "route": 1,
                                    "is_free_shipping": true,
                                    "remark": "备注",
                                    "created_at": "2018-08-21 10:21:07",
                                    "updated_at": "2018-08-21 10:21:07"
                                }
                            ]
                        },
                        "freight_type": {
                            "id": 1,
                            "name": "运费名称1",
                            "status": true,
                            "is_default": true,
                            "created_at": "2018-07-03 17:51:25",
                            "updated_at": "2018-07-03 17:51:25"
                        },
                        "remark": "备注",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + city_infos[0][province]: (string, required) - 省
    + city_infos[0][city]: (string, required) - 市
    + city_infos[0][district]: (string, required) - 区
    + city_infos[0][address]: (string, required) - 提货地址
    + city_infos[0][phone]: (string, required) - 提货电话
    + city_infos[0][price]: (numeric, required) - 物流费用
    + city_infos[0][weight_univalent]: (numeric, required) - 重量单价
    + city_infos[0][expected_days]: (integer, required) - 城市到达天数
    + city_infos[0][route]: (integer, required) - 中转或直达
    + city_infos[0][is_free_shipping]: (boolean, required) - 是否包邮
    + city_infos[0][remark]: (string, required) - 备注

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
                "report_id": 1,
                "expected_days": 1,
                "phone": "物流电话",
                "address": "物流地址",
                "freight_type_id": 1,
                "remark": "备注",
                "status": true,
                "created_at": "2018-08-22 13:55:59",
                "updated_at": "2018-08-22 13:55:59",
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
                    "status": true,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "expected_days": 10,
                "phone": "物流电话",
                "address": "物流地址",
                "cityInfos": {
                    "data": [
                        {
                            "id": 1,
                            "logistics_id": 1,
                            "province": "省",
                            "city": "市",
                            "district": "区",
                            "address": "提货地址",
                            "phone": "23333333333",
                            "price": "100.00",
                            "weight_univalent": "110.00",
                            "expected_days": 1,
                            "route": 1,
                            "is_free_shipping": true,
                            "remark": "备注",
                            "created_at": "2018-08-21 10:21:07",
                            "updated_at": "2018-08-21 10:21:07"
                        }
                    ]
                },
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": true,
                    "is_default": true,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
                "remark": "备注",
                "status": true,
                "created_at": "2018-07-03 17:52:28",
                "updated_at": "2018-07-03 17:52:28"
            }

## 修改物流 [PATCH /api/logistics/:id]


+ Parameters
    + code: (string, optional) - 物流代码
    + name: (string, optional) - 物流名称
    + report_id: (integer, optional) - 报表格式id
    + expected_days: (integer, optional) - 预计天数
    + phone: (string, optional) - 物流电话
    + address: (string, optional) - 物流地址
    + freight_type_id: (integer, optional) - 运费类型id
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 
    + city_infos[0][id]: (string, optional) - 城市信息id
    + city_infos[0][province]: (string, optional) - 省
    + city_infos[0][city]: (string, optional) - 市
    + city_infos[0][district]: (string, optional) - 区
    + city_infos[0][address]: (string, optional) - 提货地址
    + city_infos[0][phone]: (string, optional) - 提货电话
    + city_infos[0][price]: (numeric, optional) - 物流费用
    + city_infos[0][weight_univalent]: (numeric, optional) - 重量单价
    + city_infos[0][expected_days]: (integer, optional) - 城市到达天数
    + city_infos[0][route]: (integer, optional) - 中转或直达
    + city_infos[0][is_free_shipping]: (boolean, optional) - 是否包邮
    + city_infos[0][remark]: (string, optional) - 备注

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
                    "status": true,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "expected_days": "10",
                "phone": "物流电话1",
                "address": "物流地址1",
                "cityInfos": {
                    "data": [
                        {
                            "id": 1,
                            "logistics_id": 1,
                            "province": "省",
                            "city": "市",
                            "district": "区",
                            "address": "提货地址",
                            "phone": "23333333333",
                            "price": "100.00",
                            "weight_univalent": "110.00",
                            "expected_days": 1,
                            "route": 1,
                            "is_free_shipping": true,
                            "remark": "备注",
                            "created_at": "2018-08-21 10:21:07",
                            "updated_at": "2018-08-21 10:21:07"
                        }
                    ]
                },
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": true,
                    "is_default": true,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
                "remark": "备注",
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
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
                        "is_default": true,
                        "status": true,
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
                        "is_default": false,
                        "status": true,
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
    + is_default: (boolean, optional) - 是否默认
        + Default: 0
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "is_default": true,
                "status": true,
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
                "is_default": false,
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# distributions [/api]
配送资源

## 获取所有配送 [GET /api/distributions{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "配送公司名称",
                        "phone": "配送公司电话",
                        "address": "配送公司地址",
                        "remark": "备注",
                        "status": true,
                        "created_at": "2018-08-08 16:15:57",
                        "updated_at": "2018-08-08 16:15:57"
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

## 新增配送 [POST /api/distributions]


+ Parameters
    + name: (string, required) - 配送公司名称
    + phone: (string, required) - 配送公司电话
    + address: (string, required) - 配送公司地址
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "address": [
                        "配送公司地址必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送公司名称",
                "phone": "配送公司电话",
                "address": "配送公司地址",
                "remark": "备注",
                "status": true,
                "created_at": "2018-08-08 16:15:57",
                "updated_at": "2018-08-08 16:15:57",
                "meta": {
                    "status_code": 201
                }
            }

## 显示单条配送 [GET /api/distributions/:id]


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
                "name": "配送公司名称",
                "phone": "配送公司电话",
                "address": "配送公司地址",
                "remark": "备注",
                "status": true,
                "created_at": "2018-08-08 16:15:57",
                "updated_at": "2018-08-08 16:15:57"
            }

## 修改配送 [PATCH /api/distributions/:id]


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
                    "address": [
                        "配送公司地址必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送公司名称1",
                "phone": "配送公司电话",
                "address": "配送公司地址",
                "remark": "备注",
                "status": true,
                "created_at": "2018-08-08 16:15:57",
                "updated_at": "2018-08-08 16:18:37"
            }

## 删除配送 [DELETE /api/distributions/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组配送 [DELETE /api/distributions]


+ Parameters
    + ids: (string, required) - 配送id组 格式: 1,2,3,4 

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

## 更改一组配送状态 [PUT /api/distributions/editstatus]


+ Parameters
    + ids: (string, required) - 配送id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# distributiontypes [/api]
入库类型资源

## 获取所有入库类型 [GET /api/distributiontypes{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "配送类型名称",
                        "status": true,
                        "created_at": "2018-08-08 18:14:22",
                        "updated_at": "2018-08-08 18:14:22"
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
                            "next": "{{host}}/api/distributiontypes?page=1"
                        }
                    }
                }
            }

## 新增入库类型 [POST /api/distributiontypes]


+ Parameters
    + name: (string, required) - 入库类型名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "name": "配送类型名称",
                "status": true,
                "created_at": "2018-08-08 18:14:22",
                "updated_at": "2018-08-08 18:14:22",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条配送类型 [GET /api/distributiontypes/:id]


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
                "name": "配送类型名称",
                "status": true,
                "created_at": "2018-08-08 18:14:22",
                "updated_at": "2018-08-08 18:14:22"
            }

## 修改配送类型 [PATCH /api/distributiontypes/:id]


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
                        "配送类型名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "配送类型名称",
                "status": true,
                "created_at": "2018-08-08 18:14:22",
                "updated_at": "2018-08-08 18:14:22"
            }

## 删除配送类型 [DELETE /api/distributiontypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组配送类型 [DELETE /api/distributiontypes]


+ Parameters
    + ids: (string, required) - 配送类型id组 格式: 1,2,3,4 

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

## 更改一组配送类型状态 [PUT /api/distributiontypes/editstatus]


+ Parameters
    + ids: (string, required) - 配送类型id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有供应商 [GET /api/suppliers[?status=true&include=series]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
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
                        "email": "935661686@qq.com",
                        "remark": "备注",
                        "is_scan": true,
                        "status": true,
                        "auto_valuation": true,
                        "created_at": "2018-09-18 14:02:46",
                        "updated_at": "2018-09-18 14:02:46"
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
    + is_scan: (boolean, optional) - 是否启用扫描
        + Default: 1
    + auto_valuation: (boolean, optional) - 是否采购自动计价
        + Default: 1
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + series[0][code]: (string, optional) - 系列代码
    + series[0][name]: (string, optional) - 系列名称
    + series[0][description]: (string, optional) - 系列描述
    + series[0][remark]: (string, optional) - 备注
    + series[0][status]: (boolean, optional) - 状态
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
                "email": "935661686@qq.com",
                "remark": "备注",
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
                "created_at": "2018-09-18 14:02:46",
                "updated_at": "2018-09-18 14:02:46",
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
                "email": "935661686@qq.com",
                "remark": "备注",
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
                "created_at": "2018-09-18 14:02:46",
                "updated_at": "2018-09-18 14:02:46"
            }

## 修改供应商 [PATCH /api/suppliers/:id]


+ Parameters
    + name: (string, optional) - 供应商名称
    + company: (string, optional) - 供应商公司
    + code: (string, optional) - 公司代码
    + province: (string, optional) - 省
    + city: (string, optional) - 市
    + district: (string, optional) - 区
    + address: (string, optional) - 地址
    + zipcode: (string, optional) - 邮编
    + phone: (string, optional) - 电话
    + mobile: (string, optional) - 手机
    + fax: (string, optional) - 传真
    + email: (string, optional) - 邮箱
    + remark: (string, optional) - 备注
    + is_scan: (boolean, optional) - 是否启用扫描
        + Default: 
    + auto_valuation: (boolean, optional) - 是否采购自动计价
        + Default: 1
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 
    + series[0][id]: (string, optional) - 系列id
    + series[0][code]: (string, optional) - 系列代码
    + series[0][name]: (string, optional) - 系列名称
    + series[0][description]: (string, optional) - 系列描述
    + series[0][remark]: (string, optional) - 备注
    + series[0][status]: (boolean, optional) - 状态
        + Default: 

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
                "email": "935661686@qq.com",
                "remark": "备注",
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
                "created_at": "2018-09-18 14:02:46",
                "updated_at": "2018-09-18 14:02:46"
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有店铺 [GET /api/shops[?status=true&include=warehouse,platform]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + include: (string, optional) - 加载关联的数据

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
                            "is_default": true,
                            "status": true,
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
                            "status": true,
                            "created_at": "2018-07-05 10:49:30",
                            "updated_at": "2018-07-05 10:49:30"
                        },
                        "is_waybill": true,
                        "status": true,
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
    + is_waybill: (boolean, optional) - 电子面单
        + Default: 1
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                    "is_default": true,
                    "status": true,
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
                    "status": true,
                    "created_at": "2018-07-05 10:49:30",
                    "updated_at": "2018-07-05 10:49:30"
                },
                "is_waybill": true,
                "status": true,
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
                    "is_default": false,
                    "status": true,
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
                    "status": true,
                    "created_at": "2018-07-04 12:54:52",
                    "updated_at": "2018-07-04 12:54:55"
                },
                "is_waybill": true,
                "status": true,
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
                    "is_default": true,
                    "status": true,
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
                    "status": true,
                    "created_at": "2018-07-05 10:49:30",
                    "updated_at": "2018-07-05 10:49:30"
                },
                "is_waybill": true,
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有系列 [GET /api/series[?status=true&include=suppliers]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + include: (string, optional) - 加载关联的数据

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
                            "is_scan": true,
                            "status": true,
                            "auto_valuation": true,
                            "created_at": "2018-07-04 11:11:39",
                            "updated_at": "2018-07-04 11:22:29"
                        },
                        "code": "系列代码",
                        "name": "系列名称",
                        "description": "系列描述",
                        "remark": "备注",
                        "status": true,
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
                            "is_scan": true,
                            "status": true,
                            "auto_valuation": true,
                            "created_at": "2018-07-04 11:11:39",
                            "updated_at": "2018-07-04 11:22:29"
                        },
                        "code": "系列代码2",
                        "name": "系列名称",
                        "description": "系列描述",
                        "remark": "备注",
                        "status": true,
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
                    "is_scan": true,
                    "status": true,
                    "auto_valuation": true,
                    "created_at": "2018-07-04 11:11:39",
                    "updated_at": "2018-07-04 11:22:29"
                },
                "code": "系列代码",
                "name": "系列名称",
                "description": "系列描述",
                "remark": "备注",
                "status": true,
                "created_at": "2018-07-04 14:03:49",
                "updated_at": "2018-07-04 14:03:49"
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

# printreports [/api]
打印报表资源

## 获取所有打印报表 [GET /api/printreports{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
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
                        "status": true,
                        "created_at": "2018-07-03 17:50:46",
                        "updated_at": "2018-07-03 17:50:49"
                    },
                    {
                        "id": 2,
                        "file": "报表文件",
                        "name": "报表名称",
                        "paper_format": "报表格式",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "平台名称1",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
    + status: (boolean, optional) - 获取的状态
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
                        "is_verify": true,
                        "status": true,
                        "created_at": "2018-07-05 17:37:17",
                        "updated_at": "2018-07-05 17:37:17"
                    },
                    {
                        "id": 2,
                        "dept_no": "部门代码1",
                        "name": "部门名称",
                        "p_dept": 1,
                        "remark": "备注",
                        "is_verify": true,
                        "status": true,
                        "created_at": "2018-07-05 17:39:24",
                        "updated_at": "2018-07-05 17:39:24"
                    },
                    {
                        "id": 3,
                        "dept_no": "部门代码3",
                        "name": "部门名称3",
                        "p_dept": 0,
                        "remark": "备注",
                        "is_verify": true,
                        "status": true,
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
    + is_verify: (boolean, optional) - 是否已经验证
        + Default: 0
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "is_verify": true,
                "status": true,
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
                "is_verify": true,
                "status": true,
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
                "is_verify": true,
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# products [/api]
产品资源

## 获取所有产品 [GET /api/products/search{?commodity_code}[?include=productComponents,shop,supplier,goodsCategory,combinations.productComponents]]


+ Parameters
    + commodity_code: (string, optional) - 产品编码
        + Default: all
    + shops_id: (integer, optional) - 店铺id
        + Default: all
    + component_code: (string, optional) - 子件编码
        + Default: all

## 获取所有产品 [GET /api/products[?status=true&include=productComponents,shop,supplier,goodsCategory,combinations.productComponents]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 24,
                        "commodity_code": "产品编码",
                        "jd_sn": "京东编码",
                        "vips_sn": "唯品会编码",
                        "factory_model": "工厂型号",
                        "short_name": "商品简称",
                        "shops_id": "1",
                        "shop_nick": "卖家昵称",
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
                            "is_scan": true,
                            "status": true,
                            "auto_valuation": true,
                            "created_at": "2018-08-06 16:27:02",
                            "updated_at": "2018-08-06 16:27:02"
                        },
                        "category": {
                            "id": 1,
                            "code": "商品类别代码",
                            "name": "商品类别名",
                            "description": "详情",
                            "remark": "备注",
                            "status": true,
                            "created_at": "2018-08-06 16:30:02",
                            "updated_at": "2018-08-06 16:30:02"
                        },
                        "remark": "备注",
                        "title": "商品标题",
                        "img": "http://bferp.test/#/basicInf/goodsMag",
                        "url": "http://bferp.test/#/basicInf/goodsMag",
                        "status": true,
                        "is_stop_pro": true,
                        "product_components": {
                            "data": [
                                {
                                    "id": 8,
                                    "pid": 24,
                                    "component_code": "子件编码1",
                                    "jd_component_code": "京东子件编码",
                                    "vips_component_code": "唯品会子件编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_common": true,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 10,
                                    "available_warning": 10,
                                    "distribution_method_id": 12,
                                    "bar_code": "1010",
                                    "img_url": "http://image.img.com/image",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "longness": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": true,
                                    "is_stop_pro": true,
                                    "created_at": "2018-08-13 11:55:43",
                                    "updated_at": "2018-08-13 11:55:43"
                                }
                            ]
                        },
                        "productComponents": {
                            "data": []
                        },
                        "created_at": "2018-08-13 11:55:43",
                        "updated_at": "2018-08-13 11:55:43"
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
                            "next": "http://127.0.0.1:8000/api/products?page=1"
                        }
                    }
                }
            }

## 新增产品 [POST /api/products]


+ Parameters
    + commodity_code: (string, required) - 产品编码
    + jd_sn: (string, optional) - 京东编码
    + vips_sn: (string, optional) - 唯品会编码
    + factory_model: (string, optional) - 工厂型号
    + short_name: (string, required) - 产品简称
    + shops_id: (integer, required) - 店铺id
    + shop_nick: (string, required) - 卖家昵称（店铺昵称）
    + supplier_id: (integer, required) - 供应商id
    + category_id: (integer, required) - 产品类别id
    + remark: (string, optional) - 备注
    + title: (string, required) - 产品标题
    + img: (string, optional) - 产品图片
    + url: (url, optional) - 产品网址
    + is_stop_pro: (boolean, optional) - 是否停产 默认 0 = 不停产  1 = 停产
        + Default: 
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + product_components[0][component_code]: (string, required) - 子件编码
    + product_components[0][jd_component_code]: (string, optional) - 京东子件编码
    + product_components[0][vips_component_code]: (string, optional) - 唯品会子件编码
    + product_components[0][tb_price]: (numeric, required) - 淘宝价格
    + product_components[0][cost]: (numeric, required) - 成本价格
    + product_components[0][price]: (numeric, required) - 售价
    + product_components[0][highest_price]: (numeric, required) - 最高售价
    + product_components[0][lowest_price]: (numeric, required) - 最低售价
    + product_components[0][warehouse_cost]: (numeric, optional) - 仓库成本
    + product_components[0][assembly_price]: (numeric, optional) - 装配价格
    + product_components[0][discount]: (numeric, optional) - 折扣
    + product_components[0][commission]: (numeric, optional) - 佣金点
    + product_components[0][is_common]: (boolean, required) - 是否通用子件
    + product_components[0][package_quantity]: (integer, optional) - 包件数量
    + product_components[0][package_costs]: (numeric, optional) - 打包费用
    + product_components[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + product_components[0][purchase_freight]: (numeric, optional) - 采购运费
    + product_components[0][inventory_warning]: (integer, required) - 库存预警(数量)
    + product_components[0][purchase_days_warning]: (integer, required) - 采购预警天数
    + product_components[0][available_warning]: (integer, required) - 可售数预警
    + product_components[0][distribution_method_id]: (integer, required) - 配送类别
    + product_components[0][bar_code]: (string, optional) - 条形码
    + product_components[0][img_url]: (url, optional) - 图片地址
    + product_components[0][spec]: (string, required) - 规格
    + product_components[0][color]: (string, optional) - 颜色
    + product_components[0][materials]: (string, optional) - 材质
    + product_components[0][function]: (string, optional) - 功能
    + product_components[0][special]: (string, optional) - 特殊
    + product_components[0][other]: (string, optional) - 其他
    + product_components[0][longness]: (numeric, optional) - 长度（mm）
    + product_components[0][width]: (numeric, optional) - 宽度（mm）
    + product_components[0][height]: (numeric, optional) - 高度（mm）
    + product_components[0][volume]: (numeric, optional) - 体积(m²)
    + product_components[0][weight]: (numeric, optional) - 重量
    + product_components[0][remark]: (string, optional) - 备注
    + product_components[0][finished_pro]: (integer, optional) - 是否成品 0 不是 1 是
    + product_components[0][is_stop_pro]: (boolean, optional) - 是否停产 0 不是 1 是

+ Request (application/json)
    + Body

            {
                "commodity_code": "产品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "产品简称",
                "shops_id": 1,
                "shop_nick": "卖家昵称",
                "supplier_id": 1,
                "category_id": 1,
                "remark": "备注",
                "title": "产品标题",
                "img": "产品图片",
                "url": "https://www.taobao.com/",
                "status": true,
                "nis_stop_proick": 1,
                "product_components[0][component_code]": "子件编码1",
                "product_components[0][jd_component_code]": "京东子件编码",
                "product_components[0][vips_component_code]": "唯品会子件编码",
                "product_components[0][tb_price]": "10",
                "product_components[0][highest_price]": "10",
                "product_components[0][price]": "10",
                "product_components[0][lowest_price]": "10",
                "product_components[0][warehouse_cost]": "10",
                "product_components[0][assembly_price]": "10",
                "product_components[0][discount]": "1",
                "product_components[0][commission]": "1",
                "product_components[0][is_common]": true,
                "product_components[0][package_quantity]": "10",
                "product_components[0][package_costs]": "10",
                "product_components[0][wooden_frame_costs]": "10",
                "product_components[0][purchase_freight]": "10",
                "product_components[0][inventory_warning]": "10",
                "product_components[0][purchase_days_warning]": "10",
                "product_components[0][available_warning]": "10",
                "product_components[0][distribution_method_id]": "1",
                "product_components[0][bar_code]": "条形码",
                "product_components[0][img_url]": "http://image.img.com/image",
                "product_components[0][spec]": "规格",
                "product_components[0][color]": "颜色",
                "product_components[0][materials]": "材质",
                "product_components[0][function]": "功能",
                "product_components[0][special]": "特殊",
                "product_components[0][other]": "其他",
                "product_components[0][longness]": "10",
                "product_components[0][width]": "10",
                "product_components[0][height]": "10",
                "product_components[0][volume]": "10",
                "product_components[0][weight]": "10",
                "product_components[0][remark]": "备注",
                "product_components[0][finished_pro]": true,
                "product_components[0][is_stop_pro]": false
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "url": [
                        "产品网址必须有效的url"
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
                "id": 24,
                "commodity_code": "产品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "shops_id": "1",
                "shop_nick": "卖家昵称",
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
                    "is_scan": true,
                    "status": true,
                    "auto_valuation": true,
                    "created_at": "2018-08-06 16:27:02",
                    "updated_at": "2018-08-06 16:27:02"
                },
                "category": {
                    "id": 1,
                    "code": "商品类别代码",
                    "name": "商品类别名",
                    "description": "详情",
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-06 16:30:02",
                    "updated_at": "2018-08-06 16:30:02"
                },
                "remark": "备注",
                "title": "商品标题",
                "img": "http://bferp.test/#/basicInf/goodsMag",
                "url": "http://bferp.test/#/basicInf/goodsMag",
                "status": true,
                "is_stop_pro": true,
                "product_components": {
                    "data": [
                        {
                            "id": 8,
                            "pid": 24,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        }
                    ]
                },
                "productComponents": {
                    "data": []
                },
                "created_at": "2018-08-13 11:55:43",
                "updated_at": "2018-08-13 11:55:43",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条产品 [GET /api/products/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 24,
                "commodity_code": "产品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "shops_id": "1",
                "shop_nick": "卖家昵称",
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
                    "is_scan": true,
                    "status": true,
                    "auto_valuation": true,
                    "created_at": "2018-08-06 16:27:02",
                    "updated_at": "2018-08-06 16:27:02"
                },
                "category": {
                    "id": 1,
                    "code": "商品类别代码",
                    "name": "商品类别名",
                    "description": "详情",
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-06 16:30:02",
                    "updated_at": "2018-08-06 16:30:02"
                },
                "remark": "备注",
                "title": "商品标题",
                "img": "http://bferp.test/#/basicInf/goodsMag",
                "url": "http://bferp.test/#/basicInf/goodsMag",
                "status": true,
                "is_stop_pro": true,
                "product_components": {
                    "data": [
                        {
                            "id": 8,
                            "pid": 24,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        }
                    ]
                },
                "productComponents": {
                    "data": []
                },
                "created_at": "2018-08-13 11:55:43",
                "updated_at": "2018-08-13 11:55:43"
            }

## 修改产品 [PATCH /api/products/:id]


+ Parameters
    + commodity_code: (string, optional) - 产品编码
    + jd_sn: (string, optional) - 京东编码
    + vips_sn: (string, optional) - 唯品会编码
    + factory_model: (string, optional) - 工厂型号
    + short_name: (string, optional) - 产品简称
    + shops_id: (integer, optional) - 店铺id
    + shop_nick: (string, optional) - 卖家昵称（店铺昵称）
    + supplier_id: (integer, optional) - 供应商id
    + category_id: (integer, optional) - 产品类别id
    + remark: (string, optional) - 备注
    + title: (string, optional) - 产品标题
    + img: (string, optional) - 产品图片
    + url: (url, optional) - 产品网址
    + is_stop_pro: (boolean, optional) - 是否停产 默认 0 = 不停产  1 = 停产
        + Default: 
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 
    + product_components[0][component_code]: (string, optional) - 子件编码
    + product_components[0][jd_component_code]: (string, optional) - 京东子件编码
    + product_components[0][vips_component_code]: (string, optional) - 唯品会子件编码
    + product_components[0][tb_price]: (numeric, optional) - 淘宝价格
    + product_components[0][cost]: (numeric, optional) - 成本价格
    + product_components[0][price]: (numeric, optional) - 售价
    + product_components[0][highest_price]: (numeric, optional) - 最高售价
    + product_components[0][lowest_price]: (numeric, optional) - 最低售价
    + product_components[0][warehouse_cost]: (numeric, optional) - 仓库成本
    + product_components[0][assembly_price]: (numeric, optional) - 装配价格
    + product_components[0][discount]: (numeric, optional) - 折扣
    + product_components[0][commission]: (numeric, optional) - 佣金点
    + product_components[0][is_common]: (boolean, optional) - 是否通用子件
    + product_components[0][package_quantity]: (integer, optional) - 包件数量
    + product_components[0][package_costs]: (numeric, optional) - 打包费用
    + product_components[0][wooden_frame_costs]: (numeric, optional) - 木架费
    + product_components[0][purchase_freight]: (numeric, optional) - 采购运费
    + product_components[0][inventory_warning]: (integer, optional) - 库存预警(数量)
    + product_components[0][purchase_days_warning]: (integer, optional) - 采购预警天数
    + product_components[0][available_warning]: (integer, optional) - 可售数预警
    + product_components[0][distribution_method_id]: (integer, optional) - 配送类别
    + product_components[0][bar_code]: (string, optional) - 条形码
    + product_components[0][img_url]: (url, optional) - 图片地址
    + product_components[0][spec]: (string, optional) - 规格
    + product_components[0][color]: (string, optional) - 颜色
    + product_components[0][materials]: (string, optional) - 材质
    + product_components[0][function]: (string, optional) - 功能
    + product_components[0][special]: (string, optional) - 特殊
    + product_components[0][other]: (string, optional) - 其他
    + product_components[0][longness]: (numeric, optional) - 长度（mm）
    + product_components[0][width]: (numeric, optional) - 宽度（mm）
    + product_components[0][height]: (numeric, optional) - 高度（mm）
    + product_components[0][volume]: (numeric, optional) - 体积(m²)
    + product_components[0][weight]: (numeric, optional) - 重量
    + product_components[0][remark]: (string, optional) - 备注
    + product_components[0][finished_pro]: (integer, optional) - 是否成品 0 不是 1 是
    + product_components[0][is_stop_pro]: (boolean, optional) - 是否停产 0 不是 1 是

+ Request (application/json)
    + Body

            {
                "commodity_code": "产品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "产品简称",
                "shops_id": "店铺id",
                "shop_nick": "卖家昵称",
                "supplier_id": 1,
                "category_id": 1,
                "remark": "备注",
                "title": "产品标题",
                "img": "产品图片",
                "url": "https://www.taobao.com/",
                "status": true,
                "nis_stop_proick": 1,
                "product_components[0][id]": "2",
                "product_components[0][spec_code]": "子件编码",
                "product_components[0][jd_specs_code]": "京东子件编码",
                "product_components[0][vips_specs_code]": "唯品会子件编码",
                "product_components[0][tb_price]": "10",
                "product_components[0][highest_price]": "10",
                "product_components[0][price]": "10",
                "product_components[0][lowest_price]": "10",
                "product_components[0][warehouse_cost]": "10",
                "product_components[0][assembly_price]": "10",
                "product_components[0][discount]": "1",
                "product_components[0][commission]": "1",
                "product_components[0][is_common]": true,
                "product_components[0][package_quantity]": "10",
                "product_components[0][package_costs]": "10",
                "product_components[0][wooden_frame_costs]": "10",
                "product_components[0][purchase_freight]": "10",
                "product_components[0][inventory_warning]": "10",
                "product_components[0][purchase_days_warning]": "10",
                "product_components[0][available_warning]": "10",
                "product_components[0][distribution_method_id]": "1",
                "product_components[0][bar_code]": "条形码",
                "product_components[0][img_url]": "http://image.img.com/image",
                "product_components[0][spec]": "规格",
                "product_components[0][color]": "颜色",
                "product_components[0][materials]": "材质",
                "product_components[0][function]": "功能",
                "product_components[0][special]": "特殊",
                "product_components[0][other]": "其他",
                "product_components[0][longness]": "10",
                "product_components[0][width]": "10",
                "product_components[0][height]": "10",
                "product_components[0][volume]": "10",
                "product_components[0][weight]": "10",
                "product_components[0][remark]": "备注",
                "product_components[0][finished_pro]": true,
                "product_components[0][is_stop_pro]": false
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
                        "产品网址必须有效的url"
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
                "id": 24,
                "commodity_code": "产品编码",
                "jd_sn": "京东编码",
                "vips_sn": "唯品会编码",
                "factory_model": "工厂型号",
                "short_name": "商品简称",
                "shops_id": "1",
                "shop_nick": "卖家昵称",
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
                    "is_scan": true,
                    "status": true,
                    "auto_valuation": true,
                    "created_at": "2018-08-06 16:27:02",
                    "updated_at": "2018-08-06 16:27:02"
                },
                "category": {
                    "id": 1,
                    "code": "商品类别代码",
                    "name": "商品类别名",
                    "description": "详情",
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-06 16:30:02",
                    "updated_at": "2018-08-06 16:30:02"
                },
                "remark": "备注",
                "title": "商品标题",
                "img": "http://bferp.test/#/basicInf/goodsMag",
                "url": "http://bferp.test/#/basicInf/goodsMag",
                "status": true,
                "is_stop_pro": true,
                "product_components": [
                    {
                        "id": 8,
                        "pid": 24,
                        "component_code": "子件编码1",
                        "jd_component_code": "京东子件编码",
                        "vips_component_code": "唯品会子件编码",
                        "tb_price": "10.00",
                        "cost": "10.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_common": true,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 10,
                        "available_warning": 10,
                        "distribution_method_id": 12,
                        "bar_code": "1010",
                        "img_url": "http://image.img.com/image",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "longness": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": true,
                        "is_stop_pro": true,
                        "created_at": "2018-08-13 11:55:43",
                        "updated_at": "2018-08-13 11:55:43"
                    }
                ],
                "combinations": [],
                "created_at": "2018-08-13 11:55:43",
                "updated_at": "2018-08-13 11:55:43"
            }

## 删除产品 [DELETE /api/products/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组产品 [DELETE /api/products]


+ Parameters
    + ids: (string, required) - 产品id组 格式: 1,2,3,4 

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

## 更改一组产品状态 [PUT /api/products/editstatus]


+ Parameters
    + ids: (string, required) - 产品id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# productcomponents [/api]
产品子件资源

## 获取所有产品子件 [GET /api/productcomponents[?is_common=true&except_id=&component_code=&include=product,distributionMethod]]


+ Parameters
    + is_common: (integer, optional) - 是否通用子件
        + Default: all
    + except_id: (integer, optional) - 排除的id
        + Default: all
    + component_code: (string, optional) - 子件编码
        + Default: all
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 7,
                        "product": {
                            "id": 23,
                            "commodity_code": "产品编码",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "shops_id": "1",
                            "shop_nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "http://bferp.test/#/basicInf/goodsMag",
                            "url": "http://bferp.test/#/basicInf/goodsMag",
                            "status": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:05:18",
                            "updated_at": "2018-08-13 11:05:18"
                        },
                        "component_code": "子件编码3",
                        "jd_component_code": "京东子件编码",
                        "vips_component_code": "唯品会子件编码",
                        "tb_price": "10.00",
                        "cost": "10.00",
                        "price": "10.00",
                        "highest_price": "10.00",
                        "lowest_price": "10.00",
                        "warehouse_cost": "10.00",
                        "assembly_price": "10.00",
                        "discount": "1.00",
                        "commission": "1.00",
                        "is_common": true,
                        "package_quantity": 10,
                        "package_costs": "10.00",
                        "wooden_frame_costs": "10.00",
                        "purchase_freight": "10.00",
                        "inventory_warning": 10,
                        "purchase_days_warning": 10,
                        "available_warning": 10,
                        "distribution_method": {
                            "id": 12,
                            "name": "配送方式1",
                            "status": true,
                            "created_at": "2018-08-06 18:28:10",
                            "updated_at": "2018-08-06 18:28:10"
                        },
                        "bar_code": "1010",
                        "img_url": "http://image.img.com/image",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质",
                        "function": "功能",
                        "special": "特殊",
                        "other": "其他",
                        "longness": 10,
                        "width": 10,
                        "height": 10,
                        "volume": 10,
                        "weight": 10,
                        "remark": "备注",
                        "finished_pro": true,
                        "is_stop_pro": true,
                        "created_at": "2018-08-13 11:05:18",
                        "updated_at": "2018-08-13 11:05:18"
                    }
                ]
            }

## 显示单条产品子件 [GET /api/productcomponents/:id]


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
                "product": {
                    "id": 23,
                    "commodity_code": "产品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "shops_id": "1",
                    "shop_nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "http://bferp.test/#/basicInf/goodsMag",
                    "url": "http://bferp.test/#/basicInf/goodsMag",
                    "status": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-13 11:05:18",
                    "updated_at": "2018-08-13 11:05:18"
                },
                "component_code": "子件编码3",
                "jd_component_code": "京东子件编码",
                "vips_component_code": "唯品会子件编码",
                "tb_price": "10.00",
                "cost": "10.00",
                "price": "10.00",
                "highest_price": "10.00",
                "lowest_price": "10.00",
                "warehouse_cost": "10.00",
                "assembly_price": "10.00",
                "discount": "1.00",
                "commission": "1.00",
                "is_common": true,
                "package_quantity": 10,
                "package_costs": "10.00",
                "wooden_frame_costs": "10.00",
                "purchase_freight": "10.00",
                "inventory_warning": 10,
                "purchase_days_warning": 10,
                "available_warning": 10,
                "distribution_method": {
                    "id": 12,
                    "name": "配送方式1",
                    "status": true,
                    "created_at": "2018-08-06 18:28:10",
                    "updated_at": "2018-08-06 18:28:10"
                },
                "bar_code": "1010",
                "img_url": "http://image.img.com/image",
                "spec": "规格",
                "color": "颜色",
                "materials": "材质",
                "function": "功能",
                "special": "特殊",
                "other": "其他",
                "longness": 10,
                "width": 10,
                "height": 10,
                "volume": 10,
                "weight": 10,
                "remark": "备注",
                "finished_pro": true,
                "is_stop_pro": true,
                "created_at": "2018-08-13 11:05:18",
                "updated_at": "2018-08-13 11:05:18"
            }

## 删除产品子件 [DELETE /api/productcomponents/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组产品子件 [DELETE /api/productcomponents]


+ Parameters
    + ids: (string, required) - 产品子件id组 格式: 1,2,3,4 

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

# combinations [/api]
组合资源

## 获取所有组合 [GET /api/combinations[?include=productComponents,product,orderItems]]


+ Parameters
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": {
                    "id": 16,
                    "product": {
                        "id": 1,
                        "commodity_code": "产品编码",
                        "jd_sn": "京东编码",
                        "vips_sn": "唯品会编码",
                        "factory_model": "工厂型号",
                        "short_name": "商品简称",
                        "shops_id": "1",
                        "shop_nick": "卖家昵称",
                        "supplier_id": 1,
                        "category_id": 1,
                        "remark": "备注",
                        "title": "商品标题",
                        "img": "http://bferp.test/#/basicInf/goodsMag",
                        "url": "http://bferp.test/#/basicInf/goodsMag",
                        "status": true,
                        "is_stop_pro": true,
                        "created_at": "2018-08-10 23:58:40",
                        "updated_at": "2018-08-10 23:58:40"
                    },
                    "name": "skuName",
                    "product_components": {
                        "data": [
                            {
                                "id": 1,
                                "pid": 2,
                                "component_code": "子件编码1",
                                "jd_component_code": "京东子件编码",
                                "vips_component_code": "唯品会子件编码",
                                "tb_price": "10.00",
                                "cost": "10.00",
                                "price": "10.00",
                                "highest_price": "10.00",
                                "lowest_price": "10.00",
                                "warehouse_cost": "10.00",
                                "assembly_price": "10.00",
                                "discount": "1.00",
                                "commission": "1.00",
                                "is_common": true,
                                "package_quantity": 10,
                                "package_costs": "10.00",
                                "wooden_frame_costs": "10.00",
                                "purchase_freight": "10.00",
                                "inventory_warning": 10,
                                "purchase_days_warning": 10,
                                "available_warning": 10,
                                "distribution_method_id": 1,
                                "bar_code": "1010",
                                "img_url": "http://image.img.com/image",
                                "spec": "规格",
                                "color": "颜色",
                                "materials": "材质",
                                "function": "功能",
                                "special": "特殊",
                                "other": "其他",
                                "longness": 10,
                                "width": 10,
                                "height": 10,
                                "volume": 10,
                                "weight": 10,
                                "remark": "备注",
                                "finished_pro": true,
                                "is_stop_pro": true,
                                "created_at": "2018-08-11 01:02:47",
                                "updated_at": "2018-08-11 01:02:47",
                                "pivot": {
                                    "combinations_id": 16,
                                    "product_components_id": 1
                                }
                            },
                            {
                                "id": 2,
                                "pid": 3,
                                "component_code": "子件编码2",
                                "jd_component_code": "京东子件编码",
                                "vips_component_code": "唯品会子件编码",
                                "tb_price": "10.00",
                                "cost": "10.00",
                                "price": "10.00",
                                "highest_price": "10.00",
                                "lowest_price": "10.00",
                                "warehouse_cost": "10.00",
                                "assembly_price": "10.00",
                                "discount": "1.00",
                                "commission": "1.00",
                                "is_common": true,
                                "package_quantity": 10,
                                "package_costs": "10.00",
                                "wooden_frame_costs": "10.00",
                                "purchase_freight": "10.00",
                                "inventory_warning": 10,
                                "purchase_days_warning": 10,
                                "available_warning": 10,
                                "distribution_method_id": 1,
                                "bar_code": "1010",
                                "img_url": "http://image.img.com/image",
                                "spec": "规格",
                                "color": "颜色",
                                "materials": "材质",
                                "function": "功能",
                                "special": "特殊",
                                "other": "其他",
                                "longness": 10,
                                "width": 10,
                                "height": 10,
                                "volume": 10,
                                "weight": 10,
                                "remark": "备注",
                                "finished_pro": true,
                                "is_stop_pro": true,
                                "created_at": "2018-08-11 01:06:24",
                                "updated_at": "2018-08-11 01:06:24",
                                "pivot": {
                                    "combinations_id": 16,
                                    "product_components_id": 2
                                }
                            }
                        ]
                    },
                    "created_at": "2018-08-11 14:33:48",
                    "updated_at": "2018-08-11 14:33:48"
                },
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
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

## 新增组合 [POST /api/combinations]


+ Parameters
    + pid: (integer, required) - 产品id
    + name: (string, required) - 组合名称(sku)
    + product_components[0]: (integer, optional) - 子件id

+ Request (application/json)
    + Body

            {
                "pid": 23,
                "name": "skuName",
                "product_components[0]": 7
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "pid": [
                        "产品id必须是int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 6,
                "product": {
                    "id": 23,
                    "commodity_code": "产品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "shops_id": "1",
                    "shop_nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "http://bferp.test/#/basicInf/goodsMag",
                    "url": "http://bferp.test/#/basicInf/goodsMag",
                    "status": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-13 11:05:18",
                    "updated_at": "2018-08-13 11:05:18"
                },
                "name": "skuName",
                "product_components": {
                    "data": [
                        {
                            "id": 1,
                            "pid": 2,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:02:47",
                            "updated_at": "2018-08-11 01:02:47",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 1
                            }
                        },
                        {
                            "id": 2,
                            "pid": 3,
                            "component_code": "子件编码2",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:06:24",
                            "updated_at": "2018-08-11 01:06:24",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 2
                            }
                        }
                    ]
                },
                "created_at": "2018-08-13 11:46:04",
                "updated_at": "2018-08-13 11:46:04",
                "meta": {
                    "status_code": "201"
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
                "id": 6,
                "product": {
                    "id": 23,
                    "commodity_code": "产品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "shops_id": "1",
                    "shop_nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "http://bferp.test/#/basicInf/goodsMag",
                    "url": "http://bferp.test/#/basicInf/goodsMag",
                    "status": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-13 11:05:18",
                    "updated_at": "2018-08-13 11:05:18"
                },
                "name": "skuName",
                "product_components": {
                    "data": [
                        {
                            "id": 1,
                            "pid": 2,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:02:47",
                            "updated_at": "2018-08-11 01:02:47",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 1
                            }
                        },
                        {
                            "id": 2,
                            "pid": 3,
                            "component_code": "子件编码2",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:06:24",
                            "updated_at": "2018-08-11 01:06:24",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 2
                            }
                        }
                    ]
                },
                "created_at": "2018-08-13 11:46:04",
                "updated_at": "2018-08-13 11:46:04"
            }

## 修改组合 [PATCH /api/combinations/:id]


+ Parameters
    + pid: (integer, optional) - 产品id
    + name: (string, optional) - 组合名称(sku)
    + product_components[0]: (integer, optional) - 子件id

+ Request (application/json)
    + Body

            {
                "pid": "1",
                "name": "skuName",
                "product_components[0]": "1"
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
                    "product_components": [
                        "子件id集合必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 16,
                "product": {
                    "id": 1,
                    "commodity_code": "产品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "shops_id": "1",
                    "shop_nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "http://bferp.test/#/basicInf/goodsMag",
                    "url": "http://bferp.test/#/basicInf/goodsMag",
                    "status": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-10 23:58:40",
                    "updated_at": "2018-08-10 23:58:40"
                },
                "name": "skuName",
                "product_components": {
                    "data": [
                        {
                            "id": 1,
                            "pid": 2,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:02:47",
                            "updated_at": "2018-08-11 01:02:47",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 1
                            }
                        },
                        {
                            "id": 2,
                            "pid": 3,
                            "component_code": "子件编码2",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 1,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-11 01:06:24",
                            "updated_at": "2018-08-11 01:06:24",
                            "pivot": {
                                "combinations_id": 16,
                                "product_components_id": 2
                            }
                        }
                    ]
                },
                "created_at": "2018-08-11 14:33:48",
                "updated_at": "2018-08-11 14:33:48"
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

## 获取所有库存 [GET /api/stocks[?status=true&include=warehouse,product,productComponent]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + warehouse_id: (integer, optional) - 获取的仓库id
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 10,
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-06 16:25:28"
                        },
                        "product": {
                            "id": 24,
                            "commodity_code": "产品编码",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "shops_id": "1",
                            "shop_nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
                            "url": "http://bferp.test/#/basicInf/goodsMag",
                            "status": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        },
                        "product_component": {
                            "id": 8,
                            "pid": 24,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        },
                        "quantity": 2,
                        "status": true,
                        "created_at": "2018-08-13 16:39:04",
                        "updated_at": "2018-08-13 16:39:04"
                    },
                    {
                        "id": 11,
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-06 16:25:28"
                        },
                        "product": {
                            "id": 25,
                            "commodity_code": "产品编码1",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "shops_id": "1",
                            "shop_nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "http://bferp.test/#/basicInf/goodsMag",
                            "url": "http://bferp.test/#/basicInf/goodsMag",
                            "status": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 15:36:27",
                            "updated_at": "2018-08-13 15:36:27"
                        },
                        "product_component": {
                            "id": 9,
                            "pid": 25,
                            "component_code": "子件编码2",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 15:36:27",
                            "updated_at": "2018-08-13 15:36:27"
                        },
                        "quantity": 2,
                        "status": true,
                        "created_at": "2018-08-13 16:39:04",
                        "updated_at": "2018-08-13 16:39:04"
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
    + stocks[0][products_id]: (integer, required) - 产品id
    + stocks[0][product_components_id]: (integer, required) - 子件id
    + stocks[0][quantity]: (integer, required) - 库存数
    + stocks[0][status]: (integer, required) - 状态(0:停用，1:启用)

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "product_components_id": [
                        "产品id必须int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 10,
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-06 16:25:28"
                        },
                        "product": {
                            "id": 24,
                            "commodity_code": "产品编码",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "shops_id": "1",
                            "shop_nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
                            "url": "http://bferp.test/#/basicInf/goodsMag",
                            "status": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        },
                        "product_component": {
                            "id": 8,
                            "pid": 24,
                            "component_code": "子件编码1",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 11:55:43",
                            "updated_at": "2018-08-13 11:55:43"
                        },
                        "quantity": 2,
                        "status": true,
                        "created_at": "2018-08-13 16:39:04",
                        "updated_at": "2018-08-13 16:39:04"
                    },
                    {
                        "id": 11,
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-06 16:25:28"
                        },
                        "product": {
                            "id": 25,
                            "commodity_code": "产品编码1",
                            "jd_sn": "京东编码",
                            "vips_sn": "唯品会编码",
                            "factory_model": "工厂型号",
                            "short_name": "商品简称",
                            "shops_id": "1",
                            "shop_nick": "卖家昵称",
                            "supplier_id": 1,
                            "category_id": 1,
                            "remark": "备注",
                            "title": "商品标题",
                            "img": "http://bferp.test/#/basicInf/goodsMag",
                            "url": "http://bferp.test/#/basicInf/goodsMag",
                            "status": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 15:36:27",
                            "updated_at": "2018-08-13 15:36:27"
                        },
                        "product_component": {
                            "id": 9,
                            "pid": 25,
                            "component_code": "子件编码2",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "http://image.img.com/image",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-13 15:36:27",
                            "updated_at": "2018-08-13 15:36:27"
                        },
                        "quantity": 2,
                        "status": true,
                        "created_at": "2018-08-13 16:39:04",
                        "updated_at": "2018-08-13 16:39:04"
                    }
                ]
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
                "id": 10,
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "仓库地（地址）",
                    "is_default": true,
                    "status": true,
                    "created_at": "2018-08-06 16:25:28",
                    "updated_at": "2018-08-06 16:25:28"
                },
                "product": {
                    "id": 24,
                    "commodity_code": "产品编码",
                    "jd_sn": "京东编码",
                    "vips_sn": "唯品会编码",
                    "factory_model": "工厂型号",
                    "short_name": "商品简称",
                    "shops_id": "1",
                    "shop_nick": "卖家昵称",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注",
                    "title": "商品标题",
                    "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
                    "url": "http://bferp.test/#/basicInf/goodsMag",
                    "status": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-13 11:55:43",
                    "updated_at": "2018-08-13 11:55:43"
                },
                "product_component": {
                    "id": 8,
                    "pid": 24,
                    "component_code": "子件编码1",
                    "jd_component_code": "京东子件编码",
                    "vips_component_code": "唯品会子件编码",
                    "tb_price": "10.00",
                    "cost": "10.00",
                    "price": "10.00",
                    "highest_price": "10.00",
                    "lowest_price": "10.00",
                    "warehouse_cost": "10.00",
                    "assembly_price": "10.00",
                    "discount": "1.00",
                    "commission": "1.00",
                    "is_common": true,
                    "package_quantity": 10,
                    "package_costs": "10.00",
                    "wooden_frame_costs": "10.00",
                    "purchase_freight": "10.00",
                    "inventory_warning": 10,
                    "purchase_days_warning": 10,
                    "available_warning": 10,
                    "distribution_method_id": 12,
                    "bar_code": "1010",
                    "img_url": "http://image.img.com/image",
                    "spec": "规格",
                    "color": "颜色",
                    "materials": "材质",
                    "function": "功能",
                    "special": "特殊",
                    "other": "其他",
                    "longness": 10,
                    "width": 10,
                    "height": 10,
                    "volume": 10,
                    "weight": 10,
                    "remark": "备注",
                    "finished_pro": true,
                    "is_stop_pro": true,
                    "created_at": "2018-08-13 11:55:43",
                    "updated_at": "2018-08-13 11:55:43"
                },
                "quantity": 2,
                "status": true,
                "created_at": "2018-08-13 16:39:04",
                "updated_at": "2018-08-13 16:39:04"
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
                        "pid": 25,
                        "product_components_id": 9,
                        "commodity_code": "产品编码1",
                        "short_name": "商品简称",
                        "component_code": "子件编码2",
                        "spec": "规格",
                        "color": "颜色",
                        "materials": "材质"
                    }
                ]
            }

# purchases [/api]
采购单资源

## 获取所有采购单 [GET /api/purchases[?status=true&include=user,purchaseLists,cancelPurchases]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + is_audit: (boolean, optional) - 是否审核
    + purchase_status: (string, optional) - 采购状态 状态分别是(new,section,finish)
        + Default: all
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 12,
                        "purchase_order_no": "PO2018081515073602909",
                        "purchase_status": "新建",
                        "order_no": "",
                        "user_id": 1,
                        "user": {
                            "id": 1,
                            "username": "admin",
                            "email": "admin@23.com",
                            "created_at": "2018-08-18 14:57:58",
                            "updated_at": "2018-08-18 14:58:03"
                        },
                        "print_at": null,
                        "receiver": "收货人3",
                        "receiver_address": "收货地址3",
                        "promise_ship_time": null,
                        "business_personnel": "",
                        "source": "",
                        "client_name": "",
                        "buyer_nick": "",
                        "order_address": "",
                        "is_submit": false,
                        "is_print": false,
                        "is_audit": false,
                        "is_change": false,
                        "remark": "备注5",
                        "status": true,
                        "purchase_lists": {
                            "data": [
                                {
                                    "id": 10,
                                    "purchases_id": 12,
                                    "combinations_id": 7,
                                    "remark": "备注",
                                    "created_at": "2018-08-15 15:07:36",
                                    "updated_at": "2018-08-15 15:07:36",
                                    "combinations": {
                                        "id": 7,
                                        "pid": 28,
                                        "name": "skuName1",
                                        "created_at": "2018-08-14 14:28:30",
                                        "updated_at": "2018-08-14 14:28:30"
                                    },
                                    "purchase_details": [
                                        {
                                            "id": 13,
                                            "purchase_lists_id": 10,
                                            "purchase_item_status": "新建",
                                            "product_components_id": 11,
                                            "purchase_quantity": 10,
                                            "stock_in_count": 0,
                                            "shops_id": 1,
                                            "suppliers_id": 1,
                                            "purchase_cost": "10.00",
                                            "purchase_freight": "10.00",
                                            "warehouse_cost": "10.00",
                                            "commission": "10.00",
                                            "discount": "10.00",
                                            "wooden_frame_costs": "1.00",
                                            "arrival_time": "2018-06-10 00:00:00",
                                            "remark": "备注10",
                                            "created_at": "2018-08-15 15:07:37",
                                            "updated_at": "2018-08-15 15:07:37",
                                            "product_component": {
                                                "id": 11,
                                                "pid": 29,
                                                "component_code": "子件编码4",
                                                "jd_component_code": "京东子件编码",
                                                "vips_component_code": "唯品会子件编码",
                                                "tb_price": "10.00",
                                                "cost": "10.00",
                                                "price": "10.00",
                                                "highest_price": "10.00",
                                                "lowest_price": "10.00",
                                                "warehouse_cost": "10.00",
                                                "assembly_price": "10.00",
                                                "discount": "1.00",
                                                "commission": "1.00",
                                                "is_common": true,
                                                "package_quantity": 10,
                                                "package_costs": "10.00",
                                                "wooden_frame_costs": "10.00",
                                                "purchase_freight": "10.00",
                                                "inventory_warning": 10,
                                                "purchase_days_warning": 10,
                                                "available_warning": 10,
                                                "distribution_method_id": 12,
                                                "bar_code": "1010",
                                                "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                                "spec": "规格",
                                                "color": "颜色",
                                                "materials": "材质",
                                                "function": "功能",
                                                "special": "特殊",
                                                "other": "其他",
                                                "longness": 10,
                                                "width": 10,
                                                "height": 10,
                                                "volume": 10,
                                                "weight": 10,
                                                "remark": "备注",
                                                "finished_pro": true,
                                                "is_stop_pro": true,
                                                "created_at": "2018-08-14 15:08:54",
                                                "updated_at": "2018-08-15 11:39:45"
                                            }
                                        }
                                    ]
                                }
                            ]
                        }
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
                            "next": "http://127.0.0.1:8000/api/purchases?page=1"
                        }
                    }
                }
            }

## 新增采购单 [POST /api/purchases]


+ Parameters
    + receiver: (string, required) - 收货人
    + receiver_address: (string, required) - 收货地址
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(false:停用,true:启用)
        + Default: 1
    + purchase_lists[0][combinations_id]: (integer, required) - 组合id
    + purchase_lists[0][remark]: (string, optional) - 备注
    + purchase_lists[0][purchase_details][0][product_components_id]: (integer, required) - 子件id
    + purchase_lists[0][purchase_details][0][purchase_quantity]: (integer, required) - 采购数
    + purchase_lists[0][purchase_details][0][shops_id]: (integer, required) - 采购店铺id
    + purchase_lists[0][purchase_details][0][suppliers_id]: (integer, required) - 供应商id
    + purchase_lists[0][purchase_details][0][purchase_cost]: (numeric, required) - 采购成本
    + purchase_lists[0][purchase_details][0][purchase_freight]: (numeric, required) - 采购运费
    + purchase_lists[0][purchase_details][0][warehouse_cost]: (numeric, required) - 仓库成本
    + purchase_lists[0][purchase_details][0][commission]: (numeric, optional) - 佣金点
    + purchase_lists[0][purchase_details][0][discount]: (numeric, optional) - 折扣
    + purchase_lists[0][purchase_details][0][wooden_frame_costs]: (numeric, optional) - 木架费
    + purchase_lists[0][purchase_details][0][arrival_time]: (dateTime, optional) - 到货时间
    + purchase_lists[0][purchase_details][0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "receiver": "收货人",
                    "receiver_address": "收货地址",
                    "remark": "备注",
                    "status": true,
                    "purchase_lists[0][combinations_id]": 9,
                    "purchase_lists[0][remark]": "备注",
                    "purchase_lists[0][purchase_details][0][product_components_id]": 11,
                    "purchase_lists[0][purchase_details][0][purchase_quantity]": 10,
                    "purchase_lists[0][purchase_details][0][shops_id]": 1,
                    "purchase_lists[0][purchase_details][0][suppliers_id]": 1,
                    "purchase_lists[0][purchase_details][0][purchase_cost]": 10,
                    "purchase_lists[0][purchase_details][0][purchase_freight]": 10,
                    "purchase_lists[0][purchase_details][0][warehouse_cost]": 10,
                    "purchase_lists[0][purchase_details][0][commission]": 10,
                    "purchase_lists[0][purchase_details][0][discount]": 10,
                    "purchase_lists[0][purchase_details][0][wooden_frame_costs]": 10,
                    "purchase_lists[0][purchase_details][0][arrival_time]": "2018-6-10 00:00:00",
                    "purchase_lists[0][purchase_details][0][remark]": "备注"
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
                "id": 12,
                "purchase_order_no": "PO2018081515073602909",
                "purchase_status": "新建",
                "order_no": "",
                "user_id": 1,
                "user": {
                    "id": 1,
                    "username": "admin",
                    "email": "admin@23.com",
                    "created_at": "2018-08-18 14:57:58",
                    "updated_at": "2018-08-18 14:58:03"
                },
                "print_at": null,
                "receiver": "收货人3",
                "receiver_address": "收货地址3",
                "promise_ship_time": null,
                "business_personnel": "",
                "source": "",
                "client_name": "",
                "buyer_nick": "",
                "order_address": "",
                "is_submit": false,
                "is_print": false,
                "is_audit": false,
                "is_change": false,
                "remark": "备注5",
                "status": true,
                "purchase_lists": {
                    "data": [
                        {
                            "id": 10,
                            "purchases_id": 12,
                            "combinations_id": 7,
                            "remark": "备注",
                            "created_at": "2018-08-15 15:07:36",
                            "updated_at": "2018-08-15 15:07:36",
                            "combinations": {
                                "id": 7,
                                "pid": 28,
                                "name": "skuName1",
                                "created_at": "2018-08-14 14:28:30",
                                "updated_at": "2018-08-14 14:28:30"
                            },
                            "purchase_details": [
                                {
                                    "id": 13,
                                    "purchase_lists_id": 10,
                                    "purchase_item_status": "新建",
                                    "product_components_id": 11,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "10.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "wooden_frame_costs": "1.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注10",
                                    "created_at": "2018-08-15 15:07:37",
                                    "updated_at": "2018-08-15 15:07:37",
                                    "product_component": {
                                        "id": 11,
                                        "pid": 29,
                                        "component_code": "子件编码4",
                                        "jd_component_code": "京东子件编码",
                                        "vips_component_code": "唯品会子件编码",
                                        "tb_price": "10.00",
                                        "cost": "10.00",
                                        "price": "10.00",
                                        "highest_price": "10.00",
                                        "lowest_price": "10.00",
                                        "warehouse_cost": "10.00",
                                        "assembly_price": "10.00",
                                        "discount": "1.00",
                                        "commission": "1.00",
                                        "is_common": true,
                                        "package_quantity": 10,
                                        "package_costs": "10.00",
                                        "wooden_frame_costs": "10.00",
                                        "purchase_freight": "10.00",
                                        "inventory_warning": 10,
                                        "purchase_days_warning": 10,
                                        "available_warning": 10,
                                        "distribution_method_id": 12,
                                        "bar_code": "1010",
                                        "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                        "spec": "规格",
                                        "color": "颜色",
                                        "materials": "材质",
                                        "function": "功能",
                                        "special": "特殊",
                                        "other": "其他",
                                        "longness": 10,
                                        "width": 10,
                                        "height": 10,
                                        "volume": 10,
                                        "weight": 10,
                                        "remark": "备注",
                                        "finished_pro": true,
                                        "is_stop_pro": true,
                                        "created_at": "2018-08-14 15:08:54",
                                        "updated_at": "2018-08-15 11:39:45"
                                    }
                                }
                            ]
                        }
                    ]
                },
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
                "id": 12,
                "purchase_order_no": "PO2018081515073602909",
                "purchase_status": "新建",
                "order_no": "",
                "user_id": 1,
                "user": {
                    "id": 1,
                    "username": "admin",
                    "email": "admin@23.com",
                    "created_at": "2018-08-18 14:57:58",
                    "updated_at": "2018-08-18 14:58:03"
                },
                "print_at": null,
                "receiver": "收货人3",
                "receiver_address": "收货地址3",
                "promise_ship_time": null,
                "business_personnel": "",
                "source": "",
                "client_name": "",
                "buyer_nick": "",
                "order_address": "",
                "is_submit": false,
                "is_print": false,
                "is_audit": false,
                "is_change": false,
                "remark": "备注5",
                "status": true,
                "purchase_lists": {
                    "data": [
                        {
                            "id": 10,
                            "purchases_id": 12,
                            "combinations_id": 7,
                            "remark": "备注",
                            "created_at": "2018-08-15 15:07:36",
                            "updated_at": "2018-08-15 15:07:36",
                            "combinations": {
                                "id": 7,
                                "pid": 28,
                                "name": "skuName1",
                                "created_at": "2018-08-14 14:28:30",
                                "updated_at": "2018-08-14 14:28:30"
                            },
                            "purchase_details": [
                                {
                                    "id": 13,
                                    "purchase_lists_id": 10,
                                    "purchase_item_status": "新建",
                                    "product_components_id": 11,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "10.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "wooden_frame_costs": "1.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注10",
                                    "created_at": "2018-08-15 15:07:37",
                                    "updated_at": "2018-08-15 15:07:37",
                                    "product_component": {
                                        "id": 11,
                                        "pid": 29,
                                        "component_code": "子件编码4",
                                        "jd_component_code": "京东子件编码",
                                        "vips_component_code": "唯品会子件编码",
                                        "tb_price": "10.00",
                                        "cost": "10.00",
                                        "price": "10.00",
                                        "highest_price": "10.00",
                                        "lowest_price": "10.00",
                                        "warehouse_cost": "10.00",
                                        "assembly_price": "10.00",
                                        "discount": "1.00",
                                        "commission": "1.00",
                                        "is_common": true,
                                        "package_quantity": 10,
                                        "package_costs": "10.00",
                                        "wooden_frame_costs": "10.00",
                                        "purchase_freight": "10.00",
                                        "inventory_warning": 10,
                                        "purchase_days_warning": 10,
                                        "available_warning": 10,
                                        "distribution_method_id": 12,
                                        "bar_code": "1010",
                                        "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                        "spec": "规格",
                                        "color": "颜色",
                                        "materials": "材质",
                                        "function": "功能",
                                        "special": "特殊",
                                        "other": "其他",
                                        "longness": 10,
                                        "width": 10,
                                        "height": 10,
                                        "volume": 10,
                                        "weight": 10,
                                        "remark": "备注",
                                        "finished_pro": true,
                                        "is_stop_pro": true,
                                        "created_at": "2018-08-14 15:08:54",
                                        "updated_at": "2018-08-15 11:39:45"
                                    }
                                }
                            ]
                        }
                    ]
                }
            }

## 修改采购单 [PATCH /api/purchases/:id]


+ Parameters
    + receiver: (string, optional) - 收货人
    + receiver_address: (string, optional) - 收货地址
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(false:停用,true:启用)
        + Default: 
    + purchase_lists[0][id]: (integer, optional) - 采购清单id
    + purchase_lists[0][combinations_id]: (integer, optional) - 组合id
    + purchase_lists[0][remark]: (string, optional) - 备注
    + purchase_lists[0][purchase_details][0][id]: (integer, optional) - 采购详情id
    + purchase_lists[0][purchase_details][0][product_components_id]: (integer, optional) - 子件id
    + purchase_lists[0][purchase_details][0][purchase_quantity]: (integer, optional) - 采购数
    + purchase_lists[0][purchase_details][0][shops_id]: (integer, optional) - 采购店铺id
    + purchase_lists[0][purchase_details][0][suppliers_id]: (integer, optional) - 供应商id
    + purchase_lists[0][purchase_details][0][purchase_cost]: (numeric, optional) - 采购成本
    + purchase_lists[0][purchase_details][0][purchase_freight]: (numeric, optional) - 采购运费
    + purchase_lists[0][purchase_details][0][warehouse_cost]: (numeric, optional) - 仓库成本
    + purchase_lists[0][purchase_details][0][commission]: (numeric, optional) - 佣金点
    + purchase_lists[0][purchase_details][0][discount]: (numeric, optional) - 折扣
    + purchase_lists[0][purchase_details][0][wooden_frame_costs]: (numeric, optional) - 木架费
    + purchase_lists[0][purchase_details][0][arrival_time]: (dateTime, optional) - 到货时间
    + purchase_lists[0][purchase_details][0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "receiver": "收货人",
                    "receiver_address": "收货地址",
                    "remark": "备注",
                    "status": true,
                    "purchase_lists[0][id]": 4,
                    "purchase_lists[0][combinations_id]": 9,
                    "purchase_lists[0][remark]": "备注",
                    "purchase_lists[0][purchase_details][0][id]": 5,
                    "purchase_lists[0][purchase_details][0][product_components_id]": 11,
                    "purchase_lists[0][purchase_details][0][purchase_quantity]": 10,
                    "purchase_lists[0][purchase_details][0][shops_id]": 1,
                    "purchase_lists[0][purchase_details][0][suppliers_id]": 1,
                    "purchase_lists[0][purchase_details][0][purchase_cost]": 10,
                    "purchase_lists[0][purchase_details][0][purchase_freight]": 10,
                    "purchase_lists[0][purchase_details][0][warehouse_cost]": 10,
                    "purchase_lists[0][purchase_details][0][commission]": 10,
                    "purchase_lists[0][purchase_details][0][discount]": 10,
                    "purchase_lists[0][purchase_details][0][wooden_frame_costs]": 10,
                    "purchase_lists[0][purchase_details][0][arrival_time]": "2018-6-10 00:00:00",
                    "purchase_lists[0][purchase_details][0][remark]": "备注"
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
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 12,
                "purchase_order_no": "PO2018081515073602909",
                "purchase_status": "新建",
                "order_no": "",
                "user_id": 1,
                "user": {
                    "id": 1,
                    "username": "admin",
                    "email": "admin@23.com",
                    "created_at": "2018-08-18 14:57:58",
                    "updated_at": "2018-08-18 14:58:03"
                },
                "print_at": null,
                "receiver": "收货人3",
                "receiver_address": "收货地址3",
                "promise_ship_time": null,
                "business_personnel": "",
                "source": "",
                "client_name": "",
                "buyer_nick": "",
                "order_address": "",
                "is_submit": false,
                "is_print": false,
                "is_audit": false,
                "is_change": false,
                "remark": "备注5",
                "status": true,
                "purchase_lists": {
                    "data": [
                        {
                            "id": 10,
                            "purchases_id": 12,
                            "combinations_id": 7,
                            "remark": "备注",
                            "created_at": "2018-08-15 15:07:36",
                            "updated_at": "2018-08-15 15:07:36",
                            "combinations": {
                                "id": 7,
                                "pid": 28,
                                "name": "skuName1",
                                "created_at": "2018-08-14 14:28:30",
                                "updated_at": "2018-08-14 14:28:30"
                            },
                            "purchase_details": [
                                {
                                    "id": 13,
                                    "purchase_lists_id": 10,
                                    "purchase_item_status": "新建",
                                    "product_components_id": 11,
                                    "purchase_quantity": 10,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "10.00",
                                    "purchase_freight": "10.00",
                                    "warehouse_cost": "10.00",
                                    "commission": "10.00",
                                    "discount": "10.00",
                                    "wooden_frame_costs": "1.00",
                                    "arrival_time": "2018-06-10 00:00:00",
                                    "remark": "备注10",
                                    "created_at": "2018-08-15 15:07:37",
                                    "updated_at": "2018-08-15 15:07:37",
                                    "product_component": {
                                        "id": 11,
                                        "pid": 29,
                                        "component_code": "子件编码4",
                                        "jd_component_code": "京东子件编码",
                                        "vips_component_code": "唯品会子件编码",
                                        "tb_price": "10.00",
                                        "cost": "10.00",
                                        "price": "10.00",
                                        "highest_price": "10.00",
                                        "lowest_price": "10.00",
                                        "warehouse_cost": "10.00",
                                        "assembly_price": "10.00",
                                        "discount": "1.00",
                                        "commission": "1.00",
                                        "is_common": true,
                                        "package_quantity": 10,
                                        "package_costs": "10.00",
                                        "wooden_frame_costs": "10.00",
                                        "purchase_freight": "10.00",
                                        "inventory_warning": 10,
                                        "purchase_days_warning": 10,
                                        "available_warning": 10,
                                        "distribution_method_id": 12,
                                        "bar_code": "1010",
                                        "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                        "spec": "规格",
                                        "color": "颜色",
                                        "materials": "材质",
                                        "function": "功能",
                                        "special": "特殊",
                                        "other": "其他",
                                        "longness": 10,
                                        "width": 10,
                                        "height": 10,
                                        "volume": 10,
                                        "weight": 10,
                                        "remark": "备注",
                                        "finished_pro": true,
                                        "is_stop_pro": true,
                                        "created_at": "2018-08-14 15:08:54",
                                        "updated_at": "2018-08-15 11:39:45"
                                    }
                                }
                            ]
                        }
                    ]
                }
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
    + status: (boolean, required) - 状态(0:停用,1:启用)

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
                "message": "无需重复提交",
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

## 审核 [PUT /api/purchases/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "审核出错，是否未提交或重复审核",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# purchaselists [/api]
采购清单资源

## 获取所有费用类型 [GET /api/purchaselists[?status=true&include=purchase,purchaseDetails.productComponent]]


+ Parameters
    + commodity_code: (string, optional) - 产品编码
    + is_audit: (string, optional) - 是否审核
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 16,
                        "purchases_id": 16,
                        "combinations_id": 7,
                        "remark": "",
                        "created_at": "2018-08-17 13:59:32",
                        "updated_at": "2018-08-17 13:59:32",
                        "purchase": {
                            "id": 16,
                            "purchase_order_no": "PO2018081713593264379",
                            "purchase_status": "新建",
                            "order_no": "",
                            "user_id": 1,
                            "print_at": null,
                            "receiver": "采购收:",
                            "receiver_address": "采购收货地址2:",
                            "promise_ship_time": null,
                            "business_personnel": "",
                            "source": "",
                            "client_name": "",
                            "buyer_nick": "",
                            "order_address": "",
                            "is_submit": false,
                            "is_print": false,
                            "is_audit": true,
                            "is_change": true,
                            "remark": "采购备注2:",
                            "status": true
                        },
                        "purchaseDetails": {
                            "data": [
                                {
                                    "id": 19,
                                    "purchase_lists_id": 16,
                                    "purchase_item_status": "新建",
                                    "product_components_id": 11,
                                    "purchase_quantity": 1,
                                    "stock_in_count": 0,
                                    "shops_id": 1,
                                    "suppliers_id": 1,
                                    "purchase_cost": "1.00",
                                    "purchase_freight": "2.00",
                                    "warehouse_cost": "2.00",
                                    "commission": "2.00",
                                    "discount": "2.00",
                                    "wooden_frame_costs": "2.00",
                                    "arrival_time": "2018-08-16 00:00:00",
                                    "remark": "1",
                                    "created_at": "2018-08-17 13:59:32",
                                    "updated_at": "2018-08-17 13:59:32",
                                    "productComponent": {
                                        "id": 11,
                                        "pid": 29,
                                        "component_code": "子件编码4",
                                        "jd_component_code": "京东子件编码",
                                        "vips_component_code": "唯品会子件编码",
                                        "tb_price": "10.00",
                                        "cost": "10.00",
                                        "price": "10.00",
                                        "highest_price": "10.00",
                                        "lowest_price": "10.00",
                                        "warehouse_cost": "10.00",
                                        "assembly_price": "10.00",
                                        "discount": "1.00",
                                        "commission": "1.00",
                                        "is_common": true,
                                        "package_quantity": 10,
                                        "package_costs": "10.00",
                                        "wooden_frame_costs": "10.00",
                                        "purchase_freight": "10.00",
                                        "inventory_warning": 10,
                                        "purchase_days_warning": 10,
                                        "available_warning": 10,
                                        "distribution_method_id": 12,
                                        "bar_code": "1010",
                                        "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                        "spec": "规格",
                                        "color": "颜色",
                                        "materials": "材质",
                                        "function": "功能",
                                        "special": "特殊",
                                        "other": "其他",
                                        "longness": 10,
                                        "width": 10,
                                        "height": 10,
                                        "volume": 10,
                                        "weight": 10,
                                        "remark": "备注",
                                        "finished_pro": true,
                                        "is_stop_pro": true,
                                        "created_at": "2018-08-14 15:08:54",
                                        "updated_at": "2018-08-15 11:39:45"
                                    }
                                }
                            ]
                        }
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 13,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 删除采购清单 [DELETE /api/purchaselists/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购清单 [DELETE /api/purchaselists]


+ Parameters
    + ids: (string, required) - 采购清单id组 格式: 1,2,3,4 

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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "入库类型",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "入库类型2",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 获取所有入库单 [GET /api/stockins[?status=true&include=warehouse,stockInType,stockInDetails]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + is_submit: (boolean, optional) - 是否提交
    + is_stock_in: (boolean, optional) - 是否入库
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "stock_in_no": "IS2018081513063587085",
                        "warehouse_id": 1,
                        "stock_in_types_id": 3,
                        "creator": 1,
                        "is_submit": true,
                        "submitter": 1,
                        "submit_at": "2018-08-15 14:14:09",
                        "is_print": true,
                        "print_at": "2018-08-15 14:17:29",
                        "is_audit": true,
                        "auditor": 1,
                        "audit_at": "2018-08-15 14:17:03",
                        "is_stock_in": true,
                        "warehouer": 1,
                        "stock_in_at": "2018-08-15 16:25:24",
                        "status": true,
                        "created_at": "2018-08-15 13:06:35",
                        "updated_at": "2018-08-15 16:25:24",
                        "warehouse": {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "仓库地（省）",
                            "city": "仓库地（市）",
                            "district": "仓库地（区）",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-06 16:25:28"
                        },
                        "stockInType": {
                            "id": 3,
                            "name": "入库方式1",
                            "status": true,
                            "created_at": "2018-08-06 18:27:19",
                            "updated_at": "2018-08-06 18:27:19"
                        },
                        "stockInDetails": {
                            "data": []
                        }
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
                            "next": "{{host}}/api/stockins?page=1"
                        }
                    }
                }
            }

## 新增入库单 [POST /api/stockins]


+ Parameters
    + warehouse_id: (integer, required) - 仓库id
    + stock_in_types_id: (integer, required) - 入库类型id
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + stock_in_details[0][purchase_details_id]: (integer, required) - 采购单详情id
    + stock_in_details[0][product_components_id]: (integer, required) - 子件id
    + stock_in_details[0][stock_in_quantity]: (integer, required) - 入库数量
    + stock_in_details[0][total_fee]: (number, required) - 总额
    + stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "status": true,
                    "stock_in_details[0][purchase_details_id]": 1,
                    "stock_in_details[0][product_components_id]": 1,
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
                "id": 1,
                "stock_in_no": "IS2018081513063587085",
                "warehouse_id": 1,
                "stock_in_types_id": 3,
                "creator": 1,
                "is_submit": true,
                "submitter": "admin",
                "submit_at": "2018-08-15 14:14:09",
                "is_print": true,
                "print_at": "2018-08-15 14:17:29",
                "is_audit": true,
                "auditor": "admin",
                "audit_at": "2018-08-15 14:17:03",
                "is_stock_in": true,
                "warehouer": "admin",
                "stock_in_at": "2018-08-15 16:25:24",
                "status": true,
                "created_at": "2018-08-15 13:06:35",
                "updated_at": "2018-08-15 16:25:24",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "仓库地（地址）",
                    "is_default": true,
                    "status": true,
                    "created_at": "2018-08-06 16:25:28",
                    "updated_at": "2018-08-06 16:25:28"
                },
                "stockInType": {
                    "id": 3,
                    "name": "入库方式1",
                    "status": true,
                    "created_at": "2018-08-06 18:27:19",
                    "updated_at": "2018-08-06 18:27:19"
                },
                "stockInDetails": {
                    "data": []
                },
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
                "id": 1,
                "stock_in_no": "IS2018081513063587085",
                "warehouse_id": 1,
                "stock_in_types_id": 3,
                "creator": 1,
                "is_submit": true,
                "submitter": "admin",
                "submit_at": "2018-08-15 14:14:09",
                "is_print": true,
                "print_at": "2018-08-15 14:17:29",
                "is_audit": true,
                "auditor": "admin",
                "audit_at": "2018-08-15 14:17:03",
                "is_stock_in": true,
                "warehouer": "admin",
                "stock_in_at": "2018-08-15 16:25:24",
                "status": true,
                "created_at": "2018-08-15 13:06:35",
                "updated_at": "2018-08-15 16:25:24",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "仓库地（地址）",
                    "is_default": true,
                    "status": true,
                    "created_at": "2018-08-06 16:25:28",
                    "updated_at": "2018-08-06 16:25:28"
                },
                "stockInType": {
                    "id": 3,
                    "name": "入库方式1",
                    "status": true,
                    "created_at": "2018-08-06 18:27:19",
                    "updated_at": "2018-08-06 18:27:19"
                },
                "stockInDetails": {
                    "data": []
                }
            }

## 修改入库单 [PATCH /api/stockins/:id]


+ Parameters
    + warehouse_id: (integer, optional) - 仓库id
    + stock_in_types_id: (integer, optional) - 入库类型id
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + stock_in_details[0][id]: (integer, optional) - 入库单详情id (存在则视为更新 不存在视为插入)
    + stock_in_details[0][purchase_details_id]: (integer, optional) - 采购单详情id
    + stock_in_details[0][product_components_id]: (integer, optional) - 子件id
    + stock_in_details[0][stock_in_quantity]: (integer, optional) - 入库数量
    + stock_in_details[0][total_fee]: (number, optional) - 总额
    + stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "status": true,
                    "stock_in_details[0][id]": 1,
                    "stock_in_details[0][purchase_details_id]": 1,
                    "stock_in_details[0][product_components_id]": 1,
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
                "id": 1,
                "stock_in_no": "IS2018081513063587085",
                "warehouse_id": 1,
                "stock_in_types_id": 3,
                "creator": 1,
                "is_submit": true,
                "submitter": "admin",
                "submit_at": "2018-08-15 14:14:09",
                "is_print": true,
                "print_at": "2018-08-15 14:17:29",
                "is_audit": true,
                "auditor": "admin",
                "audit_at": "2018-08-15 14:17:03",
                "is_stock_in": true,
                "warehouer": "admin",
                "stock_in_at": "2018-08-15 16:25:24",
                "status": true,
                "created_at": "2018-08-15 13:06:35",
                "updated_at": "2018-08-15 16:25:24",
                "warehouse": {
                    "id": 1,
                    "name": "仓库名称",
                    "province": "仓库地（省）",
                    "city": "仓库地（市）",
                    "district": "仓库地（区）",
                    "address": "仓库地（地址）",
                    "is_default": true,
                    "status": true,
                    "created_at": "2018-08-06 16:25:28",
                    "updated_at": "2018-08-06 16:25:28"
                },
                "stockInType": {
                    "id": 3,
                    "name": "入库方式1",
                    "status": true,
                    "created_at": "2018-08-06 18:27:19",
                    "updated_at": "2018-08-06 18:27:19"
                },
                "stockInDetails": {
                    "data": []
                }
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
                "message": "无需重复提交",
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

## 审核 [PUT /api/purchases/:id/audit]


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
入库单详情资源

## 获取所有入库单详情 [GET /api/stockindetails[?include=stockIn,productComponent,purchaseDetail]]


+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 5,
                        "stock_ins_id": 5,
                        "purchase_details_id": 19,
                        "product_components_id": 7,
                        "stock_in_quantity": 2,
                        "total_fee": "20.00",
                        "remark": "备注",
                        "created_at": "2018-08-15 16:43:36",
                        "updated_at": "2018-08-15 16:43:36",
                        "stockIn": {
                            "id": 5,
                            "stock_in_no": "IS2018081516433694713",
                            "warehouse_id": 1,
                            "stock_in_types_id": 3,
                            "creator": "admin",
                            "submitter": "admin",
                            "submit_at": "2018-08-15 16:44:24",
                            "print_at": "2018-08-15 16:44:51",
                            "is_print": true,
                            "auditor": "admin",
                            "audit_at": "2018-08-15 16:44:48",
                            "warehouer": "admin",
                            "stock_in_at": "2018-08-15 16:44:58",
                            "is_submit": true,
                            "is_audit": true,
                            "is_stock_in": true,
                            "status": true,
                            "created_at": "2018-08-15 16:43:36",
                            "updated_at": "2018-08-15 16:44:58"
                        },
                        "purchaseDetail": {
                            "id": 19,
                            "purchase_lists_id": 16,
                            "purchase_item_status": "新建",
                            "product_components_id": 11,
                            "purchase_quantity": 1,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "1.00",
                            "purchase_freight": "2.00",
                            "warehouse_cost": "2.00",
                            "commission": "2.00",
                            "discount": "2.00",
                            "wooden_frame_costs": "2.00",
                            "arrival_time": "2018-08-16 00:00:00",
                            "remark": "1",
                            "created_at": "2018-08-17 13:59:32",
                            "updated_at": "2018-08-17 13:59:32"
                        },
                        "productComponent": {
                            "id": 7,
                            "pid": 30,
                            "component_code": "子件编码5修改后",
                            "jd_component_code": "京东子件编码",
                            "vips_component_code": "唯品会子件编码",
                            "tb_price": "10.00",
                            "cost": "10.00",
                            "price": "10.00",
                            "highest_price": "10.00",
                            "lowest_price": "10.00",
                            "warehouse_cost": "10.00",
                            "assembly_price": "10.00",
                            "discount": "1.00",
                            "commission": "1.00",
                            "is_common": true,
                            "package_quantity": 10,
                            "package_costs": "10.00",
                            "wooden_frame_costs": "10.00",
                            "purchase_freight": "10.00",
                            "inventory_warning": 10,
                            "purchase_days_warning": 10,
                            "available_warning": 10,
                            "distribution_method_id": 12,
                            "bar_code": "1010",
                            "img_url": "/images/uploads/201808/14/1_1534242176_CH4LQO3qQo.jpg",
                            "spec": "规格",
                            "color": "颜色",
                            "materials": "材质",
                            "function": "功能",
                            "special": "特殊",
                            "other": "其他",
                            "longness": 10,
                            "width": 10,
                            "height": 10,
                            "volume": 10,
                            "weight": 10,
                            "remark": "备注",
                            "finished_pro": true,
                            "is_stop_pro": true,
                            "created_at": "2018-08-14 16:59:04",
                            "updated_at": "2018-08-14 18:23:15"
                        }
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

## 删除入库单详情 [DELETE /api/stockindetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组入库单详情 [DELETE /api/stockindetails]


+ Parameters
    + ids: (string, required) - 入库单详情id组 格式: 1,2,3,4 

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

# otherotherstockins [/api]
其他入库单资源

## 获取所有其他入库单 [GET /api/otherstockins[?status=true&include=warehouse,stockInType,stockInDetails,supplier,submitter,auditor,warehouer]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + is_submit: (boolean, optional) - 是否提交
    + is_stock_in: (boolean, optional) - 是否入库
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "stock_in_no": "IS2018091417222582919",
                        "external_sn": "外部单号",
                        "warehouse_id": 1,
                        "stock_in_types_id": 1,
                        "suppliers_id": 0,
                        "creator": 1,
                        "is_submit": false,
                        "submitter": 0,
                        "submit_at": null,
                        "is_print": false,
                        "print_at": null,
                        "is_audit": false,
                        "auditor": 0,
                        "audit_at": null,
                        "is_stock_in": false,
                        "warehouer": 0,
                        "stock_in_at": null,
                        "status": true,
                        "created_at": "2018-09-14 17:22:25",
                        "updated_at": "2018-09-14 17:22:25"
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
                            "next": "{{host}}/api/otherstockins?page=1"
                        }
                    }
                }
            }

## 新增其他入库单 [POST /api/otherstockins]


+ Parameters
    + external_sn: (string, optional) - 外部单号
    + warehouse_id: (integer, required) - 仓库id
    + suppliers_id: (integer, required) - 供应商id
    + stock_in_types_id: (integer, required) - 入库类型id
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1
    + other_stock_in_details[0][product_components_id]: (integer, required) - 子件id
    + other_stock_in_details[0][stock_in_quantity]: (integer, required) - 入库数量
    + other_stock_in_details[0][total_fee]: (number, required) - 总额
    + other_stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "external_sn": "RT2121212121212",
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "suppliers_id": 1,
                    "status": true,
                    "stock_in_details[0][product_components_id]": 1,
                    "stock_in_details[0][stock_in_quantity]": 1,
                    "stock_in_details[0][total_fee]": 1,
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
                "id": 1,
                "stock_in_no": "IS2018091417222582919",
                "external_sn": "外部单号",
                "warehouse_id": 1,
                "stock_in_types_id": 1,
                "creator": 1,
                "is_submit": false,
                "submitter": 0,
                "submit_at": null,
                "is_print": false,
                "print_at": null,
                "is_audit": false,
                "auditor": 0,
                "audit_at": null,
                "is_stock_in": false,
                "warehouer": 0,
                "stock_in_at": null,
                "status": true,
                "created_at": "2018-09-14 17:22:25",
                "updated_at": "2018-09-14 17:22:25",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条其他入库单 [GET /api/otherstockins/:id]


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
                "stock_in_no": "IS2018091417222582919",
                "external_sn": "外部单号",
                "warehouse_id": 1,
                "stock_in_types_id": 1,
                "creator": 1,
                "is_submit": false,
                "submitter": 0,
                "submit_at": null,
                "is_print": false,
                "print_at": null,
                "is_audit": false,
                "auditor": 0,
                "audit_at": null,
                "is_stock_in": false,
                "warehouer": 0,
                "stock_in_at": null,
                "status": true,
                "created_at": "2018-09-14 17:22:25",
                "updated_at": "2018-09-14 17:22:25"
            }

## 修改其他入库单 [PATCH /api/otherstockins/:id]


+ Parameters
    + external_sn: (string, optional) - 外部单号
    + warehouse_id: (integer, optional) - 仓库id
    + suppliers_id: (integer, optional) - 供应商id
    + stock_in_types_id: (integer, optional) - 入库类型id
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 
    + other_stock_in_details[0][product_components_id]: (integer, optional) - 子件id
    + other_stock_in_details[0][stock_in_quantity]: (integer, optional) - 入库数量
    + other_stock_in_details[0][total_fee]: (number, optional) - 总额
    + other_stock_in_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            [
                {
                    "external_sn": "RT2121212121212",
                    "warehouse_id": 1,
                    "stock_in_types_id": 1,
                    "suppliers_id": 1,
                    "status": true,
                    "stock_in_details[0][product_components_id]": 1,
                    "stock_in_details[0][stock_in_quantity]": 1,
                    "stock_in_details[0][total_fee]": 1,
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
                "id": 1,
                "stock_in_no": "IS2018091417222582919",
                "external_sn": "外部单号",
                "warehouse_id": 1,
                "stock_in_types_id": 1,
                "creator": 1,
                "is_submit": false,
                "submitter": 0,
                "submit_at": null,
                "is_print": false,
                "print_at": null,
                "is_audit": false,
                "auditor": 0,
                "audit_at": null,
                "is_stock_in": false,
                "warehouer": 0,
                "stock_in_at": null,
                "status": true,
                "created_at": "2018-09-14 17:22:25",
                "updated_at": "2018-09-14 17:22:25"
            }

## 删除其他入库单 [DELETE /api/otherstockins/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组其他入库单 [DELETE /api/otherstockins]


+ Parameters
    + ids: (string, required) - 其他入库单id组 格式: 1,2,3,4 

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

## 更改一组其他入库单状态 [PUT /api/otherstockins/editstatus]


+ Parameters
    + ids: (string, required) - 其他入库单id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

## 提交 [PUT /api/otherstockins/:id/submit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无需重复提交",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 打印 [PUT /api/otherstockins/:id/print]


+ Response 422 (application/json)
    + Body

            {
                "message": "打印出错，是否未提交未审核或重复打印",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 审核 [PUT /api/otherstockins/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "审核出错，是否未提交或重复审核",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 入库 [PUT /api/otherstockins/:id/stockin]


+ Response 422 (application/json)
    + Body

            {
                "message": "入库出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# otherstockindetails [/api]
其他入库单详情资源

## 删除其他入库单详情 [DELETE /api/otherstockindetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组其他入库单详情 [DELETE /api/otherstockindetails]


+ Parameters
    + ids: (string, required) - 其他入库单详情id组 格式: 1,2,3,4 

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

## 获取所有取消采购 [GET /api/cancelpurchases[?status=true&include=purchase,cancelPurchaseDetails]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + is_submit: (boolean, optional) - 是否提交
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 3,
                        "cancel_purchases_no": "CP2018082018300421223",
                        "purchases_id": 16,
                        "creator": "admin",
                        "submitter": "",
                        "submit_at": null,
                        "is_submit": false,
                        "status": true,
                        "created_at": "2018-08-20 18:30:04",
                        "updated_at": "2018-08-20 18:30:04",
                        "purchase": {
                            "id": 16,
                            "purchase_order_no": "PO2018081713593264379",
                            "purchase_status": "新建",
                            "order_no": "",
                            "user_id": 1,
                            "print_at": null,
                            "receiver": "采购收:",
                            "receiver_address": "采购收货地址2:",
                            "promise_ship_time": null,
                            "business_personnel": "",
                            "source": "",
                            "client_name": "",
                            "buyer_nick": "",
                            "order_address": "",
                            "is_submit": false,
                            "is_print": false,
                            "is_audit": true,
                            "is_change": true,
                            "remark": "采购备注2:",
                            "status": true
                        },
                        "cancelPurchaseDetails": {
                            "data": [
                                {
                                    "id": 3,
                                    "cancel_purchases_id": 3,
                                    "purchase_details_id": 19,
                                    "cancel_purchase_quantity": 1,
                                    "created_at": "2018-08-20 18:30:04",
                                    "updated_at": "2018-08-20 18:30:04"
                                }
                            ]
                        }
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
                "id": 3,
                "cancel_purchases_no": "CP2018082018300421223",
                "purchases_id": 16,
                "creator": "admin",
                "submitter": "",
                "submit_at": null,
                "is_submit": false,
                "status": true,
                "created_at": "2018-08-20 18:30:04",
                "updated_at": "2018-08-20 18:30:04",
                "purchase": {
                    "id": 16,
                    "purchase_order_no": "PO2018081713593264379",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "采购收:",
                    "receiver_address": "采购收货地址2:",
                    "promise_ship_time": null,
                    "business_personnel": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": false,
                    "is_print": false,
                    "is_audit": true,
                    "is_change": true,
                    "remark": "采购备注2:",
                    "status": true
                },
                "cancelPurchaseDetails": {
                    "data": [
                        {
                            "id": 3,
                            "cancel_purchases_id": 3,
                            "purchase_details_id": 19,
                            "cancel_purchase_quantity": 1,
                            "created_at": "2018-08-20 18:30:04",
                            "updated_at": "2018-08-20 18:30:04"
                        }
                    ]
                },
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
                "id": 3,
                "cancel_purchases_no": "CP2018082018300421223",
                "purchases_id": 16,
                "creator": "admin",
                "submitter": "",
                "submit_at": null,
                "is_submit": false,
                "status": true,
                "created_at": "2018-08-20 18:30:04",
                "updated_at": "2018-08-20 18:30:04",
                "purchase": {
                    "id": 16,
                    "purchase_order_no": "PO2018081713593264379",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "采购收:",
                    "receiver_address": "采购收货地址2:",
                    "promise_ship_time": null,
                    "business_personnel": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": false,
                    "is_print": false,
                    "is_audit": true,
                    "is_change": true,
                    "remark": "采购备注2:",
                    "status": true
                },
                "cancelPurchaseDetails": {
                    "data": [
                        {
                            "id": 3,
                            "cancel_purchases_id": 3,
                            "purchase_details_id": 19,
                            "cancel_purchase_quantity": 1,
                            "created_at": "2018-08-20 18:30:04",
                            "updated_at": "2018-08-20 18:30:04"
                        }
                    ]
                }
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
                "id": 3,
                "cancel_purchases_no": "CP2018082018300421223",
                "purchases_id": 16,
                "creator": "admin",
                "submitter": "",
                "submit_at": null,
                "is_submit": false,
                "status": true,
                "created_at": "2018-08-20 18:30:04",
                "updated_at": "2018-08-20 18:30:04",
                "purchase": {
                    "id": 16,
                    "purchase_order_no": "PO2018081713593264379",
                    "purchase_status": "新建",
                    "order_no": "",
                    "user_id": 1,
                    "print_at": null,
                    "receiver": "采购收:",
                    "receiver_address": "采购收货地址2:",
                    "promise_ship_time": null,
                    "business_personnel": "",
                    "source": "",
                    "client_name": "",
                    "buyer_nick": "",
                    "order_address": "",
                    "is_submit": false,
                    "is_print": false,
                    "is_audit": true,
                    "is_change": true,
                    "remark": "采购备注2:",
                    "status": true
                },
                "cancelPurchaseDetails": {
                    "data": [
                        {
                            "id": 3,
                            "cancel_purchases_id": 3,
                            "purchase_details_id": 19,
                            "cancel_purchase_quantity": 1,
                            "created_at": "2018-08-20 18:30:04",
                            "updated_at": "2018-08-20 18:30:04"
                        }
                    ]
                }
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
                "message": "无需重复提交",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# cancelpurchasedetails [/api]
取消采购单详情资源

## 获取所有取消采购单详情 [GET /api/cancelpurchasedetails[?include=cancelPurchase,purchaseDetail]]


+ Parameters
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 3,
                        "cancel_purchase": {
                            "id": 3,
                            "cancel_purchases_no": "CP2018082018300421223",
                            "purchases_id": 16,
                            "creator": "admin",
                            "submitter": "",
                            "submit_at": null,
                            "is_submit": false,
                            "status": true,
                            "created_at": "2018-08-20 18:30:04",
                            "updated_at": "2018-08-20 18:30:04"
                        },
                        "purchase_detail": {
                            "id": 19,
                            "purchase_lists_id": 16,
                            "purchase_item_status": "新建",
                            "product_components_id": 11,
                            "purchase_quantity": 1,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "1.00",
                            "purchase_freight": "2.00",
                            "warehouse_cost": "2.00",
                            "commission": "2.00",
                            "discount": "2.00",
                            "wooden_frame_costs": "2.00",
                            "arrival_time": "2018-08-16 00:00:00",
                            "remark": "1",
                            "created_at": "2018-08-17 13:59:32",
                            "updated_at": "2018-08-17 13:59:32"
                        },
                        "cancel_purchase_quantity": 1,
                        "created_at": "2018-08-20 18:30:04",
                        "updated_at": "2018-08-20 18:30:04",
                        "cancelPurchase": {
                            "id": 3,
                            "cancel_purchases_no": "CP2018082018300421223",
                            "purchases_id": 16,
                            "creator": "admin",
                            "submitter": "",
                            "submit_at": null,
                            "is_submit": false,
                            "status": true,
                            "created_at": "2018-08-20 18:30:04",
                            "updated_at": "2018-08-20 18:30:04"
                        },
                        "purchaseDetail": {
                            "id": 19,
                            "purchase_lists_id": 16,
                            "purchase_item_status": "新建",
                            "product_components_id": 11,
                            "purchase_quantity": 1,
                            "stock_in_count": 0,
                            "shops_id": 1,
                            "suppliers_id": 1,
                            "purchase_cost": "1.00",
                            "purchase_freight": "2.00",
                            "warehouse_cost": "2.00",
                            "commission": "2.00",
                            "discount": "2.00",
                            "wooden_frame_costs": "2.00",
                            "arrival_time": "2018-08-16 00:00:00",
                            "remark": "1",
                            "created_at": "2018-08-17 13:59:32",
                            "updated_at": "2018-08-17 13:59:32"
                        }
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

## 获取所有采购退货 [GET /api/purchasereturns[?status=true&include=purchaseReturnDetails.stock,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + is_submit: (boolean, optional) - 是否提交
        + Default: all
    + is_audit: (boolean, optional) - 是否审核
        + Default: all
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 3,
                        "purchase_return_no": "RG2018082117042268516",
                        "creator": "admin",
                        "is_submit": false,
                        "submitter": "",
                        "submit_at": null,
                        "is_audit": false,
                        "auditor": "",
                        "audit_at": null,
                        "is_print": false,
                        "remark": "采购退货单备注",
                        "status": true,
                        "created_at": "2018-08-21 17:04:22",
                        "updated_at": "2018-08-21 17:04:22",
                        "purchaseReturnDetails": {
                            "data": [
                                {
                                    "id": 3,
                                    "purchase_returns_id": 3,
                                    "stocks_id": 18,
                                    "purchase_return_quantity": 12,
                                    "suppliers_id": 1,
                                    "price_differences": "0.00",
                                    "purchase_return_types_id": 2,
                                    "created_at": "2018-08-21 17:04:22",
                                    "updated_at": "2018-08-21 17:04:22",
                                    "purchaseReturnType": {
                                        "id": 2,
                                        "name": "采购退货类型名称",
                                        "status": true,
                                        "created_at": "2018-08-21 17:04:08",
                                        "updated_at": "2018-08-21 17:04:08"
                                    },
                                    "stock": {
                                        "id": 18,
                                        "warehouse_id": 1,
                                        "products_id": 30,
                                        "product_components_id": 7,
                                        "quantity": 10,
                                        "status": true,
                                        "created_at": "2018-08-15 16:25:24",
                                        "updated_at": "2018-08-16 11:43:51"
                                    },
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
                                        "is_scan": true,
                                        "status": true,
                                        "auto_valuation": true,
                                        "created_at": "2018-08-06 16:27:02",
                                        "updated_at": "2018-08-06 16:27:02"
                                    }
                                }
                            ]
                        }
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
                "id": 3,
                "purchase_return_no": "RG2018082117042268516",
                "creator": "admin",
                "is_submit": false,
                "submitter": "",
                "submit_at": null,
                "is_audit": false,
                "auditor": "",
                "audit_at": null,
                "is_print": false,
                "remark": "采购退货单备注",
                "status": true,
                "created_at": "2018-08-21 17:04:22",
                "updated_at": "2018-08-21 17:04:22",
                "purchaseReturnDetails": {
                    "data": [
                        {
                            "id": 3,
                            "purchase_returns_id": 3,
                            "stocks_id": 18,
                            "purchase_return_quantity": 12,
                            "suppliers_id": 1,
                            "price_differences": "0.00",
                            "purchase_return_types_id": 2,
                            "created_at": "2018-08-21 17:04:22",
                            "updated_at": "2018-08-21 17:04:22",
                            "purchaseReturnType": {
                                "id": 2,
                                "name": "采购退货类型名称",
                                "status": true,
                                "created_at": "2018-08-21 17:04:08",
                                "updated_at": "2018-08-21 17:04:08"
                            },
                            "stock": {
                                "id": 18,
                                "warehouse_id": 1,
                                "products_id": 30,
                                "product_components_id": 7,
                                "quantity": 10,
                                "status": true,
                                "created_at": "2018-08-15 16:25:24",
                                "updated_at": "2018-08-16 11:43:51"
                            },
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
                                "is_scan": true,
                                "status": true,
                                "auto_valuation": true,
                                "created_at": "2018-08-06 16:27:02",
                                "updated_at": "2018-08-06 16:27:02"
                            }
                        }
                    ]
                },
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
                "id": 3,
                "purchase_return_no": "RG2018082117042268516",
                "creator": "admin",
                "is_submit": false,
                "submitter": "",
                "submit_at": null,
                "is_audit": false,
                "auditor": "",
                "audit_at": null,
                "is_print": false,
                "remark": "采购退货单备注",
                "status": true,
                "created_at": "2018-08-21 17:04:22",
                "updated_at": "2018-08-21 17:04:22",
                "purchaseReturnDetails": {
                    "data": [
                        {
                            "id": 3,
                            "purchase_returns_id": 3,
                            "stocks_id": 18,
                            "purchase_return_quantity": 12,
                            "suppliers_id": 1,
                            "price_differences": "0.00",
                            "purchase_return_types_id": 2,
                            "created_at": "2018-08-21 17:04:22",
                            "updated_at": "2018-08-21 17:04:22",
                            "purchaseReturnType": {
                                "id": 2,
                                "name": "采购退货类型名称",
                                "status": true,
                                "created_at": "2018-08-21 17:04:08",
                                "updated_at": "2018-08-21 17:04:08"
                            },
                            "stock": {
                                "id": 18,
                                "warehouse_id": 1,
                                "products_id": 30,
                                "product_components_id": 7,
                                "quantity": 10,
                                "status": true,
                                "created_at": "2018-08-15 16:25:24",
                                "updated_at": "2018-08-16 11:43:51"
                            },
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
                                "is_scan": true,
                                "status": true,
                                "auto_valuation": true,
                                "created_at": "2018-08-06 16:27:02",
                                "updated_at": "2018-08-06 16:27:02"
                            }
                        }
                    ]
                }
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
                "id": 3,
                "purchase_return_no": "RG2018082117042268516",
                "creator": "admin",
                "is_submit": false,
                "submitter": "",
                "submit_at": null,
                "is_audit": false,
                "auditor": "",
                "audit_at": null,
                "is_print": false,
                "remark": "采购退货单备注",
                "status": true,
                "created_at": "2018-08-21 17:04:22",
                "updated_at": "2018-08-21 17:04:22",
                "purchaseReturnDetails": {
                    "data": [
                        {
                            "id": 3,
                            "purchase_returns_id": 3,
                            "stocks_id": 18,
                            "purchase_return_quantity": 12,
                            "suppliers_id": 1,
                            "price_differences": "0.00",
                            "purchase_return_types_id": 2,
                            "created_at": "2018-08-21 17:04:22",
                            "updated_at": "2018-08-21 17:04:22",
                            "purchaseReturnType": {
                                "id": 2,
                                "name": "采购退货类型名称",
                                "status": true,
                                "created_at": "2018-08-21 17:04:08",
                                "updated_at": "2018-08-21 17:04:08"
                            },
                            "stock": {
                                "id": 18,
                                "warehouse_id": 1,
                                "products_id": 30,
                                "product_components_id": 7,
                                "quantity": 10,
                                "status": true,
                                "created_at": "2018-08-15 16:25:24",
                                "updated_at": "2018-08-16 11:43:51"
                            },
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
                                "is_scan": true,
                                "status": true,
                                "auto_valuation": true,
                                "created_at": "2018-08-06 16:27:02",
                                "updated_at": "2018-08-06 16:27:02"
                            }
                        }
                    ]
                }
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
                "message": "无需重复提交",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 审核 [PUT /api/purchasereturns/:id/audit]


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
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "采购退货类型",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "采购退货类型2",
                        "status": true,
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
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "status": true,
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
                "status": true,
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
                "status": true,
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
    + status: (boolean, required) - 状态(0:停用，1:启用)

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
采购退货单详情资源

## 获取所有采购退货单详情 [GET /api/purchasereturndetails[?include=purchaseReturnType,purchaseReturn,stock,supplier]]


+ Parameters
    + include: (string, optional) - 加载关联的数据

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 3,
                        "purchase_returns_id": 3,
                        "stocks_id": 18,
                        "purchase_return_quantity": 12,
                        "suppliers_id": 1,
                        "price_differences": "0.00",
                        "purchase_return_types_id": 2,
                        "created_at": "2018-08-21 17:04:22",
                        "updated_at": "2018-08-21 17:04:22",
                        "purchaseReturnType": {
                            "id": 2,
                            "name": "采购退货类型名称",
                            "status": true,
                            "created_at": "2018-08-21 17:04:08",
                            "updated_at": "2018-08-21 17:04:08"
                        },
                        "purchaseReturn": {
                            "id": 3,
                            "purchase_return_no": "RG2018082117042268516",
                            "creator": "admin",
                            "is_submit": false,
                            "submitter": "",
                            "submit_at": null,
                            "is_audit": false,
                            "auditor": "",
                            "audit_at": null,
                            "is_print": false,
                            "remark": "采购退货单备注",
                            "status": true,
                            "created_at": "2018-08-21 17:04:22",
                            "updated_at": "2018-08-21 17:04:22"
                        },
                        "stock": {
                            "id": 18,
                            "warehouse_id": 1,
                            "products_id": 30,
                            "product_components_id": 7,
                            "quantity": 10,
                            "status": true,
                            "created_at": "2018-08-15 16:25:24",
                            "updated_at": "2018-08-16 11:43:51"
                        },
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
                            "is_scan": true,
                            "status": true,
                            "auto_valuation": true,
                            "created_at": "2018-08-06 16:27:02",
                            "updated_at": "2018-08-06 16:27:02"
                        }
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

## 删除采购退货单详情 [DELETE /api/purchasereturndetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组采购退货单详情 [DELETE /api/purchasereturndetails]


+ Parameters
    + ids: (string, required) - 采购退货单详情id组 格式: 1,2,3,4 

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

# takedeliverygoodsways [/api]
提货方式资源

## 获取所有提货方式 [GET /api/takedeliverygoodsways{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "提货方式",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "提货方式2",
                        "status": true,
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
                            "next": "{{host}}/api/takedeliverygoodsways?page=1"
                        }
                    }
                }
            }

## 新增提货方式 [POST /api/takedeliverygoodsways]


+ Parameters
    + name: (string, required) - 提货方式名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "提货方式名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "提货方式",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条提货方式 [GET /api/takedeliverygoodsways/:id]


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
                "name": "提货方式",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改提货方式 [PATCH /api/takedeliverygoodsways/:id]


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
                        "提货方式名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "提货方式10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除提货方式 [DELETE /api/takedeliverygoodsways/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组提货方式 [DELETE /api/takedeliverygoodsways]


+ Parameters
    + ids: (string, required) - 提货方式id组 格式: 1,2,3,4 

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

## 更改一组提货方式状态 [PUT /api/takedeliverygoodsways/editstatus]


+ Parameters
    + ids: (string, required) - 提货方式id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# paymentmethods [/api]
付款方式资源

## 获取所有付款方式 [GET /api/paymentmethods{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "付款方式",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "付款方式2",
                        "status": true,
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
                            "next": "{{host}}/api/paymentmethods?page=1"
                        }
                    }
                }
            }

## 新增付款方式 [POST /api/paymentmethods]


+ Parameters
    + name: (string, required) - 付款方式名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "付款方式名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "付款方式",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条付款方式 [GET /api/paymentmethods/:id]


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
                "name": "付款方式",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改付款方式 [PATCH /api/paymentmethods/:id]


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
                        "付款方式名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "付款方式10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除付款方式 [DELETE /api/paymentmethods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组付款方式 [DELETE /api/paymentmethods]


+ Parameters
    + ids: (string, required) - 付款方式id组 格式: 1,2,3,4 

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

## 更改一组付款方式状态 [PUT /api/paymentmethods/editstatus]


+ Parameters
    + ids: (string, required) - 付款方式id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# customertypes [/api]
客户类型资源

## 获取所有客户类型 [GET /api/customertypes{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "客户类型",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "客户类型2",
                        "status": true,
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
                            "next": "{{host}}/api/customertypes?page=1"
                        }
                    }
                }
            }

## 新增客户类型 [POST /api/customertypes]


+ Parameters
    + name: (string, required) - 客户类型名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "客户类型名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "客户类型",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条客户类型 [GET /api/customertypes/:id]


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
                "name": "客户类型",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改客户类型 [PATCH /api/customertypes/:id]


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
                        "客户类型名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "客户类型10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除客户类型 [DELETE /api/customertypes/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组客户类型 [DELETE /api/customertypes]


+ Parameters
    + ids: (string, required) - 客户类型id组 格式: 1,2,3,4 

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

## 更改一组客户类型状态 [PUT /api/customertypes/editstatus]


+ Parameters
    + ids: (string, required) - 客户类型id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# customerservicedepts [/api]
客服部资源

## 获取所有未处理的订单 [GET /api/customerservicedepts/searchuntreated[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


## 获取所有客服部 [GET /api/customerservicedepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + order_status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "system_order_no": "DD2018082011365716512",
                        "order_status": "未处理",
                        "order_source": "system",
                        "shops_id": 1,
                        "logistics_id": 1,
                        "billing_way": "weight",
                        "promise_ship_time": "2018-08-20",
                        "freight_types_id": 1,
                        "expected_freight": "10.00",
                        "distributions_id": 1,
                        "distribution_methods_id": 15,
                        "deliver_goods_fee": "10.00",
                        "move_upstairs_fee": "10.00",
                        "installation_fee": "10.00",
                        "total_distribution_fee": "30.00",
                        "distribution_phone": "配送电话",
                        "distribution_no": "配送单号",
                        "distribution_types_id": 1,
                        "service_car_info": "服务车信息（配送信息）",
                        "take_delivery_goods_fee": "10.00",
                        "take_delivery_goods_ways_id": 1,
                        "express_fee": "10.00",
                        "service_car_fee": "10.00",
                        "cancel_after_verification_code": "核销码",
                        "wooden_frame_costs": "10.00",
                        "preferential_cashback": "2.00",
                        "favorable_cashback": "2.00",
                        "customer_types_id": 1,
                        "is_invoice": false,
                        "invoice_express_fee": "5.00",
                        "express_invoice_title": "快递发票抬头",
                        "contract_no": "合同单号",
                        "payment_methods_id": 1,
                        "deposit": "10.00",
                        "document_title": "单据头",
                        "warehouses_id": 1,
                        "payment_date": "2018-08-20",
                        "interest_concessions": "10.00",
                        "is_notice": true,
                        "is_cancel_after_verification": false,
                        "accept_order_user": "接单用户",
                        "tax_number": "税号",
                        "receipt": "收据",
                        "logistics_remark": "物流备注",
                        "seller_remark": "卖家备注",
                        "customer_service_remark": "客服备注",
                        "taobao_oid": 0,
                        "taobao_tid": 0,
                        "member_nick": "会员昵称",
                        "shop_name": "",
                        "seller_name": "",
                        "seller_flag": 0,
                        "created": null,
                        "est_con_time": null,
                        "buyer_message": "买家留言",
                        "receiver_name": "",
                        "receiver_phone": "",
                        "receiver_mobile": "",
                        "receiver_state": "",
                        "receiver_city": "",
                        "receiver_district": "",
                        "receiver_address": "",
                        "receiver_zip": "",
                        "refund_info": "无退款",
                        "business_personnel_id": 0,
                        "locker_id": 0,
                        "audit_at": null,
                        "association_taobao_oid": "",
                        "is_merge": false,
                        "is_split": false,
                        "is_association": false,
                        "created_at": "2018-08-20 11:36:57",
                        "updated_at": "2018-08-20 11:36:57"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 获取创建订单数据 [GET /api/customerservicedepts/create]


+ Response 200 (application/json)
    + Body

            {
                "data": {
                    "warehouse": [
                        {
                            "id": 1,
                            "name": "仓库名称",
                            "province": "福建省",
                            "city": "厦门市",
                            "district": "海沧区",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:28",
                            "updated_at": "2018-08-31 13:33:00"
                        },
                        {
                            "id": 2,
                            "name": "仓库名称",
                            "province": "河南省",
                            "city": "郑州市",
                            "district": "中原区",
                            "address": "仓库地（地址）",
                            "is_default": true,
                            "status": true,
                            "created_at": "2018-08-24 11:26:49",
                            "updated_at": "2018-08-24 11:26:49"
                        },
                        {
                            "id": 3,
                            "name": "仓库831",
                            "province": "天津市",
                            "city": "市辖区",
                            "district": "宁河区",
                            "address": "广东省广州市",
                            "is_default": false,
                            "status": true,
                            "created_at": "2018-08-31 09:51:55",
                            "updated_at": "2018-08-31 14:04:59"
                        }
                    ],
                    "fee_type": [
                        {
                            "id": 1,
                            "fee_category_id": 3,
                            "name": "费用类型2",
                            "code": "费用类型代码2",
                            "is_default": true,
                            "status": true,
                            "remark": "备注1",
                            "created_at": "2018-08-20 18:40:23",
                            "updated_at": "2018-08-22 10:00:03"
                        },
                        {
                            "id": 3,
                            "fee_category_id": 2,
                            "name": "名称1",
                            "code": "代码1",
                            "is_default": false,
                            "status": true,
                            "remark": "备注1",
                            "created_at": "2018-08-22 10:10:00",
                            "updated_at": "2018-08-22 10:10:00"
                        },
                        {
                            "id": 4,
                            "fee_category_id": 1,
                            "name": "名称4",
                            "code": "代码4",
                            "is_default": false,
                            "status": true,
                            "remark": "备注4",
                            "created_at": "2018-08-22 10:12:12",
                            "updated_at": "2018-08-22 10:12:12"
                        }
                    ],
                    "shop": [
                        {
                            "id": 1,
                            "nick": "卖家昵称",
                            "title": "店铺标题",
                            "session_key": "SessionKey",
                            "warehouse_id": 1,
                            "shop_account": "店铺账号",
                            "shop_passwd": "店铺密码",
                            "rebate": "10.00",
                            "principal": "店铺负责人",
                            "principal_mobile": "负责人电话",
                            "province": "发货地（省）",
                            "city": "发货地（市）",
                            "district": "发货地（区）",
                            "address": "发货地（地址）",
                            "gross_profit_rate": "11.00",
                            "platform_id": 1,
                            "is_waybill": true,
                            "status": true,
                            "created_at": "2018-08-06 16:25:50",
                            "updated_at": "2018-08-22 14:22:07"
                        },
                        {
                            "id": 2,
                            "nick": "卖家2",
                            "title": "店铺2",
                            "session_key": "SessionKey",
                            "warehouse_id": 1,
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
                            "platform_id": 1,
                            "is_waybill": false,
                            "status": true,
                            "created_at": "2018-08-06 16:25:50",
                            "updated_at": "2018-08-22 14:22:21"
                        },
                        {
                            "id": 3,
                            "nick": "卖家测试",
                            "title": "店铺标题",
                            "session_key": "dfdafwef",
                            "warehouse_id": 1,
                            "shop_account": "店铺账号",
                            "shop_passwd": "123456",
                            "rebate": "13.00",
                            "principal": "负责人2",
                            "principal_mobile": "12353524",
                            "province": "河北省",
                            "city": "秦皇岛市",
                            "district": "北戴河区",
                            "address": "发货地址",
                            "gross_profit_rate": "23.00",
                            "platform_id": 1,
                            "is_waybill": true,
                            "status": true,
                            "created_at": "2018-08-22 17:28:44",
                            "updated_at": "2018-08-22 17:28:44"
                        },
                        {
                            "id": 4,
                            "nick": "测试1",
                            "title": "测法标题",
                            "session_key": "dfa12313",
                            "warehouse_id": 1,
                            "shop_account": "1313",
                            "shop_passwd": "3131",
                            "rebate": "2.00",
                            "principal": "31",
                            "principal_mobile": "313",
                            "province": "河北省",
                            "city": "秦皇岛市",
                            "district": "北戴河区",
                            "address": "31",
                            "gross_profit_rate": "31.00",
                            "platform_id": 4,
                            "is_waybill": true,
                            "status": true,
                            "created_at": "2018-08-22 17:44:56",
                            "updated_at": "2018-08-23 10:34:30"
                        }
                    ],
                    "logistics": [
                        {
                            "id": 4,
                            "code": "物流代码",
                            "name": "物流名称",
                            "report_id": 1,
                            "expected_days": 1,
                            "phone": "1",
                            "address": "物流地址",
                            "freight_type_id": 1,
                            "remark": "备注",
                            "status": true,
                            "created_at": "2018-08-23 14:22:29",
                            "updated_at": "2018-08-23 16:39:22"
                        },
                        {
                            "id": 5,
                            "code": "2",
                            "name": "2",
                            "report_id": 1,
                            "expected_days": 2,
                            "phone": "2",
                            "address": "2",
                            "freight_type_id": 1,
                            "remark": "22",
                            "status": true,
                            "created_at": "2018-08-23 14:25:39",
                            "updated_at": "2018-08-23 14:25:39"
                        }
                    ],
                    "freight_type": [
                        {
                            "id": 1,
                            "name": "运费名称",
                            "status": true,
                            "is_default": true,
                            "created_at": "2018-08-17 17:40:14",
                            "updated_at": "2018-08-17 17:40:14"
                        }
                    ],
                    "distribution": [
                        {
                            "id": 1,
                            "name": "配送公司名称3",
                            "phone": "配送公司电话",
                            "address": "配送公司地址",
                            "remark": "备注",
                            "status": true,
                            "created_at": "2018-08-08 16:15:57",
                            "updated_at": "2018-08-08 16:21:59"
                        }
                    ],
                    "distribution_method": [
                        {
                            "id": 12,
                            "name": "配送方式1",
                            "status": true,
                            "created_at": "2018-08-06 18:28:10",
                            "updated_at": "2018-08-06 18:28:10"
                        },
                        {
                            "id": 13,
                            "name": "配送方式2",
                            "status": true,
                            "created_at": "2018-08-06 18:28:20",
                            "updated_at": "2018-08-06 18:28:20"
                        },
                        {
                            "id": 14,
                            "name": "配送方式",
                            "status": true,
                            "created_at": "2018-08-07 09:58:19",
                            "updated_at": "2018-08-07 09:58:19"
                        },
                        {
                            "id": 15,
                            "name": "配送方式",
                            "status": true,
                            "created_at": "2018-08-17 17:45:28",
                            "updated_at": "2018-08-17 17:45:28"
                        }
                    ],
                    "distribution_type": [
                        {
                            "id": 1,
                            "name": "配送类型名称1",
                            "status": true,
                            "created_at": "2018-08-08 18:14:22",
                            "updated_at": "2018-08-08 18:17:07"
                        }
                    ],
                    "take_delivery_goodsWay": [
                        {
                            "id": 1,
                            "name": "提货方式名称1",
                            "status": true,
                            "created_at": "2018-08-16 16:02:07",
                            "updated_at": "2018-08-16 16:03:51"
                        }
                    ],
                    "customer_type": [
                        {
                            "id": 1,
                            "name": "客户类型",
                            "status": true,
                            "created_at": "2018-08-17 17:47:40",
                            "updated_at": "2018-08-17 17:47:40"
                        }
                    ],
                    "payment_method": [
                        {
                            "id": 1,
                            "name": "付款方式",
                            "status": true,
                            "created_at": "2018-08-20 11:36:46",
                            "updated_at": "2018-08-20 11:36:46"
                        },
                        {
                            "id": 3,
                            "name": "付款方式2",
                            "status": true,
                            "created_at": "2018-09-04 14:57:22",
                            "updated_at": "2018-09-04 14:57:22"
                        },
                        {
                            "id": 4,
                            "name": "付款方式3",
                            "status": true,
                            "created_at": "2018-09-04 14:57:30",
                            "updated_at": "2018-09-04 14:57:30"
                        }
                    ],
                    "meta": {
                        "status_code": "200"
                    }
                }
            }

## 新增客服部(可选参数：include) [POST /api/customerservicedepts[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + shops_id: (integer, required) - 店铺id
    + member_nick: (string, optional) - 会员昵称
    + logistics_id: (integer, required) - 物流id
    + billing_way: (string, required) - 计费方式:weight、volume
    + promise_ship_time: (date, optional) - 承诺发货时间
    + freight_types_id: (integer, required) - 运费类型id
    + expected_freight: (numeric, optional) - 预计运费
    + distributions_id: (integer, required) - 配送id
    + distribution_methods_id: (integer, optional) - 配送方式id
    + deliver_goods_fee: (numeric, optional) - 送货费用
    + move_upstairs_fee: (numeric, optional) - 搬楼费用
    + installation_fee: (numeric, optional) - 安装费
    + total_distribution_fee: (numeric, optional) - 配送总计(送货费用 + 搬楼费用 + 安装费)
    + distribution_phone: (string, optional) - 配送电话
    + distribution_no: (string, optional) - 配送单号
    + distribution_types_id: (integer, optional) - 配送类型id
    + service_car_info: (string, optional) - 服务车信息（配送信息）
    + take_delivery_goods_fee: (numeric, required) - 提货费用
    + take_delivery_goods_ways_id: (integer, optional) - 提货方式id
    + express_fee: (integer, optional) - 快递费用
    + service_car_fee: (numeric, optional) - 服务车金额（家装服务）
    + cancel_after_verification_code: (string, optional) - 核销码
    + wooden_frame_costs: (numeric, optional) - 木架费
    + preferential_cashback: (numeric, optional) - 优惠返现
    + favorable_cashback: (numeric, optional) - 好评返现
    + customer_types_id: (string, required) - 客户类型id
    + is_invoice: (boolean, optional) - 是否要发票
    + invoice_express_fee: (numeric, optional) - 发票快递费
    + express_invoice_title: (string, optional) - 快递发票抬头
    + contract_no: (string, optional) - 合同单号
    + payment_methods_id: (integer, required) - 付款方式id
    + deposit: (numeric, optional) - 订金
    + document_title: (string, optional) - 单据头
    + warehouses_id: (integer, required) - 发货仓库id
    + payment_date: (date, optional) - 支付日期
    + interest_concessions: (numeric, optional) - 让利
    + is_notice: (boolean, optional) - 是否等通知发货
    + is_cancel_after_verification: (boolean, optional) - 是否核销
    + accept_order_user: (string, optional) - 接单用户
    + tax_number: (string, optional) - 税号
    + receipt: (string, optional) - 收据
    + logistics_remark: (string, optional) - 物流备注
    + seller_remark: (string, optional) - 卖家备注
    + customer_service_remark: (string, optional) - 客服备注
    + buyer_message: (string, optional) - 买家留言
    + status: (string, optional) - 订单是否开启
    + receiver_name: (string, required) - 收货人
    + receiver_phone: (string, required) - 收货人固定电话
    + receiver_mobile: (string, required) - 收货人手机
    + receiver_state: (string, required) - 收货人的所在省份
    + receiver_city: (string, required) - 收货人的所在城市
    + receiver_district: (string, required) - 收货人的所在地区
    + receiver_address: (string, required) - 收货人的详细地址
    + receiver_zip: (string, required) - 收货邮编
    + order_items[0][products_id]: (integer, optional) - 产品id
    + order_items[0][combinations_id]: (integer, optional) - 组合id
    + order_items[0][quantity]: (integer, optional) - 数量
    + order_items[0][total_volume]: (numeric, optional) - 总体积
    + order_items[0][paint]: (string, optional) - 油漆
    + order_items[0][is_printing]: (boolean, optional) - 是否需要印刷
    + order_items[0][printing_fee]: (numeric, optional) - 印刷费用
    + order_items[0][is_spot_goods]: (boolean, optional) - 是否现货
    + order_items[0][under_line_univalent]: (numeric, optional) - 线下单价
    + order_items[0][under_line_total_amount]: (numeric, optional) - 线下金额（数量*单价）
    + order_items[0][under_line_preferential]: (numeric, optional) - 优惠（线下）
    + order_items[0][under_line_payment]: (numeric, optional) - 实际支付金额（线下）（线下金额 - 优惠）
    + payment_details[0][payment]: (numeric, optional) - 支付金额
    + payment_details[0][payment_methods_id]: (integer, optional) - 支付方式id
    + payment_details[0][taobao_tid]: (string, optional) - 交易号（获取淘宝的交易编号）
    + payment_details[0][taobao_oid]: (string, optional) - 子订单编号（获取淘宝的订单号）
    + payment_details[0][pay_time]: (datetime, optional) - 付款时间
    + payment_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            {
                "shops_id": 1,
                "member_nick": "会员昵称",
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-8-20",
                "freight_types_id": 1,
                "expected_freight": 10,
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": 10,
                "move_upstairs_fee": 10,
                "installation_fee": 10,
                "total_distribution_fee": 30,
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": 10,
                "take_delivery_goods_ways_id": 1,
                "express_fee": 10,
                "service_car_fee": 10,
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": 10,
                "preferential_cashback": 2,
                "favorable_cashback": 2,
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": 5,
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": 10,
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-8-20",
                "interest_concessions": 10,
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "buyer_message": "买家留言",
                "receiver_name": "收货人",
                "receiver_phone": "收货人固定电话",
                "receiver_mobile": "收货人手机",
                "receiver_state": "收货人的所在省份",
                "receiver_city": "收货人的所在城市",
                "receiver_district": "收货人的所在地区",
                "receiver_address": "收货人的详细地址",
                "receiver_zip": "收货邮编",
                "status": true,
                "order_items[0][products_id]": 29,
                "order_items[0][combinations_id]": 14,
                "order_items[0][quantity]": 10,
                "order_items[0][total_volume]": 100,
                "order_items[0][paint]": "油漆",
                "order_items[0][is_printing]": false,
                "order_items[0][printing_fee]": 1,
                "order_items[0][is_spot_goods]": false,
                "order_items[0][under_line_univalent]": 10,
                "order_items[0][under_line_total_amount]": 100,
                "order_items[0][under_line_preferential]": 10,
                "order_items[0][under_line_payment]": 90,
                "payment_details[0][payment]": 100,
                "payment_details[0][payment_methods_id]": 1,
                "payment_details[0][taobao_tid]": "123456",
                "payment_details[0][taobao_oid]": "123456",
                "payment_details[0][pay_time]": "2018-8-18",
                "payment_details[0][remark]": "备注"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "system_order_no": "DD2018082011365716512",
                "order_status": "未处理",
                "order_source": "system",
                "shops_id": 1,
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-08-20",
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": "10.00",
                "take_delivery_goods_ways_id": 1,
                "express_fee": "10.00",
                "service_car_fee": "10.00",
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": "10.00",
                "preferential_cashback": "2.00",
                "favorable_cashback": "2.00",
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": "5.00",
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": "10.00",
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-08-20",
                "interest_concessions": "10.00",
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "taobao_oid": 0,
                "taobao_tid": 0,
                "member_nick": "会员昵称",
                "shop_name": "",
                "seller_name": "",
                "seller_flag": 0,
                "created": null,
                "est_con_time": null,
                "buyer_message": "买家留言",
                "receiver_name": "",
                "receiver_phone": "",
                "receiver_mobile": "",
                "receiver_state": "",
                "receiver_city": "",
                "receiver_district": "",
                "receiver_address": "",
                "receiver_zip": "",
                "refund_info": "无退款",
                "business_personnel_id": 0,
                "locker_id": 0,
                "audit_at": null,
                "association_taobao_oid": "",
                "is_merge": false,
                "is_split": false,
                "is_association": false,
                "created_at": "2018-08-20 11:36:57",
                "updated_at": "2018-08-20 11:36:57",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条客服部 [GET /api/customerservicedepts/:id[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


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
                "system_order_no": "DD2018082011365716512",
                "order_status": "未处理",
                "order_source": "system",
                "shops_id": 1,
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-08-20",
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": "10.00",
                "take_delivery_goods_ways_id": 1,
                "express_fee": "10.00",
                "service_car_fee": "10.00",
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": "10.00",
                "preferential_cashback": "2.00",
                "favorable_cashback": "2.00",
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": "5.00",
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": "10.00",
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-08-20",
                "interest_concessions": "10.00",
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "taobao_oid": 0,
                "taobao_tid": 0,
                "member_nick": "会员昵称",
                "shop_name": "",
                "seller_name": "",
                "seller_flag": 0,
                "created": null,
                "est_con_time": null,
                "buyer_message": "买家留言",
                "receiver_name": "",
                "receiver_phone": "",
                "receiver_mobile": "",
                "receiver_state": "",
                "receiver_city": "",
                "receiver_district": "",
                "receiver_address": "",
                "receiver_zip": "",
                "refund_info": "无退款",
                "business_personnel_id": 0,
                "locker_id": 0,
                "audit_at": null,
                "association_taobao_oid": "",
                "is_merge": false,
                "is_split": false,
                "is_association": false,
                "created_at": "2018-08-20 11:36:57",
                "updated_at": "2018-08-20 11:36:57"
            }

## 修改客服部 [PATCH /api/customerservicedepts/:id[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + shops_id: (integer, required) - 店铺id
    + member_nick: (string, optional) - 会员昵称
    + logistics_id: (integer, required) - 物流id
    + billing_way: (string, required) - 计费方式:weight、volume
    + promise_ship_time: (date, optional) - 承诺发货时间
    + freight_types_id: (integer, required) - 运费类型id
    + expected_freight: (numeric, optional) - 预计运费
    + distributions_id: (integer, required) - 配送id
    + distribution_methods_id: (integer, optional) - 配送方式id
    + deliver_goods_fee: (numeric, optional) - 送货费用
    + move_upstairs_fee: (numeric, optional) - 搬楼费用
    + installation_fee: (numeric, optional) - 安装费
    + total_distribution_fee: (numeric, optional) - 配送总计(送货费用 + 搬楼费用 + 安装费)
    + distribution_phone: (string, optional) - 配送电话
    + distribution_no: (string, optional) - 配送单号
    + distribution_types_id: (integer, optional) - 配送类型id
    + service_car_info: (string, optional) - 服务车信息（配送信息）
    + take_delivery_goods_fee: (numeric, required) - 提货费用
    + take_delivery_goods_ways_id: (integer, optional) - 提货方式id
    + express_fee: (integer, optional) - 快递费用
    + service_car_fee: (numeric, optional) - 服务车金额（家装服务）
    + cancel_after_verification_code: (string, optional) - 核销码
    + wooden_frame_costs: (numeric, optional) - 木架费
    + preferential_cashback: (numeric, optional) - 优惠返现
    + favorable_cashback: (numeric, optional) - 好评返现
    + customer_types_id: (string, required) - 客户类型id
    + is_invoice: (boolean, optional) - 是否要发票
    + invoice_express_fee: (numeric, optional) - 发票快递费
    + express_invoice_title: (string, optional) - 快递发票抬头
    + contract_no: (string, optional) - 合同单号
    + payment_methods_id: (integer, required) - 付款方式id
    + deposit: (numeric, optional) - 订金
    + document_title: (string, optional) - 单据头
    + warehouses_id: (integer, required) - 发货仓库id
    + payment_date: (date, optional) - 支付日期
    + interest_concessions: (numeric, optional) - 让利
    + is_notice: (boolean, optional) - 是否等通知发货
    + is_cancel_after_verification: (boolean, optional) - 是否核销
    + accept_order_user: (string, optional) - 接单用户
    + tax_number: (string, optional) - 税号
    + receipt: (string, optional) - 收据
    + logistics_remark: (string, optional) - 物流备注
    + seller_remark: (string, optional) - 卖家备注
    + customer_service_remark: (string, optional) - 客服备注
    + buyer_message: (string, optional) - 买家留言
    + status: (string, optional) - 订单是否开启
    + receiver_name: (string, required) - 收货人
    + receiver_phone: (string, required) - 收货人固定电话
    + receiver_mobile: (string, required) - 收货人手机
    + receiver_state: (string, required) - 收货人的所在省份
    + receiver_city: (string, required) - 收货人的所在城市
    + receiver_district: (string, required) - 收货人的所在地区
    + receiver_address: (string, required) - 收货人的详细地址
    + receiver_zip: (string, required) - 收货邮编
    + order_items[0][id]: (integer, optional) - 子订单id
    + order_items[0][products_id]: (integer, optional) - 产品id
    + order_items[0][combinations_id]: (integer, optional) - 组合id
    + order_items[0][quantity]: (integer, optional) - 数量
    + order_items[0][total_volume]: (numeric, optional) - 总体积
    + order_items[0][paint]: (string, optional) - 油漆
    + order_items[0][is_printing]: (boolean, optional) - 是否需要印刷
    + order_items[0][printing_fee]: (numeric, optional) - 印刷费用
    + order_items[0][is_spot_goods]: (boolean, optional) - 是否现货
    + order_items[0][under_line_univalent]: (numeric, optional) - 线下单价
    + order_items[0][under_line_total_amount]: (numeric, optional) - 线下金额（数量*单价）
    + order_items[0][under_line_preferential]: (numeric, optional) - 优惠（线下）
    + order_items[0][under_line_payment]: (numeric, optional) - 实际支付金额（线下）（线下金额 - 优惠）
    + payment_details[0][id]: (integer, optional) - 支付明细id
    + payment_details[0][payment]: (numeric, optional) - 支付金额
    + payment_details[0][payment_methods_id]: (integer, optional) - 支付方式id
    + payment_details[0][taobao_tid]: (string, optional) - 交易号（获取淘宝的交易编号）
    + payment_details[0][taobao_oid]: (string, optional) - 子订单编号（获取淘宝的订单号）
    + payment_details[0][pay_time]: (datetime, optional) - 付款时间
    + payment_details[0][remark]: (string, optional) - 备注

+ Request (application/json)
    + Body

            {
                "shops_id": 1,
                "member_nick": "会员昵称",
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-8-20",
                "freight_types_id": 1,
                "expected_freight": 10,
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": 10,
                "move_upstairs_fee": 10,
                "installation_fee": 10,
                "total_distribution_fee": 30,
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": 10,
                "take_delivery_goods_ways_id": 1,
                "express_fee": 10,
                "service_car_fee": 10,
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": 10,
                "preferential_cashback": 2,
                "favorable_cashback": 2,
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": 5,
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": 10,
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-8-20",
                "interest_concessions": 10,
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "buyer_message": "买家留言",
                "receiver_name": "收货人",
                "receiver_phone": "收货人固定电话",
                "receiver_mobile": "收货人手机",
                "receiver_state": "收货人的所在省份",
                "receiver_city": "收货人的所在城市",
                "receiver_district": "收货人的所在地区",
                "receiver_address": "收货人的详细地址",
                "receiver_zip": "收货邮编",
                "status": true,
                "order_items[0][id]": 1,
                "order_items[0][products_id]": 29,
                "order_items[0][combinations_id]": 14,
                "order_items[0][quantity]": 10,
                "order_items[0][total_volume]": 100,
                "order_items[0][paint]": "油漆",
                "order_items[0][is_printing]": false,
                "order_items[0][printing_fee]": 1,
                "order_items[0][is_spot_goods]": false,
                "order_items[0][under_line_univalent]": 10,
                "order_items[0][under_line_total_amount]": 100,
                "order_items[0][under_line_preferential]": 10,
                "order_items[0][under_line_payment]": 90,
                "payment_details[0][id]": 1,
                "payment_details[0][payment]": 100,
                "payment_details[0][payment_methods_id]": 1,
                "payment_details[0][taobao_tid]": "123456",
                "payment_details[0][taobao_oid]": "123456",
                "payment_details[0][pay_time]": "2018-8-18",
                "payment_details[0][remark]": "备注"
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
                "message": "还未锁定无法修改",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "system_order_no": "DD2018082011365716512",
                "order_status": "未处理",
                "order_source": "system",
                "shops_id": 1,
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-08-20",
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": "10.00",
                "take_delivery_goods_ways_id": 1,
                "express_fee": "10.00",
                "service_car_fee": "10.00",
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": "10.00",
                "preferential_cashback": "2.00",
                "favorable_cashback": "2.00",
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": "5.00",
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": "10.00",
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-08-20",
                "interest_concessions": "10.00",
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "taobao_oid": 0,
                "taobao_tid": 0,
                "member_nick": "会员昵称",
                "shop_name": "",
                "seller_name": "",
                "seller_flag": 0,
                "created": null,
                "est_con_time": null,
                "buyer_message": "买家留言",
                "receiver_name": "",
                "receiver_phone": "",
                "receiver_mobile": "",
                "receiver_state": "",
                "receiver_city": "",
                "receiver_district": "",
                "receiver_address": "",
                "receiver_zip": "",
                "refund_info": "无退款",
                "business_personnel_id": 0,
                "locker_id": 0,
                "audit_at": null,
                "association_taobao_oid": "",
                "is_merge": false,
                "is_split": false,
                "is_association": false,
                "created_at": "2018-08-20 11:36:57",
                "updated_at": "2018-08-20 11:36:57"
            }

## 删除客服部 [DELETE /api/customerservicedepts/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组客服部 [DELETE /api/customerservicedepts]


+ Parameters
    + ids: (string, required) - 客服部id组 格式: 1,2,3,4 

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

## 更改一组客服部状态 [PUT /api/customerservicedepts/editstatus]


+ Parameters
    + ids: (string, required) - 客服部id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用,1:启用)

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

## 锁定或释放 [PUT /api/customerservicedepts/:id/lockorunlock]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法锁定",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 客审 [PUT /api/customerservicedepts/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "客审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 退审 [PUT /api/customerservicedepts/:id/unaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "退审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 拆单(要及时修改新订单的价格数据) [PUT /api/customerservicedepts/:id/splitorder]


+ Parameters
    + order_items[0][id]: (integer, required) - 子单id
    + order_items[0][quantity]: (numeric, required) - 拆分数量

+ Response 422 (application/json)
    + Body

            {
                "message": "拆单",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 合并订单 [PUT /api/customerservicedepts/mergerorder?order_id_one=1&order_id_two=2]


+ Parameters
    + order_id_one: (integer, required) - 订单一
    + order_id_two: (integer, required) - 订单二

+ Response 422 (application/json)
    + Body

            {
                "message": "合并订单出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# orderitems [/api]
子订单资源

## 删除子订单 [DELETE /api/orderitems/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

# merchandiserdepts [/api]
跟单部资源

## 获取所有跟单部订单 [GET /api/merchandiserdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + status: (boolean, optional) - 开启的状态
        + Default: all
    + warehouses_id: (integer, optional) - 仓库id
        + Default: all
    + order_status: (integer, optional) - 订单状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 22,
                        "system_order_no": "DD2018090714055056211",
                        "order_status": "已客审",
                        "order_source": "system",
                        "shops_id": 1,
                        "logistics_id": 4,
                        "billing_way": "weight",
                        "promise_ship_time": "2018-09-11",
                        "freight_types_id": 1,
                        "expected_freight": "21.00",
                        "distributions_id": 1,
                        "distribution_methods_id": 13,
                        "deliver_goods_fee": "21.00",
                        "move_upstairs_fee": "21.00",
                        "installation_fee": "21.00",
                        "total_distribution_fee": "63.00",
                        "distribution_phone": "21",
                        "distribution_no": "21",
                        "distribution_types_id": 1,
                        "service_car_info": "21",
                        "take_delivery_goods_fee": "21.00",
                        "take_delivery_goods_ways_id": 6,
                        "express_fee": "21.00",
                        "service_car_fee": "21.00",
                        "cancel_after_verification_code": "21",
                        "wooden_frame_costs": "21.00",
                        "preferential_cashback": "21.00",
                        "favorable_cashback": "21.00",
                        "customer_types_id": 1,
                        "is_invoice": false,
                        "invoice_express_fee": "21.00",
                        "express_invoice_title": "21",
                        "contract_no": "21",
                        "payment_methods_id": 3,
                        "deposit": "21.00",
                        "document_title": "21",
                        "warehouses_id": 1,
                        "payment_date": "2018-09-20",
                        "interest_concessions": "21.00",
                        "is_notice": true,
                        "is_cancel_after_verification": false,
                        "accept_order_user": "21",
                        "tax_number": "21",
                        "receipt": "21",
                        "logistics_remark": "21",
                        "seller_remark": "21",
                        "customer_service_remark": "21",
                        "taobao_oid": 0,
                        "taobao_tid": 0,
                        "member_nick": "会员昵称",
                        "shop_name": "",
                        "seller_name": "",
                        "seller_flag": 0,
                        "created": null,
                        "est_con_time": null,
                        "buyer_message": "21",
                        "receiver_name": "12",
                        "receiver_phone": "212",
                        "receiver_mobile": "21",
                        "receiver_state": "河南省",
                        "receiver_city": "南阳市",
                        "receiver_district": "邓州市",
                        "receiver_address": "21",
                        "receiver_zip": "21",
                        "refund_info": "无退款",
                        "business_personnel_id": 1,
                        "locker_id": 0,
                        "audit_at": null,
                        "association_taobao_oid": "",
                        "is_merge": false,
                        "is_split": false,
                        "is_association": false,
                        "created_at": "2018-09-07 14:05:50",
                        "updated_at": "2018-09-07 17:52:15"
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
                            "next": "http://127.0.0.1:8000/api/merchandiserdepts?page=1"
                        }
                    }
                }
            }

## 跟单驳回 [PUT /api/merchandiserdepts/:id/unaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "跟单驳回出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 跟单一审 [PUT /api/merchandiserdepts/:id/oneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "跟单一审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 跟单一审退审 [PUT /api/merchandiserdepts/:id/unoneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "跟单一审退审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 显示跟单修改 [GET /api/merchandiserdepts/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "logistics_id": 4,
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_types_id": 1,
                "express_fee": "10.00",
                "warehouses_id": 1,
                "order_items": [
                    {
                        "id": 1,
                        "orders_id": 2,
                        "products_id": 29,
                        "combinations_id": 14,
                        "quantity": 10,
                        "total_volume": 100,
                        "paint": "油漆",
                        "is_printing": false,
                        "printing_fee": "1.00",
                        "is_spot_goods": false,
                        "under_line_univalent": "10.00",
                        "under_line_total_amount": "100.00",
                        "under_line_preferential": "10.00",
                        "under_line_payment": "90.00",
                        "created_at": "2018-08-24 10:32:07",
                        "updated_at": "2018-08-24 10:32:07",
                        "combination": {
                            "id": 14,
                            "pid": 29,
                            "name": "cesku2",
                            "created_at": "2018-08-15 09:26:00",
                            "updated_at": "2018-08-15 09:26:00",
                            "quantity": 0,
                            "product_components": [
                                {
                                    "id": 11,
                                    "pid": 29,
                                    "component_code": "子件编码4",
                                    "jd_component_code": "京东子件编码",
                                    "vips_component_code": "唯品会子件编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_common": true,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 10,
                                    "available_warning": 10,
                                    "distribution_method_id": 12,
                                    "bar_code": "1010",
                                    "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "longness": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": true,
                                    "is_stop_pro": true,
                                    "created_at": "2018-08-14 15:08:54",
                                    "updated_at": "2018-08-15 11:39:45",
                                    "pivot": {
                                        "combinations_id": 14,
                                        "product_components_id": 11
                                    },
                                    "stocks": [
                                        {
                                            "id": 10,
                                            "warehouse_id": 2,
                                            "products_id": 29,
                                            "product_components_id": 11,
                                            "quantity": 2,
                                            "status": true,
                                            "created_at": "2018-08-13 16:39:04",
                                            "updated_at": "2018-08-13 16:39:04"
                                        }
                                    ]
                                },
                                {
                                    "id": 18,
                                    "pid": 33,
                                    "component_code": "子件编码2",
                                    "jd_component_code": "京东2",
                                    "vips_component_code": "唯品会2",
                                    "tb_price": "2.00",
                                    "cost": "2.00",
                                    "price": "2.00",
                                    "highest_price": "2.00",
                                    "lowest_price": "2.00",
                                    "warehouse_cost": "2.00",
                                    "assembly_price": "2.00",
                                    "discount": "2.00",
                                    "commission": "2.00",
                                    "is_common": false,
                                    "package_quantity": 2,
                                    "package_costs": "2.00",
                                    "wooden_frame_costs": "2.00",
                                    "purchase_freight": "2.00",
                                    "inventory_warning": 2,
                                    "purchase_days_warning": 2,
                                    "available_warning": 2,
                                    "distribution_method_id": 13,
                                    "bar_code": "条形码2",
                                    "img_url": "/images/uploads/201808/24/1_1535076032_cd2y8JgjSo.png",
                                    "spec": "子规格2",
                                    "color": "红色",
                                    "materials": "杏木",
                                    "function": "功能test",
                                    "special": "特殊test",
                                    "other": "其他test",
                                    "longness": 2,
                                    "width": 2,
                                    "height": 1,
                                    "volume": 2,
                                    "weight": 2,
                                    "remark": "子备注2",
                                    "finished_pro": true,
                                    "is_stop_pro": false,
                                    "created_at": "2018-08-24 10:00:35",
                                    "updated_at": "2018-08-24 10:00:35",
                                    "pivot": {
                                        "combinations_id": 14,
                                        "product_components_id": 18
                                    },
                                    "stocks": [
                                        {
                                            "id": 18,
                                            "warehouse_id": 2,
                                            "products_id": 30,
                                            "product_components_id": 18,
                                            "quantity": 10,
                                            "status": true,
                                            "created_at": "2018-08-15 16:25:24",
                                            "updated_at": "2018-08-16 11:43:51"
                                        }
                                    ]
                                }
                            ]
                        }
                    }
                ],
                "created_at": "2018-08-24 10:32:07",
                "updated_at": "2018-08-24 11:38:00"
            }

## 根据仓库获取sku库存 [GET /api/merchandiserdepts/:id/stock]


+ Parameters
    + warehouses_id: (integer, required) - 仓库id

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            {
                "logistics_id": 4,
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_types_id": 1,
                "express_fee": "10.00",
                "warehouses_id": 1,
                "order_items": [
                    {
                        "id": 1,
                        "orders_id": 2,
                        "products_id": 29,
                        "combinations_id": 14,
                        "quantity": 10,
                        "total_volume": 100,
                        "paint": "油漆",
                        "is_printing": false,
                        "printing_fee": "1.00",
                        "is_spot_goods": false,
                        "under_line_univalent": "10.00",
                        "under_line_total_amount": "100.00",
                        "under_line_preferential": "10.00",
                        "under_line_payment": "90.00",
                        "created_at": "2018-08-24 10:32:07",
                        "updated_at": "2018-08-24 10:32:07",
                        "combination": {
                            "id": 14,
                            "pid": 29,
                            "name": "cesku2",
                            "created_at": "2018-08-15 09:26:00",
                            "updated_at": "2018-08-15 09:26:00",
                            "quantity": 0,
                            "product_components": [
                                {
                                    "id": 11,
                                    "pid": 29,
                                    "component_code": "子件编码4",
                                    "jd_component_code": "京东子件编码",
                                    "vips_component_code": "唯品会子件编码",
                                    "tb_price": "10.00",
                                    "cost": "10.00",
                                    "price": "10.00",
                                    "highest_price": "10.00",
                                    "lowest_price": "10.00",
                                    "warehouse_cost": "10.00",
                                    "assembly_price": "10.00",
                                    "discount": "1.00",
                                    "commission": "1.00",
                                    "is_common": true,
                                    "package_quantity": 10,
                                    "package_costs": "10.00",
                                    "wooden_frame_costs": "10.00",
                                    "purchase_freight": "10.00",
                                    "inventory_warning": 10,
                                    "purchase_days_warning": 10,
                                    "available_warning": 10,
                                    "distribution_method_id": 12,
                                    "bar_code": "1010",
                                    "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
                                    "spec": "规格",
                                    "color": "颜色",
                                    "materials": "材质",
                                    "function": "功能",
                                    "special": "特殊",
                                    "other": "其他",
                                    "longness": 10,
                                    "width": 10,
                                    "height": 10,
                                    "volume": 10,
                                    "weight": 10,
                                    "remark": "备注",
                                    "finished_pro": true,
                                    "is_stop_pro": true,
                                    "created_at": "2018-08-14 15:08:54",
                                    "updated_at": "2018-08-15 11:39:45",
                                    "pivot": {
                                        "combinations_id": 14,
                                        "product_components_id": 11
                                    },
                                    "stocks": [
                                        {
                                            "id": 10,
                                            "warehouse_id": 2,
                                            "products_id": 29,
                                            "product_components_id": 11,
                                            "quantity": 2,
                                            "status": true,
                                            "created_at": "2018-08-13 16:39:04",
                                            "updated_at": "2018-08-13 16:39:04"
                                        }
                                    ]
                                },
                                {
                                    "id": 18,
                                    "pid": 33,
                                    "component_code": "子件编码2",
                                    "jd_component_code": "京东2",
                                    "vips_component_code": "唯品会2",
                                    "tb_price": "2.00",
                                    "cost": "2.00",
                                    "price": "2.00",
                                    "highest_price": "2.00",
                                    "lowest_price": "2.00",
                                    "warehouse_cost": "2.00",
                                    "assembly_price": "2.00",
                                    "discount": "2.00",
                                    "commission": "2.00",
                                    "is_common": false,
                                    "package_quantity": 2,
                                    "package_costs": "2.00",
                                    "wooden_frame_costs": "2.00",
                                    "purchase_freight": "2.00",
                                    "inventory_warning": 2,
                                    "purchase_days_warning": 2,
                                    "available_warning": 2,
                                    "distribution_method_id": 13,
                                    "bar_code": "条形码2",
                                    "img_url": "/images/uploads/201808/24/1_1535076032_cd2y8JgjSo.png",
                                    "spec": "子规格2",
                                    "color": "红色",
                                    "materials": "杏木",
                                    "function": "功能test",
                                    "special": "特殊test",
                                    "other": "其他test",
                                    "longness": 2,
                                    "width": 2,
                                    "height": 1,
                                    "volume": 2,
                                    "weight": 2,
                                    "remark": "子备注2",
                                    "finished_pro": true,
                                    "is_stop_pro": false,
                                    "created_at": "2018-08-24 10:00:35",
                                    "updated_at": "2018-08-24 10:00:35",
                                    "pivot": {
                                        "combinations_id": 14,
                                        "product_components_id": 18
                                    },
                                    "stocks": [
                                        {
                                            "id": 18,
                                            "warehouse_id": 2,
                                            "products_id": 30,
                                            "product_components_id": 18,
                                            "quantity": 10,
                                            "status": true,
                                            "created_at": "2018-08-15 16:25:24",
                                            "updated_at": "2018-08-16 11:43:51"
                                        }
                                    ]
                                }
                            ]
                        }
                    }
                ],
                "created_at": "2018-08-24 10:32:07",
                "updated_at": "2018-08-24 11:38:00"
            }

## 跟单货审 [PUT /api/merchandiserdepts/:id/cargoaudit]


+ Parameters
    + logistics_id: (integer, optional) - 物流id
        + Default: all
    + freight_types_id: (integer, optional) - 运费类型id
        + Default: all
    + expected_freight: (numeric, optional) - 预计运费
        + Default: all
    + distributions_id: (integer, optional) - 配送id
        + Default: all
    + distribution_methods_id: (integer, optional) - 配送方式id
        + Default: all
    + deliver_goods_fee: (numeric, optional) - 送货费用
        + Default: all
    + move_upstairs_fee: (numeric, optional) - 搬楼费用
        + Default: all
    + installation_fee: (numeric, optional) - 安装费
        + Default: all
    + total_distribution_fee: (numeric, optional) - 配送总计
        + Default: all
    + distribution_phone: (string, optional) - 配送电话
        + Default: all
    + distribution_types_id: (integer, optional) - 配送类型id
        + Default: all
    + express_fee: (numeric, optional) - 快递费用
        + Default: all
    + warehouses_id: (integer, optional) - 发货仓库id
        + Default: all

+ Response 422 (application/json)
    + Body

            {
                "message": "跟单货审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            {
                "id": 1,
                "system_order_no": "DD2018082011365716512",
                "order_status": "已财审",
                "order_source": "system",
                "shops_id": 1,
                "logistics_id": 1,
                "billing_way": "weight",
                "promise_ship_time": "2018-08-20",
                "freight_types_id": 1,
                "expected_freight": "10.00",
                "distributions_id": 1,
                "distribution_methods_id": 15,
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "distribution_phone": "配送电话",
                "distribution_no": "配送单号",
                "distribution_types_id": 1,
                "service_car_info": "服务车信息（配送信息）",
                "take_delivery_goods_fee": "10.00",
                "take_delivery_goods_ways_id": 1,
                "express_fee": "10.00",
                "service_car_fee": "10.00",
                "cancel_after_verification_code": "核销码",
                "wooden_frame_costs": "10.00",
                "preferential_cashback": "2.00",
                "favorable_cashback": "2.00",
                "customer_types_id": 1,
                "is_invoice": false,
                "invoice_express_fee": "5.00",
                "express_invoice_title": "快递发票抬头",
                "contract_no": "合同单号",
                "payment_methods_id": 1,
                "deposit": "10.00",
                "document_title": "单据头",
                "warehouses_id": 1,
                "payment_date": "2018-08-20",
                "interest_concessions": "10.00",
                "is_notice": true,
                "is_cancel_after_verification": false,
                "accept_order_user": "接单用户",
                "tax_number": "税号",
                "receipt": "收据",
                "logistics_remark": "物流备注",
                "seller_remark": "卖家备注",
                "customer_service_remark": "客服备注",
                "taobao_oid": 0,
                "taobao_tid": 0,
                "member_nick": "会员昵称",
                "shop_name": "",
                "seller_name": "",
                "seller_flag": 0,
                "created": null,
                "est_con_time": null,
                "buyer_message": "买家留言",
                "receiver_name": "",
                "receiver_phone": "",
                "receiver_mobile": "",
                "receiver_state": "",
                "receiver_city": "",
                "receiver_district": "",
                "receiver_address": "",
                "receiver_zip": "",
                "refund_info": "无退款",
                "business_personnel_id": 1,
                "locker_id": 0,
                "audit_at": null,
                "association_taobao_oid": "",
                "is_merge": false,
                "is_split": false,
                "is_association": false,
                "created_at": "2018-08-20 11:36:57",
                "updated_at": "2018-08-23 14:12:29"
            }

# financialdepts [/api]
财务部资源

## 获取所有财务部订单 [GET /api/financialdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + status: (boolean, optional) - 开启的状态
        + Default: all
    + order_status: (integer, optional) - 订单状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 22,
                        "system_order_no": "DD2018090714055056211",
                        "order_status": "已客审",
                        "order_source": "system",
                        "shops_id": 1,
                        "logistics_id": 4,
                        "billing_way": "weight",
                        "promise_ship_time": "2018-09-11",
                        "freight_types_id": 1,
                        "expected_freight": "21.00",
                        "distributions_id": 1,
                        "distribution_methods_id": 13,
                        "deliver_goods_fee": "21.00",
                        "move_upstairs_fee": "21.00",
                        "installation_fee": "21.00",
                        "total_distribution_fee": "63.00",
                        "distribution_phone": "21",
                        "distribution_no": "21",
                        "distribution_types_id": 1,
                        "service_car_info": "21",
                        "take_delivery_goods_fee": "21.00",
                        "take_delivery_goods_ways_id": 6,
                        "express_fee": "21.00",
                        "service_car_fee": "21.00",
                        "cancel_after_verification_code": "21",
                        "wooden_frame_costs": "21.00",
                        "preferential_cashback": "21.00",
                        "favorable_cashback": "21.00",
                        "customer_types_id": 1,
                        "is_invoice": false,
                        "invoice_express_fee": "21.00",
                        "express_invoice_title": "21",
                        "contract_no": "21",
                        "payment_methods_id": 3,
                        "deposit": "21.00",
                        "document_title": "21",
                        "warehouses_id": 1,
                        "payment_date": "2018-09-20",
                        "interest_concessions": "21.00",
                        "is_notice": true,
                        "is_cancel_after_verification": false,
                        "accept_order_user": "21",
                        "tax_number": "21",
                        "receipt": "21",
                        "logistics_remark": "21",
                        "seller_remark": "21",
                        "customer_service_remark": "21",
                        "taobao_oid": 0,
                        "taobao_tid": 0,
                        "member_nick": "会员昵称",
                        "shop_name": "",
                        "seller_name": "",
                        "seller_flag": 0,
                        "created": null,
                        "est_con_time": null,
                        "buyer_message": "21",
                        "receiver_name": "12",
                        "receiver_phone": "212",
                        "receiver_mobile": "21",
                        "receiver_state": "河南省",
                        "receiver_city": "南阳市",
                        "receiver_district": "邓州市",
                        "receiver_address": "21",
                        "receiver_zip": "21",
                        "refund_info": "无退款",
                        "business_personnel_id": 1,
                        "locker_id": 0,
                        "audit_at": null,
                        "association_taobao_oid": "",
                        "is_merge": false,
                        "is_split": false,
                        "is_association": false,
                        "created_at": "2018-09-07 14:05:50",
                        "updated_at": "2018-09-07 17:52:15"
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
                            "next": "http://127.0.0.1:8000/api/financialdepts?page=1"
                        }
                    }
                }
            }

## 财务驳回 [PUT /api/financialdepts/:id/reject]


+ Response 422 (application/json)
    + Body

            {
                "message": "财务驳回出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 财审 [PUT /api/financialdepts/:id/financialaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "财审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 退回财审 [PUT /api/financialdepts/:id/unfinancialaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "退回财审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# financialdepts [/api]
支付明细资源

## 新增支付明细 [POST /api/paymentdetails[?include=order,paymentMethod]]


+ Parameters
    + orders_id: (integer, required) - 订单id
    + payment_methods_id: (integer, required) - 支付方式id
    + payment: (numeric, optional) - 支付金额
    + taobao_tid: (string, optional) - 交易号
    + taobao_oid: (string, optional) - 子订单编号
    + pay_time: (datetime, optional) - 付款时间
    + remark: (string, required) - 备注

+ Request (application/json)
    + Body

            {
                "orders_id": 1,
                "payment_methods_id": 1,
                "payment": 100,
                "taobao_tid": "123456",
                "taobao_oid": "123456",
                "pay_time": "2018-8-18 00:00:00",
                "remark": "备注"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "orders_id": [
                        "支付明细id必须为int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "orders_id": 1,
                "payment_methods_id": 1,
                "payment": "100.00",
                "taobao_tid": 123456,
                "taobao_oid": 123456,
                "pay_time": "2018-08-18",
                "remark": "备注",
                "created_at": "2018-08-29 17:19:21",
                "updated_at": "2018-08-29 17:19:21",
                "meta": {
                    "status_code": "201"
                }
            }

## 更新支付明细 [PATCH /api/paymentdetails/:id[?include=order,paymentMethod]]


+ Parameters
    + orders_id: (integer, required) - 订单id
    + payment_methods_id: (integer, required) - 支付方式id
    + payment: (numeric, required) - 支付金额
    + taobao_tid: (string, required) - 交易号
    + taobao_oid: (string, required) - 子订单编号
    + pay_time: (datetime, required) - 付款时间
    + remark: (string, required) - 备注

+ Request (application/json)
    + Body

            {
                "orders_id": 1,
                "payment_methods_id": 1,
                "payment": 100,
                "taobao_tid": "123456",
                "taobao_oid": "123456",
                "pay_time": "2018-8-18 00:00:00",
                "remark": "备注"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "orders_id": [
                        "支付明细id必须为int类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "orders_id": 1,
                "payment_methods_id": 1,
                "payment": "100.00",
                "taobao_tid": 123456,
                "taobao_oid": 123456,
                "pay_time": "2018-08-18",
                "remark": "备注",
                "created_at": "2018-08-29 17:19:21",
                "updated_at": "2018-08-29 17:19:21",
                "meta": {
                    "status_code": "201"
                }
            }

## 删除支付明细 [DELETE /api/paymentdetails/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

# warehousingdepts [/api]
仓储部资源

## 获取仓储部所有订单 [GET /api/warehousingdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + status: (boolean, optional) - 开启的状态
        + Default: all
    + order_status: (integer, optional) - 订单状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 22,
                        "system_order_no": "DD2018090714055056211",
                        "order_status": "已客审",
                        "order_source": "system",
                        "shops_id": 1,
                        "logistics_id": 4,
                        "billing_way": "weight",
                        "promise_ship_time": "2018-09-11",
                        "freight_types_id": 1,
                        "expected_freight": "21.00",
                        "distributions_id": 1,
                        "distribution_methods_id": 13,
                        "deliver_goods_fee": "21.00",
                        "move_upstairs_fee": "21.00",
                        "installation_fee": "21.00",
                        "total_distribution_fee": "63.00",
                        "distribution_phone": "21",
                        "distribution_no": "21",
                        "distribution_types_id": 1,
                        "service_car_info": "21",
                        "take_delivery_goods_fee": "21.00",
                        "take_delivery_goods_ways_id": 6,
                        "express_fee": "21.00",
                        "service_car_fee": "21.00",
                        "cancel_after_verification_code": "21",
                        "wooden_frame_costs": "21.00",
                        "preferential_cashback": "21.00",
                        "favorable_cashback": "21.00",
                        "customer_types_id": 1,
                        "is_invoice": false,
                        "invoice_express_fee": "21.00",
                        "express_invoice_title": "21",
                        "contract_no": "21",
                        "payment_methods_id": 3,
                        "deposit": "21.00",
                        "document_title": "21",
                        "warehouses_id": 1,
                        "payment_date": "2018-09-20",
                        "interest_concessions": "21.00",
                        "is_notice": true,
                        "is_cancel_after_verification": false,
                        "accept_order_user": "21",
                        "tax_number": "21",
                        "receipt": "21",
                        "logistics_remark": "21",
                        "seller_remark": "21",
                        "customer_service_remark": "21",
                        "taobao_oid": 0,
                        "taobao_tid": 0,
                        "member_nick": "会员昵称",
                        "shop_name": "",
                        "seller_name": "",
                        "seller_flag": 0,
                        "created": null,
                        "est_con_time": null,
                        "buyer_message": "21",
                        "receiver_name": "12",
                        "receiver_phone": "212",
                        "receiver_mobile": "21",
                        "receiver_state": "河南省",
                        "receiver_city": "南阳市",
                        "receiver_district": "邓州市",
                        "receiver_address": "21",
                        "receiver_zip": "21",
                        "refund_info": "无退款",
                        "business_personnel_id": 1,
                        "locker_id": 0,
                        "audit_at": null,
                        "association_taobao_oid": "",
                        "is_merge": false,
                        "is_split": false,
                        "is_association": false,
                        "created_at": "2018-09-07 14:05:50",
                        "updated_at": "2018-09-07 17:52:15"
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
                            "next": "http://127.0.0.1:8000/api/warehousingdepts?page=1"
                        }
                    }
                }
            }

## 显示单条仓储订单 [GET /api/warehousingdepts/:id[?include=logistic,distribution]]


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
                "logistics_id": 4,
                "logistics_sn": null,
                "actual_freight": null,
                "distributions_id": 1,
                "distribution_phone": "配送电话",
                "deliver_goods_fee": "10.00",
                "move_upstairs_fee": "10.00",
                "installation_fee": "10.00",
                "total_distribution_fee": "30.00",
                "receiver_name": "",
                "receiver_mobile": "",
                "logistic": {
                    "id": 4,
                    "code": "物流代码",
                    "name": "物流名称",
                    "report_id": 1,
                    "expected_days": 1,
                    "phone": "1",
                    "address": "物流地址",
                    "freight_type_id": 1,
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-23 14:22:29",
                    "updated_at": "2018-08-23 16:39:22"
                },
                "distribution": {
                    "id": 1,
                    "name": "配送公司名称3",
                    "phone": "配送公司电话",
                    "address": "配送公司地址",
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-08 16:15:57",
                    "updated_at": "2018-08-08 16:21:59"
                }
            }

## 仓储修改 [PATCH /api/warehousingdepts/:id]


+ Parameters
    + logistics_id: (integer, optional) - 物流id
        + Default: all
    + logistics_sn: (string, optional) - 物流单号
        + Default: all
    + actual_freight: (numeric, optional) - 实际运费
        + Default: all
    + distributions_id: (integer, optional) - 配送id
        + Default: all
    + distribution_phone: (string, optional) - 配送电话
        + Default: all
    + deliver_goods_fee: (numeric, optional) - 送货费用
        + Default: all
    + move_upstairs_fee: (numeric, optional) - 搬楼费用
        + Default: all
    + installation_fee: (numeric, optional) - 安装费
        + Default: all
    + total_distribution_fee: (numeric, optional) - 配送总计
        + Default: all
    + receiver_name: (string, optional) - 收货人
        + Default: all
    + receiver_mobile: (string, optional) - 收货人手机
        + Default: all

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
                "logistics_id": "4",
                "logistics_sn": "123456",
                "actual_freight": "10.00",
                "distributions_id": "1",
                "distribution_phone": "123456",
                "deliver_goods_fee": "10",
                "move_upstairs_fee": "10",
                "installation_fee": "10",
                "total_distribution_fee": "30",
                "receiver_name": "收货人",
                "receiver_mobile": "123456",
                "logistic": {
                    "id": 4,
                    "code": "物流代码",
                    "name": "物流名称",
                    "report_id": 1,
                    "expected_days": 1,
                    "phone": "1",
                    "address": "物流地址",
                    "freight_type_id": 1,
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-23 14:22:29",
                    "updated_at": "2018-08-23 16:39:22"
                },
                "distribution": {
                    "id": 1,
                    "name": "配送公司名称3",
                    "phone": "配送公司电话",
                    "address": "配送公司地址",
                    "remark": "备注",
                    "status": true,
                    "created_at": "2018-08-08 16:15:57",
                    "updated_at": "2018-08-08 16:21:59"
                }
            }

## 仓储发货 [PUT /api/warehousingdepts/:id/stockout]


+ Response 422 (application/json)
    + Body

            {
                "message": "仓储发货出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 仓储退回客审 [PUT /api/warehousingdepts/:id/stockouttocs]


+ Response 422 (application/json)
    + Body

            {
                "message": "仓储发货出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 仓储出库退回 [PUT /api/warehousingdepts/:id/stockoutunaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "仓储出库退回错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# customerservicerefunds [/api]
客服退款资源

## 获取所有客服退款 [GET /api/customerservicerefunds{?status}[&include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "refund_sn": "RA2018090110411131562",
                        "order_sn": "12345645",
                        "refund_order_status": "未处理",
                        "order_source": "system",
                        "payment_methods_id": 1,
                        "time_out_at": "2018-08-31 00:00:00",
                        "shops_id": 1,
                        "account": "10",
                        "refund_payment_methods_id": 1,
                        "bank": "开户银行",
                        "address": "开户地址",
                        "refund_amount": "10.00",
                        "transaction_sn": "12345645",
                        "refund_reasons_id": 1,
                        "buyer_nick": "买家昵称",
                        "buyer_name": "买家名称",
                        "payment": "10.00",
                        "business_remark": "业务备注",
                        "as_remark": "",
                        "f_remark": "",
                        "refund_description": "退款说明",
                        "taobao_refund_status": "",
                        "creator_id": 1,
                        "business_personnel_id": 0,
                        "cs_audit_at": null,
                        "locker_id": 0,
                        "after_sales_id": 0,
                        "as_audit_at": null,
                        "financial_id": 0,
                        "f_audit_at": null,
                        "status": true,
                        "created_at": "2018-09-01 10:41:11",
                        "updated_at": "2018-09-01 10:41:11"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增客服退款(可选参数：include) [POST /api/customerservicerefunds[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]]


+ Parameters
    + order_sn: (string, optional) - 系统单号
    + payment_methods_id: (integer, required) - 支付方式id
    + time_out_at: (datetime, required) - 超时时间
    + shops_id: (integer, optional) - 还款账号
    + payment_methods_id: (integer, required) - 还款支付方式id
    + bank: (string, optional) - 开户银行
    + address: (string, optional) - 开户地址
    + refund_amount: (numeric, optional) - 退款金额
    + transaction_sn: (string, optional) - 交易单号
    + refund_reasons_id: (integer, required) - 退款原因id
    + buyer_nick: (string, optional) - 买家昵称
    + buyer_name: (string, optional) - 买家名称
    + payment: (numeric, optional) - 支付金额
    + business_remark: (string, optional) - 业务备注
    + refund_description: (string, optional) - 退款说明
    + status: (boolean, optional) - 状态

+ Request (application/json)
    + Body

            {
                "order_sn": "12345645",
                "payment_methods_id": 1,
                "time_out_at": "2018-8-31 00:00:00",
                "shops_id": 1,
                "account": 10,
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": 10,
                "transaction_sn": "12345645",
                "refund_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": 10,
                "business_remark": "业务备注",
                "refund_description": "退款说明",
                "status": true
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "refund_sn": "RA2018090110411131562",
                "order_sn": "12345645",
                "refund_order_status": "未处理",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "refund_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "business_remark": "业务备注",
                "as_remark": "",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 0,
                "cs_audit_at": null,
                "locker_id": 0,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-01 10:41:11",
                "updated_at": "2018-09-01 10:41:11",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条客服退款 [GET /api/customerservicerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]]


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
                "refund_sn": "RA2018090110411131562",
                "order_sn": "12345645",
                "refund_order_status": "未处理",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "refund_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "business_remark": "业务备注",
                "as_remark": "",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 0,
                "cs_audit_at": null,
                "locker_id": 0,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-01 10:41:11",
                "updated_at": "2018-09-01 10:41:11"
            }

## 修改客服退款 [PATCH /api/customerservicerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]]


+ Parameters
    + order_sn: (string, optional) - 系统单号
    + payment_methods_id: (integer, optional) - 支付方式id
    + time_out_at: (datetime, optional) - 超时时间
    + shops_id: (integer, optional) - 还款账号
    + payment_methods_id: (integer, optional) - 还款支付方式id
    + bank: (string, optional) - 开户银行
    + address: (string, optional) - 开户地址
    + refund_amount: (numeric, optional) - 退款金额
    + transaction_sn: (string, optional) - 交易单号
    + refund_reasons_id: (integer, optional) - 退款原因id
    + buyer_nick: (string, optional) - 买家昵称
    + buyer_name: (string, optional) - 买家名称
    + payment: (numeric, optional) - 支付金额
    + business_remark: (string, optional) - 业务备注
    + refund_description: (string, optional) - 退款说明
    + status: (boolean, optional) - 状态

+ Request (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "还未锁定无法修改",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            []

## 删除客服退款 [DELETE /api/customerservicerefunds/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组客服退款 [DELETE /api/customerservicerefunds]


+ Parameters
    + ids: (string, required) - 客服退款id组 格式: 1,2,3,4 

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

## 锁定或释放 [PUT /api/customerservicerefunds/:id/lockorunlock]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法锁定",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 客审 [PUT /api/customerservicerefunds/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "客审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 退审 [PUT /api/customerservicerefunds/:id/unaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "退审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# refundreasons [/api]
退款原因资源

## 获取所有退款原因 [GET /api/refundreasons{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "退款原因",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "退款原因2",
                        "status": true,
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
                            "next": "{{host}}/api/refundreasons?page=1"
                        }
                    }
                }
            }

## 新增退款原因 [POST /api/refundreasons]


+ Parameters
    + name: (string, required) - 退款原因名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "退款原因名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "退款原因",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条退款原因 [GET /api/refundreasons/:id]


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
                "name": "退款原因",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改退款原因 [PATCH /api/refundreasons/:id]


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
                        "退款原因名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "退款原因10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除退款原因 [DELETE /api/refundreasons/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组退款原因 [DELETE /api/refundreasons]


+ Parameters
    + ids: (string, required) - 退款原因id组 格式: 1,2,3,4 

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

## 更改一组退款原因状态 [PUT /api/refundreasons/editstatus]


+ Parameters
    + ids: (string, required) - 退款原因id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# returnreasons [/api]
退货原因资源

## 获取所有退货原因 [GET /api/returnreasons{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "退货原因",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "退货原因2",
                        "status": true,
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
                            "next": "{{host}}/api/returnreasons?page=1"
                        }
                    }
                }
            }

## 新增退货原因 [POST /api/returnreasons]


+ Parameters
    + name: (string, required) - 退货原因名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "退货原因名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "退货原因",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条退货原因 [GET /api/returnreasons/:id]


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
                "name": "退货原因",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改退货原因 [PATCH /api/returnreasons/:id]


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
                        "退货原因名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "退货原因10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除退货原因 [DELETE /api/returnreasons/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组退货原因 [DELETE /api/returnreasons]


+ Parameters
    + ids: (string, required) - 退货原因id组 格式: 1,2,3,4 

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

## 更改一组退货原因状态 [PUT /api/returnreasons/editstatus]


+ Parameters
    + ids: (string, required) - 退货原因id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# aftersalerefunds [/api]
售后退款资源

## 获取所有售后退款 [GET /api/aftersalerefunds{?status}[&include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "refund_sn": "RA2018090316285916495",
                        "order_sn": "12345645",
                        "refund_order_status": "售后锁定",
                        "order_source": "system",
                        "payment_methods_id": 1,
                        "time_out_at": "2018-08-31 00:00:00",
                        "shops_id": 1,
                        "account": "10",
                        "refund_payment_methods_id": 1,
                        "bank": "开户银行",
                        "address": "开户地址",
                        "refund_amount": "10.00",
                        "transaction_sn": "12345645",
                        "return_reasons_id": 1,
                        "buyer_nick": "买家昵称",
                        "buyer_name": "买家名称",
                        "payment": "10.00",
                        "person_liable": "责任人",
                        "liable_fee": "10",
                        "undertaker": "承担人",
                        "business_remark": "业务备注",
                        "as_remark": "售后备注",
                        "f_remark": "",
                        "refund_description": "退款说明",
                        "taobao_refund_status": "",
                        "creator_id": 1,
                        "business_personnel_id": 1,
                        "cs_audit_at": "2018-09-03 16:29:55",
                        "locker_id": 1,
                        "after_sales_id": 0,
                        "as_audit_at": null,
                        "financial_id": 0,
                        "f_audit_at": null,
                        "status": true,
                        "created_at": "2018-09-03 16:28:59",
                        "updated_at": "2018-09-03 16:30:38"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 显示单条售后退款 [GET /api/aftersalerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]]


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
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 修改售后退款 [PATCH /api/aftersalerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]]


+ Parameters
    + person_liable: (string, optional) - 责任人
    + liable_fee: (numeric, optional) - 责任金额
    + freight: (numeric, optional) - 运费
    + undertaker: (string, optional) - 承担人
    + as_remark: (string, optional) - 售后备注
    + status: (boolean, optional) - 状态

+ Request (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "还未锁定无法修改",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 删除售后退款 [DELETE /api/aftersalerefunds/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            {
                "id": 1,
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 删除一组售后退款 [DELETE /api/aftersalerefunds]


+ Parameters
    + ids: (string, required) - 售后退款id组 格式: 1,2,3,4 

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

## 锁定或释放 [PUT /api/aftersalerefunds/:id/lockorunlock]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法锁定",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 售后审核 [PUT /api/aftersalerefunds/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "售后审核出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 售后退审 [PUT /api/aftersalerefunds/:id/unaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "退审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# financialrefunds [/api]
财务退款资源

## 获取所有财务退款 [GET /api/financialrefunds{?status}[&include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "refund_sn": "RA2018090316285916495",
                        "order_sn": "12345645",
                        "refund_order_status": "财务锁定",
                        "order_source": "system",
                        "payment_methods_id": 1,
                        "time_out_at": "2018-08-31 00:00:00",
                        "shops_id": 1,
                        "account": "10",
                        "refund_payment_methods_id": 1,
                        "bank": "开户银行",
                        "address": "开户地址",
                        "refund_amount": "10.00",
                        "transaction_sn": "12345645",
                        "return_reasons_id": 1,
                        "buyer_nick": "买家昵称",
                        "buyer_name": "买家名称",
                        "payment": "10.00",
                        "person_liable": "责任人",
                        "liable_fee": "10",
                        "undertaker": "承担人",
                        "business_remark": "业务备注",
                        "as_remark": "售后备注",
                        "f_remark": "",
                        "refund_description": "退款说明",
                        "taobao_refund_status": "",
                        "creator_id": 1,
                        "business_personnel_id": 1,
                        "cs_audit_at": "2018-09-03 16:29:55",
                        "locker_id": 1,
                        "after_sales_id": 0,
                        "as_audit_at": null,
                        "financial_id": 0,
                        "f_audit_at": null,
                        "status": true,
                        "created_at": "2018-09-03 16:28:59",
                        "updated_at": "2018-09-03 16:30:38"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 显示单条财务退款 [GET /api/financialrefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]]


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
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 修改财务退款 [PATCH /api/financialrefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]]


+ Parameters
    + payment: (numeric, optional) - 支付金额
    + f_remark: (string, optional) - 财务备注

+ Request (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "还未锁定无法修改",
                "errors": {
                    "payment": [
                        "支付金额必须是数字"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 删除财务退款 [DELETE /api/financialrefunds/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            {
                "id": 1,
                "refund_sn": "RA2018090316285916495",
                "order_sn": "12345645",
                "refund_order_status": "售后锁定",
                "order_source": "system",
                "payment_methods_id": 1,
                "time_out_at": "2018-08-31 00:00:00",
                "shops_id": 1,
                "account": "10",
                "refund_payment_methods_id": 1,
                "bank": "开户银行",
                "address": "开户地址",
                "refund_amount": "10.00",
                "transaction_sn": "12345645",
                "return_reasons_id": 1,
                "buyer_nick": "买家昵称",
                "buyer_name": "买家名称",
                "payment": "10.00",
                "person_liable": "责任人",
                "liable_fee": "10",
                "undertaker": "承担人",
                "business_remark": "业务备注",
                "as_remark": "售后备注",
                "f_remark": "",
                "refund_description": "退款说明",
                "taobao_refund_status": "",
                "creator_id": 1,
                "business_personnel_id": 1,
                "cs_audit_at": "2018-09-03 16:29:55",
                "locker_id": 1,
                "after_sales_id": 0,
                "as_audit_at": null,
                "financial_id": 0,
                "f_audit_at": null,
                "status": true,
                "created_at": "2018-09-03 16:28:59",
                "updated_at": "2018-09-03 16:30:38"
            }

## 删除一组财务退款 [DELETE /api/financialrefunds]


+ Parameters
    + ids: (string, required) - 财务退款id组 格式: 1,2,3,4 

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

## 锁定或释放 [PUT /api/financialrefunds/:id/lockorunlock]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法锁定",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 财务审核 [PUT /api/financialrefunds/:id/audit]


+ Response 422 (application/json)
    + Body

            {
                "message": "财务审核出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 财务退审 [PUT /api/financialrefunds/:id/unaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "退审出错",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# customerservicereturns [/api]
客服退货资源

## 获取所有客服退货 [GET /api/customerservicereturns{?status}[&include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distributions,returnOrderItem]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 2,
                        "return_sn": "RT2018091517045055751",
                        "return_order_status": "未处理",
                        "shops_id": 1,
                        "orders_id": 4,
                        "member_nick": "会员昵称1",
                        "customer_name": "客户姓名1",
                        "customer_phone": "123456",
                        "customer_service_id": 1,
                        "deposit": "10.00",
                        "return_reasons_id": 1,
                        "customer_address": "客户地址1",
                        "is_scour": true,
                        "expected_arrival_time": null,
                        "payee": "收款人1",
                        "refund_account": "退款账号",
                        "refund_payment_methods_id": 1,
                        "refund_amount": "10.00",
                        "logistics_id": 0,
                        "freight_types_id": 0,
                        "freight": "0.00",
                        "logistics_sn": "",
                        "take_delivery_goods_address": "",
                        "logistics_remark": "",
                        "follow_up": "跟进记录",
                        "distributions_id": 1,
                        "pulling_cost": "10.00",
                        "person_liable_id": 0,
                        "liable_fee": "0.00",
                        "as_remark": "",
                        "status": true,
                        "created_at": "2018-09-15 17:04:50",
                        "updated_at": "2018-09-15 17:04:50"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 新增客服退货(可选参数：include) [POST /api/customerservicereturns[?include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distributions,returnOrderItem]]


+ Parameters
    + orders_id: (integer, required) - 订单id
    + shops_id: (integer, required) - 店铺id
    + member_nick: (string, required) - 会员昵称
    + customer_name: (string, required) - 客户姓名
    + customer_phone: (string, required) - 客户电话
    + deposit: (numeric, required) - 押金
    + return_reasons_id: (integer, required) - 退货原因id
    + customer_address: (string, required) - 客户地址
    + is_scour: (boolean, optional) - 是否冲款
    + payee: (string, optional) - 收款人
    + refund_account: (string, optional) - 退款账号
    + refund_payment_methods_id: (integer, required) - 退款支付方式id
    + refund_amount: (numeric, optional) - 退款金额
    + follow_up: (string, optional) - 跟进记录
    + distributions_id: (integer, required) - 配送公司id
    + pulling_cost: (numeric, optional) - 拉货费用
    + status: (boolean, optional) - 状态
    + return_order_items[0][order_items_id]: (integer, optional) - 子订单id
    + return_order_items[0][suppliers_id]: (integer, optional) - 供应商id
    + return_order_items[0][is_damage]: (boolean, optional) - 是否损坏

+ Request (application/json)
    + Body

            {
                "orders_id": 4,
                "shops_id": 1,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "deposit": 10,
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": 10,
                "follow_up": "跟进记录",
                "distributions_id": 1,
                "pulling_cost": 10,
                "status": true,
                "return_order_items[0][order_items_id]": 1,
                "return_order_items[0][suppliers_id]": 1,
                "return_order_items[0][is_damage]": true
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "return_sn": "RT2018091517045055751",
                "return_order_status": "未处理",
                "shops_id": 1,
                "orders_id": 4,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "customer_service_id": 1,
                "deposit": "10.00",
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "expected_arrival_time": null,
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": "10.00",
                "logistics_id": 0,
                "freight_types_id": 0,
                "freight": "0.00",
                "logistics_sn": "",
                "take_delivery_goods_address": "",
                "logistics_remark": "",
                "follow_up": "跟进记录",
                "distributions_id": 1,
                "pulling_cost": "10.00",
                "person_liable_id": 0,
                "liable_fee": "0.00",
                "as_remark": "",
                "status": true,
                "created_at": "2018-09-15 17:04:50",
                "updated_at": "2018-09-15 17:04:50",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条客服退货 [GET /api/customerservicereturns/:id[?include=]]


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
                "return_sn": "RT2018091517045055751",
                "return_order_status": "未处理",
                "shops_id": 1,
                "orders_id": 4,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "customer_service_id": 1,
                "deposit": "10.00",
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "expected_arrival_time": null,
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": "10.00",
                "logistics_id": 0,
                "freight_types_id": 0,
                "freight": "0.00",
                "logistics_sn": "",
                "take_delivery_goods_address": "",
                "logistics_remark": "",
                "follow_up": "跟进记录",
                "distributions_id": 1,
                "pulling_cost": "10.00",
                "person_liable_id": 0,
                "liable_fee": "0.00",
                "as_remark": "",
                "status": true,
                "created_at": "2018-09-15 17:04:50",
                "updated_at": "2018-09-15 17:04:50"
            }

## 修改客服退货 [PATCH /api/customerservicereturns/:id[?include=]]


+ Parameters
    + orders_id: (integer, required) - 订单id
    + shops_id: (integer, required) - 店铺id
    + member_nick: (string, required) - 会员昵称
    + customer_name: (string, required) - 客户姓名
    + customer_phone: (string, required) - 客户电话
    + deposit: (numeric, required) - 押金
    + return_reasons_id: (integer, required) - 退货原因id
    + customer_address: (string, required) - 客户地址
    + is_scour: (boolean, optional) - 是否冲款
    + payee: (string, optional) - 收款人
    + refund_account: (string, optional) - 退款账号
    + refund_payment_methods_id: (integer, required) - 退款支付方式id
    + refund_amount: (numeric, optional) - 退款金额
    + follow_up: (string, optional) - 跟进记录
    + distributions_id: (integer, required) - 配送公司id
    + pulling_cost: (numeric, optional) - 拉货费用
    + status: (boolean, optional) - 状态
    + return_order_items[0][id]: (integer, optional) - 退货子单id
    + return_order_items[0][order_items_id]: (integer, optional) - 子订单id
    + return_order_items[0][suppliers_id]: (integer, optional) - 供应商id
    + return_order_items[0][is_damage]: (boolean, optional) - 是否损坏

+ Request (application/json)
    + Body

            {
                "orders_id": 4,
                "shops_id": 1,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "deposit": 10,
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": 10,
                "follow_up": "跟进记录",
                "distributions_id": 1,
                "pulling_cost": 10,
                "status": true,
                "return_order_items[0][id]": 1,
                "return_order_items[0][order_items_id]": 1,
                "return_order_items[0][suppliers_id]": 1,
                "return_order_items[0][is_damage]": true
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
                "message": "还未锁定无法修改",
                "errors": {
                    "shops_id": [
                        "店铺id必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 2,
                "return_sn": "RT2018091517045055751",
                "return_order_status": "未处理",
                "shops_id": 1,
                "orders_id": 4,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "customer_service_id": 1,
                "deposit": "10.00",
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "expected_arrival_time": null,
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": "10.00",
                "logistics_id": 0,
                "freight_types_id": 0,
                "freight": "0.00",
                "logistics_sn": "",
                "take_delivery_goods_address": "",
                "logistics_remark": "",
                "follow_up": "跟进记录",
                "distributions_id": 1,
                "pulling_cost": "10.00",
                "person_liable_id": 0,
                "liable_fee": "0.00",
                "as_remark": "",
                "status": true,
                "created_at": "2018-09-15 17:04:50",
                "updated_at": "2018-09-15 17:04:50"
            }

## 删除客服退货 [DELETE /api/customerservicereturns/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组客服退货 [DELETE /api/customerservicereturns]


+ Parameters
    + ids: (string, required) - 客服退货id组 格式: 1,2,3,4 

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

## 客服一审 [PUT /api/customerservicereturns/:id/oneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法客服一审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 客服一审退审 [PUT /api/customerservicereturns/:id/unoneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法客服一审退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 客服二审 [PUT /api/customerservicereturns/:id/twoaudit]


+ Parameters
    + expected_arrival_time: (date, required) - 预计到货时间
    + logistics_id: (integer, required) - 物流id
    + freight_types_id: (integer, required) - 运费类型id
    + freight: (numeric, required) - 运费
    + logistics_sn: (string, required) - 物流单号
    + take_delivery_goods_address: (string, required) - 提货地址
    + logistics_remark: (string, optional) - 物流备注
    + follow_up: (string, optional) - 跟进记录
    + return_order_items[0][id]: (integer, required) - 退货子单id
    + return_order_items[0][suppliers_id]: (integer, required) - 供应商id

+ Request (application/json)
    + Body

            {
                "expected_arrival_time": "2018-9-7",
                "logistics_id": 1,
                "freight_types_id": 1,
                "freight": 10,
                "logistics_sn": "物流单号",
                "take_delivery_goods_address": "提货地址",
                "logistics_remark": "物流备注",
                "follow_up": "跟进记录",
                "return_order_items[0][id]": 1,
                "return_order_items[0][suppliers_id]": 1
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "无法客服二审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 客服二审退审 [PUT /api/customerservicereturns/:id/untwoaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法客服二审退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# aftersalereturns [/api]
售后退货资源

## 删除售后退货 [DELETE /api/aftersalereturns/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 售后一审 [PUT /api/aftersalereturns/:id/oneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法售后一审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 售后一审退审 [PUT /api/aftersalereturns/:id/unoneaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法售后一审退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 售后二审 [PUT /api/aftersalereturns/:id/twoaudit]


+ Parameters
    + person_liable_id: (integer, required) - 责任人
    + liable_fee: (numeric, required) - 责任金额
    + as_remark: (string, required) - 售后备注

+ Request (application/json)
    + Body

            {
                "person_liable_id": 1,
                "liable_fee": 10,
                "as_remark": "售后备注"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "无法售后一审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 售后二审退审 [PUT /api/aftersalereturns/:id/untwoaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法售后一审退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# warehousingreturns [/api]
仓储退货资源

## 获取所有仓储退货 [GET /api/warehousingreturns{?status}[&include=]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + order_status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 显示单条仓储退货 [GET /api/warehousingreturns/:id[?include=]]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 200 (application/json)
    + Body

            []

## 仓储审核 [PUT /api/warehousingreturns/:id/whaudit]


+ Parameters
    + expected_arrival_time: (date, required) - 预计到货时间
    + logistics_id: (integer, required) - 物流id
    + freight_types_id: (integer, required) - 运费类型id
    + freight: (numeric, required) - 运费
    + logistics_sn: (string, required) - 物流单号
    + take_delivery_goods_address: (string, required) - 提货地址
    + logistics_remark: (string, optional) - 物流备注
    + follow_up: (string, optional) - 跟进记录
    + return_order_items[0][id]: (integer, required) - 退货子单id
    + return_order_items[0][suppliers_id]: (integer, required) - 供应商id
    + return_order_items[0][receipt_types_id]: (integer, required) - 收货类型id
    + return_order_items[0][is_damage]: (integer, optional) - 是否损坏

+ Request (application/json)
    + Body

            {
                "expected_arrival_time": "2018-9-7",
                "logistics_id": 1,
                "freight_types_id": 1,
                "freight": 10,
                "logistics_sn": "物流单号",
                "take_delivery_goods_address": "提货地址",
                "logistics_remark": "物流备注",
                "follow_up": "跟进记录",
                "return_order_items[0][id]": 1,
                "return_order_items[0][suppliers_id]": 1,
                "return_order_items[0][receipt_types_id]": 1,
                "return_order_items[0][is_damage]": true
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "无法仓储审核",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 仓储审核退审 [PUT /api/warehousingreturns/:id/whunaudit]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法仓储审核退审",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# receipttypes [/api]
收货方式资源

## 获取所有收货方式 [GET /api/paymentmethods{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "收货方式",
                        "status": true,
                        "created_at": "2018-06-14 16:55:32",
                        "updated_at": "2018-06-14 16:55:32"
                    },
                    {
                        "id": 2,
                        "name": "收货方式2",
                        "status": true,
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
                            "next": "{{host}}/api/paymentmethods?page=1"
                        }
                    }
                }
            }

## 新增收货方式 [POST /api/paymentmethods]


+ Parameters
    + name: (string, required) - 收货方式名称
    + status: (boolean, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "收货方式名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "收货方式",
                "status": true,
                "created_at": "2018-06-14 16:55:40",
                "updated_at": "2018-06-14 16:55:40",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条收货方式 [GET /api/paymentmethods/:id]


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
                "name": "收货方式",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:55:32"
            }

## 修改收货方式 [PATCH /api/paymentmethods/:id]


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
                        "收货方式名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "收货方式10",
                "status": true,
                "created_at": "2018-06-14 16:55:32",
                "updated_at": "2018-06-14 16:58:55"
            }

## 删除收货方式 [DELETE /api/paymentmethods/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组收货方式 [DELETE /api/paymentmethods]


+ Parameters
    + ids: (string, required) - 收货方式id组 格式: 1,2,3,4 

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

## 更改一组收货方式状态 [PUT /api/paymentmethods/editstatus]


+ Parameters
    + ids: (string, required) - 收货方式id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# stocksyncreturn [/api]
库存同步资源

## 获取所有库存同步 [GET /api/stocksyncreturn{?status}[&include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distribution,returnOrderItem,personliable]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
    + order_status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "return_sn": "RT2018091515081324812",
                        "return_order_status": "同步库存",
                        "shops_id": 1,
                        "orders_id": 4,
                        "member_nick": "会员昵称1",
                        "customer_name": "客户姓名1",
                        "customer_phone": "123456",
                        "customer_service_id": 1,
                        "deposit": "10.00",
                        "return_reasons_id": 1,
                        "customer_address": "客户地址1",
                        "is_scour": true,
                        "expected_arrival_time": "2018-09-13 00:00:00",
                        "payee": "收款人1",
                        "refund_account": "退款账号",
                        "refund_payment_methods_id": 1,
                        "refund_amount": "10.00",
                        "logistics_id": 1,
                        "freight_types_id": 0,
                        "freight": "10.00",
                        "logistics_sn": "物流单号1",
                        "take_delivery_goods_address": "提货地址1",
                        "logistics_remark": "物流备注1",
                        "follow_up": "测试跟进",
                        "distributions_id": 1,
                        "pulling_cost": "10.00",
                        "person_liable_id": 1,
                        "liable_fee": "10.00",
                        "as_remark": "售后备注",
                        "status": true,
                        "created_at": "2018-09-15 15:08:13",
                        "updated_at": "2018-09-15 16:36:00"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 1,
                        "count": 1,
                        "per_page": 8,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": null
                    }
                }
            }

## 显示单条库存同步 [GET /api/stocksyncreturn/:id[?include=]]


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
                "return_sn": "RT2018091515081324812",
                "return_order_status": "同步库存",
                "shops_id": 1,
                "orders_id": 4,
                "member_nick": "会员昵称1",
                "customer_name": "客户姓名1",
                "customer_phone": "123456",
                "customer_service_id": 1,
                "deposit": "10.00",
                "return_reasons_id": 1,
                "customer_address": "客户地址1",
                "is_scour": true,
                "expected_arrival_time": "2018-09-13 00:00:00",
                "payee": "收款人1",
                "refund_account": "退款账号",
                "refund_payment_methods_id": 1,
                "refund_amount": "10.00",
                "logistics_id": 1,
                "freight_types_id": 0,
                "freight": "10.00",
                "logistics_sn": "物流单号1",
                "take_delivery_goods_address": "提货地址1",
                "logistics_remark": "物流备注1",
                "follow_up": "测试跟进",
                "distributions_id": 1,
                "pulling_cost": "10.00",
                "person_liable_id": 1,
                "liable_fee": "10.00",
                "as_remark": "售后备注",
                "status": true,
                "created_at": "2018-09-15 15:08:13",
                "updated_at": "2018-09-15 16:36:00"
            }

## 库存提交 [PUT /api/stocksyncreturn/:id/stocksubmit]


+ Parameters
    + expected_arrival_time: (date, required) - 预计到货时间
    + follow_up: (string, optional) - 跟进记录
    + return_order_items[0][id]: (integer, required) - 退货子单id
    + return_order_items[0][suppliers_id]: (integer, required) - 供应商id
    + return_order_items[0][receipt_types_id]: (integer, required) - 收货类型id
    + return_order_items[0][is_damage]: (integer, required) - 是否损坏
    + return_order_items[0][repair_price]: (integer, required) - 返修价格
    + return_order_items[0][factory_return_time]: (integer, required) - 退厂时间
    + return_order_items[0][expected_return_time]: (integer, required) - 预计返还时间
    + return_order_items[0][warehouse_id]: (integer, required) - 收货仓库
    + return_order_items[0][remark]: (integer, required) - 备注

+ Request (application/json)
    + Body

            {
                "expected_arrival_time": "2018-9-7",
                "follow_up": "跟进记录",
                "return_order_items[0][id]": 1,
                "return_order_items[0][suppliers_id]": 1,
                "return_order_items[0][receipt_types_id]": 1,
                "return_order_items[0][is_damage]": true,
                "return_order_items[0][repair_price]": 10,
                "return_order_items[0][factory_return_time]": "2018-9-1",
                "return_order_items[0][expected_return_time]": "2018-9-13",
                "return_order_items[0][warehouse_id]": 3,
                "return_order_items[0][remark]": "测试备注"
            }

+ Response 422 (application/json)
    + Body

            {
                "message": "无法库存提交",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

## 库存同步 [PUT /api/stocksyncreturn/:id/stocksync]


+ Response 422 (application/json)
    + Body

            {
                "message": "无法库存同步",
                "status_code": 422
            }

+ Response 204 (application/json)
    + Body

            []

# returnorderitems [/api]
退货子单资源

## 删除退货子单 [DELETE /api/returnorderitems/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

# resuppliecategories [/api]
补件类别资源

## 获取所有补件类别 [GET /api/resuppliecategories{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "补件类别1",
                        "status": true,
                        "created_at": "2018-06-25 10:45:30",
                        "updated_at": "2018-06-25 10:45:30"
                    },
                    {
                        "id": 2,
                        "name": "补件类别2",
                        "status": true,
                        "created_at": "2018-06-25 10:45:32",
                        "updated_at": "2018-06-25 10:45:32"
                    }
                ]
            }

## 新增补件类别 [POST /api/resuppliecategories]


+ Parameters
    + name: (string, required) - 补件类别名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "补件类别名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "补件类别1",
                "status": true,
                "created_at": "2018-06-14 15:02:10",
                "updated_at": "2018-06-14 15:02:10",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条补件类别 [GET /api/resuppliecategories/:id]


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
                "name": "补件类别1",
                "status": true,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:01:51"
            }

## 修改补件类别 [PATCH /api/resuppliecategories/:id]


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
                        "补件类别名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "补件类别10",
                "status": true,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:07:56"
            }

## 删除补件类别 [DELETE /api/resuppliecategories/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组补件类别 [DELETE /api/resuppliecategories]


+ Parameters
    + ids: (string, required) - 补件类别id组 格式: 1,2,3,4 

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

## 更改一组补件类别状态 [PUT /api/resuppliecategories/editstatus]


+ Parameters
    + ids: (string, required) - 补件类别id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# resupplieresponsibles [/api]
补件责任方资源

## 获取所有补件责任方 [GET /api/resupplieresponsibles{?status}]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "补件责任方1",
                        "status": true,
                        "created_at": "2018-06-25 10:45:30",
                        "updated_at": "2018-06-25 10:45:30"
                    },
                    {
                        "id": 2,
                        "name": "补件责任方2",
                        "status": true,
                        "created_at": "2018-06-25 10:45:32",
                        "updated_at": "2018-06-25 10:45:32"
                    }
                ]
            }

## 新增补件责任方 [POST /api/resupplieresponsibles]


+ Parameters
    + name: (string, required) - 补件责任方名称
    + status: (integer, optional) - 状态(0:停用，1:启用)
        + Default: 1

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "name": [
                        "补件责任方名称必填"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "补件责任方1",
                "status": true,
                "created_at": "2018-06-14 15:02:10",
                "updated_at": "2018-06-14 15:02:10",
                "meta": {
                    "status_code": "201"
                }
            }

## 显示单条补件责任方 [GET /api/resupplieresponsibles/:id]


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
                "name": "补件责任方1",
                "status": true,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:01:51"
            }

## 修改补件责任方 [PATCH /api/resupplieresponsibles/:id]


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
                        "补件责任方名称必须string类型"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "id": 1,
                "name": "补件责任方10",
                "status": true,
                "created_at": "2018-06-14 15:01:51",
                "updated_at": "2018-06-14 15:07:56"
            }

## 删除补件责任方 [DELETE /api/resupplieresponsibles/:id]


+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model ",
                "status_code": 404
            }

+ Response 204 (application/json)
    + Body

            []

## 删除一组补件责任方 [DELETE /api/resupplieresponsibles]


+ Parameters
    + ids: (string, required) - 补件责任方id组 格式: 1,2,3,4 

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

## 更改一组补件责任方状态 [PUT /api/resupplieresponsibles/editstatus]


+ Parameters
    + ids: (string, required) - 补件责任方id组 格式: 1,2,3,4 
    + status: (boolean, required) - 状态(0:停用，1:启用)

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

# uploadimages [/api]
图片上传

## 图片上传 [POST /api/uploadimages]


+ Parameters
    + image: (file, required) - 图片

+ Response 422 (application/json)
    + Body

            {
                "message": "422 Unprocessable Entity",
                "errors": {
                    "image": [
                        "图片类型限定为jpeg、png、gif"
                    ]
                },
                "status_code": 422
            }

+ Response 201 (application/json)
    + Body

            {
                "path": "/uploads/images/temp/201808/10/0_1533881172_B1CgixHzoh.jpg",
                "meta": {
                    "status_code": 201
                }
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