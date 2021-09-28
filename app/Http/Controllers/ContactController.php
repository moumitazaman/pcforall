<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\SubCategory;
use App\ProductAtributes;



use Cart;
use Mail;

class ContactController extends Controller
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

        

        return view('frontend.contactus',['cartitems' =>  $cartitems,'products' => $products,'brands'=>$brands,'categories' => $categories,'cartCount' => $cartCount]);

    }


    public function handleForm(Request $request)
    {

        $this->validate($request, ['name' => 'required', 'email' => 'required|email']);

        $data = ['name' => $request->get('name') , 'email' => $request->get('email') , 'messageBody' => $request->get('message_body') ];

        Mail::send('emails.email', $data, function ($message) use ($data)
        {
            $message->from($data['email'], $data['name']);
            $message->to('moumitasub@gmail.com', 'Admin')
                ->subject('Contact Us Message');
        });

        return redirect()
            ->back()
            ->with('success', 'Thank you for your feedback');

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
