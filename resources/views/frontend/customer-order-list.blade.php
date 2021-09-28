@extends('frontend.layout.app-cart')
@section('css')
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

  </style>
@endsection
@section('content')
<!-- End Header -->
        <main class="main account">
            <div class="page-header"
                style="background-image: url('images/page-header.jpg'); background-color: #3C63A4;">
                <h1 class="page-title">My Account</h1>
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>Order List</li>
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
                                <a class="nav-link" href="#orders">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#downloads">Password Change</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#address">Addresses</a>
                            </li>
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
                        <div class="container mt-8 mb-4">
					<div class="row gutter-lg">
						<div class="col-lg-10 col-md-12">
							<table style="text-align: center"  class="shop-table cart-table mt-2 table table-borderd" border="1">
								<thead>
					              <tr>
					                <th width="5%">Order Number</th>
					                <th width="20%">Total Amount</th>
					                <th width="30%">Payment Type</th>
					                <th width="20%">Status</th>
					                <th width="25%">Action</th>
					              </tr>
					            </thead>
								 <tbody>
				                  @foreach($orders as $order)
				                  <tr>
				                    <td># {{$order->order_no}}</td>
				                    <td>{{$order->order_total_amount}}</td>
				                    <td>
				                      {{$order->payment->payment_method}}
				                       @if($order->payment->payment_method == 'Bkash')
				                         (Transaction no:{{$order->payment->transaction_no}})
				                       @endif
				                    </td>
				                    <td>
				                      @if($order->status == '0')
				                      <span style="background-color: red;color:white;padding: 5px;border-radius:5px">Pending</span>
				                      @elseif($order->status == '1')
				                      <span style="background-color: green;color:white;padding: 5px;border-radius:5px">Approved</span>
				                      @endif
				                    </td>
				                    <td>
				                      <a href="{{route('customer.order.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Details</a>
				                    </td>
				                  </tr>
				                  @endforeach
				                </tbody>
							</table>
						
						</div>
					</div>
				</div>  
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection