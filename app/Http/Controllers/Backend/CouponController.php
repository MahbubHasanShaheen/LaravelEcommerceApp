<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

use Carbon\Carbon;


class CouponController extends Controller
{
    public function index(){
        $coupons=Coupon::latest()->get();
        return view('backend.coupon.index', compact('coupons'));
  }




  
  public function storeCoupon(Request $request){
    $request->validate([
      'coupon_name' => 'required',
      'discount' => 'required',
    ]);

    Coupon::insert([
         'coupon_name' => $request->coupon_name,
         'discount' => $request->discount,

         'created_at' => Carbon::now(),
         
    ]);

    return redirect()->back()->with('success', 'Coupon Added Successfuly');
}




public function editCoupon($id){
  $coupons = Coupon::find($id);
  return view('backend.coupon.edit', compact('coupons'));
}




public function updateCoupon(Request $request){

$id = $request->id;
Coupon::find($id)->update([
    'coupon_name' => $request->coupon_name,
    'discount' => $request->discount,
    'updated_at' => Carbon::now(),
    
]);

//return redirect()->back()->with('success', 'Data Updated Successfuly');
return redirect()->action([CouponController::class, 'index'])->with('update', 'Coupon Update Successfuly');
}



public function deleteCoupon($id){
  Coupon::find($id)->delete();
  return redirect()->back()->with('delete', 'Delete Successfuly');
}


public function inactiveCoupon($id){
  Coupon::find($id)->update(['status' => 0]);
  return redirect()->back()->with('update', 'Coupon Inactive Successfuly');
}

public function activeCoupon($id){
  Coupon::find($id)->update(['status' => 1]);
  return redirect()->back()->with('update', 'Coupon Active Successfuly');
}

/*public function orderIndex(){
  $orders = Order::latest()->get();
    return view('backend.order.index', compact('orders'));
}


public function viewOrder($order_id){
  $order = Order::findOrfail($order_id);
  $orderItems = OrderItem::with('product')->where('order_id',$order_id)->get();
  $shipping = Shipping::with('product')->where('order_id',$order_id)->first();

  return view('backend.order.view',compact('order','orderItems','shipping'));

  }*/

}
