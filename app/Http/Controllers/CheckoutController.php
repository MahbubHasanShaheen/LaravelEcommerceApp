<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
      $carts = Cart::where('user_ip',request()->ip())->latest()->get();
      $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(
        function($t){
           return  $t->price * $t->qty;
        });
        
      if(Auth::check()){
        return view('pages.checkout', compact('carts','subtotal'));
      }else{
        return redirect()->route('login');

      }
      
      
    }
}
