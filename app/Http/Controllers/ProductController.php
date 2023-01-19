<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
   
    public function AddProducts(Request $request)
    {
        $validatedData = $request->validate([
            'productCategory' => ['required', 'unique:product_categories', 'max:255'],
            
        ],
        [
            'productCategory.required'=>'Please Input Product Category',
        ]);

        $productImage=$request->file('productImage');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($productImage->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/products/';
        $last_img = $up_location.$img_name;
        $productImage->move($up_location,$img_name);

        ProductCategory::insert([
            'productCategory'=>$request->productCategory,
            'productImage'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Successful Inserted');
    }

    public function ViewProduct(){ 
        $products=ProductCategory::all();
        return view('staffs\products\staff_AddProduct',compact('products'));    
    } 

    public function EditProduct($id){
        $products=ProductCategory::findOrFail($id);

       return view('staffs\products\staff_EditProduct',compact('products'));
    }

    public function UpdateProduct(Request $request, $id){
            
        $validatedData = $request->validate([
            'productCategory' => 'required|max:255',
        ],

        [
            'productCategory.required'=>'Please Input Product Category',
        ]);

        $old_image=$request->old_image;


        $productImage=$request->file('productImage');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($productImage->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/products/';
        $last_img = $up_location.$img_name;
        $productImage->move($up_location,$img_name);

        unlink($old_image);
        ProductCategory::find($id)->update([

            'productCategory'=>$request->productCategory,
            'productImage'=>$last_img,
            'created_at'=>Carbon::now()
            ]);

        return Redirect()->route('ViewProduct')->with('success','Category Updated Successful');
    }

    public function DeleteProduct($id){
        $delete=ProductCategory::find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Succesfully Deleted');
    }

   
}

