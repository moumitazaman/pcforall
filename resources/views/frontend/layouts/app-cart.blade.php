<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>PCforAll @yield('title')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="PCForALL eCommerce site">
    <meta name="author" content="ICICLE">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('front/images/icons/favicon.png')}}">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


<link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/animate/animate.min.css')}}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/owl-carousel/owl.carousel.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css')}}">

	<!-- Main CSS File -->
	
	
	<style>
	.js-cookies-consent{
		position:absolute;
		top:0px;
		padding:10px;
		text-align:center;
		width:100%;
		z-index:9999;
		background-color:#eeeeee;
	}
	
	</style>
</head>

<body>
    

	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
			<div class="bounce4"></div>
		</div>
	</div>
	<div class="page-wrapper">
		<header class="header">
			<div class="header-top">
				<div class="container">
					<div class="header-left">
					</div>
					<div class="header-right">
						
						<!-- End DropDown Menu -->
						
						<!-- End DropDown Menu -->
						<div class="dropdown dropdown-expanded d-lg-show">
							
						</div>
						<!-- End DropDownExpanded Menu -->
					</div>
				</div>
			</div>
			<!-- End HeaderTop -->
			<div class="header-middle sticky-header fix-top sticky-content">
				<div class="container">
					<div class="header-left">
						<a href="#" class="mobile-menu-toggle">
							<i class="d-icon-bars2"></i>
						</a>
					</div>
					<div class="header-center">
						<a href="{{ url('/') }}" class="logo">
							<img src="{{ asset('frontend/images/pclogo.png')}}" alt="logo" width="120" height="30" />
						</a>
						<!-- End Logo -->
						<nav class="main-nav">
							<ul class="menu">
								<li class="active">
									<a href="{{ url('/') }}">Home</a>
								</li>
								<li>
                                        <a href="{{url('/get/all-products/asc')}}">All Products</a>
                                    </li>
								 <li class="d-xl-show">
                                        <a href="{{url('/repairs')}}">Repair</a>
                                    </li>
                                     <li class="d-xl-show">
                                        <a href="{{url('/about-us')}}">About Us</a>
                                    </li>
                                   
							<li>
							<a href="{{url('/contact-us')}}">Contact Us</a>
							</li>
							
							 
							</ul>
						</nav>
						<span class="divider"></span>
						<!-- End Divider -->
						<div class="header-search hs-toggle">
							<a href="#" class="search-toggle">
								<i class="d-icon-search"></i>
							</a>
							<form action="{{route('show.search')}}" method="POST" class="input-wrapper">
                            {{ csrf_field() }}
															<input type="text" class="form-control" name="keyword" autocomplete="off"
									placeholder="Search your keyword..." required />
								<button class="btn btn-search" type="submit">
									<i class="d-icon-search"></i>
								</button>
							</form>
						</div>
						<!-- End Header Search -->
					</div>
					
                                  
                    <div class="header-right">
                    @if (Route::has('login'))

                            
@auth
<a  href="{{url('/dashboard')}}">

<i class="d-icon-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

