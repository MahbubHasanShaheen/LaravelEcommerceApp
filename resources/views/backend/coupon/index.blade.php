
@extends('backend.dashboard.admin_dashboard')


  @section('content')

  

  <div class="container">

 <!-- start category form.....-->
 <div class="row w-50" style="margin:0 auto;padding:10px; border:1px solid gray">
     @if(session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

    </div>
    @endif
     
     @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif


              @if(Session::has('error-msg'))
              <p class="text-danger">{{ Session::get('error-msg') }}</p>
              @endif
          <h4>Coupon Page</h4>
          <hr>
  <form action="{{url('admin/coupon/store')}}" method="POST">

  @csrf
  <div class="form-group">
    <label for="">Coupon Name</label>
    <input type="text" class="form-control" name="coupon_name"  placeholder="Enter coupon name........">
    <label for="">Discount</label>
    <input type="text" class="form-control" name="discount"  placeholder="Enter coupon discount........">

   </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<hr>

<!-- Ecnd Caetegory form.....-->









<div class="row w-75" style="margin:0 auto">
     <h4 class="text-center">Coupon Table</h4>
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
      <th scope="col">Coupon Name</th>
      <th scope="col">Discount</th>
      <th scope="col">Status</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
   <?php $i = 0 ?>
    @foreach($coupons as $coupon)
    <?php $i++ ?>
    <tr>
      <td>{{ $i}}</td>

      <td>{{ $coupon->coupon_name }}</td>
      <td>{{ $coupon->discount }}</td>

      <td>
        @if($coupon->status == 1)
        <span class="badge badge-success">Active</span>
        @else
        <span class="badge badge-danger">Inactive</span>
        @endif
      </td>
      <td>
        <a class="btn btn-success btn-sm" href="{{ url('admin/coupon/edit/'.$coupon->id) }}"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-danger btn-sm" href="{{ url('admin/coupon/delete/'.$coupon->id )}}" onclick="return confirm('Are you sure delete coupon')"><i class="fa fa-trash"></i></a>
        @if($coupon->status == 1)
        <a class="btn btn-danger btn-sm" href="{{ url('admin/coupon/inactive/'.$coupon->id )}}"><i class="fa fa-arrow-down"></i></a>
        @else
        <a class="btn btn-success btn-sm" href="{{ url('admin/coupon/active/'.$coupon->id )}}"><i class="fa fa-arrow-up"></i></a>
        @endif
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



  

 
