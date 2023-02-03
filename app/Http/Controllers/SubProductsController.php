<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SubProducts;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class SubProductsController extends Controller
{
    public function ViewAddSubProducts()
    {
        $products=ProductCategory::orderBy('productCategory','ASC')->get();
        $subproduct=SubProducts::all();
        return view('staffs\subproducts\staff_AddSubProduct',compact('subproduct','products'));

    }

    public function ViewSubProduct(){

        $products=ProductCategory::orderBy('productCategory','ASC')->get();
        $subproduct=SubProducts::all();
        return view('staffs\subproducts\staff_ViewSubProduct',compact('subproduct','products'));
    }     


    public function AddSubProducts(Request $request)
    {
        $validatedData = $request->validate([
            //'productName' => ['required', 'unique:products', 'max:255'],
            
        ],
        [
            //'productName.required'=>'Please Input Product Name',
        ]);

        $subProductImage=$request->file('subProductImage');

        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($subProductImage->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/products/';
        $last_img=$up_location.$img_name;
        $subProductImage->move($up_location,$img_name);


             SubProducts::insert([
            'productsId'=>$request->productsId,
            'subProductImage'=>$last_img,
            'subProductName'=>$request->subProductName,
            'subProductSize'=>$request->subProductSize,
            'subProductShape'=>$request->subProductShape,
            'subProductDesc'=>$request->subProductDesc,
            'subProductPrice'=>$request->subProductPrice,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->route('ViewSubProduct')->with('success','Category Successful Inserted');


    }

    
    public function EditSubProduct($id){
        $products=ProductCategory::orderBy('productCategory')->get();
        $subproduct=SubProducts::findOrFail($id);
        return view('staffs\subproducts\staff_EditSubProduct',compact('subproduct','products'));
    }

    public function UpdateSubProduct(Request $request,$id){
        
        $old_image=$request->old_image;

        $subProductImage=$request->file('subProductImage');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($subProductImage->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/products/';
        $last_img = $up_location.$img_name;
        $subProductImage->move($up_location,$img_name);

        unlink($old_image);
        SubProducts::find($id)->update([
            'productsId'=>$request->productsId,
            'subProductImage'=>$last_img,
            'subProductName'=>$request->subProductName,
            'subProductSize'=>$request->subProductSize,
            'subProductShape'=>$request->subProductShape,
            'subProductDesc'=>$request->subProductDesc,
            'subProductPrice'=>$request->subProductPrice,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->route('ViewSubProduct')->with('success','Category Updated Successful');

    }   

    public function DeleteSubProduct($id){
        $delete=SubProducts::find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Succesfully Deleted');
    }

}
