@extends('backend.dashboard.admin_dashboard')


  @section('content')


<div class="container">

<div class="user" style="width:90%; margin:0 auto; padding:40px; border:1px solid gray">
    <div class="row">
       <h4 style="text-align:center">View Order</h4>
       <hr>
    <table class="table">
      <tr>
        <th>Shipping First Name</th>
        <td>:</td>
        <td>{{ $shipping->shipping_first_name}}</td>
      </tr>

      <tr>
        <th>Shipping Last Name</th>
        <td>:</td>
        <td>{{ $shipping->shipping_last_name}}</td>
      </tr>

   

      <tr>
        <th>Shipping Phone No</th>
        <td>:</td>
        <td>{{ $shipping->shipping_phone}}</td>
      </tr>

      <tr>
        <th>Shipping Email Address</th>
        <td>:</td>
        <td>{{ $shipping->shipping_email}}</td>
      </tr>

      <tr>
        <th>Shipping Address</th>
        <td>:</td>
        <td>{{ $shipping->address}}</td>
      </tr>

      <tr>
        <th>Shipping State</th>
        <td>:</td>
        <td>{{ $shipping->state}}</td>
      </tr>

      <tr>
        <th>Shipping Post Code</th>
        <td>:</td>
        <td>{{ $shipping->post_code}}</td>
      </tr>
    </table>
     
</div>


<div class="row" style="background-color:silver">
<table class="table" >
   <h4 style="text-align:center">Order Items</h4>
    <thead>
        <th>Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        

    </thead>
    <tbody>
        @foreach( $orderItems as $row )
        <tr>  
            <td><img src="{{ asset($row->product->image_one) }}"></td>
            <td>{{ $row->product->product_name}}</td>
            <td>{{ $row->product_qty}}</td>

        </tr>
      @endforeach


    </tbody>
  </table>
</div>
   <table class="table">
    <thead>
        <th>Invoice No</th>
        <th>Payment Type</th>
        <th>Subtotal</th>
        <th>Coupon Discount</th>
        <th>Total</th>

    </thead>
    <tbody>
        <tr>
            
            <td>{{ $order->invoice_no}}</td>
            <td>{{ $order->payment_type}}</td>
            <td>{{ $order->subtotal}}</td>
           

           <td>
            @if($order->coupon_discount == NULL) 
                <span>No</span>
                 @else
                 <span>Yes</span>
            @endif
            </td>

            <td>{{ $order->total }}</td>

        </tr>
    </tbody>
  </table>

</div>
</div>
@endsection

