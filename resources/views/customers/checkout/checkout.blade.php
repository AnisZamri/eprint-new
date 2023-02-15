@extends ('customers.main_master')
@section('content')
 
<!DOCTYPE html>
<html lang="zxx">
<head>
    <style>
     
.button {
  background-color: #FDC414; /* Green */
  border-radius: 5px;
  border-color: transparent;
  padding: 8px 120px;
  text-align: center;
  color:#253B80;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  font-style: italic;
  cursor: pointer;
  src:"{{asset('staff/assets/img/abLogo.png')}}";
}
 
 
 
        </style>
</head>
<body>
 
   
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
 
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class=""></span> <a href="#"></a> </h6>
                </div>
            </div>
 
  

            @php
$customer= App\Models\Customers::all()
@endphp     


            <!-- <form action="{{ route('createOrder')}}" method="POST" id="cash" enctype="multipart/form-data"  class="checkout__form"></form> -->

<form action="{{ URL::to ('/checkoutStore')}}"  method="POST" enctype="multipart/form-data"  class="checkout__form">                   


            @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
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
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
 
                                        @if(session('cart'))
                                             @foreach(session('cart') as $id => $details)
 
                                            <li>{{ $details['product_name'] }}<span>RM{{ $details['price'] * $details['quantity'] }}</span></li>
                                            <input type="orderPrice" name="orderPrice"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $details['price'] * $details['quantity'] }}" hidden>

 
                         
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
                                        <input form="paypal" type="text" name="amount"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>
                                     
                                        <li>Total <span>RM{{ $total }}</span></li>
                                        <input type="orderTotalPrice" name="orderTotalPrice"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>

                               
zz                                    </ul>
                                </div>

                                <h5 class="panel-title mt-20">Select Payment Method: </h5>




                            <div class="card">
                                <div class="card-header" id="#payment-1" style="height:100px">
                                    <h5 class="panel-title">
                                        <input type="radio" id="html" name="payment_method" value="paypal">
                                        <label for="html">Paypal</label><br><br>
                                        <img src="{{asset('staff/assets/img/paypal.png')}}"  style="width:90px; height:40px; margin-top:-20px; ">
                                    </h5>
                                </div>
                            </div><br>

                            <div class="card">
                                <div class="card-header" id="#payment-2" style="height:100px">
                                    <h5 class="panel-title">
                                        <input type="radio" id="html" name="payment_method" value="cash">
                                        <label for="html">Cash</label><br><br>
                                        <img src="{{asset('staff/assets/img/cash.png')}}"  style="width:90px;height:40px; margin-top:-40px; ; ">
                                    </h5>
                                </div>
                            </div>
                                </div>


<input type="submit" class="site-btn"  name="submit" value="Place Order">

                              
 
 
 
 
       
                             
                                   
                            </div>
                            </div>
                        </div>
                    </div>
            </form>
 
   
 
 
            </div>
        </section>
        <!-- Checkout Section End -->
 
     
 
   
 
 
 
        <script>
 function text(x)
                {
                    if (x==1) document.getElementById("mycode").style.display="block";
                    else document.getElementById("mycode").style.display="none";
                    return;
                }

</script>
    </body>
 
    </html>
 
            @push('scripts')      
            <script src="https://www.paypal.com/sdk/js?client-id=AUTYMxQ-A-CkI9YF0SyF1aCsYNItFsOar-IfVPiED0MgUXzfCkF5ehi1rnHOCuYbFxBK8ky3gHVb30E9&currency=MYR"></script>
           
            <script>
                paypal.Buttons({
 
                    onClick: function()  {
 
            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('orderName').value
            ||!document.getElementById('orderPhone').value
            ||!document.getElementById('orderEmail').value
            ||!document.getElementById('orderAddress').value
 
 
            )
            {
            Livewire.emit('validationForAll');
            return false;
            }
 
else{
 
   
}
},
 
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{ $total }}' // Can also reference a variable or function
            }
          }]
        });
      },
 
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
 
     
    }).render('#paypal-button-container');
  </script>

  <script>
    function passvalues()
    {
        var email=document.getElementById("orderEmail").value;
        localStorage.setItem("textvalue",orderEmail);
        return false;
    }
   </script>

 
  @endpush
 
@endsection