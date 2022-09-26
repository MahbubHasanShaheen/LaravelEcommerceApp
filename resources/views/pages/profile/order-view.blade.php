@extends('layouts.app')
@extends('frontend.frontend-master')

@section('main_content')

<section class="hero hero-normal">

<div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Category</span>
                        </div>
                        @php
                         $categories = App\Models\Category::latest()->where('status',1)->get();
                        @endphp
                        <ul>
                            @foreach( $categories as $row)
                            <li><a href="#">{{$row->category_name}}</a></li>
                              
                            @endforeach
                          
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img')}}/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>My Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <hr>
<section>
<div class="container mt-5">
<div class="row">
<h4 style="text-align:center">Order Details</h4>
<div class="col-md-2">

    <!--<h5 class="card-title text-center" style="font-weight:bold;color:green">{{Auth::user()->name}}</h5>-->
   
  <ul class="list-group list-group-flush">
  <a href="{{url('home')}}" class="btn btn-primary">Home</a>

  <a class="btn btn-danger mt-2" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
 </form>
   
  </ul>
  </div>



  <div class="col-md-10">
    
          <table class="table table-striped">
             <thead>
             <tr>
              <th>#</th>
              <th>Invoice No</th>
              <th>Payment Type</th>
              <th>Subtotal</th>
              <th>Total</th>
              <th>Date</th>
              
             </tr>
             </thead>

             <tbody>
         
                <tr>
               
            <td>1</td>    
            <td>{{ $order->invoice_no}}</td>
            <td>{{ $order->payment_type}}</td>
            <td>{{ $order->subtotal}}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->created_at }}</td>
            </tr>
              
             </tbody>
          </table>
      
</div>
<div class="row mt-2">
<div class="col-md-12">
  <h4 style="text-align:center">Shipping Details</h4>
          <table class="table table-striped">
             <thead>
             <tr>
              <th>#</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
              <th>State</th>
              <th>PCode</th>
            
             </tr>
             </thead>

             <tbody>
         
                <tr>  
            <td>1</td>    
            <td>{{ $shipping->shipping_first_name}}</td>
            <td>{{ $shipping->shipping_phone}}</td>
            <td>{{ $shipping->shipping_email}}</td>
            <td>{{ $shipping->address }}</td>
            <td>{{ $shipping->state }}</td>
            <td>{{ $shipping->post_code }}</td>

            </tr>
              
             </tbody>
          </table>
      
</div>
</div>


<div class="row mt-2" style="background-color:#9FE2BF">
<h4 style="text-align:center">Order Items</h4>
<table class="table table-striped">
   
    <thead>
        <th>Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Product Code</th>
        <th>Description</th>
      

    </thead>


    <tbody>
        @foreach( $orderItems as $row )
        <tr>  
            <td><img src="{{ asset($row->product->image_one) }}" height="60" width="100"></td>
           
            <td>{{ $row->product->product_name}}</td>
            <td>{{ $row->product_qty}}</td>
            <td>{{ $row->product->product_code}}</td>
            <td>{{ $row->product->short_description}}</td>
            
        </tr>
      @endforeach


    </tbody>
  </table>
</div>

</div>
<hr>
</section>

            <!--<div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>-->
@endsection
