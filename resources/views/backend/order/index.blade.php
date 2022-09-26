

@extends('backend.dashboard.admin_dashboard')


  @section('content')

  

  <div class="container">

 <!-- start category form.....-->
   
      <h4>Order Page</h4>
<div class="row w-75" style="margin:0 auto">
     <h4 class="text-center">Order Table</h4>
     @if(session()->has('delete'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('delete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

    </div>
    @endif

    @if(session()->has('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

    </div>
    @endif
    
     <table class="table table-striped table-bordered" >
  <thead>
    <tr>
   
      <th scope="col">#</th>
      <th scope="col">Invoice</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Total</th>
      <th scope="col">Coupon Discount</th>
      <th scope="col">Status</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
    @php
       $i = 1;
    @endphp

    @foreach($orders as $row)
    <tr>
    
       <td>{{ $i++ }}</td>
      <td>{{ $row->invoice_no }}</td>
      <td>{{ $row->payment_type }}</td>
      <td>{{ $row->subtotal }}</td>
      <td>{{ $row->total }}</td>
      <td>{{ $row->coupon_discount }}</td>
    


      <td>
        @if($row->status == 1)
        <span class="badge badge-success">Active</span>
        @else
        <span class="badge badge-danger">Inactive</span>
        @endif
      </td>
      <td>
        <a class="btn btn-success btn-sm" href="{{ url('admin/order/view/'.$row->id)}}"><i class="fa fa-eye"></i></a>
   
      </td>
      
    </tr>
    @endforeach
  </tbody>

</table>

</div>

<hr>

<!-- End Category Table..........-->

</div>
  @endsection



  

 
