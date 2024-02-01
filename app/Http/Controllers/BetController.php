<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\EventDeport;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bets = Bet::with(['advisor','player'])->get();
        return view('bets.index',[
            'bets' => $bets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = EventDeport::all();
        $players = Player::all();
        return view('bets.create',[
            'events' => $events,
            'players' => $players,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $player = Player::find($request->player_id);
            $request->validate([
                'player_id' => 'required|integer|exists:players,id',
                'event_id' => 'required|integer|exists:event_deports,id',
                'monto' => [
                    'required',
                    function ($attribute, $value, $fail) use ($player) {
                        if (floatval(str_replace(',', '.', $value)) > $player->saldo) {
                            $fail($attribute.' debe ser menor o igual al saldo del jugador.');
                        }
                    },
                ],
                'cuota' => 'required',
                'ganancia' => 'required',
            ]);
            $event = EventDeport::find($request->event_id);
            Bet::create([
                'titulo' => $event->titulo,
                'amount' => floatval(str_replace(',', '.', $request->monto)),
                'event_id' => $request->event_id,
                'advisor_id' => Auth::user()->id,
                'player_id' => $request->player_id,
                'cuota' => floatval(str_replace(',', '.', $request->cuota)),
                'ganancia' => floatval(str_replace(',', '.', $request->ganancia)),
            ]);

            $player->saldo = $player->saldo - floatval(str_replace(',', '.', $request->monto));
            $player->save();
            return redirect('/system/bets');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al crear la apuesta');
        }


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
