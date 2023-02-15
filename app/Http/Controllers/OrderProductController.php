<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function CreateOrderProduct(){

        OrdersProducts:insert([
            'orderId'=>$request->orderId,
            'subProductId'=>$request->subProductId,
            'orderQuantity'=>$request->orderQuantity,
            'orderPrice'=>$request->orderPrice,
            'orderDesign'=>$request->orderDesign,
   
            'created_at'=>Carbon::now()
        ]);

        return redirect()->back();
    }
}

