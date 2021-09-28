<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttributesValue;
use App\Product;
use App\User;




class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function deviceview(Request $request)
    {
        
         $device = $request->device;
        return response()->json(['device' => $device]);


    }
    public function display()
    {
        

        $categories = Category::latest()->where('status',1)->get();

        
        

       
        return view('frontend.compare',['categories' => $categories]);


        
    }
    public function stockDisplay(){
        $products = Product::latest()->get();
        return view('backend.stock.index', ['products' => $products]);


    }

    public function customerDisplay(){
        $customers = User::latest()->get();
        return view('backend.customer.index', ['customers' => $customers]);


    }
    public function customerView($id){
        $customer = User::find($id);
        return view('backend.customer.view', ['customer' => $customer]);


    }


}
