<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helpers\Constant;
use App\Mail\OrderSent;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function ordersHistory(){

        $status = Constant::ORDER_STATUSES;
        $orders = Auth::user()->orders;
        return view('user.order.history')->with(['orders' => $orders, 'status' => $status]);
    }

    public function sendOrder(Cart $cart)
    {
        try{
            $order = new Order;
            $order->user()->associate(auth()->user());
            $order->cart()->associate($cart);
            $order->save();
            $cart->active = false;
            $cart->update();
            foreach ($cart->products as $product) {
                $product->quantity = $product->quantity - $product->pivot->quantity;
                $product->update();
            }
            $admin = User::where('name', '=', 'Admin')->first();
            Mail::to($admin->email)->send(new OrderSent($order, $cart));

            return back()->with('message', 'Order pending');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
