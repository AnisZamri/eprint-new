@extends('staffs.staffMaster')

@section('content')


<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Products</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">



               <!-- Add Modal -->
               <div style="float:right">
               
                <a href=" {{ route('viewAddSubProducts') }}"class="btn btn-primary ">Add Sub Product</a> <br>

              </div><br>


              <br><div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Sub Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>


                    <div class="modal-body">

                      <form action="" method="POST" enctype="multipart/form-data">  
                          @csrf 
                                          
                          <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Product Category</label>
                            <div class="col-sm-12">
                              <select name="productsId" class="form-select" aria-label="Default select example">
                                <option selected>Select Product Category</option>
                                @foreach($products as $products)  
                                     <option value="{{$products->id}}">{{$products->productCategory}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          
                          <div class="mb-3"> 
                              <label for="subProductImage" class="form-label">Sub Product Image</label> 
                              <input type="file" name="subProductImage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                              
                              @error('productImage') 
                                  <span class="text-danger">{{$message}}</span> 
                              @enderror 
                          </div>  
                                                                         
                          <div class="mb-3"> 
                                <label for="subProductName" class="form-label">Product Name</label> 
                                <input type="text" name="subProductName" class="form-control" id="subProductName" aria-describedby="emailHelp" > 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 
                       
                                    
                          <div class="mb-3"> 
                                <label for="subProductQuantity" class="form-label">Product Quantity</label> 
                                <input type="text" name="subProductQuantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                          <div class="mb-3"> 
                                <label for="subProductPrice" class="form-label">Product Price</label> 
                                <input type="text" name="subProductPrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                
                                                
                          <div class="mb-3"> 
                                <label for="subProductDesc" class="form-label">Product Description</label> 
                                <input type="text" name="subProductDesc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                @error('productName') 
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

    <!-- $subproducts = SubProducts::find($id);
$variations = $product->variations;

foreach ($variations as $variation) {
    echo $variation->name . ': ' . $variation->price;
}-->
         

@if (session('success')) 

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong> 

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                </div>

            @endif


         

           


          <!-- Recent Sales -->
    <div class="col-12">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">All Sub Products <span>| </span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                    <tr> 
                      <th scope="col">No</th> 
                      <th scope="col">Product Category</th> 
                      <th scope="col">Product Image</th> 
                      <th scope="col">Product Name</th> 
                      <th scope="col">Product Size</th> 

                      <th scope="col">Product Shape</th> 
                      <th scope="col">Product Price</th> 
                      <th scope="col">Action</th> 


                    </tr> 

                    </thead>
                    @php($i=1)

                    <tbody> 
                    @foreach($subproduct as $subproduct) 
                          <tr> 
                          <td>{{$i++}}</td> 
                            <td>{{ $subproduct['products']['productCategory'] }}  </td>
                            <td><img src="{{asset($subproduct->subProductImage)}}" style="height:40px;"></td> 
                            <td>{{$subproduct->subProductName}}</td> 
                            <td>{{$subproduct->subProductSize}}</td> 
                            <td>{{$subproduct->subProductShape}}</td> 
                            <td>{{$subproduct->subProductPrice}}</td> 
                            
                            <td>
                              <a href=" {{ route('editSubProduct', $subproduct->id ) }}"class="btn btn-secondary">Edit</a> 
                                <a href="{{url('sub/delete/'.$subproduct->id)}}"class="btn btn-danger">Delete</a> 
                            </td> 

                          </tr> 
                        @endforeach 
                    </tbody>

                      
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

  </main><!-- End #main -->

    

 

</body>

</html>
@endsection
