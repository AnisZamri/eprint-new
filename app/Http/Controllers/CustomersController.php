<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function CustomersDashboard()
    {
        return view ('customers.dashboard');
    }

       public function CustomersProfile()
    {
        $customers=User::all();  
        return view ('customers\profile\profile',compact('customers'));
    }

    // public function AddCustDetails(Request $request)
    // {
    //     $customers=Customers::insert([
    //         'id' => Auth::user()->id,
    //         'custFullName'=>$request->custFullName,
    //         'custPhone'=>$request->custPhone,
    //         'custAddress'=>$request->custAddress,
    //         'created_at'=>Carbon::now()
    //     ]);
       
    //     return view('customers\profileEdit ',compact('customers'));     
    // }   

    public function EditCustomersProfile()
    {
       $customers=Customers::all(); 
        return view ('customers\profile\profileEdit',compact('customers'));
    }

    public function UpdateCustomersProfile(Request $request, $id)
    {
          
        $customers=Customers::findOrFail($id)->update([
            'custFullName'=>$request->custFullName,
            'custPhone'=>$request->custPhone,
            'custAddress'=>$request->custAddress,
            'created_at'=>Carbon::now()
            ]);

            return redirect()->route('EditProfile');
        }

}