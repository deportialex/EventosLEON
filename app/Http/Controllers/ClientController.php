<?php

namespace App\Http\Controllers;

use App\Client;
use App\data_contact;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    public function showTable()
    {
      $clients = DB::table('clients')
        ->select('clients.id as client_id', 'clients.*', 'data_contacts.id as data_id', 'data_contacts.*')
        ->join('data_contacts', 'data_contacts.id', '=', 'clients.data_contact_id')
        ->get();

        return Datatables::of($clients)
        ->addColumn('btn', 'client.partials.buttons')
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
        return view('client.create');
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
        $client = New Client;
        $client->visits = 0;
        $client->data_contact_id = $data->id;
        $client->save();

        // $clients = Client::all();

        $msg = [
            'title' => 'Creado!',
            'text' => 'Cliente creado exitosamente.',
            'icon' => 'success'
        ];

        return redirect('client')->with('message', $msg);
        // return view('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
      //dd($client);
        return view('client.show')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //return view('client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        $client->prestige = $request->prestige;
        $client->comments = $request->comments;
        $client->save();

        $data = data_contact::findOrFail($client->data_contact_id);
        $data->name = $request->name;
        $data->lastname = $request->lastname;
        $data->phone1 = $request->phone1;
        $data->phone2 = $request->phone2;
        $data->email = $request->email;
        $data->save();

        $msg = [
            'title' => 'Modificado!',
            'text' => 'Cliente modificado exitosamente.',
            'icon' => 'success'
        ];

        return redirect('client')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        data_contact::destroy($id);
        $msg = [
            'title' => 'Eliminado!',
            'text' => 'Proveedor eliminado exitosamente.',
            'icon' => 'success'
        ];

        return response()->json($msg);
    }
}
