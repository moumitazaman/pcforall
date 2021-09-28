@extends('frontend.layouts.app-page')

@section('title', 'Category')

@section('content')
<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">

<main class="main">
    <div class="page-content mb-10">
        <div class="container">
            <ul class="breadcrumb breadcrumb-sm">
                <li><a href="{{ url('/') }}"><i class="d-icon-home"></i></a></li>
                <li>Shop</li>
            </ul>
            <!-- End Breadcrumb -->
            <div class="row main-content-wrap gutter-lg">
                <aside class="col-lg-4 col-xl-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay">
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    </div>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar">
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">All Categories</h3>
                                <ul class="widget-body filter-items search-ul">
								@foreach ($categories as $key => $category)    

                                    <li class="with-ul">
                                        <a href="{{ route('category.show', ['id'=>$category->id,'ord'=>'asc']) }}">{{$category->category_name}}</a>
                                        <?php
								$subcategories = App\SubCategory::where('category_id',$category->id)->where('status',1)->where('front',1)->get();
									?>
									@if($subcategories)	
                                        <ul style="display: block">
                                        @foreach ($subcategories as $key => $cat)    

                                            <li><a href="{{ route('subcategory.show', ['id'=>$cat->id,'ord'=>'asc']) }}">{{$cat->sub_category_name}}</a></li>
                                          @endforeach
                                        </ul>
                                        @endif

                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Price</h3>
                                <div class="widget-body">
                                <form  action="{{route('price.filter')}}" method="POST">
  {{ csrf_field() }}

  <input type="text" id="priceRange"  readonly value="">
  <input type="hidden" id="amount1" name="min_price" value="0">
    <input type="hidden" id="amount2" name="max_price" value="1000">
    <input type="hidden" id="category" name="category" value="{{$category_id}}" >
  <div id="price-range" class="slider"></div>
 
                                </div>
                            </div>
                            <!--<div class="widget widget-collapsible">
                                <h3 class="widget-title">Size</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="#">Small<span>(2)</span></a></li>
                                    <li><a href="#">Medium<span>(1)</span></a></li>
                                    <li><a href="#">Large<span>(9)</span></a></li>
                                    <li><a href="#">Extra Large<span>(1)</span></a></li>
                                </ul>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Color</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="#">Black<span>(2)</span></a></li>
                                    <li><a href="#">Blue<span>(1)</span></a></li>
                                    <li><a href="#">Green<span>(9)</span></a></li>
                                </ul>
                            </div>-->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Brands</h3>
                                <ul class="widget-body filter-items brandi">
                              
                                <?php $i=0;?>
                                @foreach ($brands as $key => $brand)    
<?php $i++;?>
                                <input type="checkbox" class="btn-check" name="brands[]" id="btn-check-{{$i}}" value="{{$brand->id}}" /><label class="btn-brand" for="btn-check-{{$i}}">{{$brand->brand_name}}</label>

@endforeach
<div style="margin-top:10px;">
  <input class="btn btn-default pointer" type="submit" value="Filter">
  </div>
</form>

                                </ul>
                            </div>
                        </div>
                    </div>

                </aside>
                <div class="col-lg-8 col-xl-9 main-content">
                    <div class="shop-banner banner"
                        style="background-image: url(<?php echo asset('/').'front/images/demos/demo22/banner/33.jpeg';?>); background-color: #f2f2f3;">
                        <div class="banner-content">
                            
                            <h1 class="banner-title font-weight-bold text-uppercase" style="color:#ffffff;">{{$category_name}}</h1>
                        </div>
                    </div>
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#"
                                class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary d-lg-none">Filters<i
                                    class="d-icon-arrow-right"></i></a>
                            <div class="toolbox-item toolbox-sort select-box">
                                <label>Sort By :</label>
                                <form>
								<select name="sortv" id="sortv" class="form-control">
                                <option>Select Order</option>

                                <option value="asc">Price(Ascending)</option>
                              <option value="desc">Price(Descending)</option>
                              <option value="latest">Latest</option>
                              <option value="popular">Popularity</option>



						</select>
						<input type="hidden" id="sv" value="{{$category_id}}">
                        </form>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label><span>{{$procount}}</span> products found
</label>
                              
                            </div>
                            <!--<div class="toolbox-item toolbox-layout">
                                <a href="shop-list.html" class="d-icon-mode-list btn-layout"></a>
                                <a href="shop.html" class="d-icon-mode-grid btn-layout active"></a>
                            </div>-->
                        </div>
                    </nav>
                    <div class="row cols-2 cols-sm-3 product-wrapper gutter-no split-line">
                    @foreach ($products as  $product)    

                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                <a href="{{route('single.singleProduct', $product->id)}}">
                                                    <img src="<?php echo asset('/').'uploads/'.$product->img_name ?>" alt="product"
                                                        width="220" height="206">
                                                </a>
<div class="product-action-vertical">
                                                <form class="sendform">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $product->id }}" id="id" name="pid">
                                        <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $product->img_name }}" id="img" name="img">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                       
												  <?php if($product->quantity==0){?>
													
												  <?php }else{?>
													
                                                <a href="#" class="btn-product-icon btn-cart user_dialog" data-id="{{$product->id}}"  data-name="{{$product->product_name}}"  data-price="{{$product->price}}"  data-quantity="1"
                                                    title="Add to cart"><i
                                                            class="d-icon-bag"></i></a>
													
												  <?php }?>
												</form>
                
												
                                                <a href="#" data-id="{{$product->id}}" class="comp btn-product-icon btn-wishlist"
                                                        title="Add to Compare"><i class="d-icon-random"></i></a>
												
                                                   
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" data-id="{{$product->id}}" data-details="{{$product->short_details}}" data-currency="{{$settings->currency}}" data-url="{{asset('/uploads/zoom')}}" data-image="{{ $product->img_name }}" data-price="{{$product->price}}" data-quantity=1 data-product_name="{{$product->title}}" class="btn-product btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{route('single.singleProduct', $product->id)}}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <ins class="new-price">{{$settings->currency}}{{ $product->price }}</ins>
                                                    <del
                                                        class="old-price">{{$settings->currency}}{{ $product->discount_price }}</del>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                    
                        @endforeach
                       
                    </div>
                    <!--<nav class="toolbox toolbox-pagination">
                        <p class="show-info">Showing <span>12 of 56</span> Products</p>
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <i class="d-icon-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>-->
                </div>
            </div>
        </div>
    </div>
</main>





  





	@endsection


@section('scripts')

@endsection