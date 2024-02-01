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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            // $table->string("prediccion");
            $table->unsignedDecimal("amount", 10, 2);
            $table->unsignedBigInteger("event_id");
            $table->unsignedBigInteger("advisor_id");
            $table->unsignedBigInteger("player_id");
            $table->unsignedDecimal("cuota", 10, 2);
            $table->unsignedDecimal("ganancia",12,2);
            // $table->timestamp("fecha_hora");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
