<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Customers;
use App\Models\SubProducts;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $subproduct = SubProducts::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                'id' => $subproduct->id,
                'product_name' => $subproduct->subProductName,
                'photo' => $subproduct->subProductImage,
                'price' => $subproduct->subProductPrice,
                'designUpload' => 1,
                'quantity' => 1
                
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function viewCartTest()
    {
        return view('customers\checkout\cart');
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            // $cart[$request->id]["designUpload"] = $request->designUpload;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function CustCheckout()
    {  
        $users=User::all();
        $customers=Customers::all();
        $products=ProductCategory::all();
        $orders=Orders::all();

        return view ('customers\checkout\checkout',compact('users','customers','products','orders'));

    
    }
  

}
