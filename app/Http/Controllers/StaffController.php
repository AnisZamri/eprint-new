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

    public function StaffProfile()
    {
        return view ('staffs\profile\viewProfile');
    }


    public function StaffProfileEdit(){
        $staff = Staffs::all;
        return view ('staffs\profile\editProfile',compact('staff'));
    }


    public function AddStaffDetails(Request $request)
    {
        Staffs::insert([
            'id' => Auth::user()->id,
            'staffFullName'=>$request->staffFullName,
            'staffPhone'=>$request->staffPhone,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success',' Successful Inserted');
    }    
   

}
