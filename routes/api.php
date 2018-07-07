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
        'middleware' => ['api.throttle','token.canrefresh'],
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
        $api->delete('markcolors', 'MarkColorsController@destroybyids')
            ->name('api.markcolors.destroybyids');
        $api->put('markcolors', 'MarkColorsController@editStatusByIds')
            ->name('api.markcolors.editstatusbyids');

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
        $api->delete('acctypes', 'AccountingTypesController@destroybyids')
            ->name('api.acctypes.destroybyids');
        $api->put('acctypes', 'AccountingTypesController@editStatusByIds')
            ->name('api.acctypes.editstatusbyids');

            
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
        $api->delete('feetypes', 'FeeTypesController@destroybyids')
            ->name('api.feetypes.destroybyids');
        $api->put('feetypes', 'FeeTypesController@editStatusByIds')
            ->name('api.feetypes.editstatusbyids');

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
        $api->delete('distmets', 'DistributionMethodsController@destroybyids')
            ->name('api.distmets.destroybyids');
        $api->put('distmets', 'DistributionMethodsController@editStatusByIds')
            ->name('api.distmets.editstatusbyids');

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
        $api->delete('feecates', 'FeeCategoriesController@destroybyids')
            ->name('api.feecates.destroybyids');
        $api->put('feecates', 'FeeCategoriesController@editStatusByIds')
            ->name('api.feecates.editstatusbyids');

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
        $api->delete('freighttypes', 'FreightTypesController@destroybyids')
            ->name('api.freighttypes.destroybyids');
        $api->put('freighttypes', 'FreightTypesController@editStatusByIds')
            ->name('api.freighttypes.editstatusbyids');

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
        $api->delete('goodscates', 'GoodsCategoriesController@destroybyids')
            ->name('api.goodscates.destroybyids');
        $api->put('goodscates', 'GoodsCategoriesController@editStatusByIds')
            ->name('api.goodscates.editstatusbyids');
    

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
        $api->delete('storagetypes', 'StorageTypesController@destroybyids')
            ->name('api.storagetypes.destroybyids');
        $api->put('storagetypes', 'StorageTypesController@editStatusByIds')
            ->name('api.storagetypes.editstatusbyids');
            
        //城市信息
        $api->get('cityinfos', 'CityInfosController@index')
            ->name('api.cityinfos.index');
        $api->get('cityinfos/{cityinfo}', 'CityInfosController@show')
            ->name('api.cityinfos.show');
        $api->post('cityinfos', 'CityInfosController@store')
            ->name('api.cityinfos.store');
        $api->patch('cityinfos/{cityinfo}', 'CityInfosController@update')
            ->name('api.cityinfos.update');
        $api->delete('cityinfos/{cityinfo}', 'CityInfosController@destroy')
            ->name('api.cityinfos.destroy');
        $api->delete('cityinfos', 'CityInfosController@destroybyids')
            ->name('api.cityinfos.destroybyids');
        $api->put('cityinfos', 'CityInfosController@editStatusByIds')
            ->name('api.cityinfos.editstatusbyids');            
            
        //损坏商品
        $api->get('damagedgoods', 'DamagedGoodsController@index')
            ->name('api.damagedgoods.index');
        $api->get('damagedgoods/{damagedgoods}', 'DamagedGoodsController@show')
            ->name('api.damagedgoods.show');
        $api->post('damagedgoods', 'DamagedGoodsController@store')
            ->name('api.damagedgoods.store');
        $api->patch('damagedgoods/{damagedgoods}', 'DamagedGoodsController@update')
            ->name('api.damagedgoods.update');
        $api->delete('damagedgoods/{damagedgoods}', 'DamagedGoodsController@destroy')
            ->name('api.damagedgoods.destroy');
        $api->delete('damagedgoods', 'DamagedGoodsController@destroybyids')
            ->name('api.damagedgoods.destroybyids');
        $api->put('damagedgoods', 'DamagedGoodsController@editStatusByIds')
            ->name('api.damagedgoods.editstatusbyids');            
        
        //物流区域资源
        $api->get('logisticsareas', 'LogisticsAreasController@index')
            ->name('api.logisticsareas.index');
        $api->get('logisticsareas/{logisticsarea}', 'LogisticsAreasController@show')
            ->name('api.logisticsareas.show');
        $api->post('logisticsareas', 'LogisticsAreasController@store')
            ->name('api.logisticsareas.store');
        $api->patch('logisticsareas/{logisticsarea}', 'LogisticsAreasController@update')
            ->name('api.logisticsareas.update');
        $api->delete('logisticsareas/{logisticsarea}', 'LogisticsAreasController@destroy')
            ->name('api.logisticsareas.destroy');
        $api->delete('logisticsareas', 'LogisticsAreasController@destroybyids')
            ->name('api.logisticsareas.destroybyids');
        $api->put('logisticsareas', 'LogisticsAreasController@editStatusByIds')
            ->name('api.logisticsareas.editstatusbyids');  

        //物流资源
        $api->get('logistics', 'LogisticsController@index')
            ->name('api.logistics.index');
        $api->get('logistics/{logistics}', 'LogisticsController@show')
            ->name('api.logistics.show');
        $api->post('logistics', 'LogisticsController@store')
            ->name('api.logistics.store');
        $api->patch('logistics/{logistics}', 'LogisticsController@update')
            ->name('api.logistics.update');
        $api->delete('logistics/{logistics}', 'LogisticsController@destroy')
            ->name('api.logistics.destroy');
        $api->delete('logistics', 'LogisticsController@destroybyids')
            ->name('api.logistics.destroybyids');
        $api->put('logistics', 'LogisticsController@editStatusByIds')
            ->name('api.logistics.editstatusbyids');

        //物流资源
        $api->get('warehouses', 'WarehousesController@index')
            ->name('api.warehouses.index');
        $api->get('warehouses/{warehouse}', 'WarehousesController@show')
            ->name('api.warehouses.show');
        $api->post('warehouses', 'WarehousesController@store')
            ->name('api.warehouses.store');
        $api->patch('warehouses/{warehouse}', 'WarehousesController@update')
            ->name('api.warehouses.update');
        $api->delete('warehouses/{warehouse}', 'WarehousesController@destroy')
            ->name('api.warehouses.destroy');
        $api->delete('warehouses', 'WarehousesController@destroybyids')
            ->name('api.warehouses.destroybyids');
        $api->put('warehouses', 'WarehousesController@editStatusByIds')
            ->name('api.warehouses.editstatusbyids');

        //供应商资源
        $api->get('suppliers', 'SuppliersController@index')
            ->name('api.suppliers.index');
        $api->get('suppliers/{supplier}', 'SuppliersController@show')
            ->name('api.suppliers.show');
        $api->post('suppliers', 'SuppliersController@store')
            ->name('api.suppliers.store');
        $api->patch('suppliers/{supplier}', 'SuppliersController@update')
            ->name('api.suppliers.update');
        $api->delete('suppliers/{supplier}', 'SuppliersController@destroy')
            ->name('api.suppliers.destroy');
        $api->delete('suppliers', 'SuppliersController@destroybyids')
            ->name('api.suppliers.destroybyids');
        $api->put('suppliers', 'SuppliersController@editStatusByIds')
            ->name('api.suppliers.editstatusbyids');
            
        //供应商资源
        $api->get('shops', 'ShopsController@index')
            ->name('api.shops.index');
        $api->get('shops/{shop}', 'ShopsController@show')
            ->name('api.shops.show');
        $api->post('shops', 'ShopsController@store')
            ->name('api.shops.store');
        $api->patch('shops/{shop}', 'ShopsController@update')
            ->name('api.shops.update');
        $api->delete('shops/{shop}', 'ShopsController@destroy')
            ->name('api.shops.destroy');
        $api->delete('shops', 'ShopsController@destroybyids')
            ->name('api.shops.destroybyids');
        $api->put('shops', 'ShopsController@editStatusByIds')
            ->name('api.shops.editstatusbyids');
            
        //系列资源
        $api->get('series', 'SeriesController@index')
            ->name('api.series.index');
        $api->get('series/{series}', 'SeriesController@show')
            ->name('api.series.show');
        $api->post('series', 'SeriesController@store')
            ->name('api.series.store');
        $api->patch('series/{series}', 'SeriesController@update')
            ->name('api.series.update');
        $api->delete('series/{series}', 'SeriesController@destroy')
            ->name('api.series.destroy');
        $api->delete('series', 'SeriesController@destroybyids')
            ->name('api.series.destroybyids');
        $api->put('series', 'SeriesController@editStatusByIds')
            ->name('api.series.editstatusbyids'); 
                       
        //打印报表资源
        $api->get('printreports', 'PrintReportsController@index')
            ->name('api.printreports.index');
        $api->get('printreports/{printreport}', 'PrintReportsController@show')
            ->name('api.printreports.show');
        $api->post('printreports', 'PrintReportsController@store')
            ->name('api.printreports.store');
        $api->patch('printreports/{printreport}', 'PrintReportsController@update')
            ->name('api.printreports.update');
        $api->delete('printreports/{printreport}', 'PrintReportsController@destroy')
            ->name('api.printreports.destroy');
        $api->delete('printreports', 'PrintReportsController@destroybyids')
            ->name('api.printreports.destroybyids');
        $api->put('printreports', 'PrintReportsController@editStatusByIds')
            ->name('api.printreports.editstatusbyids');  

        //平台资源
        $api->get('platforms', 'PlatformsController@index')
            ->name('api.platforms.index');
        $api->get('platforms/{platform}', 'PlatformsController@show')
            ->name('api.platforms.show');
        $api->post('platforms', 'PlatformsController@store')
            ->name('api.platforms.store');
        $api->patch('platforms/{platform}', 'PlatformsController@update')
            ->name('api.platforms.update');
        $api->delete('platforms/{platform}', 'PlatformsController@destroy')
            ->name('api.platforms.destroy');
        $api->delete('platforms', 'PlatformsController@destroybyids')
            ->name('api.platforms.destroybyids');
        $api->put('platforms', 'PlatformsController@editStatusByIds')
            ->name('api.platforms.editstatusbyids');
            
        //平台资源
        $api->get('departments', 'DepartmentsController@index')
            ->name('api.departments.index');
        $api->get('departments/{department}', 'DepartmentsController@show')
            ->name('api.departments.show');
        $api->post('departments', 'DepartmentsController@store')
            ->name('api.departments.store');
        $api->patch('departments/{department}', 'DepartmentsController@update')
            ->name('api.departments.update');
        $api->delete('departments/{department}', 'DepartmentsController@destroy')
            ->name('api.departments.destroy');
        $api->delete('departments', 'DepartmentsController@destroybyids')
            ->name('api.departments.destroybyids');
        $api->put('departments', 'DepartmentsController@editStatusByIds')
            ->name('api.departments.editstatusbyids');

        // //产品资源
        // $api->get('products', 'ProductsController@index')
        //     ->name('api.products.index');
        // $api->get('products/{product}', 'ProductsController@show')
        //     ->name('api.products.show');
        // $api->post('products', 'ProductsController@store')
        //     ->name('api.products.store');
        // $api->patch('products/{product}', 'ProductsController@update')
        //     ->name('api.products.update');
        // $api->delete('products/{product}', 'ProductsController@destroy')
        //     ->name('api.products.destroy');
        // $api->delete('products', 'ProductsController@destroybyids')
        //     ->name('api.products.destroybyids');
        // $api->put('products', 'ProductsController@editStatusByIds')
        //     ->name('api.products.editstatusbyids');

        // //商品资源
        // $api->get('goods', 'GoodsController@index')
        //     ->name('api.goods.index');
        // $api->get('goods/{goods}', 'GoodsController@show')
        //     ->name('api.goods.show');
        // $api->post('goods', 'GoodsController@store')
        //     ->name('api.goods.store');
        // $api->patch('goods/{goods}', 'GoodsController@update')
        //     ->name('api.goods.update');
        // $api->delete('goods/{goods}', 'GoodsController@destroy')
        //     ->name('api.goods.destroy');
        // $api->delete('goods', 'GoodsController@destroybyids')
        //     ->name('api.goods.destroybyids');
        // $api->put('goods', 'GoodsController@editStatusByIds')
        //     ->name('api.goods.editstatusbyids');

        // //产品规格资源
        // $api->get('productspecs', 'ProductSpecsController@index')
        //     ->name('api.productspecs.index');
        // $api->get('productspecs/{productspec}', 'ProductSpecsController@show')
        //     ->name('api.productspecs.show');
        // $api->post('productspecs', 'ProductSpecsController@store')
        //     ->name('api.productspecs.store');
        // $api->patch('productspecs/{productspec}', 'ProductSpecsController@update')
        //     ->name('api.productspecs.update');
        // $api->delete('productspecs/{productspec}', 'ProductSpecsController@destroy')
        //     ->name('api.productspecs.destroy');
        // $api->delete('productspecs', 'ProductSpecsController@destroybyids')
        //     ->name('api.goproductspecsods.destroybyids');
        // $api->put('productspecs', 'ProductSpecsController@editStatusByIds')
        //     ->name('api.productspecs.editstatusbyids');

        // //组合资源
        // $api->get('combinations', 'CombinationsController@index')
        //     ->name('api.combinations.index');
        // $api->get('combinations/{combination}', 'CombinationsController@show')
        //     ->name('api.combinations.show');
        // $api->post('combinations', 'CombinationsController@store')
        //     ->name('api.combinations.store');
        // $api->patch('combinations/{combination}', 'CombinationsController@update')
        //     ->name('api.combinations.update');
        // $api->delete('combinations/{combination}', 'CombinationsController@destroy')
        //     ->name('api.combinations.destroy');
        // $api->delete('combinations', 'CombinationsController@destroybyids')
        //     ->name('api.combinations.destroybyids');
        // $api->put('combinations', 'CombinationsController@editStatusByIds')
        //     ->name('api.combinations.editstatusbyids');

    
    });

    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
        'grouptitle' => '用户中心',
    ], function ($api) {
        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        $api->post('me', 'AuthorizationsController@me')->middleware('token.canrefresh');
        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
        // 删除token（退出登录）
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');
    });

});
