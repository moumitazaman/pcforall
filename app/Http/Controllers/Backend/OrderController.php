<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Order;
use App\OrderDetails;
use App\User;

use App\Brand;
use App\Attributes;
use App\AttributesValue;
use App\ProductAtributes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=DB::table('orders')
                       ->orderBy('created_at' , 'desc')
                       ->get();
                      // dd($orders);
        return view('backend.orders.index', ['orders' => $orders]);
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
        $agent = Order::find($id);
        return view('backend.orders.view', ['agent' => $agent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents= Order::find($id);
        
         
        $pdf = PDF::loadView('backend.order.invoice',['agent' => $agents]);  
        return $pdf->setPaper('a4','landscape')->setWarnings(false)->download('invoice.pdf');
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
    
     public function approve($id){
   
        $order = Order::findOrFail($id);
        
        
        $userid=$order->user_id;
        
        $user = User::where('id',$userid)->first();

             $agent= ['order_id' => $order->order_id, 'userid' => $userid,'order_date' => $order->order_date,'total_amount' => $order->total_amount];




        $pdf = PDF::loadView('emails.emailnew', $agent);


        $data = ['name' => $user->first_name, 'email' => $user->email ];

        Mail::send('emails.emailapprove', $data, function ($message) use ($data,$pdf)
        {
            $message->from('mail@pcforall.iciclecorp.space','Admin');
            $message->to($data['email'], $data['name'])
                ->subject('Approval of Order')
                ->attachData($pdf->output(), "invoice.pdf");
        });
 $order->status = 'dispatched';
        $order->save();
       
        return redirect()->route('backend.order.index')->with('success','Dispatched');
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
