<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['serializer:array', 'bindings']], function ($api) {
    // 图片验证码
    $api->post('captchas', 'CaptchasController@store')
        ->name('api.captchas.store');
    //页面请求
    $api->group([
        'middleware' => ['api.throttle','jwt.auth'],
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),
    ], function ($api) {
        //标记颜色
        $api->get('markcolors', 'MarkColorsController@index')
            ->name('api.markcolors.index');
        $api->get('markcolors/{markcolor}', 'MarkColorsController@show')
            ->name('api.markcolors.show');
        $api->post('markcolors', 'MarkColorsController@store')
            ->name('api.markcolors.store');
        $api->patch('markcolors/{markcolor}', 'MarkColorsController@update')
            ->name('api.markcolors.update');
        $api->delete('markcolors/{markcolor}', 'MarkColorsController@destroy')
            ->name('api.markcolors.destroy');

        //记账类型
        $api->get('acctypes', 'AccountingTypesController@index')
            ->name('api.acctypes.index');
        $api->get('acctypes/{acctype}', 'AccountingTypesController@show')
            ->name('api.acctypes.show');
        $api->post('acctypes', 'AccountingTypesController@store')
            ->name('api.acctypes.store');
        $api->patch('acctypes/{acctype}', 'AccountingTypesController@update')
            ->name('api.acctypes.update');
        $api->delete('acctypes/{acctype}', 'AccountingTypesController@destroy')
            ->name('api.acctypes.destroy');
            
        //费用类型
        $api->get('feetypes', 'FeeTypesController@index')
            ->name('api.feetypes.index');
        $api->get('feetypes/{feetype}', 'FeeTypesController@show')
            ->name('api.feetypes.show');
        $api->post('feetypes', 'FeeTypesController@store')
            ->name('api.feetypes.store');
        $api->patch('feetypes/{feetype}', 'FeeTypesController@update')
            ->name('api.feetypes.update');
        $api->delete('feetypes/{feetype}', 'FeeTypesController@destroy')
            ->name('api.feetypes.destroy');

        //运输方式
        $api->get('distmets', 'DistributionMethodsController@index')
            ->name('api.distmets.index');
        $api->get('distmets/{distmet}', 'DistributionMethodsController@show')
            ->name('api.distmets.show');
        $api->post('distmets', 'DistributionMethodsController@store')
            ->name('api.distmets.store');
        $api->patch('distmets/{distmet}', 'DistributionMethodsController@update')
            ->name('api.distmets.update');
        $api->delete('distmets/{distmet}', 'DistributionMethodsController@destroy')
            ->name('api.distmets.destroy');

        //费用类别
        $api->get('feecates', 'FeeCategoriesController@index')
            ->name('api.feecates.index');
        $api->get('feecates/{feecate}', 'FeeCategoriesController@show')
            ->name('api.feecates.show');
        $api->post('feecates', 'FeeCategoriesController@store')
            ->name('api.feecates.store');
        $api->patch('feecates/{feecate}', 'FeeCategoriesController@update')
            ->name('api.feecates.update');
        $api->delete('feecates/{feecate}', 'FeeCategoriesController@destroy')
            ->name('api.feecates.destroy');

        //运费类型
        $api->get('freighttypes', 'FreightTypesController@index')
            ->name('api.freighttypes.index');
        $api->get('freighttypes/{freighttype}', 'FreightTypesController@show')
            ->name('api.freighttypes.show');
        $api->post('freighttypes', 'FreightTypesController@store')
            ->name('api.freighttypes.store');
        $api->patch('freighttypes/{freighttype}', 'FreightTypesController@update')
            ->name('api.freighttypes.update');
        $api->delete('freighttypes/{freighttype}', 'FreightTypesController@destroy')
            ->name('api.freighttypes.destroy');

        //商品类别
        $api->get('goodscates', 'GoodsCategoriesController@index')
            ->name('api.goodscates.index');
        $api->get('goodscates/{goodscate}', 'GoodsCategoriesController@show')
            ->name('api.goodscates.show');
        $api->post('goodscates', 'GoodsCategoriesController@store')
            ->name('api.goodscates.store');
        $api->patch('goodscates/{goodscate}', 'GoodsCategoriesController@update')
            ->name('api.goodscates.update');
        $api->delete('goodscates/{goodscate}', 'GoodsCategoriesController@destroy')
            ->name('api.goodscates.destroy');

        //存储类型
        $api->get('storagetypes', 'StorageTypesController@index')
            ->name('api.storagetypes.index');
        $api->get('storagetypes/{storagetype}', 'StorageTypesController@show')
            ->name('api.storagetypes.show');
        $api->post('storagetypes', 'StorageTypesController@store')
            ->name('api.storagetypes.store');
        $api->patch('storagetypes/{storagetype}', 'StorageTypesController@update')
            ->name('api.storagetypes.update');
        $api->delete('storagetypes/{storagetype}', 'StorageTypesController@destroy')
            ->name('api.storagetypes.destroy');



    });
    
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
        'grouptitle'=>'用户中心',
    ],function($api){
        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        $api->post('me', 'AuthorizationsController@me')->middleware('jwt.auth');
        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
        // 删除token（退出登录）
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');
    });

});
