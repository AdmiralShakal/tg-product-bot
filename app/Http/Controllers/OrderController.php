<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Helpers\Telegram;
use App\Events\OrderStore;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function store(Order $order, Request $request,)
    {
        $product = Product::where('name', $request->input('product_name'))->first();
        $order = new Order();
        $order->product_id = $product->id;
        $order->product_name = $request->input('product_name');
        $order->product_count = $request->input('product_count');
        $order->product_price = $product->price;
        $order->phone = $request->input('phone');
        $order->status = 0;
        $order->created_at = Carbon::now();
        $order->save();

        event(new OrderStore($order));
        return response()->redirectTo('/');
    }
}
