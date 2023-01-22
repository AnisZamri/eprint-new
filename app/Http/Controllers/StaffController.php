<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Staffs;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        return view ('staffs.index');
    }

    public function StaffViewProfile()
    {
        return view ('staffs\profile\viewProfile');
    }


    public function StaffEditProfile($id){
        $user=User::findOrFail($id);
        return view ('staffs\profile\editProfile',compact('user'));
    }

    public function StaffUpdateProfile(Request $request, $id){
        
        User::find($id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'created_at'=>Carbon::now()
            ]);

        Staffs::insert([
            'id'=>Auth::user()->id,
            'staffFullName'=>$request->staffFullName,
            'staffPhone'=>$request->staffPhone,
            'created_at' => Carbon::now()
            
        ]);

        return Redirect()->route('staffViewProfile')->with('success','Profile Updated Successful');
    }


    // public function AddStaffDetails(Request $request)
    // {
    //     Staffs::insert([
    //         'id' => Auth::user()->id,
    //         'staffFullName'=>$request->staffFullName,
    //         'staffPhone'=>$request->staffPhone,
    //         'created_at'=>Carbon::now()
    //     ]);

    //     return Redirect()->back()->with('success',' Successful Inserted');
    // }    
   
    // public function StaffProfileStore(Request $request,$id){
     
    //     User::find($id)->update([

    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'created_at'=>Carbon::now()
    //         ]);
       

    //     return redirect()->route('staffViewProfile')->with('success','Staff Profile Successful Inserted');
    // } //end method

}
