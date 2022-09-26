
@extends('backend.dashboard.admin_dashboard')
  @section('category') active @endsection

  @section('content')

  

  <div class="container">
  <h4 class="text-center">Product Add</h4>
       
  <!-- start category form.....-->
     <div class="row w-100" style="margin:0 auto;padding:10px; border:1px solid gray;margin-top:30px">



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



          
  <form action="{{url('admin/product/store')}}" method="POST" enctype="multipart/form-data">

  @csrf
  <div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="">Product Name</label>
    <input type="text" class="form-control" name="product_name"  placeholder="Enter product name.....">
 </div>
 <div class="form-group">
    <label for="">Product Code</label>
    <input type="text" class="form-control" name="product_code"  placeholder="Enter Product Code.....">
 </div>
 <div class="form-group">
    <label for="">Price</label>
    <input type="text" class="form-control" name="price"  placeholder="Enter category name.....">
 </div>
 <div class="form-group">
    <label for="">Quantity</label>
    <input type="number" class="form-control" name="quantity"  placeholder="Enter Quantity........">
 </div>

</div>

<div class="col-md-4">
 <div class="form-group">
    <label for="">Short Description</label>
    <input type="text" class="form-control" name="short_description"  placeholder="Enter Short Description........">
 </div>

 <div class="form-group">
    <label for="">Long Description</label>
    <input type="text" class="form-control" name="long_description"  placeholder="Enter  Long Description.......">
 </div>

 <div class="form-group">
    <label class="from-control-lebel">Image One</label>
    <input type="file" class="form-control" name="image_one">
 </div>

 <div class="form-group">
    <label for="">Image Two</label>
    <input type="file" class="form-control" name="image_two" >
 </div>

</div>


<div class="col-md-4">
 <div class="form-group">
    <label for="">Image Three</label>
    <input type="file" class="form-control" name="image_three" >
 </div>

 <div class="form-group">
    <label for="">Category</label>
    <select class="form-controll select" name="category_id">
        <option label="Choose Category"></option>
        @foreach($categories as $category)

        <option value="{{$category->id}}">{{$category->category_name}}</option>

        @endforeach
    </select>
    
 </div>

 <div class="form-group">
    <label for="">Brand</label>
    <select class="form-controll select" name="brand_id">
        <option label="Choose Brands"></option>
        @foreach($brands as $brand)

       <option value="{{$category->id}}">{{$brand->brand_name}}</option>

       @endforeach
    </select>
    
 </div>
<div>
</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



</div>
</div>

</div>
  @endsection



  

 
