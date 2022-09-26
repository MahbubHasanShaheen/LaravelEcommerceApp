@extends('frontend.frontend-master')

@section('main_content')

<section class="hero">
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
                            <li><a href="{{url('category/product-show/'.$row->id)}}">{{$row->category_name}}</a></li>
                              
                            @endforeach
                          
                        </ul>
                    </div>
                </div>

               


                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{url('search-product')}}" method="GET">
                           
                                <input type="text" id="search" name="search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>

                            <div id="suggestProduct">

                            </div>
                        </div>




 
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+8801760002135</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('frontend/img/hero')}}/banner2.jpg">
                        <div class="hero__text">
                            <span style="color:red">Smart Mobile</span>
                            <h2 style="color:white">Mobile <br />100% Android</h2>
                            <p style="color:aqua">Free Pickup and Delivery Available</p>
                            <a href="#" class="btn btn-info">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Product Category</h2>
            <hr>
            <div class="row">
                <div class="categories__slider owl-carousel">
                        @foreach( $products as $product)    
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset($product->image_two)}}" style="height:180px;width:240px; border:1px solid silver">
                            <h5><a href="#">{{ $product->product_name}}</a></h5>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                         <li class="active" data-filter="*">All</li>

                            @foreach( $categories as $cat)
                            
                            <li data-filter=".filter{{ $cat->id }}">{{ $cat->category_name }}</li>
                              
                            @endforeach
                            <!--<li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach( $categories as $cat)
                @php
                 $products = App\Models\Product::where('category_id', $cat->id)->latest()->get();
                @endphp

                @foreach($products as $product)
            
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{ $cat->id }}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset( $product->image_one )}}" style="height:160px;width:180px">
                            <ul class="featured__item__pic__hover">
                                 
                             <li>
                               <form class="form-controll" action="{{ url('add/to-wishlist/'.$product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" href="{{url('add/to-wishlist')}}"><i class="fa fa-heart"></i></button>
                               </form>
                           </li>


                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>


                                <li>
                                <form class="form-controll" action="{{ url('add/to-cart/'.$product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                 <button type="submit" class="rounded" href="{{url('add/to-cart')}}"><i class="fa fa-shopping-cart"></i></button>
                               </form>
                             </li>

                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{url('product/details/'.$product->id)}}">{{ $product->product_name}}</a></h6>
                            <h5>Tk.{{ $product->price}}.00</h5>
                        </div>
                    </div>
                </div>
                  @endforeach
                 @endforeach
            </div>
        

        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('frontend/img/banner')}}/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('frontend/img/banner')}}/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Its_p as $product)

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($product->image_two)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->product_name}}</h6>
                                        <span>{{$product->price}}</span>
                                    </div>
                                </a>
                                @endforeach


                            </div>
                            <div class="latest-prdouct__slider__item">
                  
                            @foreach($Its_p as $product)

                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset($product->image_two)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$product->product_name}}</h6>
                                            <span>{{$product->price}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Its_p as $product)

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($product->image_two)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->product_name}}</h6>
                                        <span>{{$product->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>


                            <div class="latest-prdouct__slider__item">
                            @foreach($Its_p as $product)

                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset($product->image_two)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product->product_name}}</h6>
                                    <span>{{$product->price}}</span>
                                </div>
                            </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Its_p as $product)

                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($product->image_two)}}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{$product->product_name}}</h6>
                                                        <span>{{$product->price}}</span>
                                                    </div>
                                                </a>
                                    @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($Its_p as $product)

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($product->image_two)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product->product_name}}</h6>
                                        <span>{{$product->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


@endsection
