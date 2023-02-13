@extends ('customers.main_master')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:20px; margin-left:100px; ">
              <h4 class="fw-bold py-3 mb-4"><span style="margin-left:120px; " class="text-muted fw-light">Account Settings /</span> Account</h4>


                    <div class="col-lg-9" style="margin-left:110px">
                      <div class="checkout__order" style="background-color:white">
                        <h5 style="padding-bottom:15px">PROFILE</h5>
                        @php
                        $customers= App\Models\Customers::all()
                        @endphp
                        
                        <div class="checkout__order__product">
                            <ul>
                                   
                              <li><span class="top__text">Profile Details</span></li>
                              <li>Username<span style="margin-left:-1000px">{{ Auth::user()->name }}</span></li>
                              <li>Email<span>{{ Auth::user()->email }}</span></li>

                              @foreach($customers as $customers)
                                  @if($customers->id==Auth::user()->id)
                                      <li>Full Name<span>{{$customers->custFullName}}</span></li>
                                      <li>Phone<span>{{$customers->custPhone}}</span></li>
                                      <li>Address<span>{{$customers->custAddress}}</span></li>
                                  @endif
                              @endforeach
                            </ul>
                          </div>
                              
                          @php
                  $user= App\Models\User::all()
                  @endphp

                          <div class="mt-2">
                          @foreach($user as $user) 
                      @if($user->id==Auth::user()->id)
                          <a  href="{{ route('custEditProfile',$user->id)}}" class="btn btn-primary ">Edit Profile</a>
                          @endif
                @endforeach </div>
                      </div>
                    </div>
            </div>

            <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:20px; margin-left:100px;" >


                    <div class="col-lg-9" style="margin-left:110px">
                      <div class="checkout__order" style="background-color:white">
                        <h5 style="padding-bottom:15px">Delete Account</h5>
                              
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                              
                        <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                         
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