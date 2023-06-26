<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\OrderController;
use App\Helpers\Telegram;
use App\Models\Order;
use App\Models\Product;

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

Route::get('/', function (Order $order, Product $product) {
    return view('site.order', [
        'orders' => $order->active()->get(),
        'products' => $product->get()
    ]);
});

Route::group(['namespace' => 'App\Http\Controllers'], function (){
    Route::post('/order/store', 'OrderController@store')->name('order.store');
    Route::post('/webhook', 'WebhookController@index');
    Route::post('/post/store', 'PostController@store')->name('post.store');
});
