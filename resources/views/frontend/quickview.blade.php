<div class="product product-single row product-popup">
	<div class="col-md-6">
		<div class="product-gallery">
			<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
				<figure class="product-image">
					<img src="" class="proimage" 
						data-zoom-image="" alt=""
						width="580" height="580">
				</figure>
				
			</div>
			<div class="product-thumbs-wrap">
			<div class="product-thumbs">
					
					
					
				</div>
				<button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
				<button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="product-details scrollable">
			<h2 class="product-name"><a href="#" onclick="mylink()"><span class="product_name" ></span></a></h2>
			<!--<div class="product-meta">
				CATEGORY: <span class="product-sku">12345670</span>
				BRAND: <span class="product-brand">The Northland</span>
			</div>-->
			<div class="product-price"><span class="currency" ></span><span class="price" ></span></div>
			<div class="ratings-container">
				<!--<div class="ratings-full">
					<span class="ratings" style="width:80%"></span>
					<span class="tooltiptext tooltip-top"></span>
				</div>-->
				<!--<a href="#product-tab-reviews" class="rating-reviews">( 6 reviews )</a>-->
			</div>
			<p class="product-short-desc"><span class="details" ></span></p>
			<!--<div class="product-form product-color">
				<label>Color:</label>
				<div class="product-variations">
					<a class="color" data-src="images/demos/demo7/products/big1.jpg" href="#"
						style="background-color: #d99e76"></a>
					<a class="color" data-src="images/demos/demo7/products/2.jpg" href="#"
						style="background-color: #267497"></a>
					<a class="color" data-src="images/demos/demo7/products/3.jpg" href="#"
						style="background-color: #9a999d"></a>
					<a class="color" data-src="images/demos/demo7/products/4.jpg" href="#"
						style="background-color: #2b2b2b"></a>
				</div>
			</div>-->
			<!--<div class="product-form product-size">
				<label>Size:</label>
				<div class="product-form-group">
					<div class="product-variations">
						<a class="size" href="#">S</a>
						<a class="size" href="#">M</a>
						<a class="size" href="#">L</a>
						<a class="size" href="#">XL</a>
						<a class="size" href="#">2XL</a>
					</div>
					<a href="#" class="size-guide"><i class="d-icon-ruler"></i>Size Guide</a>
					<a href="#" class="product-variation-clean">Clean All</a>
				</div>
			</div>-->
			<!--<div class="product-variation-price">
				<span>$239.00</span>
			</div>-->

			<hr class="product-divider">
			<form class="sendform">
		
			<div class="product-form product-qty">
				<label>QTY:</label>
				<div class="product-form-group">
				<span style="display:none;">{{ csrf_field() }}</span>
                                       
                                        <input type="hidden" value="" class="proid" name="pid">
                                        <input type="hidden" value="" class="product_name" name="name">
                                        <input type="hidden" value="" class="price" name="price">
					<div class="input-group">
						<button type="button" class="quantity-minus d-icon-minus"></button>
						<input class="quantity form-control" name="quantity" type="number" min="1" max="1000000">
						<button  type="button" class="quantity-plus d-icon-plus"></button>
					</div>
					
					<button type="button" class="btn-product btn-cart" onclick="myFunc(this.form)"><i class="d-icon-bag"></i>Add To Cart</button>
				</div>
				
			</div>
			</form>

			<hr class="product-divider mb-3">

			<div class="product-footer">
				<div class="social-links mr-2">
					<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
					<a href="#" class="social-link social-twitter fab fa-twitter"></a>
					<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
				</div>
				<!--<div class="product-action">
					<a href="#" class="btn-product btn-wishlist"><i class="d-icon-heart"></i>Add To Wishlist</a>
					<span class="divider"></span>
					<a href="#" class="btn-product btn-compare comp"><i class="d-icon-random"></i>Add To Compare</a>
					<form class="compform">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="" class="proid" name="id">
												<button type="button"  class="comp btn pointer btn-product btn-compare  btn-sm  active" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-balance-scale"></i> Add to Compare
                                                </button>
												</form>
				
				</div>-->
				<script>

function mylink(){
	var id=$('.proid').val();
	window.location.href="http://pcforall.iciclecorp.space/single_product/"+id;

}


</script>
			</div>
		</div>
	</div>
</div>

