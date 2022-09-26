<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $Its_p = Product::where('status',1)->latest()->limit(3)->get();
        $categories = Category::where('status',1)->latest()->get();
        return view('pages.index', compact('products', 'categories','Its_p'));
    }

    public function productDetails($product_id){
        $product = Product::find($product_id);
        $category_id = $product->category_id;
        $releted_p = Product::where('category_id',$category_id)->where('id', '!=', $product_id)->latest()->limit(3)->get();
        
        return view('pages.product_details',compact('product','releted_p'));
     
       }


       //------------shop page-------------

  public function shopPage(){
    $products = Product::latest()->get();
    $productsp = Product::latest()->paginate(3);
    $categories = Category::where('status',1)->latest()->get();
    return view('pages.shop', compact('products','productsp','categories'));

  }

//----------category wise product show

public function catWiseProduct($cat_id){
    $products = Product::where('category_id',$cat_id)->latest()->paginate(3);
    $categories = Category::where('status',1)->latest()->get();

    return view('pages.category-product', compact('products','categories'));
}



}
