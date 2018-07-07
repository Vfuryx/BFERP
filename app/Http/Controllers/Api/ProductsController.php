<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\CombinationRequest;
use App\Http\Requests\Api\GoodsRequest;
use App\Http\Requests\Api\ProductSpecRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CombinationsController $combinationsController, CombinationRequest $combinationRequest,
                          GoodsRequest $goodsRequest, GoodsController $goodsController,
                          ProductSpecRequest $productSpecRequest, ProductSpecsController $productSpecsController)
    {
        //创建商品
        $goodsId = json_decode($goodsController->store($goodsRequest)->getContent())->id;
        $productSpecRequest->offsetSet('goods_id', $goodsId);

        //创建产品规格
        $productSpec = json_decode($productSpecsController->store($productSpecRequest)->getContent());

        dd($productSpec->is_combination === 1);


        dd(json_decode($combinationsController->store($combinationRequest)->getContent())->id);
        dd($combinationsController->store($combinationRequest), $goodsController->store($goodsRequest), $productSpecsController->store($productSpecRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
