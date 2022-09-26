
@extends('frontend.frontend-master')

@section('main_content')


@include('frontend.header')
    <section class="search_section">
         <div class="container">
          <div class="row" style="width:100%; margin:0 auto">
                        @forelse($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($product->image_one)}}">
                                    <ul class="product__item__pic__hover">
                                       
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

                              <div class="product__item__text">
                                    <h6><a href="#">{{$product->product_name}}</a></h6>
                                    <h5>Tk. {{$product->price}}.00</h5>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="row" style="width:33%; margin:0 auto">
                        <h3 class="text-danger"> <img src="{{asset('frontend/img')}}/noproduct.png" alt=""></h3>
                        </div>
                        @endforelse
                        </div>
                        
                  
                    

                    <div class="product">
                      <h5 style="float:right">{{ $products->links() }}</h5>
                    </div>
                </div>
    </div>
    </div>
   </section>
@endsection