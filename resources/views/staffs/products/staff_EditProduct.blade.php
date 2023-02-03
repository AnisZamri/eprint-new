@extends('staffs.staffMaster')

@section('content')

<head>
   
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products Category</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5>

              <!-- General Form Elements -->
              
                <form action="{{ route('updateProduct', $products->id) }}" method="POST" enctype="multipart/form-data">  
                                    @csrf 

                                    <input type="hidden" name="old_image" value="{{$products->productImage}}">

                                                      
                                    <div class="mb-3"> 
                                            <label for="productCategory" class="form-label">Product Category</label> 
                                            <input type="text" name="productCategory" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->productCategory}}"> 
                                            
                                            @error('productCategory') 
                                                <span class="text-danger">{{$message}}</span> 
                                            @enderror 
                                      </div> 
                                
                                      <div class="mb-3"> 
                                      <img src="{{asset($products->productImage)}}" style="height:40px;">

                                          <label for="productImage" class="form-label">Product Image</label> 
                                          <input type="file" name="productImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$products->productImage}}"> 
                                          @error('productImage') 
                                              <span class="text-danger">{{$message}}</span> 
                                          @enderror 
                                      </div>  
                                
                                      
                                      <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Update</button>
                                      </div>
                                  </form> 

                        </div>
                      </div>

                    </div>

                  
                  </div>
                </section>

  </main><!-- End #main -->

 

</body>

</html>
@endsection

    
    
