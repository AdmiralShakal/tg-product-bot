<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/', function () {
    $token =env('TELEGRAM_TOKEN');
    Http::post("https://api.tlgr.org/bot{$token}/sendMessage", [
        'chat_id' => 442385640,
        'text' => 'initialize',
        'parse_mode' => 'html'
    ]);
});
