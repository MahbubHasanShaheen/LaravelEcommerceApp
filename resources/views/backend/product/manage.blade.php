
@extends('backend.dashboard.admin_dashboard')
  @section('category') active @endsection

  @section('content')

  

  <div class="container">


<div class="row w-100" style="margin:0 auto">
     <h4 class="text-center">Category Table</h4>
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
    
     <table class="table table-striped table-bordered" id="example">
  <thead>
    <tr>
   
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Code</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image01</th>
      <th scope="col">Image02</th>
      <th scope="col">Image03</th>
      <th scope="col">Status</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
   <?php $i = 0 ?>
    @foreach($products as $product)
    <?php $i++ ?>
    <tr>
      <td>{{ $i}}</td>
      
      <td>{{ $product->category->category_name }}</td>
      <td>{{ $product->product_name }}</td>
      <td>{{ $product->product_code }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->quantity }}</td>
      <td>
        <img src="{{asset($product->image_one)}}">
      </td>

      <td>
        <img src="{{asset($product->image_two)}}">
      </td>

      <td>
        <img src="{{asset($product->image_three)}}">
      </td>

  


      <td>
        @if($product->status == 1)
        <span class="badge badge-success">Active</span>
        @else
        <span class="badge badge-danger">Inactive</span>
        @endif
      </td>
      <td>
        <a class="btn btn-success btn-sm" href="{{ url('admin/product/edit/'.$product->id) }}"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-danger btn-sm" href="{{ url('admin/product/delete/'.$product->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
        @if($product->status == 1)
        <a class="btn btn-danger btn-sm" href="{{ url('admin/product/inactive/'.$product->id )}}"><i class="fa fa-arrow-down"></i></a>
        @else
        <a class="btn btn-success btn-sm" href="{{ url('admin/product/active/'.$product->id )}}"><i class="fa fa-arrow-up"></i></a>
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



  

 
