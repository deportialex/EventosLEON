<?php

namespace App\Http\Controllers;

use App\Event;
use App\Client;
use App\Service;
use App\Prepaid;
use App\TemporaryEvent;
use App\EventService;
use App\TemporaryEventService;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    public function showTableE()
    {
        $events = DB::table('events')
            ->select(
                'events.id as event_id', 'events.*',
                'clients.id as client_id', 'data_contacts.name as client_name'
            )
            ->join('clients', 'clients.id', '=', 'events.client_id')
            ->join('data_contacts', 'clients.data_contact_id', '=', 'data_contacts.id')
            ->get();

        for($i=0; $i<$events->count(); $i++)
        {
          if($events[$i]->status == 0)
            $events[$i]->status = "Finalizado";
          else if($events[$i]->status == 1)
            $events[$i]->status = "Ahora mismo";
            else if($events[$i]->status == 2)
              $events[$i]->status = "Próximo";
        }

        return Datatables::of($events)
            ->addColumn('btn', 'event.partials.buttons')
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
        $clients = Client::select('*')->get();
        return view('event.create')->with('clients', $clients);
    }

    public function eventservice(Request $request)
    {
        DB::table('temporary_events')->delete();
        DB::table('temporary_event_services')->delete();
        $status = 0;// 0 = terminado, 1=ejecucion, 2=pendiente
        if($request->date_end == now()->toDateString())
            $status = 1;
        else if(($request->date_end > now()->toDateString()))
            $status = 2;

        $temporary_event = (new TemporaryEvent)->fill($request->all());
        $temporary_event->status = $status;
        $temporary_event->user = auth()->user()->email;
        $temporary_event->save();

        $services = Service::select('*')->get();
        //dd($temporary_event);
        return view('event.event_service')->with('data', $temporary_event)->with('services', $services)
            ->with('prepaid', $request);
    }

    public function showTableESC(Request $request)
    {
        $data = TemporaryEventService::create($request->all());
        $services = DB::table('temporary_event_services')
            ->select(
                'temporary_event_services.id as temporary_event_service_id', 'temporary_event_services.*',
                'services.id as service_id', 'services.name as service_name', 'services.*',
                'providers.id as provider_id', 'data_contacts.name as provider_name'
            )
            ->where('temporary_event_services.event_id', '=', $request->event_id)
            ->join('services', 'temporary_event_services.service_id', '=', 'services.id')
            ->join('providers', 'providers.id', '=', 'services.provider_id')
            ->join('data_contacts', 'providers.data_contact_id', '=', 'data_contacts.id')
            ->get();

        return Datatables::of($services)
            ->addColumn('btn', 'event.partials.buttons_services')
            ->rawColumns(['btn'])
          ->make(true);
    }

    public function deleteServiceTemporal(Request $request)
    {
        //dd($request);
        $temporalService = TemporaryEventService::findOrFail($request->id);
        $temporalService->delete();
        $msg = [
            'title' => 'Eliminado!',
            'text' => 'Se removió el servicio del evento',
            'icon' => 'success'
        ];

        return response()->json($msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //{{ Auth::user()->email }}
        //dd($request);
        $event = Event::create($request->all());
        //Guardar productos_capture
        $temporal_services = DB::table('temporary_event_services')
          ->select('temporary_event_services.*')
          ->where('event_id', '=', $request->temporary_event_id)
          ->get();

          for($i=0; $i<$temporal_services->count(); $i++)
          {
              $event_service = New EventService;
              $event_service->event_id = $event->id;
              $event_service->service_id = $temporal_services[$i]->service_id;
              $event_service->save();
          }
        //Borramos temporales
        DB::table('temporary_events')->delete();
        DB::table('temporary_event_services')->delete();

        //Guardamos el anticipo
        //0=anticipado, 1=pendiente
        //$prepaid = (new Prepaid)->fill($request->all());
        $prepaid = new Prepaid;
        $prepaid->date = $request->prepaid_date;
        $prepaid->total = $request->prepaid_total;
        if($event->status == 2)
            $prepaid->status = 1;
        else
            $prepaid->status = 0;
        $prepaid->event_id = $event->id;
        $prepaid->save();

        $msg = [
              'title' => 'Capturado correctamente!',
              'text' => 'Se creo el evento correctamente',
              'icon' => 'success'
          ];

        return view('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
