<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\SubCategory;

use App\Brand;
use App\PCBuilder;

use App\Attributes;
use App\AttributesValue;
use App\ProductAtributes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = PCBuilder::latest()->get();
        
        return view('backend.pcbuilder.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('category_id',4)->orWhere('category_id',5)->get();

        $cpus = Product::latest()->where('subcategory_id',3)->get();
        $coolers = Product::latest()->where('subcategory_id',4)->get();
        $motherboards = Product::latest()->where('subcategory_id',5)->get();
        $memories = Product::latest()->where('subcategory_id',6)->get();
        $hdds = Product::latest()->where('subcategory_id',7)->get();
        $ssds = Product::latest()->where('category_id',8)->get();
        $graphics = Product::latest()->where('subcategory_id',9)->get();
        $casings = Product::latest()->where('subcategory_id',10)->get();
        $powers = Product::latest()->where('subcategory_id',11)->get();
        $monitors = Product::latest()->where('category_id',7)->get();
        $keyboards = Product::latest()->where('subcategory_id',13)->get();
        $mouses = Product::latest()->where('subcategory_id',14)->get();

        return view('backend.pcbuilder.create', ['products'=>$products,'mouses'=>$mouses,'keyboards'=>$keyboards,'monitors'=>$monitors,'powers'=>$powers,'casings'=>$casings,'cpus' => $cpus,'coolers'=>$coolers,'motherboards'=>$motherboards,'memories'=>$memories,'hdds'=>$hdds,'ssds'=>$ssds,'graphics'=>$graphics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $insert = new PCBuilder();
        $insert->name = $request->input('title');
        $insert->product = $request->input('product');

        $insert->brand = $request->input('brand');
            $insert->cpu_id = $request->input('cpu');
            $insert->cooler_id = $request->input('cooler');
            $insert->motherboard_id = $request->input('motherboard');
            $insert->memory_id = $request->input('memory');
            $insert->hdd_id = $request->input('hdd');
            $insert->ssd_id = $request->input('ssd');
            $insert->graphics_id = $request->input('graphics');
            $insert->casing_id = $request->input('casing');

            $insert->power_supply_id = $request->input('power');
            $insert->monitor_id = $request->input('monitor');

            $insert->keyboard_id = $request->input('keyboard');

            $insert->mouse_id = $request->input('mouse');







           
            $insert->save();

            $request->session()->flash('success', 'Successfully Created!');
        return redirect()->back();
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
        $pcs=PCBuilder::find($id);
        $products = Product::where('id',$pcs->product)->get();

        $cpus = Product::latest()->where('subcategory_id',3)->get();
        $coolers = Product::latest()->where('subcategory_id',4)->get();
        $motherboards = Product::latest()->where('subcategory_id',5)->get();
        $memories = Product::latest()->where('subcategory_id',6)->get();
        $hdds = Product::latest()->where('subcategory_id',7)->get();
        $ssds = Product::latest()->where('category_id',8)->get();
        $graphics = Product::latest()->where('subcategory_id',9)->get();
        $casings = Product::latest()->where('subcategory_id',10)->get();
        $powers = Product::latest()->where('subcategory_id',11)->get();
        $monitors = Product::latest()->where('category_id',7)->get();
        $keyboards = Product::latest()->where('subcategory_id',13)->get();
        $mouses = Product::latest()->where('subcategory_id',14)->get();

        return view('backend.pcbuilder.edit', ['pcs'=>$pcs,'products'=>$products,'mouses'=>$mouses,'keyboards'=>$keyboards,'monitors'=>$monitors,'powers'=>$powers,'casings'=>$casings,'cpus' => $cpus,'coolers'=>$coolers,'motherboards'=>$motherboards,'memories'=>$memories,'hdds'=>$hdds,'ssds'=>$ssds,'graphics'=>$graphics]);
    
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
        
        $insert = PCBuilder::find($id);
        $insert->name = $request->input('title');
        $insert->product = $request->input('product');

        $insert->brand = $request->input('brand');
        if($request->input('cpu')){
            $insert->cpu_id = $request->input('cpu');

        }
        if($request->input('memory')){
            $insert->memory_id = $request->input('memory');
 
        }
        if($request->input('monitor')){
            $insert->monitor_id = $request->input('monitor');
 
        }
        if($request->input('ssd')){
            $insert->ssd_id = $request->input('ssd');

        }
            
            
           
            $insert->save();

            $request->session()->flash('success', 'Successfully Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PCBuilder::find($id)->delete();
        return redirect(route('backend.pcbuilder.index'))->withError('Successfully Deleted!');
    }
}
