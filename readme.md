# ERP

### 运行环境
* Nginx 1.8+
* PHP 7.0+
* Mysql 5.7+
* Redis 3.0+

### 开发环境部署/安装
 
 本项目代码使用 PHP 框架 Laravel 5.5 开发，本地开发环境使用 Laravel Homestead。
 
 下文将在假定已经安装好了 Homestead 的情况下进行说明。如果您还未安装 Homestead，可以参照 Homestead 安装与设置 进行安装配置。
 

* 克隆项目到本地
* 运行开发环境搭建参考：https://laravel-china.org/docs/laravel-development-environment/5.5
* 复制根目录下 `.env.example` 文件重命名为 `.env`
* 项目根目录执行命令 `composer update`安装laravel扩展包依赖,
  `viacreative/sudo-su`需要单独安装：`composer require viacreative/sudo-su`
* 项目根目录执行命令 `npm install` (windows 及 虚拟机用户请使用`npm install --no-bin-links`)安装前端扩展;
  具体前端工作流参照：http://note.youdao.com/noteshare?id=b1a0bd5e5858a82796ab02285d38e12f
* 生成密钥 `php artisan key:generate`
* 生成 JWT 密钥 `php artisan jwt:secret`


###  composer 扩展包说明
  
| 扩展包 | 描述 | 场景 | 
| - | :-: | -: |
| dingo/api | api开发包 |  | 
| tymon/jwt-auth | jwt认证 | 用户登录授权策略 |
| barryvdh/laravel-debugbar | 页面调试工具栏 (对 phpdebugbar 的封装) | 开发环境中的 DEBUG |
| viacreative/sudo-su | 用户切换 | 开发环境中快速切换登录账号 |
| gregwar/captcha | 图片验证码 | api开发专用图片验证码 |
*  `liyu/dingo-serializer-switch`: 单一资源输出去掉data包裹,
   在路由中添加 `'middleware' => ['serializer:array', 'bindings']`中间件：
   api输出结构：
```
{
    "id": 1,
    "markcode": "CANCELORDER",
    "markname": "取消订单",
    "color": "#555555",
    "description": "描述",
    "status": 0,
    "created_at": "2018-06-11 15:04:17",
    "updated_at": "2018-06-11 15:04:17"
}
```
原来的结构：
```
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
        }
    ]
}
```

 

### API说明
 
---
* 调用说明：除了登录、注册以外，其他所有调用都必须在header中附带Authorization头 `Authorization:bearer eyJ0eXA...`
* 生成接口文档命令：

`php artisan api:docs --name API文档 --output-file docs/apidocs/apidoc.md`

编写规则：https://laravel-china.org/docs/dingo-api/2.0.0/API-Blueprint-Documentation/1454

### 前端开发说明 
 
 ---
