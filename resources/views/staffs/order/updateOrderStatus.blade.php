@extends('staffs.staffMaster')

@section('content')



<head>
   
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Order Details</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order Information</h5>

              <!-- General Form Elements -->
              
              <form action="{{ route('updateStatus', $orders->id) }}" method="POST" enctype="multipart/form-data">  

                          @csrf 
                                          
                                          
                                                                         
                          <div class="row">
                              <div class="col-lg-3 col-md-4 label ">Order Date</div>
                              <div class="col-lg-9 col-md-8">{{$orders->created_at}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Order Name</div>
                              <div class="col-lg-9 col-md-8">{{$orders->orderName}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Phone</div>
                              <div class="col-lg-9 col-md-8">{{$orders->orderPhone}}</div>
                          </div> 

                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Email</div>
                              <div class="col-lg-9 col-md-8">{{$orders->orderEmail}}</div>
                          </div> 
                          
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Address</div>
                              <div class="col-lg-9 col-md-8">{{$orders->orderAddress}}</div>
                          </div> 
                     
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Order Status</div>
                              <div class="col-sm-6">
                          <select name="orderStatus" class="form-select" aria-label="Select Status">
                            <option selected>{{$orders->orderStatus}}</option>
                            <option name="orderStatus" value="approved">Approved</option>
                            <option name="orderStatus" value="in process">In process</option>
                            <option name="orderStatus" value="shipped">Shipped</option>
                            <option name="orderStatus" value="completed">Completed</option>
                            <option name="orderStatus" value="rejected">Rejected</option>

                          </select>
                        </div>                          </div> 

                       
                         
                             
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>



                      </form> 

            </div>
          </div>

          

                   
      </div>      </div>

    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Item Information</h5>

              <!-- General Form Elements -->
              
              <form action="" method="POST" enctype="multipart/form-data">  
                          @csrf 
                                          
                                          
                                                                         
                          <div class="row">
                              <div class="col-lg-3 col-md-4 label ">Item</div>
                              <div class="col-lg-9 col-md-8">{{$orderProducts->orderProduct}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Price</div>
                              <div class="col-lg-9 col-md-8">RM{{$orderProducts->orderPrice}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Quantity</div>
                              <div class="col-lg-9 col-md-8">{{$orderProducts->orderQuantity}}</div>
                          </div> 

                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Total Price</div>
                              <div class="col-lg-9 col-md-8">RM{{$orders->orderTotalPrice}}</div>
                          </div> 





                      </form> 

            </div>
          </div>

          

                   
      </div>      </div>

    </section>

  </main><!-- End #main -->

 

</body>

</html>
@endsection

