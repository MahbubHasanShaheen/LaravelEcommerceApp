<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Carbon\Carbon;




class OrderController extends Controller
{
    public function storeOrder(Request $request){
        //dd($request->all());


         $request->validate([
          'shipping_first_name' => 'required',
           'shipping_last_name' => 'required',
        ]);

        $order_id = Order::insertGetId([
          'user_id' =>Auth::id(),
          'invoice_no' =>mt_rand(1000000,99999999),
          'payment_type' => $request->payment_type,
          'total' => $request->total,
          'subtotal' => $request->subtotal,
          'coupon_discount' => $request->coupon_discount,
          
          


         ]);


         $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        foreach($carts as $cart){
          
        
         orderItem::insert([
             'order_id'=> $order_id,
             'product_id'=>$cart->product_id,
             'product_name'=>$cart->product_name,
             'product_qty'=>$cart->qty,
             

         ]);
        }

         Shipping::insert([
            'order_id'=> $order_id,
            'shipping_first_name' =>$request->shipping_first_name,
            'shipping_last_name' =>$request->shipping_last_name,
            'shipping_phone' =>$request->shipping_phone,
            'shipping_email' =>$request->shipping_email,
            'address' =>$request->address,
            'state' =>$request->state,
            'post_code' =>$request->post_code,
            //'created _at' => Carbon::now(),

         ]);
         
          if(Session::has('coupon')){
            session()->forget('coupon');
          }
          Cart::where('user_ip',request()->ip())->delete();

  
        
      return redirect()->to('order/success')->with('orderConfirm', 'Order Successfuly Confirm');
       
    }

    // Order Success
    public function orderSuccess(){
      return view('pages.order_confirm');
    return redirect()->back('order/success')->with('orderConfirm', 'Please Sign Out Your Account');

    }


}
