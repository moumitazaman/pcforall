<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use Carbon\Carbon;

use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCount=Cart::getContent()->count();
        $products = Product::all();
        $categories = Category::latest()->get();
        $cartCollection = \Cart::getContent();
        $cartitems=\Cart::getContent();
        return view('frontend.checkout')->with(['cartitems' =>$cartitems,'cartCollection'=>$cartCollection,'products' => $products,'categories' => $categories,'cartCount'=>$cartCount]);

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

    public function placeOrder(Request $request)
    { 
        $cartCollection = \Cart::getContent();

        $cartitems=\Cart::getContent();

        $cartCount=Cart::getContent()->count();
        $products = Product::all();
        $categories = Category::latest()->get();

        $insert = new Order();
        $insert->full_address = $request->input('address');
        $insert->order_id = 'ORD-'.strtoupper(uniqid());
        $insert->user_id = auth()->user()->id;
        $insert->status = 'pending';
        $insert->order_date = Carbon::now();
        $insert->processor =$request->input('processor');
        $insert->ram =$request->input('ram'); 
        $insert->monitor =$request->input('monitor'); 
        $insert->ssd = $request->input('ssd');
              $insert->payment_method = $request->input('payment_method');


        $insert->total_amount =  Cart::getSubTotal();
        $insert->total_item  =  Cart::getTotalQuantity();
        $insert->notes = $request->input('notes');

        $insert->save();
        if($request->input('shipline1')){
        $sid= Order::all()->last()->order_id;

        $shipping = new Shipping();
        $shipping->user_id = auth()->user()->id;

        $shipping->shipline1 =$request->input('shipline1'); 
        $shipping->shipline2 =$request->input('shipline2'); 
        $shipping->shipline3 = $request->input('shipline3');
        $shipping->shipcounty = request('shipcounty');
        $shipping->shippostcode = request('shippostcode');
        $shipping->shipcity = request('shipcity');
        $shipping->shipcountry = request('shipcountry');
        $shipping->order_id =$sid;

        $shipping->save();
        }


        if ($insert) {
            $pid= Order::all()->last()->order_id;

            $items = Cart::getContent();
            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('product_name', $item->name)->first();

                $orderItem = new OrderDetails([
                    'order_id'    =>  $pid,
                    'product_id'    =>  $product->id,
                    'totalquantity'      =>  $item->quantity,
                    'total_price'         =>  $item->getPriceSum(),                
                    ]);
     
                $orderItem->save();
                $proquantity=($product->quantity)-$item->quantity;
                $product->quantity=$proquantity;
        
                $product->save();
            }
        }



        return view('frontend.success')->with(['cartitems'=>$cartitems,'cartCollection'=>$cartCollection,'products' => $products,'categories' => $categories,'cartCount'=>$cartCount]);


        
    }

    public function Cartclear(){
         Cart::clear();
         return redirect('/');


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
        //
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
}
