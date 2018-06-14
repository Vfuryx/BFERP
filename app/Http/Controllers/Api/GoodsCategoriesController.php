<?php

namespace App\Http\Controllers\Api;

use App\Models\GoodsCategory;
use App\Http\Requests\Api\GoodsCategoryRequest;
use App\Transformers\GoodsCategoryTransformer;

class GoodsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(GoodsCategory::all(),new GoodsCategoryTransformer());
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
    public function store(GoodsCategoryRequest $request)
    {
        $goodscate=new GoodsCategory();
        $goodscate->fill($request->all());
        $goodscate->save();
        return $this->response->item($goodscate, new GoodsCategoryTransformer())
        ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goodscate = GoodsCategory::findOrFail($id);
        return $this->response->item($goodscate, new GoodsCategoryTransformer());
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
    public function update(GoodsCategoryRequest $request,GoodsCategory $goodscate)
    {
        $goodscate->update($request->all());
        return $this->response->item($goodscate, new GoodsCategoryTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsCategory $goodscate)
    {
        $goodscate->delete();
        return $this->response->item($goodscate, new GoodsCategoryTransformer());
    }
}
