@extends('frontend.layouts.app-page')

@section('title', 'Product')

@section('content')
<?php 
		$settings=App\Settings::where('id',1)->first();


                ?>
                <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">

		<main class="main mt-2">
			<div class="page-content mb-10">
				<div class="container">
					<div class="product-navigation">
						<ul class="breadcrumb breadcrumb-lg">
							<li><a href="{{ url('/') }}"><i class="d-icon-home"></i></a></li>
							<li><a href="#" class="active">Products</a></li>
							<li>Detail</li>
						</ul>
						<!--<ul class="product-nav">
							<li class="product-nav-prev">
								<a href="#">
									<i class="d-icon-arrow-left"></i> Prev
									<span class="product-nav-popup">
										<img src="images/product/product-thumb-prev.jpg" alt="product thumbnail"
											width="110" height="123">
										<span class="product-name">Sed egtas Dnte Comfort</span>
									</span>
								</a>
							</li>
							<li class="product-nav-next">
								<a href="#">
									Next <i class="d-icon-arrow-right"></i>
									<span class="product-nav-popup">
										<img src="images/product/product-thumb-next.jpg" alt="product thumbnail"
											width="110" height="123">
										<span class="product-name">Sed egtas Dnte Comfort</span>
									</span>
								</a>
							</li>
						</ul>-->
					</div>
					<div class="row">
						<aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
							<div class="sidebar-overlay">
								<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
							</div>
							<a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
							<div class="sidebar-content">
								<div class="sticky-sidebar">
									<div class="service-list mb-4">
										<div class="icon-box icon-box-side icon-box3">
											<span class="icon-box-icon">
												<i class="d-icon-secure"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Secured Payment</h4>
												<p>We ensure secure payment!</p>
											</div>
										</div>
										<div class="icon-box icon-box-side icon-box1">
											<span class="icon-box-icon">
												<i class="d-icon-truck"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Free Shipping</h4>
												<p>On all US orders above $99</p>
											</div>
										</div>
										<div class="icon-box icon-box-side icon-box2">
											<span class="icon-box-icon">
												<i class="d-icon-money"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Money Back guarantee</h4>
												<p>Any back within 30 days</p>
											</div>
										</div>
									</div>


									<div class="widget widget-products">
										<h4 class="widget-title">Our Featured</h4>
										<div class="widget-body">
											<div class="owl-carousel owl-nav-top" data-owl-options="{
												'items': 1,
												'loop': true,
												'nav': true,
												'dots': false,
