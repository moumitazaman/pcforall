<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\SubCategory;
use App\ProductAtributes;
use App\Banners;

use App\Sliders;


use Cart;




class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
$banners = Banners::latest()->first();

        

        return view('frontend.index',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function about()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
        
$banners = Banners::latest()->first();

        return view('frontend.about_us',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }
    
    
      public function cookies()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
        
$banners = Banners::latest()->first();

        return view('frontend.cookies',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }


    public function policy()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
        
$banners = Banners::latest()->first();

        return view('frontend.privacy',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }
    public function repair()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
        
$banners = Banners::latest()->first();

        return view('frontend.repair',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }


    public function terms()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();
$sliders=Sliders::latest()->get();
        
$banners = Banners::latest()->first();

        return view('frontend.terms',['banners' =>$banners,'sliders' =>$sliders,'cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function compare(Request $request)
    {

        $ids=$request->input('cpid');
        

   return  redirect()->route('front.display')->with( ['ids' => $ids] );

 
    }
    public function display()
    {
        

        $categories = Category::latest()->where('status',1)->get();


        

       
        return view('frontend.compare',['categories' => $categories]);


        
    }
    public function details(Request $request)
    {

        $id=$request->input('id');
        $product = Product::find($id);
        $product_name=$product->product_name;

        

        return response()->json(['product_name'=>$product_name ]);

 
    }
    public function show($id,$ord)
    {
        $ord=$ord;
        $cats = Category::find($id);
       $category_name=$cats->category_name;
       $category_id=$cats->id;


       if($ord=='latest'){
        $products = Product::where('category_id',$id)->latest()->get();

        $procount = Product::where('category_id',$id)->count();


    }
    elseif($ord=='popular'){
        $products = Product::where('category_id',$id)->latest()->get();

        $procount = Product::where('category_id',$id)->count();


    }

    else{
        $products = Product::where('category_id',$id)->orderBy('price',$ord)->get();

        $procount = Product::where('category_id',$id)->count();


    }
        $categories= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();

        $cartitems=\Cart::getContent();

    


        return view('frontend.category', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);
    }


    public function showSort(Request $request,$id,$ord)
    {
        $cats = Category::find($id);
        $category_name=$cats->category_name;
        $category_id=$cats->id;

        if($ord=='latest'){
            $products = Product::where('category_id',$id)->latest()->get();

            $procount = Product::where('category_id',$id)->count();
    

        }
        elseif($ord=='popular'){
            $products = Product::where('category_id',$id)->latest()->get();

            $procount = Product::where('category_id',$id)->count();
    

        }

        else{
            $products = Product::where('category_id',$id)->orderBy('price',$ord)->get();

            $procount = Product::where('category_id',$id)->count();
    

        }


        

      
        $categories= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();

        $cartitems=\Cart::getContent();

    

       //return redirect()->back();
      // return view('frontend.category', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);

      return json_decode($products,true);
           // return view('frontend.sort', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);


    }

    public function showSortBrand(Request $request,$id,$ord)
    {
        if($ord=='latest'){
            $products = Product::where('brand_id',$id)->latest()->get();

            $procount = Product::where('brand_id',$id)->count();
    

        }
        elseif($ord=='popular'){
            $products = Product::where('brand_id',$id)->latest()->get();

            $procount = Product::where('brand_id',$id)->count();
    

        }

        else{
            $products = Product::where('brand_id',$id)->orderBy('price',$ord)->get();

            $procount = Product::where('brand_id',$id)->count();
    
        }

        

       
        $categories= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();

        $cartitems=\Cart::getContent();

    

       //return redirect()->back();
      // return view('frontend.category', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);

      return json_decode($products,true);
           // return view('frontend.sort', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);


    }
    public function showSortSub(Request $request,$id,$ord)
    {
        if($ord=='latest'){
            $products = Product::where('subcategory_id',$id)->latest()->get();

            $procount = Product::where('subcategory_id',$id)->count();
    


        }
        elseif($ord=='popular'){
            $products = Product::where('subcategory_id',$id)->latest()->get();

            $procount = Product::where('subcategory_id',$id)->count();
    


        }

        else{
            $products = Product::where('subcategory_id',$id)->orderBy('price',$ord)->get();

        $procount = Product::where('subcategory_id',$id)->count();

        }
        
       

        $categories= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();

        $cartitems=\Cart::getContent();

    

       //return redirect()->back();
      // return view('frontend.category', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);

      return json_decode($products,true);
           // return view('frontend.sort', ['cartitems' =>  $cartitems,'id'=>$id,'ord'=>$ord,'category_id'=>$category_id,'cartCount'=>$cartCount,'brands'=>$brands,'categories' => $categories,'procount'=>$procount,'products'=>$products,'category_name'=>$category_name]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        
        $products = Product::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $cartitems=\Cart::getContent();
        $cartCount=Cart::getContent()->count();

        

        return view('frontend.contactus',['cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showBrand($id,$ord)
    {
        $brandings = Brand::find($id);
       $brand_name=$brandings->brand_name;
       if($ord=='latest'){
        $products = Product::where('brand_id',$id)->latest()->get();

        $procount = Product::where('brand_id',$id)->count();


    }
    elseif($ord=='popular'){
        $products = Product::where('brand_id',$id)->latest()->get();

        $procount = Product::where('brand_id',$id)->count();


    }

    else{
        $products = Product::where('brand_id',$id)->orderBy('price',$ord)->get();

        $procount = Product::where('brand_id',$id)->count();

    }

        $categories= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();

        $cartitems=\Cart::getContent();

    


        return view('frontend.brand', ['brand_id'=>$id,'cartitems'=>$cartitems,'cartCount'=>$cartCount,'brands'=>$brands,'categories'=>$categories,'brandings' => $brandings,'products' => $products,'procount'=>$procount,'brand_name'=>$brand_name]);
    }

    public function showSub($id,$ord)
    {
        $subcats = SubCategory::find($id);
       $sub_name=$subcats->sub_category_name;
       if($ord=='latest'){
        $products = Product::where('subcategory_id',$id)->latest()->get();

        $procount = Product::where('subcategory_id',$id)->count();



    }
    elseif($ord=='popular'){
        $products = Product::where('subcategory_id',$id)->latest()->get();

        $procount = Product::where('subcategory_id',$id)->count();



    }

    else{
        $products = Product::where('subcategory_id',$id)->orderBy('price',$ord)->get();

    $procount = Product::where('subcategory_id',$id)->count();

    }

        $allcategory= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();
        $categories= Category::latest()->where('status',1)->get();


        $cartitems=\Cart::getContent();



        return view('frontend.subcategory', ['sub_id'=>$id,'categories'=>$categories,'cartitems'=>$cartitems,'id'=>$id,'ord'=>$ord,'cartCount'=>$cartCount,'brands'=>$brands,'allcategory'=>$allcategory,'subcats' => $subcats,'products' => $products,'procount'=>$procount,'sub_name'=>$sub_name]);
    }

    public function searchPro(Request $request)
    {
        $allcategory= Category::latest()->where('status',1)->get();
        $cartitems=\Cart::getContent();
        $categories = Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();
        $search = $request->input('keyword');

        if($request->input('category')){
            $cat=$request->input('category');
            $products = Product::where('title','LIKE','%'.$search.'%')->where('category_id',$cat)->orderBy('price','asc')->get();

    $procount =Product::where('title','LIKE','%'.$search.'%')->where('category_id',$cat)->count();
    

        }
        else{
            $products = Product::where('title','LIKE','%'.$search.'%')->orderBy('price','asc')->get();

    $procount =Product::where('title','LIKE','%'.$search.'%')->count();

        }

        

    
    


        return view('frontend.search', ['categories'=>$categories,'cartitems'=>$cartitems,'cartCount'=>$cartCount,'brands'=>$brands,'allcategory'=>$allcategory,'products' => $products,'procount'=>$procount]);
    }

    public function searchSearch(Request $request,$ord)
    {
        $allcategory= Category::latest()->where('status',1)->get();
        $cartitems=\Cart::getContent();
        $categories = Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();
        $search = $request->input('keyword');

        if($request->input('category')){
            $cat=$request->input('category');
            $products = Product::where('title','LIKE','%'.$search.'%')->where('category_id',$cat)->orderBy('price',$ord)->get();

    $procount =Product::where('title','LIKE','%'.$search.'%')->where('category_id',$cat)->count();
    

        }
        else{
            $products = Product::where('title','LIKE','%'.$search.'%')->orderBy('price',$ord)->get();

    $procount =Product::where('title','LIKE','%'.$search.'%')->count();

        }

        

        return json_decode($products, true);

    


    }

    public function showAll($ord)
    {
        
        if($ord=='latest'){
            $products = Product::latest()->get();
            $procount = Product::latest()->count();


        }
        elseif($ord=='popular'){
            $products = Product::latest()->get();

        

            $procount = Product::latest()->count();


        }

        else{
            $products = Product::orderBy('price',$ord)->get();

        

            $procount = Product::latest()->orderBy('price','asc')->count();

        }  
        
       

        $allcategory= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();
        $categories= Category::latest()->where('status',1)->get();


        $cartitems=\Cart::getContent();



        return view('frontend.allproducts', ['categories'=>$categories,'cartitems'=>$cartitems,'cartCount'=>$cartCount,'brands'=>$brands,'products' => $products,'procount'=>$procount]);
    }
    public function showAllSort(Request $request,$ord)
    {
        if($ord=='latest'){
            $products = Product::latest()->get();
            $procount = Product::latest()->count();


        }
        elseif($ord=='popular'){
            $products = Product::latest()->get();
            $procount = Product::latest()->count();


        }

        else{
            $products = Product::orderBy('price',$ord)->get();
            $procount = Product::orderBy('price',$ord)->count();

        }


        $allcategory= Category::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $cartCount=Cart::getContent()->count();
        $categories= Category::latest()->where('status',1)->get();


        $cartitems=\Cart::getContent();
        return json_decode($products, true);
      

    } 
}
