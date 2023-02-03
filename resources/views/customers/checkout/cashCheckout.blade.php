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
<form action="{{ route('createOrder')}}" id="paypal" method="POST" enctype="multipart/form-data"  class="checkout__form">                   
 
            @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <input type="hidden" name="orderEmail"  id="orderEmail" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                    </div>

    
                                    @foreach($customers as $customers)
                                    @if($customers->id==Auth::user()->id)
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <input type="hidden" name="orderName"  id="cash" aria-describedby="emailHelp" value="{{$customers->custFullName}}" >
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <input type="hidden" name="orderPhone"  id="cash" aria-describedby="emailHelp" value="{{$customers->custPhone}}">
                                            </div>
                                        </div>
            
                                        <div class="col-lg-12">
                                            <div class="checkout__form__input">
                                                <input type="hidden" name="orderAddress"  id="cash" aria-describedby="emailHelp" value="{{$customers->custAddress}}">
                                            </div>
                                        </div>

                                        <input type="hidden" name="orderStatus"  id="cash" aria-describedby="emailHelp" value="pending" hidden>

                                    @endif
                                    @endforeach
                            </div>
                        </div>
 
                <div class="row">


<div class="col-lg-7">
    <div class="checkout__order" style="background:white">
        <h5>Your order</h5>
        <div class="checkout__order__product">
            <ul>
                <li>
                    <span class="top__text">Product</span>
                    <span style="margin-right:30px" class="top__text__right">Total</span>
                </li>

                @if(session('cart'))
                     @foreach(session('cart') as $id => $details)

                    <li>{{ $details['product_name'] }}<span style="margin-right:30px">RM{{ $details['price'] * $details['quantity'] }}</span></li>


 
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
             
                <li>Subtotal <span style="margin-right:30px">RM{{ $total }}</span></li>
                <input form="paypal" type="text" name="amount"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>
             
                <li>Total <span style="margin-right:30px">RM{{ $total }}</span></li>
                <input type="orderTotalPrice" name="orderTotalPrice"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>
     
            </ul>
        </div>

    </div>
</div>


<div class="col-lg-4">
    <div class="checkout__order" style="background:white">
        <h5>Payment method</h5>
             
            <div class="checkout__order__product">
                <div class="card">
                <div class="card-header" id="#payment-2" style="height:100px">
                    <h5 class="panel-title">
                        <label value="cash" name="payment_method"for="html">Cash</label><br><br>
                        <img src="{{asset('staff/assets/img/cash.png')}}"  style="width:90px;height:40px; margin-top:-40px; margin-left:-15px;; ">
                    </h5>
                </div>
            </div>
   
    <ul>
                <li><br>
                 
                <span class="top__text">Please pay within 3 days after place your order</span><br><br>
                    <span style="margin-top:10px" class="top__text">Location: </span>
                    <span class="top__text"> Abagus Printing, Jalan 1/64, 51200 Wilayah Persekutuan Kuala Lumpur</span>



                </li>

                <br><button type="submit" class="site-btn">Place order</button>

            </ul>
        </div>

                     
                    </div>


            </form>
 
   
 
 
            </div>
        </section>
        <!-- Checkout Section End -->
 
     
 
   
 
 
 
        <script>
function myFunction() {
  var checkBox = document.getElementById("acc");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
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
 
  @endpush
 
@endsection
