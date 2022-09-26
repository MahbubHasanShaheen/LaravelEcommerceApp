<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $requset,$product_id){
              
        $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
        if($check){
            $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
            return redirect()->back()->with('success', 'Product Cart Successfuly Added');


        }else{
              Cart::insert([
                 'product_id'=>$product_id,
                 'qty' => 1,
                 'price' => $requset->price,
                 'user_ip' => request()->ip(),
                 

              ]);

              return redirect()->back()->with('success', 'Product Cart Successfuly Added');

            }
    }

    //=====================Cart Page================================//
     public function cartPage(){

        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(
            function($t){
               return  $t->price * $t->qty;
            });
        return view('pages.cart', compact('carts','subtotal'));
     }

     //=============================Cart Destroy===================//
      public function destroy($cart_id){
        $carts = Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();

      return redirect()->back()->with('cart-product','Cart Product Remove Successfuly');
      }

      //=====================Quantity Update==============================//

      public function quantityUpdate(Request $request, $cart_id){
                 Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
                  'qty' => $request->qty,
                 ]);  
         return redirect()->back()->with('cart-update','Quantity Update Successfuly');
                 
      }

      //======================== Apply Coupon=========================//
      public function applyCoupon(Request $request){
        $check= Coupon::where('coupon_name', $request->coupon_name)->first();
        if($check){

          $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(
            function($t){
               return  $t->price * $t->qty;
            });
      

          Session::put('coupon',[
            'coupon_name' => $check->coupon_name,
            'coupon_discount' => $check->discount,
            'discount_amount' => $subtotal * ($check->discount/100),


          ]);
          return redirect()->back()->with('copon','Successfuly Coupon Apply');

        }else{
          return redirect()->back()->with('copon','Invalid Coupon.......!');

        }
      }

      public function couponDestroy(){
        if(Session::has('coupon')){
          session()->forget('coupon');
        }
        return redirect()->back()->with('copon','Successfully Destroy Coupon.......!');

      }

}
