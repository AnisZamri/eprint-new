<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Products;

use App\Models\Customers;
use App\Models\SubProducts;

use Illuminate\Http\Request;
use App\Models\OrderProducts;
use Illuminate\Support\Carbon;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{

    protected $listeners=[
        'validationForAll'
    ];

    protected function validationForAll()
    {
        $this->validate();
    }
        


    public function CreateOrder(Request $request){

        $orderId = Orders::insertGetId([
            'custId'=>Auth::user()->id,
            'orderName'=>$request->orderName,
            'orderPhone'=>$request->orderPhone,
            'orderEmail'=>$request->orderEmail,
            'orderAddress'=>$request->orderAddress,
            'orderTotalPrice'=>$request->orderTotalPrice,
            'orderStatus'=>$request->orderStatus,
            'paymentMethod'=>$request->paymentMethod,
            'trackingNo'=>$request->trackingNo,


            'created_at'=>Carbon::now()
        ]);

        $cart = session()->get('cart', []);
        // echo '<pre>';
        // print_r($cart);
        // echo '<pre>';
        // die();

        

        foreach($cart as $key=>$val){
         
            
            $orderDesign=$request->file('orderDesign');

            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($orderDesign->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location='image/products/';
            $last_img=$up_location.$img_name;
            $orderDesign->move($up_location,$img_name);
           
            OrderProducts::insert
            ([
                'orderId' => $orderId,
                'subProductId' => $val['id'],
                'orderQuantity' => $val['quantity'],
                'orderProduct' => $val['product_name'],
                'orderPrice' => $val['price']* $val['quantity'],
                'orderDesign'=>$last_img,
                'created_at' => Carbon::now()
                
            ]);
          }


        return Redirect()->route('custViewOrder');
    }

  
    public function ViewOrder(){
           
        $orders = Orders::where('custId',Auth::id())->orderBy('id','DESC')->get();
        return view('customers.order.cust_viewOrder',compact('orders'));
    
    }

    public function custViewOrderDetails($id){
        $orders=Orders::findOrFail($id);      
        $orderProducts = OrderProducts::select('orderProduct','orderQuantity','orderPrice','sub_products.subProductPrice') 
        ->where('order_products.orderId',$id) 
        ->join('sub_products', 'sub_products.id', '=', 'order_products.subProductId')->get();                
 
       return view('customers.order.cust_viewOrderDetails',compact('orders','orderProducts'));

    }

     
    
    public function CheckoutStore(Request $request){
        if($request->payment_method == 'paypal'){
            $request->session()->put('orderEmail',$request->input('orderEmail'));
            $request->session()->put('orderName',$request->input('orderName'));
            $request->session()->put('orderPhone',$request->input('orderPhone'));
            $request->session()->put('orderAddress',$request->input('orderAddress'));
            
            return view ('customers.checkout.paypalCreateOrder')
            ->with('orderEmail', $request->session()->get('orderEmail'))
            ->with('orderName', $request->session()->get('orderName'))
            ->with('orderPhone', $request->session()->get('orderPhone'))
            ->with('orderAddress', $request->session()->get('orderAddress'));

        }elseif($request->payment_method == 'cash'){
            $request->session()->put('orderEmail',$request->input('orderEmail'));
            $request->session()->put('orderName',$request->input('orderName'));
            $request->session()->put('orderPhone',$request->input('orderPhone'));
            $request->session()->put('orderAddress',$request->input('orderAddress'));


            return view ('customers.checkout.cashCheckout')
            ->with('orderEmail', $request->session()->get('orderEmail'))
            ->with('orderName', $request->session()->get('orderName'))
            ->with('orderPhone', $request->session()->get('orderPhone'))
            ->with('orderAddress', $request->session()->get('orderAddress'))
            ->with('success','Order Successful');

        }
    }

    public function CashCheckout(Request $request)
    {  
        $users=User::all();
        $products=ProductCategory::all();
        $customers=Customers::all();
        $orders=Orders::all();      
          $orderProducts=OrderProducts::all();



        return view ('customers\checkout\cashCheckout',compact('users','products','customers','orders','orderProducts'));
    }

    public function PaypalCheckout()
    {  
        $users=User::all();
        $products=ProductCategory::all();
        $customers=Customers::all();
        $orders=Orders::all();

        return view('customers.checkout.paypalCreateOrder',compact('users','products','customers','orders'));

    }

    
    public function show(Request $request)
    {  
      
        return view('customers.checkout.show');

    }

    public function about(Request $request)
    {  
      
        $request->session()->put('name',$request->input('name'));

        return view ('customers.checkout.about')->with('name', $request->session()->get('name'));

    }




    /////////////////////////////staff////////////////////////////////

    public function StaffViewOrder(){
           
        $orders=Orders::all();
        $orderProducts=OrderProducts::all();

        return view('staffs.order.viewOrder',compact('orders','orderProducts'));
    
    }




    public function showLatest(){
   
        return view('showLatest');
    
    }

    public function UpdateOrderStatus($id){
        $orders=Orders::findOrFail($id);
        $orderProducts=OrderProducts::findOrFail($id);


       return view('staffs.order.updateOrderStatus',compact('orders','orderProducts'));

    }
    
    public function UpdateStatus(Request $request,$id){
     
        Orders::find($id)->update([ 
        'orderStatus'=>$request->orderStatus]);


        return Redirect()->route('viewOrder');
      
    }
    
}
