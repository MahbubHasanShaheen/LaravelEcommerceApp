
@extends('backend.dashboard.admin_dashboard')
  

  @section('content')

  <div class="container">

  <!-- start category form.....-->
     <div class="row w-100" style="margin:0 auto;padding:10px;margin-top:50px; background-color:#F8F7FA;border:2px solid silver">
     @if(session()->has('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('update') }}
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
              <p class="hidden-danger">{{ Session::get('error-msg') }}</p>
              @endif
          <h4>Update Product</h4>
          <hr>
  <form action="{{url('admin/product/update')}}" method="POST">

  @csrf

  <input type="hidden" class="form-control" name="id"  value="{{ $products->id }}" >

<div class="row">
<div class="col-md-6">
 <div class="form-group">
    <label for="form-control-lebel">Category</label>
    <select class="form-control select" name="category_id">
        <option label=""></option>
        @foreach($categories as $category)

        <option value="{{ $category->id }}" 
        {{ $category->id == $products->category_id ? "selected":" "}}>
         {{$category->category_name}}</option>

        @endforeach
    </select>
    
 </div>


 <div class="form-group">
    <label for="form-control-lebel">Brand</label>
    <select class="form-control select" name="brand_id">
        <option label=""></option>
        @foreach($brands as $brand)

        <option value="{{ $brand->id }}" 
        {{ $brand->id == $products->brand_id ? "selected":" "}}>
         {{$brand->brand_name}}</option>

        @endforeach
    </select>
    
 </div>
  
 <div class="form-group">
    <label for="">Product Name</label>
    <input type="text" class="form-control" name="product_name"  value="{{ $products->product_name }}" >
 </div>

 <div class="form-group">
    <label for="">Product Code</label>
    <input type="text" class="form-control" name="product_code"  value="{{ $products->product_code }}" >
 </div>
</div>


<div class="col-md-6">
 <div class="form-group">
    <label for="">Quantity</label>
    <input type="number" class="form-control" name="quantity"  value="{{ $products->quantity }}" >
 </div>

 <div class="form-group">
    <label for="">Price</label>
    <input type="text" class="form-control" name="price"  value="{{ $products->price }}" >
 </div>

 <div class="form-group">
    <label for="">Short Description</label>
    <textarea class="form-control r-5" name="short_description">{{ $products->short_description}}</textarea>
    
 </div>

 <div class="form-group">
    <label for="">Long Description</label>
    <textarea class="form-control" name="long_description">{{ $products->long_description}}</textarea>
    
 </div>
</div>
</div>
<button type="submit" class="btn btn-primary">Update Product</button>
<br>
<br>
</form>
<hr>


<form action="{{url('admin/product/image-update')}}" method="POST" enctype="multipart/form-data">


@csrf
<input type="hidden" class="form-control" name="id"  value="{{ $products->id }}" >
<input type="hidden" class="form-control" name="img_one"  value="{{ $products->image_one }}" >
<input type="hidden" class="form-control" name="img_two"  value="{{ $products->image_two }}" >
<input type="hidden" class="form-control" name="img_three"  value="{{ $products->image_three }}" >


<div class="row">
   <div class="col-md-4">
   <div class="form-group">
    <label class="from-control-lebel">Image One</label>
    <img src="{{asset($products->image_one)}}" height="60">

    <input type="file" class="form-control" name="image_one" value="{{ $products->image_one }}">
 </div>
</div>

<div class="col-md-4">
 <div class="form-group">
    <label for="">Images02</label>
    <img src="{{asset($products->image_two)}}" height="60">
    <input type="file" class="form-control" name="image_two" value="{{$products->image_two}}" >
 </div>
</div>

<div class="col-md-4">
 <div class="form-group">
    <label for="">Image03</label>
    <img src="{{asset($products->image_three)}}" height="60">
    <input type="file" class="form-control" name="image_three"  value="{{$products->image_three}}" >
 </div>
</div>
</div>
  <button type="submit" class="btn btn-primary">Update Image</button>
</form>

</div>

<!-- Ecnd Caetegory form.....-->

</div>
  @endsection



  

 
