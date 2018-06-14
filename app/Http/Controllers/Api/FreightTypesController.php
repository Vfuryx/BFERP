<?php

namespace App\Http\Controllers\Api;

use App\Models\FreightType;
use App\Http\Requests\Api\FreightTypeRequest;
use App\Transformers\FreightTypeTransformer;

class FreightTypesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(FreightType::all(),new FreightTypeTransformer());
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
    public function store(FreightTypeRequest $request)
    {
        $freighttype=new FreightType();
        $freighttype->fill($request->all());
        $freighttype->save();
        return $this->response->item($freighttype, new FreightTypeTransformer())
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
        $freighttype = FreightType::findOrFail($id);
        return $this->response->item($freighttype, new FreightTypeTransformer());
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
    public function update(FreightTypeRequest $request,FreightType $freighttype)
    {
        $freighttype->update($request->all());
        return $this->response->item($freighttype, new FreightTypeTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreightType $freighttype)
    {
        $freighttype->delete();
        return $this->response->item($freighttype, new FreightTypeTransformer());
    }
}
