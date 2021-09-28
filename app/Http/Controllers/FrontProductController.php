<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\ProductAtributes;
use App\Gallery;

use App\SubCategory;

use App\PCBuilder;
use App\User;

use App\Attributes;
use App\AttributesValue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Cart;

class FrontProductController extends Controller
{
    /*protected $productRepository;
 
    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }*/
 
    public function show($id)
    {
        //$product = $this->productRepository->findProductBySlug($slug);
        $product = Product::find($id);

 
        dd($product);
    }
    public function dashboard()
    {
        $cartCollection = \Cart::getContent();
        $cartCount=Cart::getContent()->count();
        $categories = Category::latest()->where('status',1)->get();

        
        $cartitems=\Cart::getContent();


       
        return view('frontend.customer-dashboard')->withTitle('Dashboard')->with(['cartitems' =>  $cartitems,'cartCollection' => $cartCollection,'cartCount' => $cartCount,'categories' => $categories]);

    }

    public function singleProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::latest()->where('status',1)->get();
        $proattrs= ProductAtributes::where('product_id',$id)->first(); 

        $cartCount=Cart::getContent()->count();
       
        $galleries = Gallery::where('product_id',$id)->orderBy('order_no','ASC')->get();

        $cartitems=\Cart::getContent();

        $newproducts=Product::where('category_id',$product->category_id)->orderBy('price','asc')->get();

