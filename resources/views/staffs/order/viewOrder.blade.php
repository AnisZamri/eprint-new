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
					<th>Order Date</th>
					<th>Product</th>
                  <th>Quantity</th>
                  <th>Price</th>
					<th>Payment Status</th>
                  <th>Order Status</th>

                    </tr> 

                    </thead>
                    @php($i=1)

                    <tbody>
              @foreach($orderProducts as $orderProducts) 
						    <tr class="alert" role="alert">
                  <td>{{$i++}}</td> 
                  <td>{{$orderProducts->created_at}}</td> 
                  <td>{{$orderProducts->orderProduct}}</td> 
                  <td>{{$orderProducts->orderQuantity}}</td> 
                  <td>{{$orderProducts->orderPrice}}</td> 
						      <td class="status"><span class="active">Paid</span></td>
                  <td class="status"><span class="waiting">Pending</span></td>
<td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
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
