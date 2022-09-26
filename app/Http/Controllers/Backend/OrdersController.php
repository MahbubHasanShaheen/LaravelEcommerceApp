<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

class OrdersController extends Controller
{
    public function orderIndex(){
        $orders = Order::latest()->get();
          return view('backend.order.index', compact('orders'));
      }
      
      
      public function viewOrder($order_id){
        $order = Order::findOrfail($order_id);
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->get();
        $shipping = Shipping::with('product')->where('order_id',$order_id)->first();
      
        return view('backend.order.view',compact('order','orderItems','shipping'));
      
        }
}
