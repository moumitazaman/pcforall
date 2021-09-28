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
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/demo22.min.css')}}">
     <style>

.product-short-desc{
    content: "\a";
    white-space: pre-line;
}

.js-cookie-consent{
		position:absolute;
		top:0px;
		padding:10px;
		text-align:center;
		width:100%;
		z-index:9999;
		background-color:#fffbdb;
        border-color:#fffacc;
	}
    </style>
</head>

<body class="home">

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
                        <!--<div class="dropdown currency-dropdown">
                            <a href="#currency">USD</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">USD</a></li>
                                <li><a href="#EUR">EUR</a></li>
                            </ul>
                        </div>-->
                        <!-- End DropDown Menu -->
                        <div class="dropdown language-dropdown">
                            <!--<a href="#language"><img src="images/flags/en.png" alt="USA Flag"
                                    class="dropdown-image" />ENG</a>
                            <ul class="dropdown-box">
                                <li>
                                    <a href="#USD">
                                        <img src="images/flags/en.png" alt="USA Flag" class="dropdown-image" />ENG
                                    </a>
                                </li>
                                <li>
                                    <a href="#EUR">
                                        <img src="images/flags/fr.png" alt="France Flag" class="dropdown-image" />FRH
                                    </a>
                                </li>
                            </ul>-->
                        </div>
                        <!-- End DropDown Menu -->
                        <div class="dropdown dropdown-expanded d-lg-show">
                          <!--  <a href="#dropdown">Links</a>
                            <ul class="dropdown-box">
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>-->
                        </div>
                        <!-- End DropDownExpanded Menu -->
                    </div>
                </div>
            </div>
            <!-- End HeaderTop -->
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="{{ url('/') }}" class="logo d-none d-lg-block mr-4">
                            <img src="{{ asset('frontend/images/pclogo.png')}}" alt="logo" width="120" height="30" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="header-center">
                        <a href="{{ url('/') }}" class="logo d-lg-none">
                            <img src="{{ asset('frontend/images/pclogo.png')}}" alt="logo" width="120" height="30"/>
                        </a>
                        <!-- End Logo -->
                        <div class="header-search hs-expanded">
                            <form action="{{route('show.search')}}" method="POST" class="header_search_form clearfix input-wrapper">
                            {{ csrf_field() }}
                            <div class="select-box">
                                    <select id="category" name="category">

                                        <option value="">All Categories</option>
                                        @foreach ($categories as $key => $category)    

                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="keyword" id="search"
                                    placeholder="Search your keyword..." required="">
                                <button class="btn btn-sm btn-search"  type="submit"><i
                                        class="d-icon-search"></i></button>
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
                                
                                <form id="cpform" method="POST" action="{{route('cart.compare')}}" onsubmit="target_popup(this)">
                                        {{ csrf_field() }}
                                        <input type="hidden"  id="cpid" name="cpid">
												<button type="submit"  id="cp" class="btn pointer com btn-sm  active" class="tooltip-test" title="Compare">
												<i class="fa fa-balance-scale" aria-hidden="true"></i>
            <span class="compare"></span>
                                                </button>

												</form>


 
                        <!-- End Login -->
                        <span class="divider"></span>
                        <!-- End Divider -->
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="cart-toggle">
                                <span class="cart-label">
                                    <span class="cart-name">My Cart</span>

                                    <span class="cart-price"><span id="total">{{$settings->currency}}{{ \Cart::getTotal() }}</span><span id="cart_price"></span></span>
                                </span>
                                <i class="minicart-icon">
                                    <span class="cart-count"><span id="cartcount">{{$cartCount}}</span><span id="cart_value"></span></span>
                                </i>
                            </a>
                            <!-- End Cart Toggle -->
                            <div class="dropdown-box cartreload">
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
                                    <!-- End of Cart Product -->
                                    @endforeach
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">{{$settings->currency}}{{ \Cart::getTotal() }}</span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="{{url('/checkout')}}" class="btn btn-dark"><span>Checkout</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                        <div class="header-search hs-toggle mobile-search">
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
                        <!-- End of Header Search -->
                    </div>
                </div>
            </div>
            <!-- End HeaderMiddle -->

            <div class="header-bottom sticky-header fix-top sticky-content has-dropdown">
                <div class="container d-block">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <div class="dropdown category-dropdown menu-fixed has-border">
                                <a href="#" class="text-white text-uppercase font-weight-bold category-toggle"><i
                                        class="d-icon-bars"></i><span>shop by categories</span></a>
                                <!-- <div class="dropdown-overlay"></div> -->
                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        <li><a href="#" class="menu-title">Browse Our Categories</a></li>
                                        @foreach ($categories as $key => $category)    

                                        <li>
                                            <a href="{{ route('category.show', ['id'=>$category->id,'ord'=>'asc']) }}"><i class="d-icon-camera1"></i>{{$category->category_name}}</a>
                                        </li>
                                        
                                      @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 d-flex justify-content-between">
                            <nav class="main-nav">
                                <ul class="menu">
                                    <li class="active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    
                                    <li>
                                    <a href="{{url('/get/all-products/asc')}}">All Products</a>
                                    </li>
                                   <!-- <li>
                                        <a href="demo22-shop.html">Categories</a>
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                    <h4 class="menu-title">Variations 1</h4>
                                                    <ul>
                                                        <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                                        <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a>
                                                        </li>
                                                        <li><a href="shop-horizontal-filter.html">Horizontal Filter
                                                                1</a></li>
                                                        <li><a href="shop-navigation-filter.html">Horizontal Filter
                                                                2<span class="tip tip-hot">Hot</span></a></li>

                                                        <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                    <h4 class="menu-title">Variations 2</h4>
                                                    <ul>

                                                        <li><a href="shop-grid-3cols.html">3 Columns Mode<span
                                                                    class="tip tip-new">New</span></a></li>
                                                        <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                                        <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                                        <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                                        <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                                        <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                                        <li><a href="shop-list.html">List Mode</a></li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner1 banner banner-fixed">
                                                    <figure>
                                                        <img src="images/menu/banner-1.jpg" alt="Menu banner"
                                                            width="221" height="330" />
                                                    </figure>
                                                    <div class="banner-content y-50">
                                                        <h4 class="banner-subtitle font-weight-bold text-primary ls-m">
                                                            Sale.
                                                        </h4>
                                                        <h3 class="banner-title font-weight-bold"><span
                                                                class="text-uppercase">Up to</span>70% Off</h3>
                                                        <a href="#" class="btn btn-link btn-underline">shop now<i
                                                                class="d-icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>-->
                                  <!--  <li>
                                        <a href="demo22-product.html">Products</a>
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                    <h4 class="menu-title">Product Pages</h4>
                                                    <ul>
                                                        <li><a href="product-simple.html">Simple Product</a></li>
                                                        <li><a href="product.html">Variable Product</a></li>
                                                        <li><a href="product-sale.html">Sale Product</a></li>
                                                        <li><a href="product-featured.html">Featured &amp; On Sale</a>
                                                        </li>

                                                        <li><a href="product-left-sidebar.html">With Left Sidebar</a>
                                                        </li>
                                                        <li><a href="product-right-sidebar.html">With Right Sidebar</a>
                                                        </li>
                                                        <li><a href="product-sticky-cart.html">Add Cart Sticky<span
                                                                    class="tip tip-hot">Hot</span></a></li>
                                                        <li><a href="product-tabinside.html">Tab Inside</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                    <h4 class="menu-title">Product Layouts</h4>
                                                    <ul>
                                                        <li><a href="product-grid.html">Grid Images<span
                                                                    class="tip tip-new">New</span></a></li>
                                                        <li><a href="product-masonry.html">Masonry</a></li>
                                                        <li><a href="product-gallery.html">Gallery Type</a></li>
                                                        <li><a href="product-full.html">Full Width Layout</a></li>
                                                        <li><a href="product-sticky.html">Sticky Info</a></li>
                                                        <li><a href="product-sticky-both.html">Left &amp; Right
                                                                Sticky</a></li>
                                                        <li><a href="product-horizontal.html">Horizontal Thumb</a></li>

                                                        <li><a href="#">Build Your Own</a></li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner2 banner banner-fixed">
                                                    <figure>
                                                        <img src="images/menu/banner-2.jpg" alt="Menu banner"
                                                            width="221" height="330" />
                                                    </figure>
                                                    <div class="banner-content x-50 text-center">
                                                        <h3 class="banner-title text-white text-uppercase">Sunglasses
                                                        </h3>
                                                        <h4 class="banner-subtitle font-weight-bold text-white mb-0">
                                                            $23.00
                                                            -
                                                            $120.00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>-->
                                   <!-- <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="about-us.html">About</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="account.html">Login</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="error-404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog-classic.html">Classic</a></li>
                                            <li><a href="blog-listing.html">Listing</a></li>
                                            <li>
                                                <a href="#">Grid</a>
                                                <ul>
                                                    <li><a href="blog-grid-2col.html">Grid 2 columns</a></li>
                                                    <li><a href="blog-grid-3col.html">Grid 3 columns</a></li>
                                                    <li><a href="blog-grid-4col.html">Grid 4 columns</a></li>
                                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Masonry</a>
                                                <ul>
                                                    <li><a href="blog-masonry-2col.html">Masonry 2 columns</a></li>
                                                    <li><a href="blog-masonry-3col.html">Masonry 3 columns</a></li>
                                                    <li><a href="blog-masonry-4col.html">Masonry 4 columns</a></li>
                                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Mask</a>
                                                <ul>
                                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="post-single.html">Single Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Elements</a>
                                        <ul>
                                            <li><a href="element-products.html">Products</a></li>
                                            <li><a href="element-typography.html">Typography</a></li>
                                            <li><a href="element-titles.html">Titles</a></li>
                                            <li><a href="element-categories.html">Product Category</a></li>
                                            <li><a href="element-buttons.html">Buttons</a></li>
                                            <li><a href="element-accordions.html">Accordions</a></li>
                                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                            <li><a href="element-tabs.html">Tabs</a></li>
                                            <li><a href="element-testimonials.html">Testimonials</a></li>
                                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                            <li><a href="element-instagrams.html">Instagrams</a></li>
                                            <li><a href="element-cta.html">Call to Action</a></li>
                                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                            <li><a href="element-icons.html">Icons</a></li>
                                        </ul>
                                    </li>-->
                                     <li class="d-xl-show">
                                        <a href="{{url('/repairs')}}">Repair</a>
                                    </li>
                                     <li class="d-xl-show">
                                        <a href="{{url('/about-us')}}">About Us</a>
                                    </li>
                                    <li class="d-xl-show">
                                        <a href="{{url('/contact-us')}}">Contact Us</a>
                                    </li>
                                    
                                </ul>
                            </nav>
                            <div class="d-flex align-items-center">
                                <!--<div class="dropdown currency-dropdown mr-4">
                                    <a href="#currency">USD</a>
                                    <ul class="dropdown-box">
                                        <li><a href="#USD">USD</a></li>
                                        <li><a href="#EUR">EUR</a></li>
                                    </ul>
                                </div>-->
                                <!-- End DropDown Menu -->
                                <!--<div class="dropdown language-dropdown">
                                    <a href="#language"><img src="images/flags/en.png" alt="USA Flag"
                                            class="dropdown-image" />ENG</a>
                                    <ul class="dropdown-box">
                                        <li>
                                            <a href="#USD">
                                                <img src="images/flags/en.png" alt="USA Flag"
                                                    class="dropdown-image" />ENG
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#EUR">
                                                <img src="images/flags/fr.png" alt="France Flag"
                                                    class="dropdown-image" />FRH
                                            </a>
                                        </li>
                                    </ul>
                                </div>-->
                                <!-- End DropDown Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End HeaderBottom -->
        </header>
        


        @section('content')
        
        @show
        <!-- End Header -->

        <!-- End Main -->
        <footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-3">
                           
                            <!-- End FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                               <!-- <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
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
        <style>
        .header-right a{
		margin-right:5px;

	}
        </style>
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
            <a href="{{ url('/cart') }}" class="sticky-link cart-toggle">
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
            <input type="text" class="form-control" name="keyword" id="search"
                                    placeholder="Search your keyword..." required="">
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End Search Form -->
            <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="menu">
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
                    </div>
                    <div class="tab-pane" id="categories">
                        <ul class="mobile-menu">

                            <li><a href="#" class="menu-title">Browse Our Categories</a></li>
                          
                            @foreach ($categories as $key => $category)    

                                        <li>
                                            <a href="{{ route('category.show', ['id'=>$category->id,'ord'=>'asc']) }}"><i class="d-icon-camera1"></i>{{$category->category_name}}</a>
                                        </li>
                                        
                                      @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins JS File -->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('front/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
    <script src="{{ asset('front/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('front/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('front/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('front/js/main.js')}}"></script>
    <script>
    <?php for($i=1;$i<20;$i++){?>

	    $( ".cart-dropdown .dropdown-box" ).on('click','.remove-item<?php echo $i;?>',function() {

var id = $(this).data("id");
var quant = $('.qty<?php echo $i;?>').val();



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
                $('#totalold').hide(200);


                //$('#qty').show(300);
                //$('#total').show(300);


                $('#cart_value').text(data.qty);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);

                $('#qty').text(data.qty);
                $('#cart_price').text(data.total);
		$('#total').hide(200);
		$('#cart_price').show(300);
               
                //$(".cartreload").load(" .cartreload");

                $(".cart-dropdown .dropdown-box").load(" .cart-dropdown .dropdown-box");

              }



              
            });
            



});

<?php }?>
function Search(form) {
	var category=$(".clicked").data("category");
	
var keyword=$("#keyword").val();

$.ajax({
 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
type:"POST",
url: "{{url('get/search/asc')}}",
data:{'category':category,'keyword':keyword},

success:function(data){


	

 
  
},
error:function(error){
 console.log(error)
 alert("not send");
},


});


}
</script>

</body>

</html>