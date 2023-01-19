@extends ('customers.main_master')

@section('content')

<section class="categories">
     <div class="container-fluid">
         <div class="row">

         <div class="col-lg-12" >


                 <div class="categories__item categories__large__item" style=" background-image: url('{{asset('cust/assets/img/header.png')}}');  background-size: 2000px 950px;">
                 <div class="categories__text" >
                     <h4 style="font-size:66px; color: #FFFFFF;font-family:Poppins,Sans-serif; font-weight: 600; text-shadow: 0px 0px 10px rgb(0 0 0 / 30%);">New Package Sticker</h4>
                     <p style="font-size:20px; color: #FFFFFF;font-family:Poppins,Sans-serif; text-shadow: 0px 0px 10px rgb(0 0 0 / 30%);">THE CHEAPEST PRICE YOU CAN GET</p>
                     <a href="">Shop now</a>

                     
                 </div>

                 <div class="col"  >
                     <img src=" {{asset('cust/assets/img/homepage.png')}}" style="margin-left:270px; width:60%; height:60%;">
                 </div>
             </div>
         </div>
         
     </div>
 </div>
</section>


<section class="product spad">
 <div class="container">
     <div class="row">
         <div class="col-lg-4 col-md-4">
             <div class="section-title">
                 <h4>All products</h4>
             </div>
         </div>


         @php
    $products = App\Models\ProductCategory::orderBy('productCategory','ASC')->get();
  	@endphp

	  <div class="row property__gallery" >
			@foreach($products as $product)
				<div class="col-lg-3 col-md-4 col-sm-6 mix women">
					<div class="product__item" >
                      <a href="{{ route('viewCustSubProduct',$product->id)}}">
							<div class="product__item__pic set-bg">
								<img src="{{asset($product->productImage)}}">
										
							</div>
						<div class="product__item__text">
						<h6><a href="{{url('/products/subproducts')}}">{{$product->productCategory}}</a></h6>

								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
						</div>
					</div>
				</div>
			@endforeach
      	</div>
         
     </div>

 


       
 </div>


</section>




@endsection