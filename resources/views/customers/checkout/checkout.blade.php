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
            <form action="{{ url('charge') }}" method="POST" enctype="multipart/form-data"  class="checkout__form">
 
            @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
 
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p><b>Full Name <span></span></b></p>
                                    <input type="text" name="orderName"  id="orderName" aria-describedby="emailHelp" value="Enter Name" >
                                 
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                <p><b>Phone Number <span></span></b></p>
                                    <input type="text" name="orderPhone"  id="orderPhone" aria-describedby="emailHelp" value="Enter Phone">
 
                                </div>
                            </div>
 
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                <br><p><b>Email <span></span></b></p>
                                    <input type="text" name="orderEmail"  id="orderEmail" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
 
                                </div>
                            </div>
                         
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                <br><p><b>Address <span></span></b></p>
                                <input type="text" name="orderAddress"  id="orderAddress" aria-describedby="emailHelp" value="Enter Address">
 
                                </div>
                               
                            </div>
 
                            <input type="text" name="orderStatus"  id="exampleInputEmail1" aria-describedby="emailHelp" value="pending" hidden>
 
                                               
                         
 
                       
 
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
                                        <input type="text" name="amount"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $total }}" hidden>
                                     
                                        <li>Total <span>RM{{ $total }}</span></li>
                               
                                    </ul>
                                </div>
 
                                <div class="checkout__order__widget">
                                    
                                    <label for="check-payment">
                                        Cash
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                
                             
                       
                                <input class="button" type="submit" name="submit" value="PayPal"><br>
 
 
 
                                <br><button type="submit" class="site-btn">Place order</button>
 
       
                             
                                   
                            </div>
                            </div>
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
