<?php

namespace App\Http\Controllers;

use App\data_contact;
use Illuminate\Http\Request;

class DataContactController extends Controller
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
    public function store(Request $request)
    {
      data_contact::create($request->all());
      //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_contact  $data_contact
     * @return \Illuminate\Http\Response
     */
    public function show(data_contact $data_contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_contact  $data_contact
     * @return \Illuminate\Http\Response
     */
    public function edit(data_contact $data_contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_contact  $data_contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_contact $data_contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_contact  $data_contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_contact $data_contact)
    {
        //
    }
}
