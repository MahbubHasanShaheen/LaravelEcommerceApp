<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function addToWishlist($product_id){
        if(Auth::check()){
            Wishlist::insert([
              'user_id' =>Auth::id(),
              'product_id' => $product_id,

            ]);
            return redirect()->back()->with('wish', 'Product Added on Wishlist');

        }else{
            return redirect()->route('login')->with('loginError', 'Please login your account');

        }

    }


    public function wishlistPage(){

        $wishlists = Wishlist::where('user_id',Auth::id())->latest()->get();
        return view('pages.wishlist', compact('wishlists'));
    
            }

            
            //=============================Wishlist Destroy===================//
      public function destroy($wishlist_id){
        $wishlists = Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->delete();

      return redirect()->back()->with('wish','Wishlist Product Remove Successfuly');
      }

     
}