'margin': 20											}">
@foreach ($newproducts as  $pro)    

												<div class="products-col">
													<div class="product product-list-sm">
														<figure class="product-media">
															<a href="{{route('single.singleProduct', $pro->id)}}">
																<img src="<?php echo asset('/').'uploads/'.$pro->img_name ?>" alt="product"
																	width="100" height="100">
															</a>
														</figure>
														<div class="product-details">
															<h3 class="product-name">
																<a href="{{route('single.singleProduct', $pro->id)}}">{{ $pro->title }}</a>
															</h3>
															<div class="product-price">
																<span class="price">{{$settings->currency}}{{ $pro->price }}</span>
															</div>
															<div class="ratings-container">
																<div class="ratings-full">
																	<span class="ratings" style="width:100%"></span>
																	<span class="tooltiptext tooltip-top"></span>
																</div>
															</div>
														</div>
													</div>
													@endforeach
												
											</div>
										</div>
									</div><!-- End Widget Products -->
								</div>
							</div>
						</aside>
						<div class="col-lg-9">
							<div class="product product-single row mb-4">
								<div class="col-md-6">
									<div class="product-gallery">
										<div
											class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
											<figure class="product-image">
												<img src="<?php echo asset('/').'uploads/'.$product->img_name ?>"
													data-zoom-image="<?php echo asset('/').'uploads/zoom/'.$product->img_name ?>"
													alt="Blue Pinafore Denim Dress" width="800" height="900">
											</figure>
											<?php 
				$gallery=$product->galleryimages;
				$gall=explode(',',$gallery);
				?>
				@foreach($gall as $gal)
				@if(!empty($gal))
							<div class="product-image">
													<img src="<?php echo asset('/').'uploads/'.$gal; ?>"
														alt="product thumbnail" width="109" height="122">
                                                </div>
                                                @endif
                                                @endforeach
										
										
										</div>
										<div class="product-thumbs-wrap">
											<div class="product-thumbs">
											<figure class="product-thumb">
												<img src="<?php echo asset('/').'uploads/'.$product->img_name ?>"
													data-zoom-image="<?php echo asset('/').'uploads/zoom/'.$product->img_name ?>"
													alt="Blue Pinafore Denim Dress" width="800" height="900">
											</figure>

                        
				@foreach($galleries as $gal)
				@if(!empty($gal))

												<div class="product-thumb">
													<img src="<?php echo asset('/').'uploads/'.$gal->imgname; ?>"
														alt="product thumbnail" width="109" height="122">
                                                </div>
                                                @endif
                                                @endforeach
											
											</div>
											<button class="thumb-up disabled"><i
													class="fas fa-chevron-left"></i></button>
											<button class="thumb-down disabled"><i
													class="fas fa-chevron-right"></i></button>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="product-details">
                                        <h1 class="product-name">{{ $product->product_name }}</h1>
                                        <div class="product_name">{{ $product->title }}</div>
										<?php
										$category=App\Category::where('id',$product->category_id)->first();

										$brand=App\Brand::where('id',$product->brand_id)->first();

										?>
										<div class="product-meta">
											CATEGORY: <span class="product-sku">{{$category->category_name}}</span>
											BRAND: <span class="product-brand">{{$brand->brand_name}}</span>
										</div>
										<div class="product-price">{{ $settings->currency }}<span id="oldprice">{{ $product->price }}</span><span id="productprice"></span></div>
										<input type="hidden" class="oldprice" value="{{ $product->price }}" />
										<p class="product-short-desc">{{ $product->short_details }}</p>
										
										
										<hr class="product-divider">

										<div class="product-form product-qty">
										<div class="product-form-group">
										<form class="sendform">
                                        {{ csrf_field() }}
										<?php 
				$pros=App\PCBuilder::where('product',$product->id)->first();
				if($pros){
				$cpuids=$pros->cpu_id;
       
				$rams=$pros->memory_id;
				$monitors=$pros->monitor_id;
				//$hdds=$pros->hdd_id;
				$disks=$pros->ssd_id;
			

		?>
				  @if($cpuids)
		
										<label>Processor:</label>
                                        <select required name="processor" id="product" class="form-control sel">
        <option value="0">Select an option</option>
		@foreach($cpuids as $cid)
		<?php 	$prod=App\Product::where('id',$cid)->first();
 ?>
        <option   value="{{$cid}}" data-price="{{$prod->price}}">{{$prod->product_name}}
		</option>

		@endforeach
      </select>
	  @endif
	  @if($rams)

	  <label>Ram:</label>
	  
 <select  name="ram" id="ram" class="form-control sel1">
        <option value="0">Select an option</option>
		@foreach($rams as $ram)
		<?php 	$prod1=App\Product::where('id',$ram)->first();?>
        <option  data-price="{{$prod1->price}}" value="{{$ram}}">{{$prod1->product_name}}
 </option>

		@endforeach
      </select>
	  @endif
	  @if($monitors)
	  <label>Monitor:</label>

 <select  name="monitor" id="monitor" class="form-control sel2">
        <option value="0">Select an option</option>
		@foreach($monitors as $moni)
		<?php 	$prod2=App\Product::where('id',$moni)->first();?>
        <option data-price="{{$prod2->price}}" value="{{$moni}}">{{$prod2->product_name}}
 </option>

		@endforeach
      </select>
	  @endif
	  @if($disks)
	  <label>Disk</label>

 <select  name="ssd" id="ssd" class="form-control sel3">
        <option value="0">Select Disk</option>
		@foreach($disks as $hdd)
		<?php 	$prod3=App\Product::where('id',$hdd)->first();?>
        <option  data-price="{{$prod3->price}}" value="{{$hdd}}">{{$prod3->product_name}}
 </option>

		@endforeach
	  </select>
	 
	 
@endif
				<?php }?>
											<label style="margin-top:10px;">QTY:</label>
                                           
	
                                                        
                                            <input type="hidden" value="{{ $product->id }}" id="id" name="pid">
                                        <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
					<div style="margin-top:10px; margin-bottom:10px;" class="input-group">
						<button type="button" class="quantity-minus d-icon-minus"></button>
						<input class="quantity form-control" name="quantity" type="number" min="1" max="1000000">
						<button  type="button" class="quantity-plus d-icon-plus"></button>
					</div>
					<div style="width:100%;">
					    	<?php if($product->quantity==0){?>
						<button type="button" style="float:left;padding:10px;">Product Not Available</button>
									
													<?php }else{?>
					<button type="button" style="float:left;" class="btn-product  btn-cart" onclick="myFunc(this.form)"><i class="d-icon-bag"></i>Add To Cart</button>
				<button style="float:right;margin-left:10px;height:45px;font-size:14px;padding:10px;" type="button" class="btn-product btn-primary" onclick="mybuyFunc(this.form)"><i class="d-icon-cart"></i>Buy Now</button>
                   <?php } ?>
                    </div>
                                            </form>

											</div>
										</div>

										<hr class="product-divider mb-3">

										<div class="product-footer">
											<div class="social-links mr-2">
												<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
												<a href="#" class="social-link social-twitter fab fa-twitter"></a>
												<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
											</div>
											<div class="product-action">
												<!--<a href="#" class="btn-product btn-wishlist"><i
														class="d-icon-heart"></i>Add To Wishlist</a>-->
												<span class="divider"></span>
												
                                                    <form class="compform">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
												<button type="button" data-id="{{$product->id}}"  class="comp btn-product btn-primary btn-compare pointer" class="tooltip-test" title="add to cart">
                                                <i class="d-icon-random"></i> Add to Compare
                                                </button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab tab-nav-simple product-tabs mb-4">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" href="#product-tab-description">Description</a>
									</li>
									<!--<li class="nav-item">
										<a class="nav-link" href="#product-tab-additional">Additional</a>
									</li>-->
									<li class="nav-item">
										<a class="nav-link" href="#product-tab-shipping-returns">Shipping &amp;
											Returns</a>
									</li>
								
								</ul>
								<div class="tab-content">
									<div class="tab-pane active in" id="product-tab-description">
										<p>{{ $product->details }}</p>
										
										
									</div>

									<div class="tab-pane " id="product-tab-shipping-returns">
										<h6 class="mb-2">Free Shipping</h6>
										<p class="mb-0">We deliver to over 100 countries around the world. For full
											details of the delivery options we offer, please view our <a href="#"
												class="text-primary">Delivery information</a><br />We hope you’ll love
											every purchase, but if you ever need to return an item you can do so within
											a month of receipt. For full details of how to make a return, please view
											our <br /><a href="#" class="text-primary">Returns information</a></p>
									</div>
									

										
													
									</div>
                                            </div>
                                            </div>
						</div>
					</div>
				</div>
			</div>
        </main>
       <style>
	   .btn-product{
		   font-size:14px;
		   height:20px;
		   cursor:pointer;
	   }
	   </style>
	<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

