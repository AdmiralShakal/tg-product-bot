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

Route::get('/', function (\App\Helpers\Telegram $telegram) {
    $id = env('TELEGRAM_REPORT_ID');
    // $telegram->sendMessage($id, 'image test');
    $telegram->sendDocument($id,'file.png');
});
