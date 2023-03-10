@extends ('staffs.staffMaster')
@section('content')
<main id="main" class="main">


<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

        @php
                  $staffs= App\Models\Staffs::all()
                  @endphp


          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img style="height=5000%;width=5000%" src="{{asset('staff/assets/img/profile2.png')}}" alt="Profile" >
              <h2>{{ Auth::user()->name }} </h2>
              <h3></h3>
             

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <div class="col-lg-3 col-md-4 label ">Role:Staff</div>

                 <p style="color:white" class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 style="margin-top:-30px" class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                  </div>
                  @foreach($staffs as $staffs)
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$staffs->staffFullName}}</div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number</div>
                    <div class="col-lg-9 col-md-8">{{$staffs->staffPhone}}</div>
                  </div>
    
                  @endforeach 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>
             

                
                  @php
                  $user= App\Models\User::all()
                  @endphp


                </div>
                @foreach($user as $user) 
                      @if($user->id==Auth::user()->id)
                        <a  href="{{ route('staffEditProfile',$user->id)}}" class="btn btn-primary ">Edit Profile</a>
                    @endif
                @endforeach 

            </div>
          </div>

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column ">
            <h5 class="card-title">Delete Account</h5>

            <div class="alert alert-warning">
              <p><b>Are you sure you want to delete your account?</b></p>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
                  
            <form action="{{ url('/staffs/'.$staffs->id) }}" enctype="multipart/form-data">  
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

          
        
    </main><!-- End #main -->

    @endsection