<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{


    public function _construct(){
      $this->middleware('auth:admin');
    }



    public function index(){
        $categories=Category::latest()->get();
        return view('backend.category.index', compact('categories'));
  }


  public function storeCategory(Request $request){
         $request->validate([
           'category_name' => 'required',
         ]);

         Category::insert([
              'category_name' => $request->category_name,
              'created_at' => Carbon::now(),
              
         ]);

         return redirect()->back()->with('success', 'Data insert Successfuly');
  }

  public function editCategory($id){
      $categories = Category::find($id);
      return view('backend.category.edit', compact('categories'));
  }


  public function updateCategory(Request $request){
    
   $id = $request->id;
    Category::find($id)->update([
         'category_name' => $request->category_name,
         'updated_at' => Carbon::now(),
         
    ]);

    //return redirect()->back()->with('success', 'Data Updated Successfuly');
    return redirect()->action([CategoryController::class, 'index'])->with('update', 'Data Update Successfuly');
}

public function deleteCategory($id){
  Category::find($id)->delete();
  return redirect()->back()->with('delete', 'Delete Successfuly');
}


public function inactiveCategory($id){
  Category::find($id)->update(['status' => 0]);
  return redirect()->back()->with('update', 'Category Inactive Successfuly');
}

public function activeCategory($id){
  Category::find($id)->update(['status' => 1]);
  return redirect()->back()->with('update', 'Category Active Successfuly');
}



}
