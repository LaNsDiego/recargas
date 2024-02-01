<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_deports', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->datetime("fecha_hora_inicio");
            $table->datetime("fecha_hora_termino");
            $table->decimal("cuota",10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_deports');
    }
};

