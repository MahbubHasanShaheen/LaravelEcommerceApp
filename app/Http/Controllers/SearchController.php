<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SearchController extends Controller
{

  
    //-------------search product............//
    public function searchProduct(Request $request){
        $request->validate([
           'search' => 'required'
        ]);

        $products = Product::where("product_name", "LIKE", "%".$request->search."%")
                         ->orWhere("price", "LIKE", "%".$request->search."%")
                      
                         ->paginate(3);
                       
                         return view('frontend.search-product', compact('products'));
   }


    //-------------find product............//
    public function findProduct(Request $request){
        $request->validate([
            'search' => 'required'
         ]);
 
         $products = Product::where("product_name", "LIKE", "%".$request->search."%")
                          ->orWhere("price", "LIKE", "%".$request->search."%")
                          
                          ->take(3)->get();
                        
                          return view('frontend.search-product', compact('products'));
    }
}
