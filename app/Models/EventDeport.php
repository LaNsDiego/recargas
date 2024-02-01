<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDeport extends Model
{
    use HasFactory;
    public $table = 'event_deports';

    protected $fillable = [
        "id",
        "titulo",
        "fecha_hora_inicio",
        "fecha_hora_termino",
        "cuota",
    ];
}
