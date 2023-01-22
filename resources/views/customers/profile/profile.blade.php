@extends ('customers.main_master')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-8" >
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                    @foreach($customers as $customers) 
                    
              
                  

                    @if($customers->id==Auth::user()->id)


                

                      <form action=""  method="POST" >
                         @csrf 


                      
                          <div class="mb-3 col-md-6">
                            <label for="custFullName" class="form-label">Full Name</label>
                            <input class="form-control" type="text" name="custFullName" id="custFullName"  >
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{ Auth::user()->email }}"
                            />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="custPhone">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">+60</span>
                              <input type="text" id="custPhone" name="custPhone" class="form-control" placeholder=""  />
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="custAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="custAddress" name="custAddress" placeholder="Address"/>
                          </div>
                         
                            <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>


                            <li><a href="">Edit</a></li>

                      </form>
                      @endif

                    @endforeach


                    </div>




                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
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
              </div>
            </div>
            <!-- / Content -->

           

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