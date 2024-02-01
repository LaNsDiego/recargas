<?php

namespace App\Http\Controllers;

use App\Models\EventDeport;
use Illuminate\Http\Request;

class EventDeportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = EventDeport::all();
        return view('events.index',[
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:190',
            'fecha_hora_inicio' => 'required',
            'fecha_hora_termino' => 'required',
            'cuota' => 'required|numeric|min:1.00',
        ]);

        $event = new EventDeport();
        $event->titulo = $request->titulo;
        $event->fecha_hora_inicio = $request->fecha_hora_inicio;
        $event->fecha_hora_termino = $request->fecha_hora_termino;
        $event->cuota = floatval(str_replace(',', '.', $request->cuota));
        $event->save();
        return redirect('/system/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
