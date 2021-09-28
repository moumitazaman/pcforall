 @extends('frontend.layout.master')

@section('css')
 <!-- Main CSS File -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/style.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')
<!-- End Header -->
<!-- End Header -->
		<main class="main checkout">
			<div class="page-header bg-dark"
				style="background-image: url('public/frontend/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h1 class="page-title">Payment Process</h1>
				<ul class="breadcrumb">
					<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
					<li>payment</li>
				</ul>
			</div>
			<!-- End PageHeader -->
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
									@php
                                       $contents = Cart::content();
                                       $total=0;
							        @endphp
                                    <?php $count =1;?>
							        @foreach($contents as $item)
							        <?php $count++;?>
									<tr class="cg{{ $item->id}} nodesign">
										<div class="row">
										<td class="product-thumbnail">
											<figure>
												<a href="product-simple.html">
													<img src="{{url($item->options->image)}}" width="100" height="100"
													alt="product">
												</a>
											
											</figure>
										</td>
										<td class="product-name">
											<div class="product-name-section">
												<a href="product-simple.html">{{ $item->name }}</a>
											</div>
										</td>
										<td class="product-subtotal">

											<span class="amount">BDT. {{$item->price}}</span>
										</td>
										<td class="product-quantity" style="text-align: center">
										   {{$item->qty}}
										</td>
										<td class="product-price">
											BDT.{{$item->subtotal}}
										</td>
										@php
							            $total += $item->subtotal;
							            @endphp
									   </div>
									</tr>
									@endforeach
									<tr>
										<td style="text-align: right" colspan="4" class="summary-subtitle">Total</td>
										<td class="product-price">BDT. {{$total}}</td>
									</tr>
								</tbody>
							</table>
						
						</div>
						<aside class="col-lg-4 sticky-sidebar-wrapper">
							<div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
								<div class="summary mb-4">
									<h3 class="summary-title text-left" >Select  Payment  Type</h3>
									
								<!-- 	<div class="shipping-address pb-4">
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
									</div> -->
									<table>
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Total</h4>
											</td>
											<td>
												<p class="summary-total-price">BDT. {{$total}}</p>
											</td>												
										</tr>
									</table>
									<div>
					                @if(Session::get('message'))
                                       <div class="alert alert-danger alert-dismissible">
                                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                       <strong>{{Session::get('message')}}</strong><br/>
                                    </div>
                                    @endif
                                    <!-- modal popup -->
                                    <!-- Button trigger modal -->
										<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  Launch demo modal
										</button> -->

										<!-- Modal -->
										<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        ...
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="button" class="btn btn-primary">Save changes</button>
										      </div>
										    </div>
										  </div>
										</div> -->
									<!-- End Model Popup	 -->
										<form id="myForm" action="{{route('customer.payment.store')}}" method="post">
											@csrf

											 @foreach($contents as $content)
											 <input type="hidden" name="product_id" value="{{$content->id}}">
											 @endforeach

											<input type="hidden" name="order_total" value="{{$total}}">
											<select name="payment_method" id="payment_methods" class="form-control mt-4" style="color: green;font-size:17px"  >
												<option value="">Select Payment Type</option>
												<option value="Cash_on_delivery">Cash On Delivery</option>
												<option value="Bkash">Bkash</option>
											</select>
											<font style="color:red">
								               {{($errors->has('payment_method'))?($errors->first('payment_method')):' '}}

								               </font>
													    <div></div>
											<div class="show_field mt-3" style="display:none;">
												<label> Bkash No is:<b style="color:red;">01792985242</b></label>
												<input type="text" name="transaction_no" placeholder="Write Bkash Transaction No" class="form-control" style="border:2px solid green" >
											</div>
										
									   <button href="#" class="btn btn-primary mt-4">Submit Payment</button>

									 </form>
				                   </div>
								</div>
							</div>
						</aside>
					</div>
				</div>  
		</main>	
<script type="text/javascript">
	
	 $(document).on('change','#payment_methods',function(){
           var payment_method = $(this).val();
           console.log(payment_method);
           if(payment_method == 'Bkash'){
           	$('.show_field').show();
           	
           }else{
            $('.show_field').hide();
           }
           
        });
</script>	
@endsection

@section('js')

    <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#myForm').validate({
    rules: {
     transaction_no: {
        required: true,
      },
    },
    messages: {
      transaction_no: {
        required: "Please Enter Your Bkash Transaction ID",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

 
</script>
  
@endsection