$(document).ready(function () {

$('.sel').on('change', function (e) {
var selectVal = $(".sel option:selected").attr("data-price");
var sls= $(".sel").prop("option:selected", false);
var price=$('#price').val();
if(selectVal){
var newprice=parseFloat(selectVal)+parseFloat(price);
$('#price').val(newprice);
$('#oldprice').hide(200);
$('#productprice').text(newprice);
}
else if(sls){

	var oldprice=$('.oldprice').val();
	$('#oldprice').hide(200);

	$('#productprice').text(oldprice);
	$('#price').val(oldprice);

}
else{
	$('#oldprice').show(200);
}

});

$('.sel1').on('change', function (e) {
var selectVal1 = $(".sel1 option:selected").attr("data-price");
var sls= $(".sel1").prop("option:selected", false);

var price=$('#price').val();
if(selectVal1){
var newprice=parseFloat(selectVal1)+parseFloat(price);
$('#price').val(newprice);
$('#oldprice').hide(200);
$('#productprice').text(newprice);
}
else if(sls){

	var oldprice=$('.oldprice').val();
	$('#oldprice').hide(200);

	$('#productprice').text(oldprice);
	$('#price').val(oldprice);

}
else{
	$('#oldprice').show(200);
}
});

$('.sel2').on('change', function (e) {
var selectVal2 = $(".sel2 option:selected").attr("data-price");
var sls= $(".sel2").prop("option:selected", false);

var price=$('#price').val();
if(selectVal2){
var newprice=parseFloat(selectVal2)+parseFloat(price);
$('#price').val(newprice);
$('#oldprice').hide(200);
$('#productprice').text(newprice);
}
else if(sls){

	var oldprice=$('.oldprice').val();
	$('#oldprice').hide(200);

	$('#productprice').text(oldprice);
	$('#price').val(oldprice);

}
else{
	$('#oldprice').show(200);
}

});

$('.sel3').on('change', function (e) {
var selectVal3 = $(".sel3 option:selected").attr("data-price");
var sls= $(".sel3").prop("option:selected", false);

var price=$('#price').val();
if(selectVal3){
var newprice=parseFloat(selectVal3)+parseFloat(price);
$('#price').val(newprice);
$('#oldprice').hide(200);
$('#productprice').text(newprice);
}
else if(sls){

	var oldprice=$('.oldprice').val();
	$('#oldprice').hide(200);

	$('#productprice').text(oldprice);
	$('#price').val(oldprice);

}
else{
	$('#oldprice').show(200);
}
});


});


	function mybuyFunc(form) {
var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.add')}}",
   data:$(form).serializeArray(),

   success:function(data){
	
      $('#cart_value').text(data.cartCount);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);
        $('#cart_price').text(data.total);
		$('#total').hide(200);
		$('#cart_price').show(300);

        
        $(".cart-dropdown .dropdown-box").load(" .cart-dropdown .dropdown-box"); 
		window.location.href = 'http://pcforall.iciclecorp.space/checkout';
  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });
 e.preventDefault();


}

</script>
        
        @endsection


@section('scripts')


@endsection