@extends ('customers.main_master')
@section('content')

  
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./index.html">Product</a>
						

                        <span>Sub Products</span>

						

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                </div>
            </div>
        </div>

	
	    <div class="row property__gallery" >
			@foreach($subproduct as $subproduct)
				<div class="col-lg-3 col-md-4 col-sm-6 mix women">
					<div class="product__item" >
					    <a href="{{url('products/subproductsDetails/'.$subproduct->id)}}">

							<div class="product__item__pic set-bg">
							    <img src="{{asset($subproduct->subProductImage)}}">
							</div>

                            <div class="product__item__text">
                                <h6><a href="{{url('/products/subproducts')}}">{{$subproduct->subProductName}}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                <div class="product__price">RM{{$subproduct->subProductPrice}}</div>
                            </div>
					</div>
				</div>
			@endforeach
      	</div>

		  
	</div>
</section>
<!-- Shop Section End -->
    
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
      
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Option Below to Check Price</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{asset('frontend/assets/img/upload.png')}}" alt="" style="width:90px; margin-left:110px" class="text-center " >
                                    <h5 class="card-title text-center mt-2">Upload Your Design</h5>
                                    <p class="card-text text-center" >Click here to select your product options and to upload your print-ready artwork.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{asset('frontend/assets/img/web-design.png')}}" alt="" style="width:90px; margin-left:120px" class="center" >
                                            <h5 class="card-title text-center mt-2">Let Us Design</h5>
                                        <p class="card-text text-center" >No print ready artwork file yet? Let our skilled designers do the work for you.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
	</div>
</div>

@endsection