<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "red_social",
        "codigo_voucher",
        "monto_voucher",
        "fecha_hora_voucher",
        "banco_voucher",
        "player_id",
        "imagen_voucher",

    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }
}
