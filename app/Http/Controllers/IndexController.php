<?php

namespace App\Http\Controllers;

use App\Models\SubProducts;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class IndexController extends Controller
{
    public function ViewCustSubProduct($id){
        $subproduct=SubProducts::where('productsId',$id)->get();
        return view('customers\subproduct\cust_viewSubProduct',compact('subproduct'));
    }
    
     //cust view subproduct details
     public function CustViewSubProductsDetails($id){
        $subproduct=SubProducts::where('id',$id)->get();
        return view('customers.subproduct.cust_viewSubProductDetails',compact('subproduct'));
     }
}
