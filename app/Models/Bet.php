<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "titulo",
        "amount",
        "event_id",
        "advisor_id",
        "player_id",
        "cuota",
        "ganancia",
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function event() {
        return $this->belongsTo(EventDeport::class);
    }

    public function advisor() {
        return $this->belongsTo(User::class);
    }
}
