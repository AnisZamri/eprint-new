@extends ('customers.main_master')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:20px;margin-left:70px">
              <h4 class="fw-bold py-3 mb-4"><span style="margin-top:200px; margin-left:120px; " class="text-muted fw-light">My Order</h4>

            <div class="col-lg-9" style="margin-left:110px">
                    <div class="checkout__order" style="background-color:white">
                        <h5 style="padding-bottom:15px">Order Information</h5>

                        
                                      
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Order Date</div>
                                <div class="col-lg-9 col-md-8">{{$orders->created_at}}</div>
                            </div>
                            
                            <div class="row" style="margin-top:7px">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
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
                    </div>
            </div>

          
            <div class="container-xxl flex-grow-1 container-p-y" style="margin-top:20px" >


                    <div class="col-lg-9" style="margin-left:110px">
                    @foreach($orderProducts as $orderProducts)

                      <div class="checkout__order" style="background-color:white">

                         <h5 style="padding-bottom:15px">Item Information</h5>


                          <div class="row">
                              <div class="col-lg-3 col-md-4 label ">Item</div>
                              <div class="col-lg-9 col-md-8">{{$orderProducts->orderProduct}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Price</div>
                              <div class="col-lg-9 col-md-8">RM{{$orderProducts->subProductPrice}}</div>
                          </div>
                          
                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Quantity</div>
                              <div class="col-lg-9 col-md-8">{{$orderProducts->orderQuantity}}</div>
                          </div> 

                          <div class="row" style="margin-top:7px">
                              <div class="col-lg-3 col-md-4 label ">Order Price</div>
                              <div class="col-lg-9 col-md-8">RM{{$orderProducts->orderPrice}}</div>
                          </div> 


                         
                      </div>

                      @endforeach
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