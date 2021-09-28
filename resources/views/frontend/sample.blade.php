@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">

<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
    <!-- Content Wrapper --> 
    <main class="main mt-lg-4">
            <div class="page-content">
                <section class="intro-section container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 d-lg-block d-none">

                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-8 mb-4">
                            <div class="intro-slider animation-slider owl-carousel owl-theme owl-dot-inner row cols-1 gutter-no"
                                data-owl-options="{
                                'items': 1,
                                'dots': true,
                                'loop': true,
                                'autoplay': true
                            }">
                                <div class="intro-slide1 banner banner-fixed" style="background-color: #e8e8ea">
                                    <figure>
                                        <img src="{{ asset('front/images/demos/demo22/slides/1.jpg')}}" alt="banner" width="580"
                                            height="460" />
                                    </figure>
                                    <div
                                        class="banner-content x-50 y-50 text-center d-flex flex-column align-items-center">
                                        <h4 class="banner-subtitle ls-l text-grey font-weight-normal slide-animate"
                                            data-animation-options="{'name': 'fadeInUp', 'duration': '1.5s'}">Financing
                                            Offer</h4>
                                        <h3 class="banner-title ls-l slide-animate"
                                            data-animation-options="{'name': 'fadeInUp', 'duration': '1.5s','delay': '.3s'}">
                                            Camera, Lens and Tablet</h3>
                                        <p class="font-weight-semi-bold text-grey slide-animate"
                                            data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s','delay': '.3s'}">
                                            Discount</p>
                                        <div class="banner-price-info text-uppercase text-primary font-weight-bold flex-1 slide-animate"
                                            data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1.2s','delay': '.8s'}">
                                            40% OFF</div>
                                        <a href="#" class="btn btn-outline btn-dark slide-animate"
                                            data-animation-options="{'name': 'fadeIn', 'duration': '1.2s','delay': '1s'}">Shop
                                            now</a>
                                    </div>
                                </div>
                                <div class="intro-slide2 banner banner-fixed" style="background-color: #7a7675">
                                    <figure>
                                        <img src="{{ asset('front/images/demos/demo22/slides/2.jpg')}}" alt="banner" width="580"
                                            height="460" />
                                    </figure>
                                    <div class="banner-content x-50 y-50 text-center">
                                        <div class="slide-animate"
                                            data-animation-options="{'name': 'blurIn', 'duration': '1.5s'}">
                                            <h4
                                                class="banner-subtitle mb-1 ls-l text-white text-uppercase font-weight-normal">
                                                Flash Sales</h4>
                                            <h3 class="banner-title ls-l text-white text-uppercase font-weight-bold">Up
                                                to 70% Discount</h3>
                                            <p class="ls-l mb-5 text-white font-primary">Extra Off Everything online</p>
                                            <a href="#" class="btn btn-outline btn-white">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 mb-4">
                            <div class="intro-banner banner banner-fixed overlay-dark">
                                <figure>
                                    <img class="x-50" src="{{ asset('front/images/demos/demo22/banner/drone.png')}}" alt="product"
                                        width="346" height="193" />
                                </figure>
                                <div class="banner-content x-50 y-50 text-center d-flex flex-column align-items-center">
                                    <p class="text-white ls-normal font-primary text-uppercase flex-1 lh-1 appear-animate"
                                        data-animation-options="{
                                        'name': 'maskUp'
                                    }">Through <br /><span class="d-inline-block mt-1">Donald Birthday</span></p>
                                    <h4 class="banner-subtitle mb-1 ls-normal text-uppercase font-weight-normal appear-animate"
                                        data-animation-options="{
                                        'name': 'fadeInDownShorter',
                                        'delay': '.3s'
                                    }">Up to 70% Off</h4>
                                    <h3 class="banner-title ls-m appear-animate" data-animation-options="{
                                        'name': 'fadeInDownShorter',
                                        'delay': '.2s'
                                    }">Portable Drone SD9</h3>
                                    <a href="#" class="btn btn-dark btn-md appear-animate" data-animation-options="{
                                        'name': 'fadeInDownShorter'
                                    }">Buy drone</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                             
                            
               
                <section class="grey-section pt-10 pb-10">
                    <div class="container pt-6 pb-6">
                        <div class="product-wrapper row gutter-no appear-animate">
                           
                            <div class="col-xl-12 overflow-hidden">
                                <div class="row gutter-no line-grid">
                                    
                                @foreach ($products as $key => $product)    

                               
                                    <div class="col-md-3 col-6">
                                        <div class="product text-center appear-animate">
                                            <figure class="product-media">
                                                <a href="{{route('single.singleProduct', $product->id)}}">
                                                    <img src="<?php echo asset('/').'uploads/'.$product->img_name ?>" alt="product"
                                                        width="220" height="206">
                                                </a>
                                                <div class="product-action-vertical">
                                               
                                       
												  <?php if($product->quantity==0){?>
													
												  <?php }else{?>
													
                                                <a href="#" class="btn-product-icon btn-cart user_dialog" data-id="{{$product->id}}"  data-name="{{$product->product_name}}"  data-price="{{$product->price}}"  data-quantity="1"
                                                    title="Add to cart"><i
                                                            class="d-icon-bag"></i></a>
													
												  <?php }?>
                
												
                                                <a href="#" data-id="{{$product->id}}" class="comp btn-product-icon btn-wishlist"
                                                        title="Add to Compare"><i class="d-icon-random"></i></a>
												
                                                   
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" data-id="{{$product->id}}" data-details="{{$product->details}}" data-currency="{{$settings->currency}}" data-url="{{asset('/uploads')}}" data-image="{{ $product->img_name }}" data-price="{{$product->price}}" data-quantity=1 data-product_name="{{$product->title}}" class="btn-product btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{route('single.singleProduct', $product->id)}}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <ins class="new-price">{{$settings->currency}}{{ $product->price }}</ins><!--<del
                                                        class="old-price">{{$settings->currency}}{{ $product->price }}</del>-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>
                            
                        
                </section>
                <section class="service-list container appear-animate">
                    <div class="owl-carousel owl-theme owl-middle row cols-lg-4 cols-md-3 cols-sm-2 cols-2"
                        data-owl-options="{
                        'items': 4,
                        'margin': 20,
                        'dots': false,
                        'autoplay': true,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '576': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            }
                        }
                    }">
                        <div class="icon-box icon-box-side appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter'
                        }">
                            <i class="icon-box-icon d-icon-truck" style="font-size: 4rem;"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">FREE shipping &amp; Returns</h4>
                                <p>All orders over $99 or more than</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.3s'
                        }">
                            <i class="icon-box-icon d-icon-headphone"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Customer support</h4>
                                <p>Call or email us 24/7, 30 days</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.3s'
                        }">
                            <i class="icon-box-icon d-icon-secure"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Secure payment</h4>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side appear-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter',
                            'delay': '.4s'
                        }">
                            <i class="icon-box-icon d-icon-money"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Money Back guarantee</h4>
                                <p>Any back within 30 days</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                       
                    
                               
                           
                            
            </div>
        </main>

	<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('frontend/js/velocity.min.js') }}"></script>





    <script>
	
