@extends ('customers.main_master')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="margin-left:120px; " class="text-muted fw-light">Account Settings /</span> Account</h4>


                    <div class="col-lg-8" style="margin-left:110px">
                      <div class="checkout__order" style="background-color:white">
                        <h5 style="padding-bottom:15px">EDIT PROFILE</h5>


                        <form  method="POST" action="{{ route('custUpdateProfile', $user->id)  }}" enctype="multipart/form-data" >
                        @csrf

                          <div class="checkout__order__product">
                            <ul>
                                   
                              <li><span class="top__text">Profile Details</span></li>

                              <label class="col-md-4 col-lg-3 col-form-label">Username</label><br>
                              <div  class="col-md-8 col-lg-9">
                                <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                              </div>

                              <label class="col-md-4 col-lg-3 col-form-label">Full Name</label><br>
                              <div  class="col-md-8 col-lg-9">
                                <input name="custFullName" type="text" class="form-control" id="custFullname" >
                              </div>

                              <label class="col-md-4 col-lg-3 col-form-label">Email</label><br>
                              <div  class="col-md-8 col-lg-9">
                                <input name="email" type="text" class="form-control" id="email" value="{{ Auth::user()->email }}">
                              </div>

                              <label class="col-md-4 col-lg-3 col-form-label">Phone Number</label><br>
                              <div  class="col-md-8 col-lg-9">
                                <input name="custPhone" type="text" class="form-control" id="custPhone">
                              </div>

                              <label class="col-md-4 col-lg-3 col-form-label">Address</label><br>
                              <div  class="col-md-8 col-lg-9">
                                <input name="custAddress" type="text" class="form-control" id="custAddress">
                              </div>

                              </ul>
                          </div>
                              
                          @php
                  $user= App\Models\User::all()
                  @endphp

                  <div style="margin-left:13px">
                      <input type="submit" class="btn btn-primary" value="Update"></input>
                    </div>
                    </form><!-- End Profile Edit Form -->


                      </div>
                    </div>
            </div>

       



          
          
           

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   
  </body>
</html>
@endsection