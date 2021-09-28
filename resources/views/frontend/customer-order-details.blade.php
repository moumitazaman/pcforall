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
                    <li>Order Details</li>
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
						<div class="col-lg-12 col-md-12">
							<table class="txt-center myTable" width="100%" border="1">
               <tr>
                 <td width="30%">
                   <a href="{{url('')}}"><img src="{{url('public/frontend/logo/Logo NashRava-01.jpg')}}" alt="IMG-LOGO" style="width:150px;height:150px;padding : 5px 0px 0px 15px"></a>
                 </td>
                 <td width="40%" style="text-align: center;">
                   <h4><strong>Eked Bazar</strong></h4>
                   <span><strong>Mobile No.</strong>01736811648</span><br/>
                    <span><strong>Email:</strong>nashravaclothing2019@gmail.com</span>
                     <span><strong>Address:</strong>Dhaka</span>
                 </td>
                 <td width="30%" style="padding-left: 5px;">
                   <strong>Order No: # {{$order->order_no}}</strong>
                 </td>
               </tr>
               <tr>
                <td style="padding-left: 5px;"><strong>Billing Info</strong></td>
                <td colspan="2" style="text-align: left;padding-left: 5px;">
                  <strong >Name :&nbsp;</strong>{{$order->shipping->name}} <br/>
                  <strong >Mobile No :&nbsp;</strong>{{$order->shipping->mobile_no}}<br/>
                  <strong >Email :&nbsp;</strong>{{$order->shipping->email}}<br/>
                  <strong >Address :&nbsp;</strong>{{$order->shipping->address}}<br/>
                  <strong>Payment :&nbsp;</strong>{{$order->payment->payment_method}}
                       @if($order->payment->payment_method == 'Bkash')
                         (Transaction no:{{$order->payment->transaction_no}})
                       @endif
                </td>
               </tr>
               <tr>
                 <td colspan="3" style="padding-left: 5px;">
                   <strong>Order Dtails</strong>
                 </td>
               </tr>
               <tr>
                 <td style="padding-left: 5px;"><strong>Product Name & Image</strong></td>
                 <td style="padding-left: 5px;"><strong>Color & Size</strong></td>
                 <td style="padding-left: 5px;"><strong>Quantity & Price</strong></td>
               </tr>
               @foreach($order['OrderDetail'] as $details)

               <tr>
                <td style="padding : 5px 0px 0px 5px;">
                  <img src="{{url($details->product->image)}}"
                            style="width:50px;height:55px;border:1px solid #000;"> &nbsp; {{$details->product->product_name}}
                </td>
                <td style="padding-left: 5px;">
                 {{$details->color->color_name}}&nbsp; & &nbsp;
                 {{$details->size->size_name}}
                </td>
                <td style="padding-left: 5px;">
                   @php
                      $sub_total = $details->quantity * $details->product->price;
                  @endphp
                  {{$details->quantity}} x {{$details->product->price}} = {{$sub_total}}

                </td>
               </tr>
               @endforeach
               <tr>
                <td colspan="2" style="text-align: right;padding-right: 5px;"><strong>Grand Total</strong></td>
                <td style="padding-left: 5px;">{{$order->order_total_amount}}</td>
               </tr>
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