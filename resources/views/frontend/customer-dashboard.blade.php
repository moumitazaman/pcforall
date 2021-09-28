@extends('frontend.layouts.app-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="{{ asset('front/js/postcodes.min.js') }}"></script>

@section('css')
<?php 
		$settings=App\Settings::where('id',1)->first();


				?>
<style type="text/css">
  
        #login .container #login-row #login-column #login-box {
                margin-top: 40px;
                max-width: 600px;
              
                border: 1px solid #9C9C9C;
                background-color: #EAEAEA;
                margin-bottom: 40px;
      }

      #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
      }

      #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
      }
      .psc{
        padding:5px;
    }
    #idpc_button{
        padding:5px;
    }
    #idpc_button:hover{
color:#ffffff;
background:#07AD8C;    }

  </style>
@endsection
@section('content')


<!-- End Header -->
        <main class="main account">
            <div class="page-header"
                style="background-image: url('images/page-header.jpg'); background-color: #05B895;">
                <h1 class="page-title">My Account</h1>
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>My Account</li>
                </ul>
            </div>
            <!-- End PageHeader -->
            <div class="page-content mt-10 mb-10">
                <div class="container pt-1">
                    <div class="tab tab-vertical">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#orders">My Orders</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="#edit">Edit Account</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#address">Addresses</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" >Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="dashboard">
                                <p class="mb-2">
                                    Hello <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span> 
                                </p>
                                <p>
                                    From your account dashboard you can view your <a href="#orders"
                                        class="link-to-tab text-secondary">recent orders</a><!-- manage your <a
                                        href="#address" class="link-to-tab text-secondary">shipping and billing
                                        addresses</a>, and <a href="#account" class="link-to-tab text-secondary">edit
                                        your password and account details</a>-->.
                                </p>
                            </div>
                            <div class="tab-pane" id="orders">
                            <?php 
                            $orders=App\Order::where('user_id',auth()->user()->id)->where('status','pending')->get();
                            ?>
                                @if($orders)
                                <table class="table table-striped">
							<thead>
								<tr class="summary-subtotal">
									<td>
										<h3 class="summary-subtitle">My Orders</h3>
									</td>	
									<td></td>		
								</tr>
							</thead>
                            @foreach($orders as $item)

							<tbody style="border:3px solid #000000;">
                           
                            <?php 
                            $orderdetails=App\OrderDetails::where('order_id',$item->order_id)->get();
                            ?>
                     @foreach($orderdetails as $items)
                     <?php $products=App\Product::where('id',$items->product_id)->first(); 
                     
                     if($products){
                     ?>

								<tr>
									<td class="product-name">{{ $products->product_name }}  <span> <i class="fas fa-times"></i> {{$items->totalquantity}}</span></td>
									<td class="product-price">{{$settings->currency}}{{ $items->total_price }}</td>
                                </tr>

                     <?php }else{?>
                     <tr>
									<td class="product-name">The product you ordered has been deleted</td>
                                </tr>
                     <?php }?>
                               @endforeach
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Subtotal:</h4>
									</td>
									<td class="summary-subtotal-price">{{$settings->currency}} {{ $item->total_amount }}</td>												
								</tr>
								
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Status:</h4>
									</td>
									<td class="summary-subtotal-price">{{ $item->status }}</td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Total</h4>
									</td>
									<td>
										<p class="summary-total-price">{{$settings->currency}} {{ $item->total_amount }}</p>
									</td>												
								</tr>

							</tbody>
                            @endforeach

						</table>
                        @else
                        <p class=" b-2">No order has been made yet.</p>
                                <a href="#" class="btn btn-primary">Go Shop</a>
                          @endif
                            </div>
                            <div class="tab-pane" id="downloads">
                                <p class="mb-2">No downloads available yet.</p>
                                <a href="#" class="btn btn-primary">Go Shop</a>
                            </div>
                            <div class="tab-pane" id="address">
                                <p class="mb-2">The following addresses will be used on the checkout page by default.
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Billing Address</h5>
                                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}<br>
                        {{ auth()->user()->address }}
							{{ auth()->user()->phone }}
						</p>
						<p class="email">{{ auth()->user()->email }}</p>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Shipping Address</h5>
                                                <p>You have not set up this type of address yet.</p>
                                                <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                                        class="far fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="edit">
                            <form action="{{ route('user.update')}}" class="form" method="POST">
                            @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control"  value="{{ Auth::user()->first_name }}" name="first_name" required="">
                                      <input type="hidden" name="userid" value="{{ Auth::user()->id }}" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->last_name }}"  name="last_name" required="">
                                        </div>
                                    </div>

                                    <label>Phone *</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->phone }}"  name="phone" required="">
          
                                    <label>Email address *</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required="">

                                    <label style="padding-right:5px;">Postcode: </label> 
                <div id="postcode_lookup_field"></div>
                <label for="sAddressLine1">Address line 1 * :</label>
                <input type="text" id="line1" name="line1" class="form-control" placeholder="property name/no. and street name" class="" value="{{ Auth::user()->line1 }}" maxlength="25">
                <label for="sAddressLine2">Address line 2 :</label>
                <input type="text" id="line2" name="line2" class="form-control" placeholder="further address details (optional)" class="" value="{{ Auth::user()->line2 }}" maxlength="25">
                <label for="sAddressLine2">Address line 3 :</label>
                <input type="text" id="line3" name="line3" class="form-control" placeholder="further address details (optional)" class="" value="{{ Auth::user()->line3 }}" maxlength="25">
                <label for="sCity">Town / City * :</label>
                <input type="text" id="posttown" name="city" class="form-control" placeholder="name of town or city" class="" value="{{ Auth::user()->city }}" maxlength="25">
                <label for="sAddressLine3">County :</label>
                <input id="county" type="text" class="form-control" name="county" placeholder="name of county (optional)" class="" value="{{ Auth::user()->county }}" maxlength="25">
                <label for="sAddressLine3">Postcode :</label>
                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" class="" value="{{ Auth::user()->postcode }}" maxlength="25">
                <label for="sCountry">Country :</label>
                <input type="text" id="country" name="country" class="form-control" value="United Kingdom" readonly="">

                                    
                                    
                    

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control" name="newpassword">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control" name="confirm_password">

                                    <button type="submit" class="btn btn-primary btn-reveal-right">SAVE CHANGES <i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <style>
        tr{
            border:1px solid #000000;
        }
        </style>
        <script>
$('#postcode_lookup_field').setupPostcodeLookup({
	// Set your API key
	api_key: 'ak_kmp3l34o5xeIvxrKQZS9lgN4QMUqJ',
	// Pass in CSS selectors pointing to your input fields to pipe the results
	output_fields: {
		line_1: '#line1',
		line_2: '#line2',
		line_3: '#line3',
		post_town: '#posttown',
		postcode: '#postcode'
	}
});
    
</script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection