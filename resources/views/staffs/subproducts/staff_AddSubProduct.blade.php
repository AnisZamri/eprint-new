z@extends('staffs.staffMaster')

@section('content')



<head>
   
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Sub Products</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sub Products</h5>

              <!-- General Form Elements -->
              
              <form action="{{ route('addSubProducts')}}" method="POST" enctype="multipart/form-data">  
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
                                <label for="subProductPrice" class="form-label">Product Price</label> 
                                <input type="text" name="subProductPrice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                          

                          
                          <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Size</legend>
                            <div class="col-sm-10">

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductSize[]" value="2cm">
                                <label> 2cm </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductSize[]" value="3cm">
                                <label>3cm </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductSize[]" value="4cm">
                                <label>4cm </label>
                              </div>
                             </div>
                           </div>

                           <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Shape</legend>
                            <div class="col-sm-10">

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductShape[]" value="Rectangle">
                                <label> Rectangle</label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductShape[]" value="Circle">
                                <label>Circle </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subProductShape[]" value="Customize">
                                <label>Customize </label>
                              </div>
                             </div>
                           </div>
                                                                          
                          <div class="mb-3"> 
                                <label for="subProductDesc" class="form-label">Product Description</label> 
                                <input type="text" name="subProductDesc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                @error('productName') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror 
                          </div> 

                                  
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Add Sub Product</button>
                          </div>



            </form> 

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Variations</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label"><b>Variations 1</b></label>
                  <input type="text" class="form-control" id="inputName5">
                </div>
               
                <form action="" method="POST" enctype="multipart/form-data">  
                          @csrf 
                <div class="col-md-5">
                  <label for="inputEmail5" class="form-label">Options 1</label>
                  <input type="" class="form-control" id="">
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Price</label>
                  <input type="" class="form-control" id="">
                </div><br>

                <div class="col-md-5">
                  <label for="inputEmail5" class="form-label">Options 2</label>
                  <input type="" class="form-control" id="">
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Price</label>
                  <input type="" class="form-control" id="">
                </div>
             
                <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Add Variation</button>
                          </div>

                
              </form><!-- End Multi Columns Form -->

            </div>

            <!-- <div class="center col-md-10" style="  margin-left: 20px;">

              <table class="table table-bordered col-md-8">
                <thead class="table-secondary">
                    <tr>
                      <th scope="col">Variation 1</th>
                      <th scope="col">Variation 2</th>
                      <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                  </tr>
                </tbody>
              </table> -->
            <!-- </div>        -->
           </div>
          </div>


                   
      </div>      </div>

    </section>

  </main><!-- End #main -->

 

</body>

</html>
@endsection

