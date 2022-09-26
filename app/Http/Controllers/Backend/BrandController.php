<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
  
    public function index(){
        $brands = Brand::get();
        return view('backend.brand.index', compact('brands'));
    }



    public function storeBrand(Request $request){
        $request->validate([
          'brand_name' => 'required',
        ]);

        Brand::insert([
             'brand_name' => $request->brand_name,
             'created_at' => Carbon::now(),
             
        ]);

        return redirect()->back()->with('success', 'Brand Added Successfuly');
    }



    public function editBrand($id){
        $brands = Brand::find($id);
        return view('backend.brand.edit', compact('brands'));
    }



    
  public function updateBrand(Request $request){
    
    $id = $request->id;
     Brand::find($id)->update([
          'brand_name' => $request->brand_name,
          'updated_at' => Carbon::now(),
          
     ]);
 
     //return redirect()->back()->with('success', 'Data Updated Successfuly');
     return redirect()->action([BrandController::class, 'index'])->with('update', 'Brand Update Successfuly');
 }




 public function deleteBrand($id){
    Brand::find($id)->delete();
    return redirect()->back()->with('delete', 'Delete Successfuly');
  }
  
  
  public function inactiveBrand($id){
    Brand::find($id)->update(['status' => 0]);
    return redirect()->back()->with('update', 'Brand Inactive Successfuly');
  }
  
  public function activeBrand($id){
    Brand::find($id)->update(['status' => 1]);
    return redirect()->back()->with('update', 'Brand Active Successfuly');
  }
  
 

      
      
}
