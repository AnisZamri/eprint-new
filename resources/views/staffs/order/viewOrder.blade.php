@extends('staffs.staffMaster')

@section('content')


<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>List Of Order</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">



            


              <br><div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Sub Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

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
                    <th>No</th>
					<th>Time</th>
                  <th>Name</th>
					<th>Total Price</th>
                  <th>Order Status</th>
                  <th>Action</th>


                    </tr> 

                    </thead>

     

                    <tbody>
                    @php($i=1)

              @foreach($orders as $orders) 

						    <tr class="alert" role="alert">
                <td>{{$i++}}</td> 
                  <td>{{$orders->created_at}}</td> 
                  <td>{{$orders->orderName}}</td> 
                  <td>RM{{$orders->orderTotalPrice}}</td> 
                  <td>{{$orders->orderStatus}}</td> 

                  <td>


                    <a href="{{ route('updateOrderStatus',$orders->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
                 
            
                  @endforeach


                  </td> 

						      	
				        	</td>
						    </tr>


						   
		
              

						  </tbody>
                      
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

  </main><!-- End #main -->

    

 

</body>

</html>
@endsection
