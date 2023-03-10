<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abagus E-Print</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('cust/assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script>
    @if(Session::has('message'))
    var type = "{{  Session::get('alert-type','info') }}"
    switch(type){
        case 'info' :
        toastr.info(" {{  Session::get('message') }}");
        break;

        case 'success' : 
        toastr.success(" {{  Session::get('message') }}");
        break;

        case 'warning' :
        toastr.warning(" {{  Session::get('message') }}");
        break;

        case 'error' :
        toastr.error(" {{  Session::get('message') }}");
}
    @endif
</script>
    
    
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
        </script>

   

</head>



    <body>
    @include ('customers.header')
    
    
    @yield('content')

    @yield('scripts')

        
<script src="{{asset('cust/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('cust/assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('cust/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('cust/assets/js/main.js')}}"></script>

@stack('scripts')


    </body>
</html>

