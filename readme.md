# 博飞ERP

* 克隆项目到本地
* 运行开发环境搭建参考：https://laravel-china.org/docs/laravel-development-environment/5.5
* 复制根目录下 `.env.example` 文件重命名为 `.env`
* 项目根目录执行命令 `composer update`安装laravel扩展
* 项目根目录执行命令 `npm install` (windows 及 虚拟机用户请使用`npm install --no-bin-links`)安装前端扩展;
  具体前端工作流参照：http://note.youdao.com/noteshare?id=b1a0bd5e5858a82796ab02285d38e12f
  
  
  
###扩展包说明
* `dingo/api`: API 开发包,
* `gregwar/captcha`: api开发验证码,
*  `liyu/dingo-serializer-switch`: 单一资源输出去掉data包裹,
   在路由中添加 `'middleware' => ['serializer:array', 'bindings']`中间件：
   api输出结构：
```
{
    "id": 1,
    "code": "#555555",
    "name": "取消订单",
    "color": "灰色",
    "desc": "描述",
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
            "code": "#555555",
            "name": "取消订单",
            "color": "灰色",
            "desc": "描述",
            "status": 0,
            "created_at": "2018-06-11 15:04:17",
            "updated_at": "2018-06-11 15:04:17"
        }
    ]
}
```
*  `viacreative/sudo-su`: 设置api错误返回的状态码，比如模型不存在时，dingo默认返回500错误，不是我们想要的，在
   `app/Providers/AppServiceProvider.php` 设置自定义状态码
    
```    
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
        \API::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404);
        });
        \API::error(function (\Illuminate\Auth\Access\AuthorizationException $exception) {
                abort(403, $exception->getMessage());
            });
    }
```