<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FeeCategoryRequest;
use App\Transformers\FeeCategoryTransformer;
use App\Models\FeeCategory;

class FeeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(FeeCategory::all(), new FeeCategoryTransformer());
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
    public function store(FeeCategoryRequest $request)
    {
        $feecate = new FeeCategory();
        $feecate->fill($request->all());
        $feecate->save();
        return $this->response->item($feecate, new FeeCategoryTransformer())
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
        $feecate = FeeCategory::findOrFail($id);
        return $this->response->item($feecate, new FeeCategoryTransformer());
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
    public function update(FeeCategoryRequest $request, FeeCategory $feecate)
    {
        $feecate->update($request->all());
        return $this->response->item($feecate, new FeeCategoryTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeCategory $feecate)
    {
        $feecate->delete();
        return $this->response->item($feecate, new FeeCategoryTransformer());
    }
}
