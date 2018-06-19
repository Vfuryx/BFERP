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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有记账类型 [GET /api/acctypes]


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
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 2,
                        "links": {
                            "previous": null,
                            "next": "http://127.0.0.1:8000/api/acctypes?page=2"
                        }
                    }
                }
            }

## 新增记账类型 [POST /api/acctypes]


+ Parameters
    + name: (string, required) - 记账类型名称
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有费用类型 [GET /api/feetypes]


+ Response 200 (application/json)
    + Body

            {
                "data": [
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
                    },
                    {
                        "id": 2,
                        "fee_category_id": 1,
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
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 1,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/feetypes?page=2"
                        }
                    }
                }
            }

## 新增费用类型 [POST /api/feetypes]


+ Parameters
    + fee_category_id: (string, required) - 费用类别id
    + name: (string, required) - 费用名称
    + code: (string, required) - 费用代码
    + remark: (string, optional) - 费用类别备注
    + is_default: (string, optional) - 是否默认
        + Default: 0
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有配送方式 [GET /api/distmets]


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
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/distmets?page=2"
                        }
                    }
                }
            }

## 新增配送方式 [POST /api/distmets]


+ Parameters
    + name: (string, required) - 配送方式名
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有费用类别 [GET /api/feecates]


+ Response 200 (application/json)
    + Body

            {
                "data": [
                    {
                        "id": 1,
                        "name": "费用类别1",
                        "status": 1,
                        "created_at": "2018-06-14 15:01:51",
                        "updated_at": "2018-06-14 15:01:51"
                    },
                    {
                        "id": 2,
                        "name": "费用类别2",
                        "status": 1,
                        "created_at": "2018-06-14 15:02:07",
                        "updated_at": "2018-06-14 15:02:07"
                    }
                ],
                "meta": {
                    "pagination": {
                        "total": 3,
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/feecates?page=2"
                        }
                    }
                }
            }

## 新增费用类别 [POST /api/feecates]


+ Parameters
    + name: (string, required) - 费用类别名称
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有运费类型 [GET /api/freighttypes]


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
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/freighttypes?page=2"
                        }
                    }
                }
            }

## 新增运费类型 [POST /api/freighttypes]


+ Parameters
    + name: (string, required) - 运费类型名称
    + is_default: (string, optional) - 是否默认
        + Default: 0
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有商品类别 [GET /api/goodscates]


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
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/goodscates?page=2"
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
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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

## 获取所有入库类型 [GET /api/storagetypes]


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
                        "count": 2,
                        "per_page": 2,
                        "current_page": 1,
                        "total_pages": 3,
                        "links": {
                            "previous": null,
                            "next": "{{host}}/api/storagetypes?page=2"
                        }
                    }
                }
            }

## 新增入库类型 [POST /api/storagetypes]


+ Parameters
    + name: (string, required) - 入库类型名称
    + status: (string, optional) - 状态(0:停用，1:启用)
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
    + status: (string, required) - 状态(0:停用，1:启用)

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