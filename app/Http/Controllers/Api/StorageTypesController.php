<?php

namespace App\Http\Controllers\Api;

use App\Models\StorageType;
use App\Http\Requests\Api\StorageTypeRequest;
use App\Transformers\StorageTypeTransformer;

class StorageTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(StorageType::all(),new StorageTypeTransformer());
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
    public function store(StorageTypeRequest $request)
    {
        $storagetype=new StorageType();
        $storagetype->fill($request->all());
        $storagetype->save();
        return $this->response->item($storagetype, new StorageTypeTransformer())
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
        $storagetype = StorageType::findOrFail($id);
        return $this->response->item($storagetype, new StorageTypeTransformer());
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
    public function update(StorageTypeRequest $request,StorageType $storagetype)
    {
        $storagetype->update($request->all());
        return $this->response->item($storagetype, new StorageTypeTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorageType $storagetype)
    {
        $storagetype->delete();
        return $this->response->item($storagetype, new StorageTypeTransformer());
    }
}
