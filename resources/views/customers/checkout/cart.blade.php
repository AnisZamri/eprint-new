@extends ('customers.main_master')
@section('content')
 
<!DOCTYPE html>
<html lang="zxx">
 
<style>


body {
    background-color: white;
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
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
 
    
    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width:20%"></th>
                                    <th style="width:15%; text:center">Product</th>
                                    <th style="width:15%">Price</th>
                                    <th class="text-center" style="width:10%">Quantity</th>
                                    <th class="text-center" style="width:20%">Total</th>

                                    <th></th>
                                </tr>
                            </thead>
 
                        <tbody id="cartPage">
                            @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            
                                            
                                            <tr data-id="{{ $id }}">

                                                <td data-th="Image">
                                                    <div class="row">
                                                        <div class=""><img src="{{asset($details['photo'])}}" style="height:80px" /></div>
                                                       
                                                    </div>
                                                </td>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <h6 class="nomargin">{{ $details['product_name'] }}</h6>


                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">RM{{ $details['price'] }}</td>
                                                <input type="text" name="orderPrice"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $details['price'] }}" hidden> 


                                                <td data-th="Quantity">
                                                     <input type="number" name="orderQuantity" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                                </td>

                                               

                                                <td data-th="Total" class="text-center">RM{{ $details['price'] * $details['quantity'] }}</td>

                                                                              
                                                <td class="cart_remove" data-th="">
                                                    <i class="fa fa-times"></i> 
                                                </td>
                                             
                                            </tr>
                                        @endforeach
                                    @endif
                        
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
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
                                    
                                    </ul>
                                </div>


                                <a href="{{ route('custCheckout')}}" style="text-align: center;text-color:white" class="site-btn">Proceed to checkout</a>

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
 
 