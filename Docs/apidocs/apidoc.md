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
    + is_free_shipping: (boolean, optional) - 是否包邮
        + Default: 0
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "expected_days": "1",
                "route": "1",
                "is_free_shipping": true,
                "remark": "1",
                "status": true,
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
                    "status": true,
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
                "is_free_shipping": true,
                "remark": "1",
                "status": true,
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
                                    "status": true,
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
                    "status": true,
                    "created_at": "2018-07-03 17:50:46",
                    "updated_at": "2018-07-03 17:50:49"
                },
                "expected_days": "10",
                "phone": "物流电话",
                "address": "物流地址",
                "freight_type": {
                    "id": 1,
                    "name": "运费名称1",
                    "status": true,
                    "is_default": true,
                    "created_at": "2018-07-03 17:51:25",
                    "updated_at": "2018-07-03 17:51:25"
                },
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
                            "status": true,
                            "created_at": "2018-08-21 10:21:07",
                            "updated_at": "2018-08-21 10:21:07"
                        }
                    ]
                },
                "remark": "备注",
                "status": true,
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
                            "status": true,
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
                            "status": true,
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

## 获取所有供应商 [GET /api/suppliers{?status}]


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
                        "email": "邮箱",
                        "remark": "备注",
                        "is_scan": true,
                        "status": true,
                        "auto_valuation": true,
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
    + is_scan: (boolean, optional) - 是否启用扫描
        + Default: 1
    + auto_valuation: (boolean, optional) - 是否采购自动计价
        + Default: 1
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
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
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
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
                "is_scan": true,
                "status": true,
                "auto_valuation": true,
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

## 新增系列 [POST /api/series]


+ Parameters
    + suppliers_id: (integer, required) - 供应商id
    + code: (string, required) - 系列代码
    + name: (string, required) - 系列名称
    + description: (string, optional) - 系列描述
    + remark: (string, optional) - 备注
    + status: (boolean, optional) - 状态(0:停用，1:启用)
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
                    "is_scan": true,
                    "status": true,
                    "auto_valuation": true,
                    "created_at": "2018-07-04 11:11:39",
                    "updated_at": "2018-07-04 11:22:29"
                },
                "code": "系列代码10",
                "name": "系列名称10",
                "description": "系列描述10",
                "remark": "备注10",
                "status": true,
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
                        "creator": "admin",
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
                "creator": "admin",
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
                "creator": "admin",
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
                "creator": "admin",
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

# cancelpurchases [/api]
取消采购资源

## 获取所有取消采购 [GET /api/cancelpurchases[?status=true&include=purchase,cancelPurchaseDetails]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
        + Default: all
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

## 获取所有客服部 [GET /api/customerservicedepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]]


