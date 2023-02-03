@extends('staffs.staffMaster')

@section('content')

<head>
   
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Products</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Sub Products</h5>

              <!-- General Form Elements -->

              <form action="{{ route('updateSubProduct', $subproduct->id) }}" method="POST" enctype="multipart/form-data">  
                        @csrf                        
                        
                        <input type="hidden" name="old_image" value="{{$subproduct->subProductImage}}">

                                          
                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Product Category</label>
                            <div class="col-sm-12">
                              <select name="productsId" class="form-select" aria-label="Default select example">
                                <option selected>Select Product Category</option>
                                @foreach($products as $products)  
                                <option value="{{ $products->id }}" {{ $products->id == $subproduct->productsId ? 'selected' : ''}} > {{  $products->productCategory}}</option>
                                @endforeach

                              
                              </select>
                            </div>
                          </div>
                          
                          <div class="mb-3"> 
                              <label for="subProductImage" class="form-label">Sub Product Image</label> 
                              <img src="{{asset($subproduct->subProductImage)}}" style="height:40px;">

                              <input type="file" name="subProductImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$subproduct->subProductImage}}"> 
                              @error('subProductImage') 
                                  <span class="text-danger">{{$message}}</span> 
                              @enderror 
                          </div>  

                          <div class="mb-3"> 
                                <label for="subProductName" class="form-label">Sub Product Name</label> 
                                <input type="text" name="subProductName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$subproduct->subProductName}}"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 



                          <div class="mb-3"> 
                                <label for="subProductPrice" class="form-label">Sub Product Price</label> 
                                <input type="text" name="subProductPrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$subproduct->subProductPrice}}"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                          
                          <div class="mb-3"> 
                                <label for="subProductSize" class="form-label">Sub Product Size</label> 
                                <input type="text" name="subProductSize" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$subproduct->subProductSize}}"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                          <div class="mb-3"> 
                                <label for="subProductShape" class="form-label">Sub Product Shape</label> 
                                <input type="text" name="subProductShape" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$subproduct->subProductShape}}"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 





                          <div class="mb-3"> 
                                <label for="subProductDesc" class="form-label">Sub Product Description</label> 
                                <input type="text" name="subProductDesc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$subproduct->subProductDesc}}"> 
                                @error('productName') 
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

    