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
            'created_at'=>Carbon::now()
        ]);

        $cart = session()->get('cart', []);
        // echo '<pre>';
        // print_r($cart);
        // echo '<pre>';
        // die();

        

        foreach($cart as $key=>$val){
            OrderProducts::insert
            ([
                'orderId' => $orderId,
                'subProductId' => $val['id'],
                'orderQuantity' => $val['quantity'],
                'orderProduct' => $val['product_name'],
                'orderPrice' => $val['price'],
                'created_at' => Carbon::now()
                
            ]);
          }


        return Redirect()->route('custViewOrder');
    }

  
    public function ViewOrder(){
           
        $id=Auth::user()->id;
        $orders=Orders::all();
        $orderProducts=OrderProducts::all();

        return view('customers.order.cust_viewOrder',compact('id','orders','orderProducts'));
    
    }

     
    public function CheckoutStore(Request $request){
        if($request->payment_method == 'paypal'){
            return Redirect()->route('paypalCheckout');

        }elseif($request->payment_method == 'cash'){
            return Redirect()->route('cashCheckout');
        }
    }

    public function CashCheckout()
    {  
        $users=User::all();
        $products=ProductCategory::all();
        $customers=Customers::all();
        return view ('customers\checkout\cashCheckout',compact('users','products','customers'));
    }

    public function PaypalCheckout()
    {  
        $users=User::all();
        $products=ProductCategory::all();
        $customers=Customers::all();
        return view('customers.checkout.paypalCreateOrder',compact('users','products','customers'));

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
        'orderStatus'=>$request->orderStatus,
    ]);

        return Redirect()->route('viewOrder');
      
    }
    
}