+ Parameters
    + status: (boolean, optional) - 获取的状态
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

            [
                {
                    "identifier": "shops_id",
                    "type": "integer",
                    "required": true,
                    "description": "店铺id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "member_nick",
                    "type": "string",
                    "required": false,
                    "description": "会员昵称",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "logistics_id",
                    "type": "integer",
                    "required": true,
                    "description": "物流id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "billing_way",
                    "type": "string",
                    "required": true,
                    "description": "计费方式:weight、volume",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "promise_ship_time",
                    "type": "date",
                    "required": false,
                    "description": "承诺发货时间",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "freight_types_id",
                    "type": "integer",
                    "required": true,
                    "description": "运费类型id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "expected_freight",
                    "type": "numeric",
                    "required": false,
                    "description": "预计运费",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "distributions_id",
                    "type": "integer",
                    "required": true,
                    "description": "配送id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "distribution_methods_id",
                    "type": "integer",
                    "required": false,
                    "description": "配送方式id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "deliver_goods_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "送货费用",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "move_upstairs_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "搬楼费用",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "installation_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "安装费",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "total_distribution_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "配送总计(送货费用 + 搬楼费用 + 安装费)",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "distribution_phone",
                    "type": "string",
                    "required": false,
                    "description": "配送电话",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "distribution_no",
                    "type": "string",
                    "required": false,
                    "description": "配送单号",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "distribution_types_id",
                    "type": "integer",
                    "required": false,
                    "description": "配送类型id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "service_car_info",
                    "type": "string",
                    "required": false,
                    "description": "服务车信息（配送信息）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "take_delivery_goods_fee",
                    "type": "numeric",
                    "required": true,
                    "description": "提货费用",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "take_delivery_goods_ways_id",
                    "type": "integer",
                    "required": false,
                    "description": "提货方式id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "express_fee",
                    "type": "integer",
                    "required": false,
                    "description": "快递费用",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "service_car_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "服务车金额（家装服务）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "cancel_after_verification_code",
                    "type": "string",
                    "required": false,
                    "description": "核销码",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "wooden_frame_costs",
                    "type": "numeric",
                    "required": false,
                    "description": "木架费",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "preferential_cashback",
                    "type": "numeric",
                    "required": false,
                    "description": "优惠返现",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "favorable_cashback",
                    "type": "numeric",
                    "required": false,
                    "description": "好评返现",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "customer_types_id",
                    "type": "string",
                    "required": true,
                    "description": "客户类型id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "is_invoice",
                    "type": "boolean",
                    "required": false,
                    "description": "是否要发票",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "invoice_express_fee",
                    "type": "numeric",
                    "required": false,
                    "description": "发票快递费",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "express_invoice_title",
                    "type": "string",
                    "required": false,
                    "description": "快递发票抬头",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "contract_no",
                    "type": "string",
                    "required": false,
                    "description": "合同单号",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_methods_id",
                    "type": "integer",
                    "required": true,
                    "description": "付款方式id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "deposit",
                    "type": "numeric",
                    "required": false,
                    "description": "订金",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "document_title",
                    "type": "string",
                    "required": false,
                    "description": "单据头",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "warehouses_id",
                    "type": "integer",
                    "required": true,
                    "description": "发货仓库id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_date",
                    "type": "date",
                    "required": false,
                    "description": "支付日期",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "interest_concessions",
                    "type": "numeric",
                    "required": false,
                    "description": "让利",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "is_notice",
                    "type": "boolean",
                    "required": false,
                    "description": "是否等通知发货",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "is_cancel_after_verification",
                    "type": "boolean",
                    "required": false,
                    "description": "是否核销",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "accept_order_user",
                    "type": "string",
                    "required": false,
                    "description": "接单用户",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "tax_number",
                    "type": "string",
                    "required": false,
                    "description": "税号",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receipt",
                    "type": "string",
                    "required": false,
                    "description": "收据",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "logistics_remark",
                    "type": "string",
                    "required": false,
                    "description": "物流备注",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "seller_remark",
                    "type": "string",
                    "required": false,
                    "description": "卖家备注",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "customer_service_remark",
                    "type": "string",
                    "required": false,
                    "description": "客服备注",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "buyer_message",
                    "type": "string",
                    "required": false,
                    "description": "买家留言",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "status",
                    "type": "string",
                    "required": false,
                    "description": "订单是否开启",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_name",
                    "type": "string",
                    "required": true,
                    "description": "收货人",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_phone",
                    "type": "string",
                    "required": true,
                    "description": "收货人固定电话",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_mobile",
                    "type": "string",
                    "required": true,
                    "description": "收货人手机",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_state",
                    "type": "string",
                    "required": true,
                    "description": "收货人的所在省份",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_city",
                    "type": "string",
                    "required": true,
                    "description": "收货人的所在城市",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_district",
                    "type": "string",
                    "required": true,
                    "description": "收货人的所在地区",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_address",
                    "type": "string",
                    "required": true,
                    "description": "收货人的详细地址",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "receiver_zip",
                    "type": "string",
                    "required": true,
                    "description": "收货邮编",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][products_id]",
                    "type": "integer",
                    "required": false,
                    "description": "产品id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][combinations_id]",
                    "type": "integer",
                    "required": false,
                    "description": "组合id",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][total_volume]",
                    "type": "numeric",
                    "required": false,
                    "description": "总体积",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][paint]",
                    "type": "string",
                    "required": false,
                    "description": "油漆",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][is_printing]",
                    "type": "boolean",
                    "required": false,
                    "description": "是否需要印刷",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][printing_fee]",
                    "type": "numeric",
                    "required": false,
                    "description": "印刷费用",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][is_spot_goods]",
                    "type": "boolean",
                    "required": false,
                    "description": "是否现货",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][under_line_univalent]",
                    "type": "numeric",
                    "required": false,
                    "description": "线下单价",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][under_line_total_amount]",
                    "type": "numeric",
                    "required": false,
                    "description": "线下金额（数量*单价）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][under_line_preferential]",
                    "type": "numeric",
                    "required": false,
                    "description": "优惠（线下）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "order_items[0][under_line_payment]",
                    "type": "numeric",
                    "required": false,
                    "description": "实际支付金额（线下）（线下金额 - 优惠）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_details[0][payment]",
                    "type": "numeric",
                    "required": false,
                    "description": "支付金额",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_details[0][taobao_tid]",
                    "type": "string",
                    "required": false,
                    "description": "交易号（获取淘宝的交易编号）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_details[0][taobao_oid]",
                    "type": "string",
                    "required": false,
                    "description": "子订单编号（获取淘宝的订单号）",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_details[0][pay_time]",
                    "type": "datetime",
                    "required": false,
                    "description": "付款时间",
                    "default": null,
                    "example": null,
                    "members": null
                },
                {
                    "identifier": "payment_details[0][remark]",
                    "type": "string",
                    "required": false,
                    "description": "备注",
                    "default": null,
                    "example": null,
                    "members": null
                }
            ]

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