<?php

namespace App\Http\Controllers\Api;

use App\Models\DistributionMethod;
use App\Http\Requests\Api\DistributionMethodRequest;
use App\Transformers\DistributionMethodTransformer;

class DistributionMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(DistributionMethod::all(),new DistributionMethodTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributionMethodRequest $request)
    {
        $dismet=new DistributionMethod();
        $dismet->fill($request->all());
        $dismet->save();
        return $this->response->item($dismet, new DistributionMethodTransformer())
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
        $dismet = DistributionMethod::findOrFail($id);
        return $this->response->item($dismet, new DistributionMethodTransformer());
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
    public function update(DistributionMethodRequest $request,DistributionMethod $distmet)
    {
        $distmet->update($request->all());
        return $this->response->item($distmet, new DistributionMethodTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistributionMethod $distmet)
    {
        $distmet->delete();
        return $this->response->item($distmet, new DistributionMethodTransformer());
    }
}