</a>
<div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
								@else
                               <a style="margin-right: 1.5rem;display: flex;
    align-items: center;font-size: 1.2rem;
    font-weight: 700;line-height: 1.6;" href="{{ url('/login') }}">
                            <i style="margin-top: -2px;
    font-size: 1.7rem;
    line-height: 1;" class="d-icon-user"></i>
                            <span style="cursor: pointer;
    font-weight: inherit;
    text-transform: uppercase; margin-left: .9rem;"> Login</span>
                        </a>
								@endauth
								@endif



                        
                        <!-- End Login -->
                        <span class="divider"></span>
                        <!-- End Divider -->
                        
						<div class="header-search hs-toggle mobile-search">
							<a href="#" class="search-toggle">
								<i class="d-icon-search"></i>
							</a>
							<form action="{{route('show.search')}}" method="POST" class="header_search_form clearfix input-wrapper">
                            {{ csrf_field() }}
															<input type="text" class="form-control" name="keyword" autocomplete="off"
									placeholder="Search your keyword..." required />
								<button class="btn btn-search" type="submit">
									<i class="d-icon-search"></i>
								</button>
							</form>
						</div>
						<!-- End of Header Search -->
					</div>
				</div>

			</div>
        </header>
        
        @section('content')
        
        @show

        <footer class="footer">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-lg-3">
							
							<!-- End FooterLogo -->
						</div>
						<div class="col-lg-9">
							<!--<div class="widget widget-newsletter form-wrapper form-wrapper-inline">
								<div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
									<h4 class="widget-title">Subscribe to our Newsletter</h4>
									<p>Get all the latest information on Events, Sales and Offers.</p>
								</div>
								<form action="#" class="input-wrapper input-wrapper-inline">
									<input type="email" class="form-control" name="email" id="email"
										placeholder="Email address here..." required />
									<button class="btn btn-primary btn-md ml-2" type="submit">subscribe<i
											class="d-icon-arrow-right"></i></button>
								</form>
							</div>-->
							<!-- End Newsletter -->
						</div>
					</div>
				</div>
				<!-- End FooterTop -->
				<div class="footer-middle">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="widget">
								<h4 class="widget-title">Contact Info</h4>
								<ul class="widget-body">
								<li> 
                                        <label>Phone:</label>
                                        <a href="#">{{$settings->phone}}</a>
                                    </li>
                                    <li>
                                        <label>Email:</label>
                                        <a href="#">{{$settings->email}}</a>
                                    </li>
                                    <li>
                                        <label>Address:</label>
                                        <a href="#">{{$settings->address}}</a>
                                    </li>
								</ul>
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="widget ml-lg-4">
								<!--<h4 class="widget-title">My Account</h4>
								<ul class="widget-body">
									<li>
										<a href="#">About Us</a>
									</li>
									<li>
										<a href="#">Order History</a>
									</li>
									<li>
										<a href="#">Returns</a>
									</li>
									<li>
										<a href="#">Custom Service</a>
									</li>
									<li>
										<a href="#">Terms &amp; Condition</a>
									</li>
								</ul>-->
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="widget ml-lg-4">
								<h4 class="widget-title">Links</h4>
								<ul class="widget-body">
									 
                                    <li>
                                        <a href="{{url('/cookies')}}">Cookies Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/policy')}}">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/terms-conditions')}}">Terms & Conditions</a>
                                    </li>
									
								</ul>
							</div>
							<!-- End Widget -->
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="widget widget-instagram">
							<div class="social-links">
							<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
							<a href="#" class="social-link social-twitter fab fa-twitter"></a>
							<a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
						</div>
								<!--<h4 class="widget-title">Instagram</h4>
								<figure class="widget-body row">
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/01.jpg')}}" alt="instagram 1" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/02.jpg')}}" alt="instagram 2" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/03.jpg')}}" alt="instagram 3" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/04.jpg')}}" alt="instagram 4" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/05.jpg')}}" alt="instagram 5" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/06.jpg')}}" alt="instagram 6" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/07.jpg')}}" alt="instagram 7" width="64" height="64" />
									</div>
									<div class="col-3">
										<img src="{{ asset('front/images/instagram/08.jpg')}}" alt="instagram 8" width="64" height="64" />
									</div>
								</figure>-->
							</div>
							<!-- End Instagram -->
						</div>
					</div>
				</div>
				<!-- End FooterMiddle -->
				<div class="footer-bottom">
					<div class="footer-left">
						<figure class="payment">
							<img src="{{ asset('front/images/payment.png')}}" alt="payment" width="159" height="29" />
						</figure>
					</div>
					<div class="footer-center">
						<p class="copyright">PC For All &copy; 2021. All Rights Reserved</p>
					</div>
					<div class="footer-right">
					<div width="159" height="29" /><a href="https://www.iciclecorporation.com" target="_blank">Site by ICICLE CORPORATION</a></div>

					</div>
				</div>
				<!-- End FooterBottom -->
			</div>
		</footer>
		<!-- End Footer -->
	</div>
	<!-- Sticky Footer -->
	<div class="sticky-footer sticky-content fix-bottom">
		
	<a href="{{ url('/') }}" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
       
        <a href="{{ url('/contact-us') }}" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Contact Us</span>
        </a>
        <a href="{{ url('/login') }}" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Login</span>
        </a>
		<a href="{{url('/cart')}}" class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Cart</span>
            </a>
		<!--<div class="dropdown cart-dropdown dir-up">
			<a href="{{url('/cart')}}" class="sticky-link active cart-toggle">
				<i class="d-icon-bag"></i>
				<span>Cart</span>
			</a>
			<div class="dropdown-box">
			
					<div class="product product-cart-header">
                                @if(\Cart::getTotalQuantity()>0)
                                <span class="product-cart-counts"><span id="cartcount">{{$cartCount}}</span><span id="cart_value"></span>
 items </span>
                @else
                <span class="product-cart-counts">0 items</span>
                @endif
                                    <span><a href="{{url('/cart')}}">View cart</a></span>
                                </div>
                                <div class="products scrollable">
                                <?php $count=1;?>
                                @foreach( $cartitems as $item)
                                <?php $count++; ?>
                                    <div class="product product-cart cg{{ $item->id}}">
                                        <div class="product-detail">
                                            <a href="{{route('single.singleProduct', $item->id)}}" class="product-name">{{ $item->name }}</a>
                                            <div class="price-box">
                                                <span class="product-quantity">{{ $item->quantity }}</span>
                                                <span class="product-price">{{ $item->price }}</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="<?php echo asset('/').'uploads/'.$item->associatedModel->img_name; ?>" alt="product" width="90"
                                                    height="90" />
                                            </a>
                                            <form class="sendid">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" class="did" name="did">
                                            <input type="hidden" size="2" value="{{$item->quantity}}" name="qty" class="qty<?php echo $count;?>">

                                            <button  type="button" data-id="{{$item->id}}" class="btn btn-link btn-close remove-item<?php echo $count;?> ">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </form>
                                        </figure>
                                    </div>
                                    @endforeach
				</div>
				<div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">{{$settings->currency}}{{ \Cart::getTotal() }}</span>
                                </div>
                                <div class="cart-action">
                                    <a href="{{url('/checkout')}}" class="btn btn-dark"><span>Checkout</span></a>
                                </div>
			</div>
		</div>-->
	</div>
	<!-- Scroll Top -->
	<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-angle-up"></i></a>

	<!-- MobileMenu -->
	<div class="mobile-menu-wrapper">
		<div class="mobile-menu-overlay">
		</div>
		<!-- End Overlay -->
		<a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
		<!-- End CloseButton -->
		<div class="mobile-menu-container scrollable">
		<form action="{{route('show.search')}}" method="POST" class="input-wrapper">
                            {{ csrf_field() }}
											<input type="text" class="form-control" name="keyword" autocomplete="off"
					placeholder="Search your keyword..." required />
				<button class="btn btn-search" type="submit">
					<i class="d-icon-search"></i>
				</button>
			</form>
			<!-- End Search Form -->
			<ul class="mobile-menu mmenu-anim">
				<li class="active">
					<a href="{{url('/')}}">Home</a>
					</li>
				<li><a href="{{url('/get/all-products/asc')}}">All Products</a>
