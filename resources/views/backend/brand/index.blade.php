
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
          <h4>Brand Page</h4>
          <hr>
  <form action="{{url('admin/brand/store')}}" method="POST">

  @csrf
  <div class="form-group">
    <label for="">Brand Name</label>
    <input type="text" class="form-control" name="brand_name"  placeholder="Enter brand name........">
   </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<hr>

<!-- Ecnd Caetegory form.....-->









<div class="row w-75" style="margin:0 auto">
     <h4 class="text-center">Brand Table</h4>
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
      <th scope="col">Brand Name</th>
      <th scope="col">Status</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
   <?php $i = 0 ?>
    @foreach($brands as $brand)
    <?php $i++ ?>
    <tr>
      <td>{{ $i}}</td>

      <td>{{ $brand->brand_name }}</td>
      <td>
        @if($brand->status == 1)
        <span class="badge badge-success">Active</span>
        @else
        <span class="badge badge-danger">Inactive</span>
        @endif
      </td>
      <td>
        <a class="btn btn-success btn-sm" href="{{ url('admin/brand/edit/'.$brand->id) }}"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-danger btn-sm" href="{{ url('admin/brand/delete/'.$brand->id )}}"><i class="fa fa-trash"></i></a>
        @if($brand->status == 1)
        <a class="btn btn-danger btn-sm" href="{{ url('admin/brand/inactive/'.$brand->id )}}"><i class="fa fa-arrow-down"></i></a>
        @else
        <a class="btn btn-success btn-sm" href="{{ url('admin/brand/active/'.$brand->id )}}"><i class="fa fa-arrow-up"></i></a>
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



  

 
