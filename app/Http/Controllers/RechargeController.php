<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recharges = Recharge::with('player')->get();

        return view('recharges.index', [
            'recharges' => $recharges,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $players = Player::all();
        return view('recharges.create',[
            'players' => $players,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'player_id' => 'required|numeric|exists:players,id',
            'monto_voucher' => 'required|numeric',
            'codigo_voucher' => 'required|unique:recharges,codigo_voucher',
            'fecha_hora_voucher' => 'required',
            'banco_voucher' => 'required',
            'red_social' => 'required',
            'imagen_voucher' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        try {
            $recharge = new Recharge();
            $recharge->player_id = $request->player_id;
            $recharge->monto_voucher = floatval(str_replace(',', '.', $request->monto_voucher));
            $recharge->codigo_voucher = $request->codigo_voucher;
            $recharge->fecha_hora_voucher = $request->fecha_hora_voucher;
            $recharge->banco_voucher = $request->banco_voucher;
            $recharge->red_social = $request->red_social;
            $recharge->imagen_voucher = $request->file('imagen_voucher')->store('vouchers',['disk' => 'public']);

            if($recharge->save()){
                $player = Player::find($request->player_id);
                $player->saldo += $request->monto_voucher;
                $player->save();
            }
            return redirect("/system/recharges/$player->id/record")->with('success','Recarga registrada con éxito');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error al registrar la recarga');
        }



    }

    /**
     * Display the specified resource.
     */
    public function record(string $player_id)
    {
        $recharges = Recharge::where('player_id', $player_id)->get();
        $player = Player::find($player_id);
        return view('recharges.list_record_player', [
            'recharges' => $recharges,
            'player' => $player,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $recharge_id)
    {
        $recharge = Recharge::with(['player'])->find($recharge_id);

        return view('recharges.edit', [
            'recharge' => $recharge,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $recharge_id)
    {
        $monto_nuevo = floatval(str_replace(',', '.', $request->monto_voucher));
        $request->validate([
            'monto_voucher' => 'required|numeric',
            'codigo_voucher' => 'required',
            'fecha_hora_voucher' => 'required',
            'banco_voucher' => 'required',
            'red_social' => 'required',
            'imagen_voucher' => 'image|mimes:jpeg,png,jpg',
        ]);

        try {
            $recharge = Recharge::find($recharge_id);
            $suma_resta_monto = $monto_nuevo - $recharge->monto_voucher;

            $recharge->monto_voucher = floatval(str_replace(',', '.', $request->monto_voucher));
            $recharge->codigo_voucher = $request->codigo_voucher;
            $recharge->fecha_hora_voucher = $request->fecha_hora_voucher;
            $recharge->banco_voucher = $request->banco_voucher;
            $recharge->red_social = $request->red_social;
            if($request->hasFile('imagen_voucher')){
                $recharge->imagen_voucher = $request->file('imagen_voucher')->store('vouchers',['disk' => 'public']);
            }
            if($recharge->save()){
                $player = Player::find($recharge->player_id);
                $player->saldo += $suma_resta_monto;
                $player->save();
            }
            return redirect("/system/recharges/$player->id/record")->with('success','Recarga registrada con éxito');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error al registrar la recarga');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
