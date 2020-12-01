<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BtcVsUsdController;
use App\Http\Controllers\MintmeVsBtcController;
use App\Http\Controllers\EthVsUsdController;
use App\Http\Controllers\MintmeVsEthController;
use App\Http\Controllers\CalcMintmeVsUsdController;
use App\Http\Controllers\CalcUsdVsMintmeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/btc/vs/usd', [App\Http\Controllers\BtcVsUsdController::class, 'index']);
Route::get('/mintme/vs/btc', [App\Http\Controllers\MintmeVsBtcController::class,'index']);
Route::get('/eth/vs/usd', [App\Http\Controllers\EthVsUsdController::class, 'index']);
Route::get('/mintme/vs/eth', [App\Http\Controllers\MintmeVsEthController::class, 'index']);
Route::get('/calc/mintme/vs/usd/{amount?}', [App\Http\Controllers\CalcMintmeVsUsdController::class, 'index']);
Route::get('/calc/usd/vs/mintme/{amount?}', [App\Http\Controllers\CalcUsdVsMintmeController::class, 'index']);

Route::get('/', function () {
    return view('app');
})->where('any','.*');

Route::get('/{any}', function () {
    abort(404);
})->where('any','.*');