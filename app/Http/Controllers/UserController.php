<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Auth;
class UserController extends Controller
{
   
    public function userOrder(){
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('pages.profile.order', compact('orders'));
    }

   
    public function orderView($order_id){
       
        $order = Order::findOrfail($order_id);
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->get();
        $shipping = Shipping::with('product')->where('order_id',$order_id)->first();

       return view('pages.profile.order-view',compact('order','orderItems','shipping'));


    }
}
