@extends('frontend.layouts.app-cart')

@section('title', 'Paypal')

@section('content')
<main class="main order">
			<div class="page-content pt-10 pb-10">
	<div class="container">
    <div class="row">  
    <?php 
                        $settings= DB::table('settings')->where('id',1)->first();

                        ?>
    <?php 
                    $orders=App\Order::latest()->where('user_id',auth()->user()->id)->where('status','pending')->first();


                    ?>  	
        <div class="col-md-12 col-md-offset-2">        	
        	<h3 class="text-center" style="margin-top: 30px;"></h3>
            <div class="panel panel-default" style="margin-top: 60px;">

                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading"><b></b></div>
                <div class="panel-body">
               
             
                </div>
            </div>
        </div>
    </div>
</div>
</div></main>
@endsection