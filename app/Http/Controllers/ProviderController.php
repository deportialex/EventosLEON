<?php

namespace App\Http\Controllers;

use App\Provider;
use App\data_contact;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provider.index');
    }

    public function showTableP()
    {
        $providers = DB::table('providers')
            ->select('providers.id as provider_id', 'providers.*', 'data_contacts.*', 'data_contacts.id as data_id')
            ->join('data_contacts', 'data_contacts.id', '=', 'providers.data_contact_id')
            ->get();

        return Datatables::of($providers)
            ->addColumn('btn', 'provider.partials.buttons')
            ->rawColumns(['btn'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = data_contact::create($request->all());
        $provider = New Provider;
        $provider->data_contact_id = $data->id;
        $provider->save();

        $msg = [
            'title' => 'Creado!',
            'text' => 'Proveedor creado exitosamente.',
            'icon' => 'success'
        ];

        return redirect('provider')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('provider.show')->with('provider',$provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $provider = Provider::findOrFail($request->id);
        $provider->data_contact->update($request->all());
        $msg = [
            'title' => 'Modificado!',
            'text' => 'Proveedor modificado exitosamente.',
            'icon' => 'success'
        ];

      return redirect('provider')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        data_contact::destroy($provider->data_contact->id);
        $msg = [
            'title' => 'Eliminado!',
            'text' => 'Proveedor eliminado exitosamente.',
            'icon' => 'success'
        ];

        return response()->json($msg);
    }
}
