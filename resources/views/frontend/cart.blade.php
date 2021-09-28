@extends('frontend.layouts.app-cart')

@section('title', 'Cart')

@section('content')

<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
	
		<main class="main cart">
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step active"><a href="{{url('/cart')}}">1. Shopping Cart</a></h3>
					<h3 class="title title-simple title-step"><a href="{{url('/checkout')}}">2. Checkout</a></h3>
					<h3 class="title title-simple title-step"><a href="{{url('/success')}}">3. Order Complete</a></h3>
				</div>
				<div class="container mt-8 mb-4">
					<div class="row gutter-lg">
						<div class="col-lg-8 col-md-12">
							<table class="shop-table cart-table mt-2">
								<thead>
									<tr>
										<th><span>Product</span></th>
										<th></th>
										<th><span>Price</span></th>
										<th><span>quantity</span></th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
                                <?php $count =1;?>

                                @foreach($cartCollection as $item)

                                <?php $count++;?>

									<tr class="cg{{ $item->id}} nodesign">
										<td class="product-thumbnail">
											<figure>
												<a href="{{route('single.singleProduct', $item->id)}}">
													<img src="<?php echo asset('/').'uploads/'.$item->associatedModel->img_name; ?>" width="100" height="100"
													alt="product">
                                                </a>
                                                <form class="sendid">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" class="did" name="did">
                                            <input type="hidden" size="2" value="{{$item->quantity}}" name="qty" class="qty<?php echo $count;?>">

                                    <button type="button" data-id="{{$item->id}}"  class="remove-item<?php echo $count;?> pointer btn-danger btn-sm product-remove" style="margin-right: 10px;"><i class="fa fa-times"></i></button>
                                </form>
												
											</figure>
										</td>
										<td class="product-name">
											<div class="product-name-section">
												<a href="{{route('single.singleProduct', $item->id)}}">{{ $item->name }}</a>
											</div>
											
										</td>
										<td class="product-subtotal">
											<span class="amount">{{$settings->currency}} {{$item->price}}</span>
										</td>
										<td class="product-quantity">
                                        <?php 
                            $products = App\Product::where('id',$item->id)->first();

                            $prototal=$products->quantity;
                            
                            ?>
                                <form action="{{ route('cart.update') }}" class="sendupdate<?php echo $count;?>" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">

                                        <!--<input type="number" class="quantity form-control form-control-sm" value="{{ $item->quantity }}"
                                                  name="quantity" oninput="this.value = Math.abs(this.value)" style="width: 70px; margin-right: 10px;">-->
                                                  <input type="hidden" class="rowId<?php echo $count;?>" value="{{$item->rowId}}"/>
                                                  <input type="hidden" value="{{ $prototal}}" class="prototal<?php echo $count;?>" name="prototal" disabled>

        <input type="hidden" name="proId" class="proId<?php echo $count;?>" value="{{$item->id}}"/>
        <input type="hidden" value="{{ $item->price}}" class="price<?php echo $count;?>" name="price" disabled>
											<div class="input-group">
												<button type="button" class="d-icon-minus decrement-btn<?php echo $count;?>"></button>
												<input type="text" size="2" value="{{$item->quantity}}" name="qty"  class="qty<?php echo $count;?> form-control"
               autocomplete="off"   MIN="1" MAX="30">
               
												<button type="button" data-quantity="{{$item->quantity}}"  class=" d-icon-plus increment-btn<?php echo $count;?>"></button>
                                            </div>
</form>
										</td>
										<td class="product-price">
											<span class="amount">{{$settings->currency}}  </span><input type="text" value="{{ \Cart::get($item->id)->getPriceSum() }}" class="sub subtotal<?php echo $count;?>" disabled>
										</td>
</tr>
@endforeach
								</tbody>
							</table>
							<div class="cart-actions mb-6 pt-6">
								
							</div>
						</div>
						<aside class="col-lg-4 sticky-sidebar-wrapper">
							<div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
								<div class="summary mb-4">
									<h3 class="summary-title text-left">Cart Totals</h3>
									<table class="shipping">
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Subtotal</h4>
											</td>
											<td>
												<p class="summary-subtotal-price">{{$settings->currency}}<span class="totalold"> {{ \Cart::getTotal() }}</span><span class="total"></span></p>
											</td>												
										</tr>
										<tr class="sumnary-shipping shipping-row-last">
											<td colspan="2">
												<h4 class="summary-subtitle">Shipping</h4>
												<ul>
													<li>
														<div class="custom-radio">
															<input type="radio" id="free-shipping" name="shipping" class="custom-control-input" checked>
															<label class="custom-control-label" for="free-shipping">Free
																Shipping</label>
														</div>
													</li>
													<li>
														<div class="custom-radio">
															<input type="radio" id="standard_shipping" name="shipping" class="custom-control-input">
															<label class="custom-control-label" for="standard_shipping">Standard</label>
														</div>
													</li>
													<li>
														<div class="custom-radio">
															<input type="radio" id="express_shipping" name="shipping" class="custom-control-input">
															<label class="custom-control-label" for="express_shipping">Express</label>
														</div>
													</li>
												</ul>
											</td>
										</tr>
									</table>
									<!--<div class="shipping-address pb-4">
										<label>Shipping to CA.</label>
										<div class="select-box">
											<select name="country" class="form-control">
												<option value="us" selected>United States</option>
												<option value="uk">United Kingdom</option>
												<option value="fr">France</option>
												<option value="aus">Austria</option>
											</select>
										</div>
										<div class="select-box">
											<select name="country" class="form-control">
												<option value="default" selected="selected">California</option>
											</select>
										</div>
										<input type="text" class="form-control" name="code" placeholder="Town / city" />
										<input type="text" class="form-control" name="code" placeholder="zip" />
										<a href="#" class="btn btn-md">Update totals</a>
									</div>-->
									<table>
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Total</h4>
											</td>
											<td>
												<p class="summary-total-price">{{$settings->currency}}<span class="totalold"> {{ \Cart::getTotal() }}</span><span class="total"></span></p>
											</td>												
										</tr>
									</table>
									<a href="{{ route('checkout.index') }}" class="btn btn-dark btn-checkout">Proceed to checkout</a>
								</div>
							</div>
						</aside>
					</div>
				</div>
</div>
        </main>
        <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


@endsection


@section('scripts')

@endsection