</li>
 <li>
                                        <a href="{{url('/repairs')}}">Repair</a>
                                    </li>
                                     <li>
                                        <a href="{{url('/about-us')}}">About Us</a>
                                    </li>
				
				<li><a href="{{ url('/contact-us') }}">Contact Us </a></li>
				 
			</ul>
			<!-- End MobileMenu -->
		</div>
	</div>
	<!-- Plugins JS File -->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('front/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
   
   <script src="{{ asset('front/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!--<script src="{{ asset('front/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>-->
    <script src="{{ asset('front/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('front/js/main.js')}}"></script>
    </div>
    <script>

$('#sortv').on('change', function(){
    var ord = $(this).val();
	var id=$('#sv').val();
  
   
});
	
	$(function() {
  $("#price-range").slider({range: true, min: 0, max: 1000, values: [0, 1000], 
  slide: function(event, ui) {$("#priceRange").val("£" + ui.values[0] + " - £" + ui.values[1]);
	$( "#amount1" ).val(ui.values[ 0 ]);
        $( "#amount2" ).val(ui.values[ 1 ]);
  }
  });
  $("#priceRange").val("£" + $("#price-range").slider("values", 0) + " - £" + $("#price-range").slider("values", 1));
  
});




	function target_popup(form) {
    window.open('', 'formpopup', 'width=1200,height=700,resizeable,scrollbars');
    form.target = 'formpopup';
}

$('#cart_value').hide(200);

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
		timer: 2000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  
		$('#cart_value').text(data.cartCount);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);


	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });
 e.preventDefault();


}

   
                  
				
				


				
$(function () {
                    
                    var id = $(this).data("id");
                    
                    var fieldArray = [];
    $( ".comp" ).click(function(){
		var $this = $(this);
   var clickCounter = $this.data('clickCounter') || 0;
   // here you know how many clicks have happened before the current one

   clickCounter += 1;
   $this.data('clickCounter', clickCounter);
   
		if(clickCounter>1){
			Swal.fire({
        text: 'Already Added to Compare',
		type: 'success',
		timer: 2000,
		showCancelButton: false,
  showConfirmButton: false
        
      })

		}
		else{

			fieldArray.push($(this).data("id"));
		var compare=fieldArray.length;
		$('.compare').html(compare);
		$('#cpid').val(fieldArray);

		}
        

		
              
                      
                    });


		});
	</script>
            <script>
