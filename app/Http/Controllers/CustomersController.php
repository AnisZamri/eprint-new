<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
   
    public function CustViewProfile()
    {
        return view ('customers\profile\viewProfile');
    }

    public function CustEditProfile($id){
        $user=User::findOrFail($id);
        $customers=Customers::findOrFail($id);

        return view ('customers\profile\editProfile',compact('user','customers'));
    }

    public function CustUpdateProfile(Request $request, $id){
        
        User::find($id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'created_at'=>Carbon::now()
            ]);

            Customers::find($id)->update([

                'custFullName'=>$request->custFullName,
                'custPhone'=>$request->custPhone,
                'custAddress'=>$request->custAddress,
                'created_at' => Carbon::now()
                ]);

                return view ('customers\profile\viewProfile');

    }
   

}