$(document).on("click", ".user_dialog", function () {


var pid = $(this).data('id');
 var name=$(this).data('name');
 var price = $(this).data('price');
 var quantity=$(this).data('quantity');


var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.add')}}",
   data:{pid:pid,name:name,price:price,quantity:quantity},

   success:function(data){
	Swal.fire({
        text: 'Product Added',
		type: 'success',
		timer: 2000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  
		$('#cart_value').text(data.cartCount);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);

        window.location.reload();

	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
});
 event.preventDefault();


});


   
        
	function myFunc(form) {

var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.add')}}",
   data:$(form).serializeArray(),

   success:function(data){
	Swal.fire({
        text: 'Product Added',
		type: 'success',
		timer: 4000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  
		$('#cart_value').text(data.cartCount);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);

        window.location.reload();

	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });
 e.preventDefault();


}


</script>
<style>
	.user_dialog{
		cursor:pointer;
	}
	input{
		border:none;
	}
	a:focus { outline: none; }
	.proimage{
		width:300px;
		height:300px;
	}
	.slider-box {width: 90%; margin: 25px auto}
label, input {border: none; display: inline-block; margin-right: -4px; vertical-align: top; width: 30%}
input {width: 70%}
.slider {margin: 25px 0}
	</style>
	
    
@endsection