<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\EventDeportController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->prefix('system')->group(function () {

    Route::get('/players',[PlayerController::class ,'index']);
    Route::get('/players/create',[PlayerController::class ,'create']);
    Route::post('/players/store',[PlayerController::class ,'store']);

    Route::get('/recharges',[RechargeController::class ,'index']);
    Route::get('/recharges/{player_id}/record',[RechargeController::class ,'record']);
    Route::get('/recharges/create',[RechargeController::class ,'create']);
    Route::get('/recharges/{recharge_id}/edit',[RechargeController::class ,'edit']);
    Route::post('/recharges/store',[RechargeController::class ,'store']);
    Route::post('/recharges/{recharge_id}/update',[RechargeController::class ,'update']);

    Route::get('/bets',[BetController::class ,'index']);
    Route::get('/bets/create',[BetController::class ,'create']);
    Route::post('/bets/store',[BetController::class ,'store']);


    Route::get('/events',[EventDeportController::class ,'index']);
    Route::get('/events/create',[EventDeportController::class ,'create']);
    Route::post('/events/store',[EventDeportController::class ,'store']);

});


require __DIR__.'/auth.php';
