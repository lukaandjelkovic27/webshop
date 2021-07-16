<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function sendOrder(Cart $cart)
    {
        try{
            $order = new Order;
            $order->user()->associate(auth()->user());
            $order->cart()->associate($cart);
            $order->save();

            /*$order->cart()->active = false;*/

            return back()->with('message', 'Povezano');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
