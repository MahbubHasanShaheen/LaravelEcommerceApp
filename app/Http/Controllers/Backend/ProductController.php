<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

use Intervention\Image\Facades\Image;
use Carbon\Carbon;




class ProductController extends Controller
{
    public function addProduct(){
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();

        return view('backend.product.add', compact('categories', 'brands'));
    }


    public function storeProduct(Request $request){
        
          $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',

            ],
        [
            'category_id.required' => 'Select Category Name',
            'brand_id.required' => 'Select Brand Name',

        ]);

        $image_one = $request->file('image_one');
        $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(240,240)->save('frontend/img/product/upload/'. $name_gen);
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;

        $image_two = $request->file('image_two');
        $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(300,400)->save('frontend/img/product/upload/'. $name_gen);
        $img_url2 = 'frontend/img/product/upload/'.$name_gen;

        $image_three = $request->file('image_three');
        $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(300,400)->save('frontend/img/product/upload/'. $name_gen);
        $img_url3 = 'frontend/img/product/upload/'.$name_gen;


        Product::insert([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ',',', '-'.$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
            'created_at' =>Carbon::now(),


        ]);

        return redirect()->back()->with('success', 'Product add successfuly'); 
    }
   
    public function manageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.manage', compact('products'));

    }




    public function editProduct($id){
        $products = Product::find($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.edit', compact('products','categories','brands'));
    }

    //===================Update Product========================//
    public function updateProduct(Request $request){
         
        $product_id = $request->id;
        Product::findOrfail($product_id)->update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ',',', '-'.$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'updated_at' =>Carbon::now(),


        ]);

    return redirect()->action([ProductController::class, 'manageProduct'])->with('update', 'Product Update Successfuly');
        
    }


    public function updateImage(Request $request){
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;

        if ($request->has('image_one') && $request->has('image_two')){
           unlink($old_one);
           unlink($old_two);
           $image_one = $request->file('image_one');
           $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();

           Image::make($image_one)->resize(240,240)->save('frontend/img/product/upload/'. $name_gen);

           $img_url1 = 'frontend/img/product/upload/'.$name_gen;
           
           Product::findOrFail($product_id)->update([
             'image_one' =>$img_url1,
             'updated_at' => Carbon::now(),
           ]);



           $image_two = $request->file('image_two');
           $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();

           Image::make($image_two)->resize(300,400)->save('frontend/img/product/upload/'. $name_gen);

           $img_url1 = 'frontend/img/product/upload/'.$name_gen;
           
           Product::findOrFail($product_id)->update([
             'image_two' =>$img_url1,
             'updated_at' => Carbon::now(),
           ]);

           return redirect()->action([ProductController::class, 'manageProduct'])->with('update', 'Image Update Successfuly');

        
        }



         if ($request->has('image_three')){
            unlink($old_three);
            $image_three = $request->file('image_three');
            $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
 
            Image::make($image_three)->resize(300,400)->save('frontend/img/product/upload/'. $name_gen);
 
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;
            
            Product::findOrFail($product_id)->update([
              'image_three' =>$img_url1,
              'updated_at' => Carbon::now(),
            ]);
 
            return redirect()->action([ProductController::class, 'manageProduct'])->with('update', 'Image Update Successfuly');
 
         
         } 

    }

    //==========Delete Product=====================================//

    public function deleteProduct($id){
            $image = Product::findOrfail($id);
            $image_one=$image->image_one;
            $image_two=$image->image_two;
            $image_three=$image->image_three;

            unlink($image_one);
            unlink($image_two);
            unlink($image_three);
         
            Product::findOrfail($id)->delete();

            return redirect()->back()->with('delete','Delete  Successfuly');

    }

//==============Status Product===============================//

    
public function inactiveProduct($id){
    Product::find($id)->update(['status' => 0]);
    return redirect()->back()->with('update', 'Product Inactive Successfuly');
  }
  
  public function activeProduct($id){
    Product::find($id)->update(['status' => 1]);
    return redirect()->back()->with('update', 'Product Active Successfuly');
  }
  




}