<?php for($i=1;$i<20;$i++){?>
$( ".increment-btn<?php echo $i;?>" ).click(function() {
    var prototal=$('.prototal<?php echo $i;?>').val()-1;
    $('.prototal<?php echo $i;?>').val(prototal);

if(prototal == 1){
Swal.fire({
    text: 'Product Out of Stock',
    type: 'error',
    timer: 3000,
    showCancelButton: false,
showConfirmButton: false
    
  })

}
else{

    var $counter = $('.qty<?php echo $i;?>');
$counter.val( parseInt($counter.val()) + 1 );
var num=$('.qty<?php echo $i;?>').val();
var price= $('.price<?php echo $i;?>').val();
var subtotal=price*num;
$('.subtotal<?php echo $i;?>').val(subtotal);

$.ajax({
 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
type:"POST",
url: "{{route('cart.update')}}",
data:$('.sendupdate<?php echo $i;?>').serializeArray(),

success:function(data){

$('.totalold').hide(300);
$('#qtyold').hide(200);

$('#qty').text(data.no);

$('.total').text(data.total);



  
},
error:function(error){
 console.log(error)
 alert("not send");
},


});

}

});


$( ".decrement-btn<?php echo $i;?>" ).click(function() {
    var $counter = $('.qty<?php echo $i;?>');
    if($counter.val()>1){
        $counter.val( parseInt($counter.val()) - 1 );
        var num=$('.qty<?php echo $i;?>').val();
var price= $('.price<?php echo $i;?>').val();
var subtotal=price*num;
$('.subtotal<?php echo $i;?>').val(subtotal);

$.ajax({
 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
type:"POST",
url: "{{route('cart.update')}}",
data:$('.sendupdate<?php echo $i;?>').serializeArray(),

success:function(data){
$('#totalold').hide(300);
$('#qtyold').hide(200);

$('#qty').text(data.no);

$('#total').text(data.total);

$(".sticky-sidebar-wrapper").load("  .sticky-sidebar-wrapper >*");


  
},
error:function(error){
 console.log(error)
 alert("not send");
},


});

    }
    else if($counter.val()==0) {
        $counter.val()=1;

    }
    else{
        $counter.val( parseInt($counter.val()));

    }
});



$( ".page-content" ).on('click','.remove-item<?php echo $i;?>',function() {

    var id = $(this).data("id");
    var quant = $('.qty<?php echo $i;?>').val();

Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Remove it!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
                    headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
                  type:"POST",
                  url: "{{ route('cart.remove')}}",
                  data:{id:id,quant:quant},
                  success:function(data){
                    $('.cg'+id).hide(200);
                    $('#qtyold').hide(200);
                    $('.totalold').hide(200);


                    $('#qty').show(300);
                    $('.total').show(300);


                    $('#qty').text(data.qty);
                    $('.total').text(data.total);

                    //window.location.reload(' .page-content');

					$(".page-content").load(" .page-content");



                  }


                  
                  
                });
                
    }

  });

});



<?php }?>

</script>
<style>
   .nodesign input{
        border:none;
        box-shadow:none;
        text-shadow:none;
        background:none !important;
    }
    .product-price .sub{
        font-weight:bold !important;

    }
	.header-right a{
		margin-right:5px;

	}
    </style>
</body>

</html>