        return view('frontend.single', ['galleries'=>$galleries,'newproducts'=>$newproducts,'cartitems'=>$cartitems,'productattributes'=>$proattrs,'cartCount'=>$cartCount,'product'=>$product,'categories' => $categories]);


    }

    public function priceFilter(Request $request)
    {
        $allcategory= Category::latest()->where('status',1)->get();
        $min=(int)$request->input('min_price');
        $max=(int)$request->input('max_price');
        $cat=$request->input('category');
        $subcat=$request->input('subcategory');
        $brans=$request->input('brands');

       

        $categories = Category::latest()->where('status',1)->get();
        $cartCount=Cart::getContent()->count();
        if(!empty($request->input('brands'))){
        if($cat && $brans){
            $products = Product::whereBetween('price', array($min,$max))->where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }
        elseif($subcat && $brans){
            $products = Product::whereBetween('price', array($min,$max))->where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }
        else{
            $products = Product::whereBetween('price', array($min,$max))->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }

    }
    else{
        $brans=[1];
        if($cat && $brans){
            $products = Product::whereBetween('price', array($min,$max))->where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }
        elseif($subcat && $brans){
            $products = Product::whereBetween('price', array($min,$max))->where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }
        else{
            $products = Product::whereBetween('price', array($min,$max))->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereBetween('price', array($min,$max))->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
           
        }

    }
       
        $cartitems=\Cart::getContent();

        $brands = Brand::latest()->get();


        return view('frontend.filter', ['categories'=>$categories,'cartitems'=>$cartitems,'cartCount'=>$cartCount,'brands'=>$brands,'allcategory'=>$allcategory,'products' => $products,'procount'=>$procount]);


    }


    public function pcbuilder(Request $request)
    {
        $allcategory= Category::latest()->where('status',1)->get();
        

        $categories = Category::latest()->where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->where('front',1)->get();

        $cartCount=Cart::getContent()->count();

        $procount =0 ;
        $cartCollection = \Cart::getContent();


    $newproducts=Product::where('id',6)->get();


        $brands = Brand::latest()->get();
        $cartCollection = \Cart::getContent();
        $cartitems=\Cart::getContent();


        return view('frontend.pcbuilder', ['categories'=>$categories,'cartitems' =>  $cartitems,'newproducts' => $newproducts ,'subcategories'=>$subcategories,'cartCollection'=>$cartCollection,'cartCount'=>$cartCount,'brands'=>$brands,'allcategory'=>$allcategory,'procount'=>$procount]);


    }

    public function showBrandFilter(Request $request)
    {
        $brands = Brand::latest()->get();
        $cartCollection = \Cart::getContent();
        $cartitems=\Cart::getContent();
        $allcategory= Category::latest()->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->where('front',1)->get();
        $cartCount=Cart::getContent()->count();
        $cartCollection = \Cart::getContent();

        $cat=$request->input('cat');
        $subcat=$request->input('subcat');
        $brans=$request->input('brands');

        if($cat){
            $products = Product::where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::where('category_id',$cat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
            
        }
        elseif($subcat)
        {
            $products = Product::where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::where('subcategory_id',$subcat)->whereIn('brand_id',$brans)->orderBy('price','asc')->count();
            
        }
        else{
            $products = Product::whereIn('brand_id',$brans)->orderBy('price','asc')->get();
            $procount = Product::whereIn('brand_id',$brans)->orderBy('price','asc')->count();
            

        }


       
       //return json_decode($products,true);

        return view('frontend.filter', ['products'=>$products,'categories'=>$categories,'cartitems' =>  $cartitems,'subcategories'=>$subcategories,'cartCollection'=>$cartCollection,'cartCount'=>$cartCount,'brands'=>$brands,'allcategory'=>$allcategory,'procount'=>$procount]);




    }

    public function getbuilder(Request $request)
    {
        
   
        $brand=$request->input('brand');
        $cats=$request->input('marchi.subs');
      /*  $cpu=$request->input('marchi.subs1');
        $cooler=$request->input('marchi.subs2');
        $motherboard=$request->input('marchi.subs3');
        $memory=$request->input('marchi.subs4');
        $hdd=$request->input('marchi.subs5');
        $ssd=$request->input('marchi.subs6');
        $graphics=$request->input('marchi.subs7');
        $casing=$request->input('marchi.subs8');
        $power=$request->input('marchi.subs9');
        $monitor=$request->input('marchi.subs10');

        $keyboard=$request->input('marchi.subs11');
        $mouse=$request->input('marchi.subs12');*/

$intels=PCBuilder::where('brand',$brand)->first();
if(!$intels){

}
elseif($cats==3){
    $ids=$intels->cpu_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }
}
elseif($cats==4){
    $ids=$intels->cooler_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==5){
    $ids=$intels->motherboard_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }
}
elseif($cats==6){
    $ids=$intels->memory_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==7){
    $ids=$intels->hdd_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==8){
    $ids=$intels->ssd_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }
}
elseif($cats==9){
    $ids=$intels->graphics_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==10){

        $ids=$intels->casing_id;
        foreach($ids as $id){
            $newproducts[]=Product::where('id',$id)->first();

        }

    
}
elseif($cats==11){
    $ids=$intels->power_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==12){

        $ids=$intels->monitor_id;
        foreach($ids as $id){
            $newproducts[]=Product::where('id',$id)->first();

        }

    
}
elseif($cats==13){
    $ids=$intels->keyboard_id;
    foreach($ids as $id){
        $newproducts[]=Product::where('id',$id)->first();

    }   
}
elseif($cats==14){

        $ids=$intels->mouse_id;
        foreach($ids as $id){
            $newproducts[]=Product::where('id',$id)->first();

        }

    
}

else{
    $newproducts=0;
}

       
        return response()->json(['newproducts'=>$newproducts]);
//return redirect()->back()->with( ['newproducts'=>$newproducts] );

    }
    
    
    public function userUpdate(Request $request)
    {

        $id=request('userid');
        
        $category = User::find($id);
    
        $category->first_name = request('first_name');
        $category->last_name = request('last_name');

        $category->email = request('email');
        $category->phone = request('phone');
        $category->line1 = request('line1');
        $category->line2 = request('line2');
        $category->line3 = request('line3');
        $category->county = request('county');
        $category->postcode = request('postcode');
        $category->city = request('city');
        $category->country = request('country');
        if($request->input('newpassword')){
        $category->password = Hash::make($request->input('newpassword'));
        }
        $category->save();

        $request->session()->flash('success', 'Successfully Updated!');
        return redirect(route('user.update'));
        
    }
    
}
