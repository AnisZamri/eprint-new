@extends('staffs.staffMaster')

@section('content')

<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products Category</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">


              <!-- MODAL ADD PRODUCT -->

              <!-- Add Modal -->
              <div style="float:right">
                <button type="button"  style="margin-bottom:10px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                  Add Category
                </button>
              </div>


              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">

                      <form action="{{ route('addProducts')}}" method="POST" enctype="multipart/form-data">  
                          @csrf 
                                          
                          <div class="mb-3"> 
                                <label for="productName" class="form-label">Product Category</label> 
                                <input type="text" name="productCategory" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 
                        
                          <div class="mb-3"> 
                              <label for="productImage" class="form-label">Product Image</label> 
                              <input type="file" name="productImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                              
                              @error('productImage') 
                                  <span class="text-danger">{{$message}}</span> 
                              @enderror 
                          </div>  
                                              
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add Product</button>
                          </div>

                      </form> 
                    </div>
                  </div>
                </div>
              </div>
    </section>


            @if (session('success'))

             
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong> 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif


             <!-- VIEW TABLE PRODUCT -->

           

    
    <!-- Recent Sales -->
    <div class="col-12">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">All Category <span>| </span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th scope="col">No</th> 
                      <th scope="col">Product Image</th> 
                      <th scope="col">Product Category</th> 
                      <th scope="col">Action</th> 
                      </tr>
                    </thead>
                   
                    <tbody> 

                    @php($i=1)

                    @foreach($products as $products) 
                      <tr> 
                        <td>{{$i++}}</td> 
                        <td><img src="{{asset($products->productImage)}}" style="height:50px;"></td> 
                        <td>{{$products->productCategory}}</td> 


                        <td>       
                        <a href="{{ route('editProduct', $products->id ) }}" class="btn btn-secondary"><i class="bi bi-pen-fill"></i> </a>

                        <a href="{{url('products/delete/'.$products->id)}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i> </a>

 </td> 
                      </tr> 
                    @endforeach 
                </tbody>

                      
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

         

                  </div>
                </div>
              </div>


  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
@endsection
