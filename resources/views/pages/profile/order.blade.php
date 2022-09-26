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
<section>
<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-10" style="background-color:tan;border:2px solid silver; padding:20px">

        <div class="row">
  <div class="col-sm-4">
  <div class="card" style="width: 18rem;">
 
  <div class="card-body">
    <h5 class="card-title text-center" style="font-weight:bold;color:green">{{Auth::user()->name}}</h5>
    
  </div>

  <div class="card-body">
   
  <ul class="list-group list-group-flush">
  <a href="{{url('home')}}" class="btn btn-primary">Home</a><br>

  <a class="btn btn-danger" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
 </form>
   
  </ul>
  </div>
</div>
  </div>
  <div class="col-sm-8">
    <div class="card">
        <div class="card-body">
          <table class="table table-striped">
             <thead>
             <tr>
              <th>#</th>
              <th>Invoice No</th>
              <th>Payment Type</th>
              <th>Subtotal</th>
              <th>Total</th>
              <th>Action</th>
             </tr>
             </thead>

             <tbody>
                @php
                  
                @endphp
             @foreach( $orders as $order )
                <tr>
               
            <td>1</td>    
            <td>{{ $order->invoice_no}}</td>
            <td>{{ $order->payment_type}}</td>
            <td>{{ $order->subtotal}}</td>
            <td>{{ $order->total }}</td>
            <td><a class="btn btn-info" href="{{url('user/order-view/'.$order->id)}}">View</a></td>
                </tr>
                @endforeach
             </tbody>
          </table>
        </div>
</div>

  </div>
</div>
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
        </div>
    </div>
</div>
<br><br>
<hr>
@endsection
