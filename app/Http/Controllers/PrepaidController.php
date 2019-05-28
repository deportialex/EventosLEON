<?php

namespace App\Http\Controllers;

use App\Prepaid;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PrepaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prepaid.index');
    }

    public function showTablePre()
    {
        $prepaids = DB::table('prepaids')
            ->select('prepaids.id as prepaid_id', 'prepaids.*', 'events.date_start', 'events.id as event_id',
                'clients.id as client_id', 'data_contacts.name as client_name')
            ->join('events', 'prepaids.event_id', '=', 'events.id')
            ->join('clients', 'events.client_id', '=', 'clients.id')
            ->join('data_contacts', 'clients.data_contact_id', '=', 'data_contacts.id')
            ->get();

            for($i=0; $i<$prepaids->count(); $i++)
            {
              if($prepaids[$i]->status == 0)
                $prepaids[$i]->status = "Anticipado";
              else if($prepaids[$i]->status == 1)
                $prepaids[$i]->status = "Pendiente";
            }

        return Datatables::of($prepaids)
            ->addColumn('btn', 'prepaid.partials.buttons')
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
        return view('prepaid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prepaid  $prepaid
     * @return \Illuminate\Http\Response
     */
    public function show(Prepaid $prepaid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prepaid  $prepaid
     * @return \Illuminate\Http\Response
     */
    public function edit(Prepaid $prepaid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prepaid  $prepaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prepaid = Prepaid::findOrFail($request->id);
        $prepaid->update($request->all());
        $msg = [
            'title' => 'Modificado!',
            'text' => 'Anticipo modificado exitosamente.',
            'icon' => 'success'
        ];

      return redirect('prepaid')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prepaid  $prepaid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prepaid $prepaid)
    {
        //
    }
}
