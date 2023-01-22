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

    public function CustViewProfile()
    {
        return view ('customers\profile\viewProfile');
    }

    public function CustEditProfile($id){
        $user=User::findOrFail($id);
        return view ('customers\profile\editProfile',compact('user'));
    }

    public function CustUpdateProfile(Request $request, $id){
        
        User::find($id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'created_at'=>Carbon::now()
            ]);

        Customers::insert([
            'id'=>Auth::user()->id,
            'custFullName'=>$request->custFullName,
            'custPhone'=>$request->custPhone,
            'custAddress'=>$request->custAddress,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('custViewProfile')->with('success','Profile Updated Successful');
    }
   

}