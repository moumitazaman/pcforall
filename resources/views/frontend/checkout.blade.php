@extends('frontend.layouts.app-cart')

@section('title', 'Checkout')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="{{ asset('front/js/postcodes.min.js') }}"></script>

<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
		<main class="main checkout">
			<!-- <div class="page-header bg-dark"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h1 class="page-title">Checkout</h1>
				<ul class="breadcrumb">
					<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
					<li>Checkout</li>
				</ul>
			</div> -->
			<!-- End PageHeader -->
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step visited"><a href="{{url('/cart')}}">1. Shopping Cart</a></h3>
					<h3 class="title title-simple title-step active"><a href="{{url('/checkout')}}">2. Checkout</a></h3>
					<h3 class="title title-simple title-step"><a href="{{url('/success')}}">3. Order Complete</a></h3>
				</div>
				<div class="container mt-8">
                <form action="{{ route('checkout.place.order') }}" class="form" method="POST" role="form">
                @csrf						<div class="row gutter-lg">
							<div class="col-lg-7 mb-6">
								<h3 class="title title-simple text-left">Billing Details</h3>
                                @foreach($cartCollection as $item)
                                <input type="hidden" name="processor" value="{{$item->attributes->cpu_id}}"/>
								<input type="hidden" name="ram" value="{{$item->attributes->ram_id}}"/>
                                <input type="hidden" name="monitor" value="{{$item->attributes->monitor_id}}"/>
								<input type="hidden" name="ssd" value="{{$item->attributes->ssd_id}}"/>


								@endforeach
								<div class="row">
									<div class="col-xs-6">
										<label>First Name *</label>
										<input type="text" class="form-control" name="first-name" value="{{ auth()->user()->first_name }}" required="" />
									</div>
									<div class="col-xs-6">
										<label>Last Name *</label>
										<input type="text" class="form-control" value="{{ auth()->user()->last_name }}" name="last-name" required="" />
									</div>
								</div>
								
								<label>Country / Region *</label>
								<input type="text" class="form-control" value="{{ auth()->user()->country }}" name="country" required="" />
								<label>Street Address *</label>
								<input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}" required=""
									 />
								
								<div class="row">
									<div class="col-xs-6">
										<label>Town / City *</label>
										<input type="text" class="form-control" value="{{ auth()->user()->city }}" name="city" required="" />
									</div>
									<div class="col-xs-6">
										<label>County</label>
										<input type="text" class="form-control" value="{{ auth()->user()->county }}" name="county"/>
									</div>
									
								</div>
								<div class="row">
									
									<div class="col-xs-6">
										<label>Phone *</label>
										<input type="text" class="form-control" value="{{ auth()->user()->phone }}" name="phone" required="" />
									</div>
								</div>
								<label>Email address *</label>
								<input type="text" class="form-control" name="email-address" value="{{ auth()->user()->email }}" required="" />
								<!--<div class="form-checkbox mt-8">
									<input type="checkbox" class="custom-checkbox" id="create-account"
										name="create-account">
									<label class="form-control-label" for="create-account">Create an account?</label>
								</div>-->
								<div class="form-checkbox mb-6">
									<input type="checkbox" class="custom-checkbox" id="different-address"
										name="different-address">
									<label class="form-control-label" for="different-address">Ship to a different
										address?</label>
										<div class="hideship">
										<label style="padding-right:5px;">Postcode: </label> 
                <div id="postcode_lookup_fieldship"></div>
                <label for="sAddressLine1">Address line 1 * :</label>
                <input type="text" id="shipline1" name="shipline1" class="form-control" placeholder="property name/no. and street name" class="" value="{{ Auth::user()->shipline1 }}" maxlength="25">
                <label for="sAddressLine2">Address line 2 :</label>
                <input type="text" id="shipline2" name="shipline2" class="form-control" placeholder="further address details (optional)" class="" value="{{ Auth::user()->shipline2 }}" maxlength="25">
                <label for="sAddressLine2">Address line 3 :</label>
                <input type="text" id="shipline3" name="shipline3" class="form-control" placeholder="further address details (optional)" class="" value="{{ Auth::user()->shipline3 }}" maxlength="25">
                <label for="sCity">Town / City * :</label>
                <input type="text" id="shipposttown" name="shipcity" class="form-control" placeholder="name of town or city" class="" value="{{ Auth::user()->shipcity }}" maxlength="25">
                <label for="sAddressLine3">County :</label>
                <input id="shipcounty" type="text" class="form-control" name="shipcounty" placeholder="name of county (optional)" class="" value="{{ Auth::user()->shipcounty }}" maxlength="25">
                <label for="sAddressLine3">Postcode :</label>
                <input id="shippostcode" type="text" class="form-control" name="shippostcode" placeholder="Postcode" class="" value="{{ Auth::user()->shippostcode }}" maxlength="25">
                <label for="sCountry">Country :</label>
                <input type="text" id="shipcountry" name="shipcountry" class="form-control" value="United Kingdom" readonly="">


										</div>

								</div>
								<h3 class="title title-simple text-left mb-3">Additional information</h3>
								<label>Order Notes (optional)</label>
								<textarea class="form-control" name="notes" cols="30" rows="6"
									placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
							</div>
							<aside class="col-lg-5 sticky-sidebar-wrapper">
								<div class="sticky-sidebar" data-sticky-options="{'bottom': 50}">
									<h3 class="title title-simple text-left">Your Order</h3>
									<div class="summary mb-4">
										<table class="order-table">
											<thead>
												<tr>
													<th>Product</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php $i=0;?> 
                                            @foreach($cartCollection as $item)
											<?php $i++; ?>
												<tr>
													<td class="product-name">{{$i}}) {{ $item->name }} <strong class="product-quantity">×&nbsp;{{$item->quantity}}</strong>
												<?php if($item->attributes->cpu_id || $item->attributes->ram_id || $item->attributes->monitor_id || $item->attributes->ssd_id){?>
													</br>{{ $item->name }} <strong class="product-quantity">×&nbsp;{{$item->quantity}}</strong>
													</br><strong>Add Ons</strong></br>
													
												<?php $cprs=App\Product::where('id',$item->attributes->cpu_id)->first();?>
													{{$cprs['product_name']}}</br>
													<?php $rprs=App\Product::where('id',$item->attributes->ram_id)->first();?>
													{{$rprs['product_name']}}</br>
													<?php $mprs=App\Product::where('id',$item->attributes->monitor_id)->first();?>
													{{$mprs['product_name']}}	</br>												
													<?php $sprs=App\Product::where('id',$item->attributes->ssd_id)->first();?>
													{{$sprs['product_name']}}
<?php }?>
													</td>
													<td class="product-total">{{$settings->currency}}{{ \Cart::get($item->id)->getPriceSum() }}
													<?php if($item->attributes->cpu_id || $item->attributes->ram_id || $item->attributes->monitor_id || $item->attributes->ssd_id){?>
														</br><?php $pprs=App\Product::where('id',$item->id)->first();?>
												{{$settings->currency}}{{$pprs['price']}}</br>
													</br><strong>Add Ons Price</strong></br>
												<?php $cprs=App\Product::where('id',$item->attributes->cpu_id)->first();?>
												{{$settings->currency}}{{$cprs['price']}}</br>
													<?php $rprs=App\Product::where('id',$item->attributes->ram_id)->first();?>
													{{$settings->currency}}{{$rprs['price']}}</br>
													<?php $mprs=App\Product::where('id',$item->attributes->monitor_id)->first();?>
													{{$settings->currency}}{{$mprs['price']}}	</br>												
													<?php $sprs=App\Product::where('id',$item->attributes->ssd_id)->first();?>
													{{$settings->currency}}{{$sprs['price']}}
<?php }?>
													
													</td>
												</tr>
											@endforeach
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Subtotal</h4>
													</td>
													<td class="summary-subtotal-price">{{$settings->currency}} {{ \Cart::getTotal() }}
													</td>												
												</tr>
											
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Total</h4>
													</td>
													<td>
														<p class="summary-total-price">{{$settings->currency}} {{ \Cart::getTotal() }}</p>
													</td>												
												</tr>
											</tbody>
										</table>
										<div>
											<h4 class="summary-subtitle">Payment Methods</h4>
											<div class="row">
									<div class="col-xs-6">
									<input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="Cash On Delivery">
  <label class="form-check-label" for="flexRadioDefault1">
    Cash On Delivery
  </label>
									</div></br>
									<div class="col-xs-6">
									<input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2" value="Paypal">
  <label class="form-check-label" for="flexRadioDefault2">
    PayPal
  </label>
									</div>
								</div>
											
											
										</div>
										<p class="checkout-info">Your personal data will used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
										<button type="submit" class="btn btn-dark btn-order">Place Order</button>
									</div>
								</div>
							</aside>
						</div>
					</form>
				</div>
			</div>
        </main>

		<script>
				$('.hideship').hide(200);

	 $('.custom-checkbox').on('click', function () {
		if($('.custom-checkbox').is(":checked"))   
            $(".hideship").show();
        else
            $(".hideship").hide();

	 });

$('#postcode_lookup_fieldship').setupPostcodeLookup({
	// Set your API key
	api_key: 'ak_kmp3l34o5xeIvxrKQZS9lgN4QMUqJ',
	// Pass in CSS selectors pointing to your input fields to pipe the results
	output_fields: {
		line_1: '#shipline1',
		line_2: '#shipline2',
		line_3: '#shipline3',
		post_town: '#shipposttown',
		postcode: '#shippostcode'
	}
});
    
</script>  

@endsection