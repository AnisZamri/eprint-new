@extends ('customers.main_master')
@section('content')
 
<!DOCTYPE html>
<html lang="zxx">
 
<style>


body {
    background-color: white;
}

label {
  background-color: #E8E8E8;
  color: black;
  padding: 5px 10px;
  font-family: sans-serif;
  cursor: pointer;
  margin-top: 1rem;
  
}


</style>


<body >
 
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Billing details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
 
@php
$customer= App\Models\Customers::all()
@endphp    

<form action="{{ URL::to ('/checkoutStore')}}"  method="POST" enctype="multipart/form-data"  class="checkout__form">                   
@csrf


    <!-- Shop Cart Section Begin -->
    <section class="col-lg-12 shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <h5>Billing detail</h5>

            @php
$customer= App\Models\Customers::all()
@endphp     


            <!-- <form action="{{ route('createOrder')}}" method="POST" id="cash" enctype="multipart/form-data"  class="checkout__form"></form> -->

<form action="{{ route('checkoutStore')}}" id="paypal" method="POST" enctype="multipart/form-data"  class="checkout__form">                   


            @csrf
                <div class="row">
 
                       
 <div class="col-lg-8 col-md-6 col-sm-6">
         <div class="checkout__form__input">
         <br><p><b>Email <span></span></b></p>
         <input type="text" name="orderEmail"  id="orderEmail" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
             <input type="hidden" name="_token" value="{{csrf_token() }}" >

         </div>
     </div>


     @foreach($customers as $customers)
           @if($customers->id==Auth::user()->id)
     <div class="col-lg-8 col-md-6 col-sm-6">
         <div class="checkout__form__input">
             <p><b>Full Name <span></span></b></p>
             <input type="text" name="orderName"  id="orderName" aria-describedby="emailHelp" value="{{$customers->custFullName}}">
             <input type="hidden" name="_token" value="{{csrf_token() }}" >
                        
             @foreach($customers as $customers)
                                  @if($customers->id==Auth::user()->id)
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p><b>Full Name <span></span></b></p>
                                    <input type="text" name="orderName"  id="cash" aria-describedby="emailHelp" value="{{$customers->custFullName}}" >
                                 
                                </div>
                            </div>
                           
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                <p><b>Phone Number <span></span></b></p>
                                    <input type="text" name="orderPhone"  id="cash" aria-describedby="emailHelp" value="{{$customers->custPhone}}">
 
                                </div>
                            </div>
 
                         
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                <p><b>Address <span></span></b></p>
                                <input type="text" name="orderAddress"  id="cash" aria-describedby="emailHelp" value="{{$customers->custAddress}}">
 
                                </div>
                               
                            </div>

          
         </div>
     </div>
    

     <div class="col-lg-8 col-md-6 col-sm-6">
         <div class="checkout__form__input">
         <p><b>Phone Number <span></span></b></p>
             <input type="text" name="orderPhone"  id="orderPhone" aria-describedby="emailHelp" value="{{$customers->custPhone}}">
             <input type="hidden" name="_token" value="{{csrf_token() }}" >


         </div>
     </div>

  
     <div class="col-lg-12">
         <div class="checkout__form__input">
         <p><b>Address <span></span></b></p>
         <input type="text" name="orderAddress"  id="orderAddress" aria-describedby="emailHelp"  value="{{$customers->custAddress}}">
         <input type="hidden" name="_token" value="{{csrf_token() }}" >



         </div>
        
     </div>

     <input type="text" name="orderStatus"  id="orderStatus" aria-describedby="emailHelp" value="pending" hidden>


     @endif
       @endforeach

</div>
</div>
               
               
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5 style="padding-bottom:15px">YOUR ORDER</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)

                                                <li>{{ $details['product_name'] }}<span>RM{{ $details['price'] * $details['quantity'] }}</span></li>


                            
                                                @endforeach
                                            @endif
                                    </ul>
                                </div>


                                <div class="checkout__order__total">
                                    <ul>
                                         @php $total = 0 @endphp

                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp

                                        @endforeach
                                    
                                        <li>Subtotal <span>RM{{ $total }}</span></li>
                                        <li>Total <span>RM{{ $total }}</span></li>
                                        <input type="orderTotalPrice" name="orderTotalPrice"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>

                               
                                   </ul>
                                    
                                    </ul>
                                </div>

                                <h5 class="panel-title mt-20">Select Payment Method: </h5>

                                <div class="card">
                                    <div class="card-header" id="#payment-1" style="height:100px">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="paypal">
                                            <h6 style="margin-top:-60px;margin-left:20px" >Paypal</h6>
                                            <img src="{{asset('staff/assets/img/paypal.png')}}"  style="width:90px; height:40px; margin-top:2px; ">
                                        </h5>
                                    </div>
                                </div><br>

                                <div class="card">
                                    <div class="card-header" id="#payment-1" style="height:100px">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="cash">
                                            <h6 style="margin-top:-60px;margin-left:20px" >Cash</h6>
                                            <img src="{{asset('staff/assets/img/cash.png')}}"  style="width:90px; height:40px; margin-top:2px; ">
                                        </h5>
                                    </div>
                                </div><br>
                                
                                

                                

                                <br><input type="submit" class="site-btn"  name="submit" value="Proceed to checkout">


 
 
 
 
       
                             
                                   
                            </div>
                            </div>
                        </div>


            
               
               
            </div>
 
         
           
           
        </div>
    </section>
    <!-- Shop Cart Section End -->
 
 
 
 
   
   
</body>
 
</html>@endsection

@section('scripts')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection
 
 