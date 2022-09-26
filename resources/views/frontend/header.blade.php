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
                            <li class="active"><a href="{{url('category/product-show/'.$row->id)}}">{{$row->category_name}}</a></li>
                              
                            @endforeach
                          
                        </ul>
                    </div>
                </div>

               


                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{url('search-product')}}" method="GET">
                           
                                <input type="text" id="search" name="search" placeholder="What do you need?">
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
                    
                </div>
            </div>
        </div>
    </section>
