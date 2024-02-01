<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EventDeport;
use App\Models\Player;
use App\Models\Recharge;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Asesor 1',
            'email' => 'asesor1@kurax.dev',
            'role' => 'ASESOR',
            'password' => Hash::make('123123')
        ]);

        $player1 = Player::create([
            "dni" => "78451298",
            "nombres" => "Juan Roberto",
            "apellidos" => "Quiroz Soto",
            "saldo" => 100,
        ]);
        $player2 = Player::create([
            "dni" => "00426498",
            "nombres" => "Carlos Alex",
            "apellidos" => "Mamani Yanqui",
            "saldo" => 0,
        ]);
        $player3 = Player::create([
            "dni" => "72458491",
            "nombres" => "Mauricio Jean",
            "apellidos" => "Sifuentes Molina",
            "saldo" => 0,
        ]);
        $player4 = Player::create([
            "dni" => "72558461",
            "nombres" => "Elisban Duan",
            "apellidos" => "Ramirez Altamirano",
            "saldo" => 0,
        ]);

        Recharge::create([
            "player_id" => $player1->id,
            "red_social" => "FACEBOOK",
            "codigo_voucher" => "CV-123456",
            "monto_voucher" => 100,
            "fecha_hora_voucher" => now(),
            "banco_voucher" => "BCP",
            "imagen_voucher" => "",
        ]);


        EventDeport::create([
            "titulo" => "PERÚ VS PARAGUA - Gana Perú",
            "fecha_hora_inicio" => now(),
            "fecha_hora_termino" => Carbon::now('UTC')->addHours(2),
            "cuota" => 1.5,
        ]);
    }
}
