<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Gallery;

use App\Brand;
use App\Attributes;
use App\AttributesValue;
use App\ProductAtributes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Image; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::latest()->get();
        return view('backend.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = SubCategory::latest()->where('status',1)->get();

        $brands = Brand::latest()->get();
        $attrs = Attributes::latest()->get();
        $attrvalues = AttributesValue::latest()->get();



        return view('backend.product.create',['subcategories' => $subcategories,'categories' => $categories,'brands' => $brands,'attrs' => $attrs,'attrvalues' => $attrvalues]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new Product();

        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
           

            $img = Image::make($request->file('image')->getRealPath());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploads').'/'. $imageName);
        $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
           $request->image->move(public_path('/uploads/zoom'), $imageName);
            $insert->img_name =$imageName;

  
          }

          $images=array();
          
          if($files=$request->file('images')){
              foreach($files as $file){
                  $name=$file->getClientOriginalName();
                  $file->move(public_path('/uploads'), $name);
                  $images[]=$name;
                  $insert->galleryimages =implode(',',$images);
              
               
              }

          }
  
       
    
            $insert->product_name = $request->input('name');
            $insert->stock_quantity = $request->input('quantity');

            $insert->quantity = $request->input('quantity');

            $insert->price = $request->input('price');
            $insert->title = $request->input('title');

            $insert->discount_price = $request->input('discount_price');
            
                        $insert->short_details = $request->input('short_details');

            $insert->details = $request->input('details');
            $insert->order_no = implode(',',$request->input('order_no'));

            $insert->category_id = $request->input('category');
            $insert->subcategory_id = $request->input('subcategory');

            $insert->brand_id = $request->input('brand');


            $insert->save();

            $pid= Product::all()->last()->id;
            $pidimgs= Product::all()->last()->galleryimages;
            $ordno= Product::all()->last()->order_no;
            $pimgs=explode(',',$pidimgs);
            $order_no=explode(',',$ordno);
            if(($ordno==NULL) || ($ordno == '') )
            {
            $i=0;
            foreach($pimgs as $pimg){
                $i++;
            $imginsert= new Gallery();
            $imginsert->product_id=$pid;
            $imginsert->imgname=$pimg;
            $imginsert->order_no=$i;
            $imginsert->save();
            }
            }
            else{
                $j=0;
                 foreach($pimgs as $pimg){
                    
            $imginsert= new Gallery();
            $imginsert->product_id=$pid;
            $imginsert->imgname=$pimg;
            $imginsert->order_no=$order_no[$j];
            $imginsert->save();
            $j++;
            }

                    
                 
            
            }
                
            
               
            $insertattr = new ProductAtributes();

            $insertattr->attr_id = $request->input('attr_check');
            
            $insertattr->product_id = $pid;

            $insertattr->details=$request->input('attr_detail');
            $insertattr->selectval=$request->input('attr_select');

            $insertattr->save();



  

            
        $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.product.create'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::latest()->where('status',1)->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->where('status',1)->get();
        $galleries = Gallery::where('product_id',$id)->orderBy('order_no','ASC')->get();

        $proattrs= ProductAtributes::where('product_id',$id)->first();
       

        

    


        return view('backend.product.edit', ['galleries' => $galleries, 'product' => $product,'subcategories' => $subcategories,'categories' => $categories,'brands' => $brands,'productattributes'=>$proattrs]);
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
    $update = Product::find($id);
    $gid= Gallery::where('product_id',$id)->count();


    if ($request->file('image')) {
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $img = Image::make($request->file('image')->getRealPath());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploads').'/'. $imageName);
        $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
           $request->image->move(public_path('/uploads/zoom'), $imageName);
            $update->img_name =$imageName;


      }
      $images=array();
                  
                      $k=$gid;
                  

      
          if($files=$request->file('galleryimages')){
              foreach($files as $file){
                  $name=$file->getClientOriginalName();
                  $file->move(public_path('/uploads'), $name);
                  $images[]=$name;
                $update->galleryimages =$request->input('gal').",".implode(',',$images);
                $k++;
            $imginsert= new Gallery();
            $imginsert->product_id=$id;
            $imginsert->imgname=$name;
            $imginsert->order_no=$k;
            $imginsert->save();
            

              }

          }

    $update->product_name = $request->input('name');
    
    $update->quantity = $request->input('quantity');
    $update->title = $request->input('title');

    $update->price = $request->input('price');
    $update->discount_price = $request->input('discount_price');
        $update->short_details = $request->input('short_details');

    $update->details = $request->input('details');

    $update->category_id = $request->input('category');
    $update->subcategory_id = $request->input('subcategory');

    $update->brand_id = $request->input('brand');

    $update->save();
    
      

          
           /* $insertattr = ProductAtributes::find($id);

            $insertattr->attr_id = $request->input('attr_check');
            
            $insertattr->product_id = $id;

            $insertattr->details=$request->input('attr_detail');
            $insertattr->selectval=$request->input('attr_select');

            $insertattr->save();*/

            $request->session()->flash('success', 'Successfully Updated!');
            return redirect(route('backend.product.index'));

    
}

    public function orderUpdate(Request $request)
{
    $imageArray = base64_decode($request->input('imagesrcs'));
    $imageorder=$request->input('imageorder');
            $pid= Product::all()->last()->id;
            
            foreach($imageArray as $pimg){
                
            $imginsert= new Gallery();
            $imginsert->product_id=$pid;
            $imginsert->imgname=$pimg;
            $imginsert->order_no=$imageorder;
            $imginsert->save();
            }
        return response()->json(['subcat'=>'updated' ]);

}

    public function reorderUpdate(Request $request)
{
    $imageIdsArray = $request->input('imageIds');
$ordno=$request->input('ordno');
$count = 1;
$p=0;
foreach ($imageIdsArray as $id) {
   
    
    $imageOrder = $count;
    $imageId = $id;
    $gallery=  Gallery::where('id',$imageId)->first();
    $gallery->order_no=$count;
    $gallery->save();
    
     $p++;
    $count ++;
}
        return response()->json(['subcat'=>'updated' ]);

}

    public function galleryDelete(Request $request)
{          
    $id=$request->input('id');
           Gallery::find($id)->delete();
        return response()->json(['subcat'=>'updated' ]);

}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect(route('backend.product.index'))->withError('Successfully Deleted!');
    }
}
