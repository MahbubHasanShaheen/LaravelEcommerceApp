@include('backend.dashboard.header')
<div class="container-fluid" style="background-color:	#001a33">
  
       
<div class="container-fluid page-body-wrapper full-page-wrapper" >
        <div class="content-wrapper d-flex align-items-center auth" style="background-color:	#001a33">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                                

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
                <div class="brand-logo">
                  <h2 class="text-center" style="padding:5px; background-color:#9069BC;color:white">Admin Login</h2>
                </div>
                
                <h4 class="font-weight-light">Sign in to continue.</h4>
                
               <form action="{{url('admin-login')}}" method="post">
                      @csrf
                <div class="col-auto">
                  <label>Email</label>
                  <input type="email"  class="form-control" name="email">
                </div>
                <div class="col-auto">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" >
                </div>
             <br>
             <div class="col-auto">
               <button type="submit" class="btn btn-primary mb-3">Login</button>
                </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                   <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
              
                  </div>
                </form>
              </div>
            </div>
          </div>
         </div>
       </div>

@include('backend.dashboard.footer_bottom')



