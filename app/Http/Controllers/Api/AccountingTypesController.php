<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AccountingTypeRequest;
use Illuminate\Http\Request;
use App\Models\AccountingType as AccType;
use App\Transformers\AccountingTypeTransformer;


class AccountingTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(AccType::all(),new AccountingTypeTransformer());
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
    public function store(AccountingTypeRequest $request)
    {
        $acctype=new AccType();
        $acctype->fill($request->all());
        $acctype->save();
        return $this->response->item($acctype, new AccountingTypeTransformer())
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
        $acctype = AccType::findOrFail($id);
        return $this->response->item($acctype, new AccountingTypeTransformer());
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
    public function update(AccountingTypeRequest $request,AccType $acctype)
    {
        $acctype->update($request->all());
        return $this->response->item($acctype, new AccountingTypeTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccType $acctype)
    {
        $acctype->delete();
        return $this->response->item($acctype, new AccountingTypeTransformer());
    }
}
