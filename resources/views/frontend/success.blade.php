@extends('frontend.layouts.app-cart')

@section('title', 'Success')

@section('content')
<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
		<main class="main order">
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step visited"><a href="{{url('/cart')}}">1. Shopping Cart</a></h3>
					<h3 class="title title-simple title-step active"><a href="{{url('/checkout')}}">2. Checkout</a></h3>
					<h3 class="title title-simple title-step"><a href="{{url('/success')}}">3. Order Complete</a></h3>
				</div>
				<div class="container mt-8">
					<div class="order-message">
						<i class="fas fa-check"></i>Thank you, Your order has been received.Please Check Details   

					</div>
                    <?php 
                    $orders=App\Order::latest()->where('user_id',auth()->user()->id)->where('status','pending')->first();


                    ?>

					<div class="order-results pt-8 pb-8">
						<div class="overview-item">
							<span>Order number</span>
							<strong>{{$orders->order_id}}</strong>
						</div>
						<div class="overview-item">
							<span>Status</span>
							<strong>Processing</strong>
						</div>
						<div class="overview-item">
							<span>Date</span>
							<strong>{{$orders->created_at->format('d-m-Y')}}</strong>
						</div>
						<div class="overview-item">
							<span>Total</span>
							<strong>{{$orders->total_amount}}</strong>
						</div>
						<div class="overview-item">
							<span>Payment method</span>
							<strong>{{$orders->payment_method}}</strong>
						</div>
					</div>

					<h2 class="title title-simple text-left pt-3">Order Details</h2>
					<div class="order-details mb-1">
						<table class="order-details-table">
							<thead>
								<tr class="summary-subtotal">
									<td>
										<h3 class="summary-subtitle">Product</h3>
									</td>	
									<td></td>		
								</tr>
							</thead>
							<tbody>
                            @foreach($cartCollection as $item)

								<tr>
									<td class="product-name">{{ $item->name }}  <span> <i class="fas fa-times"></i> {{$item->quantity}}</span></td>
									<td class="product-price">{{$settings->currency}}{{ \Cart::get($item->id)->getPriceSum() }}</td>
                                </tr>
                               
								@endforeach
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Subtotal:</h4>
									</td>
									<td class="summary-subtotal-price">{{$settings->currency}} {{ \Cart::getTotal() }}</td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Shipping:</h4>
									</td>
									<td class="summary-subtotal-price">Free shipping</td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Payment method:</h4>
									</td>
									<td class="summary-subtotal-price">{{$orders->payment_method}}</td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Total</h4>
									</td>
									<td>
										<p class="summary-total-price">{{$settings->currency}} {{ \Cart::getTotal() }}</p>
									<?php if($orders->payment_method=='Paypal')	{ ?>
										<form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="amount" type="hidden" class="form-control" name="amount" value="{{$orders->total_amount}}">

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group" style="float:right;">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay with Paypal
                                </button>
                            </div>
                        </div>
                    </form>
									<?php } else{?>
										<a href="{{url('/clear')}}" class="btn  btn-primary btn-md mb-4">Complete ?</a>


									<?php }?>
									</td>												
								</tr>

							</tbody>
						</table>
					</div>
					<h2 class="title title-simple text-left pt-8 mb-2">Billing Address</h2>

					<div class="address-info pb-8 mb-6">
						<p class="address-detail pb-2">
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}<br>
                        {{ auth()->user()->address }}<br>
							{{ auth()->user()->phone }}
							{{ auth()->user()->email }}

						</p>

						<p class="address-detail pb-2" style="float:right;">
						<h2 class="title title-simple text-left pt-8 mb-2">Shipping Address</h2>

						<?php 
$shipping=App\Shipping::where('order_id',$orders->order_id)->first();
if($shipping){
						?>
                        {{$shipping->shipline1}} {{$shipping->shipline2}} {{$shipping->shipline3}}<br>
                        <br>
						{{$shipping->shipcity}}</br>
						{{$shipping->shipcounty}}</br>
						{{$shipping->shipcountry}}
<?php }?>
						</p>
						
				
</div>

					<a href="{{url('/')}}" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Keep Shopping</a>
				</div>
			</div>
		</main>
		<style>
			.btn-md{
				border-radius:25%;
				padding:15px;
				-webkit-box-shadow: 5px 5px 15px 5px #cccccc; 
box-shadow: 5px 5px 5px 5px #cccccc;
			}
		</style>
        @endsection