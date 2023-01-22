@extends ('staffs.staffMaster')
@section('content')

<main id="main" class="main">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="col-xl-12">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column ">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Edit Profile</h5>

                  <form  method="POST" action="{{ route('staffUpdateProfile', $user->id)  }}" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="staffFullName" type="text" class="form-control" id="staffFullName" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                  
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="staffPhone" type="staffPhone" class="form-control" id="staffPhone" value="">
                      </div>
                    </div>
                  
                   
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Update"></input>
                    </div>
                  </form><!-- End Profile Edit Form -->



            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">

      $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function (e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });

      </script>

    </section>
    </main><!-- End #main -->

@endsection