<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Models\Role;

class OrderListController extends Controller
{

   public function ordersList(){

       $orders = Order::all();
       return view('admin.order.list')->with('orders', $orders);
   }

}
