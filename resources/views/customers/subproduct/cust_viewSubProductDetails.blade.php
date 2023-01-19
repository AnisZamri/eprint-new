@extends ('customers.main_master')
@section('content')


@foreach($subproduct as $subproduct)

<body>
<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">{{$subproduct['products']['productCategory'] }} </a>
                        <span>{{$subproduct->subProductName}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    

<div class="container">
    <div class="row">

        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                 </div> 
            @endif
        </div>
   

        <div class="col-sm">
        <img src="{{asset($subproduct->subProductImage)}}" style="width:350px; heigh:350px; margin-top:50px; margin-left:10px">
        </div>

        <div class="col-sm">            
            
            <div class="product__details__text">
                    <br><br><h4>{{$subproduct->subProductName}}</h4>                        
                        <div class="product__details__price">RM{{$subproduct->subProductPrice}}</div>
                            <div class="product__details__widget" style="margin-top:-35px">
                                <ul>
                                  
                                        <li>
                                            <span>Available size:</span>

                                            @php
                                            $arr=explode(',',($subproduct->subProductSize));
                                            @endphp

                                                <div class="size__btn">
                                                    
                                                    @foreach($arr as $sub)
                                                        <label for="xs-btn">
                                                            <input type="radio" id="xs-btn">
                                                                {{$sub}}
                                                        </label>

                                                        <!-- <label for="s-btn">
                                                            <input type="radio" id="s-btn">
                                                            s
                                                        </label>

                                                        <label for="m-btn">
                                                            <input type="radio" id="m-btn">
                                                            m
                                                        </label>

                                                        <label for="l-btn">
                                                            <input type="radio" id="l-btn">
                                                            l
                                                        </label> -->

                                                    @endforeach
                                                </div>
                                        </li>
                                     
                                        <li>
                                            <span>Available shape:</span>

                                            @php
                                            $arr=explode(',',($subproduct->subProductShape));
                                            @endphp

                                                <div class="size__btn a">
                                                    
                                                @foreach($arr as $sub)
                                            <label for="stockin">
                                                        <input type="radio" id="subProductShape">
                                                            {{$sub}}
                                                    </label>

                                                    <!-- <label for="s-btn">
                                                        <input type="radio" id="s-btn">
                                                        s
                                                    </label>

                                                    <label for="m-btn">
                                                        <input type="radio" id="m-btn">
                                                        m
                                                    </label>

                                                    <label for="l-btn">
                                                        <input type="radio" id="l-btn">
                                                        l
                                                    </label> -->
                                                    @endforeach
                                                </div>
                                        </li>

                                     
                                        
                                       
                                </ul>
                            </div>   

                            <div class="product__details__button">
                                                            

                                    <div class="quantity">
                                        <span>Quantity:</span>
                                            <div class="pro-qty">
                                                <input type="number" value="1" name="quantity" id="quantity">
                                            </div>
                                    </div>
                            </div>


                            <div class="product__details__button">
                                                            
                                    <a href="{{ route('add_to_cart', $subproduct->id) }}" class="cart-btn"><span class="icon_bag_alt"  role="button"></span> Add to cart</a>
                                <ul>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                                </ul>
                            </div>


                
                        </div>   

                    <div class="col-lg-12">
                        <div class="product__details__widget">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <h6>Description</h6>
                                    <p>{{$subproduct->subProductDesc}}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endforeach

    </div>
</div>





</body>

</html>

@endsection