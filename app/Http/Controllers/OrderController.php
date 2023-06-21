<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Helpers\Telegram;
use App\Events\OrderStore;

class OrderController extends Controller
{
    public function store(Order $order, Request $request)
    {
        $key = base64_encode(md5(uniqid()));
        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->product = $request->input('product');
        $order->secret_key = $key;
        $order->save();
        
        event(new OrderStore($order));
        return response()->redirectTo('/');
    }
}
