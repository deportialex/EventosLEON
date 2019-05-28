<?php

namespace App\Http\Controllers;

use DB;
use App\Service;
use App\Provider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::select('*')->get();
        return view('service.index')->with('providers', $providers);
    }

    public function showTableS()
    {
        $services = DB::table('services')
            ->select(
                'services.id as service_id', 'services.name as service_name', 'services.*',
                'providers.id as provider_id', 'data_contacts.name as provider_name'
            )
            ->join('providers', 'providers.id', '=', 'services.provider_id')
            ->join('data_contacts', 'providers.data_contact_id', '=', 'data_contacts.id')
            ->get();

        return Datatables::of($services)
            ->addColumn('btn', 'service.partials.buttons')
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
        $providers = Provider::select('*')->get();
        return view('service.create')->with('providers', $providers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Service::create($request->all());
        $msg = [
            'title' => 'Creado!',
            'text' => 'Servicio creado exitosamente.',
            'icon' => 'success'
        ];
        return redirect('service')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //dd($service->provider->data_contact);
        $providers = Provider::select('*')->get();
        return view('service.show')->with('service', $service)->with('providers', $providers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $service = Service::findOrFail($request->id);
      $service->update($request->all());
      $msg = [
          'title' => 'Modificado!',
          'text' => 'Servicio modificado exitosamente.',
          'icon' => 'success'
      ];
    return redirect('service')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        dd($service);
        Service::destroy($service->id);
        $msg = [
            'title' => 'Eliminado!',
            'text' => 'Servicio eliminado exitosamente.',
            'icon' => 'success'
        ];

        return response()->json($msg);
    }
}
