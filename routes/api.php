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
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),
    ], function ($api) {
        $api->get('markcolors', 'MarkColorsController@index')
            ->name('api.markcolors.index');

        $api->get('markcolors/{markcolor}', 'MarkColorsController@show')
            ->name('api.markcolors.show');

        $api->post('markcolors', 'MarkColorsController@store')
            ->name('api.markcolors.store');

        $api->patch('markcolors/{markcolor}', 'MarkColorsController@update')
            ->name('api.topics.update');

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
    });
});
