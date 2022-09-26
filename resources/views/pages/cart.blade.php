@extends('frontend.frontend-master')

@section('main_content')
<style>
   .table tr td{height:50%}
</style>

   <!-- Hero Section Begin -->
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
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img')}}/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <div class="shoping__cart__table">
                         @if(session()->has('cart-product'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('cart-product') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                        </div>
                        @endif

                        @if(session()->has('cart-update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('cart-update') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                        </div>
                        @endif

                        @if(session()->has('copon'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('copon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                        </div>
                        @endif

    

                        
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('loginError') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                        </div>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($carts as $cart)
                                    
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset($cart->product->image_one ?? 'None') }}" height="60" alt="">
                                      
                                       <h5>{{ $cart->product->product_name?? 'None' }}<h5>

                                    </td>
                                    <td class="shoping__cart__price">
                                        Tk.{{$cart->price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form action="{{url('cart/quantity/update/'.$cart->id)}}" method="post">
                                                @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{$cart->qty}}">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </div>
                                       </form>
                                    </td>
                   
                                    <td class="shoping__cart__total">
                                        Tk.{{ $cart->price * $cart->qty }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        
                                            <a href="{{ url('cart/destroy/'.$cart->id) }}">
                                            <span class="icon_close"></span>
                                            </a>
                                         
                                    </td>
                                </tr>
                              
                              
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/')}}" class="primary-btn">CONTINUE SHOPPING</a>
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(Session::has('coupon'))
                    @else
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{url('coupon/apply')}}" method="post">
                                @csrf
                                <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                                <button type="submit" class="primary-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @if (Session::has('coupon'))
                            <li>Subtotal <span>Tk.{{ $subtotal }}.00</span></li>
                            
                               <li>Coupon <span>{{ session()->get('coupon')['coupon_name'] }}<span><a href="{{url('coupon/destroy')}}">X</a></li>


                                <li>Discount <span>{{ session()->get('coupon')['coupon_discount'] }}%
                                ({{ session()->get('coupon')['discount_amount']}})</span></li>
                                

                               <li>Total <span>Tk.{{ $subtotal - session()->get('coupon')['discount_amount'] }}.00</span></li>

                              @else

                              <li>Total <span>Tk.{{ $subtotal }}.00</span></li>
                               
                              @endif
                            
                        </ul>
                        <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->



@endsection