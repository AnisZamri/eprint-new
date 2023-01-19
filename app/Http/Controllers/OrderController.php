<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use App\Models\OrderProducts;

use App\Models\Products;
use App\Models\SubProducts;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
           
        $orders=Orders::all();
        $orderProducts=OrderProducts::all();

        return view('staff.order.viewOrder',compact('orders','orderProducts'));
    
    }

    public function CustViewOrder(){
           
        $orders=Orders::all();
        $orderProducts=OrderProducts::all();

        return view('customers.order.cust_viewOrder',compact('orders','orderProducts'));
    
    }

    public function StaffViewOrder(){
           
        $orders=Orders::all();
        $orderProducts=OrderProducts::all();

        return view('staffs.order.viewOrder',compact('orders','orderProducts'));
    
    }

    public function showLatest(){
   
        return view('showLatest');
    
    }

  

    
}
