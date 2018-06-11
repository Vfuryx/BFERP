<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\MarkColorRequest;
use App\Models\MarkColor;
use Illuminate\Http\Request;
use App\Transformers\MarkColorTransformer;

class MarkColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->collection(MarkColor::all(), new MarkColorTransformer());
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
    public function store(MarkColorRequest $request)
    {
        $markcolor=new MarkColor();
        $markcolor->fill($request->all());
        $markcolor->save();

        return $this->response->item($markcolor, new MarkColorTransformer())
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
        $markcolor=MarkColor::find($id);
        return $this->response->item($markcolor, new MarkColorTransformer());
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
    public function update(MarkColorRequest $request,MarkColor $markcolor)
    {
        $markcolor->update($request->all());
        return $this->response->item($markcolor, new MarkColorTransformer());
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
