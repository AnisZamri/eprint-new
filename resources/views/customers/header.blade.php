
<style>


body {
    background-color: #f6f6f6;
}
.img_thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}
.img_thumbnail img {
    width: 100%;
}
.img_thumbnail .caption{
    margin: 7px;
    text-align: center;
}
.dropdown{
    float:right;
    padding-right: 30px;
    
    
}
.btn{
    border:0px;
    margin:10px 0px;
    box-shadow:none !important;
}
.dropdown .dropdown-menu{
    padding:20px;
    top:30px !important;
    width:350px !important;
    left:-110px !important;
    box-shadow:0px 5px 30px black;
}
.total-header-section{
    border-bottom:1px solid #d2d2d2;
}
.total-section p{
    margin-bottom:20px;
}
.cart-detail{
    padding:15px 0px;
}
.cart-detail-img img{
    width:100%;
    height:100%;
    padding-left:15px;
}
.cart-detail-product p{
    margin:0px;
    color:#000;
    font-weight:500;
}
.cart-detail .price{
    font-size:12px;
    margin-right:10px;
    font-weight:500;
}
.cart-detail .count{
    color:#000;
}
.checkout{
    border-top:1px solid #d2d2d2;
    padding-top: 15px;
}
.checkout .btn-primary{
    border-radius:50px;
 
}
.dropdown-menu:before{
    content: " ";
    position:absolute;
    right:50px;
    border-bottom-color:#fff;
}
 
.productlist {
    box-shadow: 0px 10px 30px rgb(0 0 0 / 10%);
    border-radius: 10px;
    height: 100%;
    overflow: hidden;
}

</style>

<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                <a href="{{asset('staff/assets/img/abLogo.png')}}"><img src="{{asset('staff/assets/img/abLogo.png')}}"  style=" margin-top:-10px; margin-bottom:-30px; height:70px;"alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Products</a></li>
                        @if (Route::has('login'))
                                    @auth
                                    <li><a class="nav-link" href="{{ route('inbox.index') }}">Chat</a></li>
    
                                    <li><a href="{{ route('custViewOrder') }}">Orders</a></li>


                                            <li><a href="{{ route('custViewProfile') }}">PROFILE</a></li>
                                            <!-- <li><a href="{{ url('customers/editprofile/')}}">EDIT PROFILE</a></li> -->
    
                                     
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
    
                                            @else
    
                                            <li><a href="./contact.html">Contact</a></li>
    
                                                <div class="header__right__auth">
                                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                            
                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                    @endif
                                                </div>
    
    
                                     @endauth
                                @endif
                        <!-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./product-details.html">Product Details</a></li>
                                <li><a href="./shop-cart.html">Shop Cart</a></li>
                                <li><a href="./checkout.html">Checkout</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> -->

                        <!-- <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li> -->
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                  
                    <ul class="header__right__widget">
                    <div class="dropdown" >

                    <i class="icon_cart_alt" data-toggle="dropdown"aria-hidden="true"></i>  
                    <span class="tip">{{ count((array) session('cart')) }}</span>

                     
                        <div class="dropdown-menu">
                                                <div class="row total-header-section">
                                                    @php $total = 0 @endphp
                                                    @foreach((array) session('cart') as $id => $details)
                                                        @php $total += $details['price'] * $details['quantity'] @endphp
    
                                                        
                                                    @endforeach
                                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                        <p>Total Price: <span class="text-info">RM {{ $total }}</span></p>
                                                    </div>
                                                
                                                </div>
    
                                                @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                        <div class="row cart-detail">
                                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                            <img src="{{asset($details['photo'])}}" />
                                                            </div>
                                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                                <p>{{ $details['product_name'] }}</p>
                                                                <span class="price text-info">RM{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
    
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                        <a href="{{ route('viewCartTest') }}" class="btn btn-primary btn-block">View all</a>
                                                    </div>
                                                </div>
    
                                            </div>

                                            
                                            @if (Route::has('logout'))
                                    @auth
                                  
    
                                
    
                                            <li><a class="fa fa-sign-out" style="display: inline;margin-left:10px" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                   
                                        </a></li>
    
                                     @endauth
                                @endif
                                            
                
                      </a></li>
                      </div>

                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>


