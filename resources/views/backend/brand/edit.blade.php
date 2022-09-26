
@extends('backend.dashboard.admin_dashboard')
  

  @section('content')

  

  <div class="container">

  <!-- start category form.....-->
     <div class="row w-50" style="margin:0 auto;padding:10px; border:1px solid gray; margin-top:50px">
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
          <h4>Update Category</h4>
          <hr>
  <form action="{{url('admin/brand/update')}}" method="POST">

  @csrf

  <input type="hidden" class="form-control" name="id"  value="{{ $brands->id }}" >
  
  <div class="form-group">
    <label for="">Brand Name</label>
    <input type="text" class="form-control" name="brand_name"  value="{{ $brands->brand_name }}" >
   </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<!-- Ecnd Caetegory form.....-->

</div>
  @endsection



  

 
