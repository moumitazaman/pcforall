@extends('backend.layouts.app')

@section('title', 'View Order')

@push('styles')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            {{-- Messages will display here --}}
            @include('backend.layouts.flash')
            <div class="row mb-2">
              
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <div class="content">
        <div style="margin-top:2px; text-align:center;">
<button onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>Print</button>


</div>
          <div class="container-fluid">
            <div class="card card-default">

<?php 
                        $settings= DB::table('settings')->where('id',1)->first();

                        ?>

              <!-- form -->
              <form class="bgimg">
                @csrf
                <div class="card-header" style="margin-top:50px;">
                <div class="col-sm-12">
                <h3 style="margin-top:10px; color:#019644;font-size: 30px; font-weight: bold; padding: 0px;">PC FOR ALL LTD</h3>
                <span>{{$settings->address}}</span>
                
                <span style="float:right;" >
                <span  id="basic-addon2" style="padding-right:90px;">
                <h3 style="margin-top:-20px; font-size: 20px; font-weight: bold; padding: 0px;">Invoice</h3> 
                <span style="margin-top:-20px;">Number # {{ $agent->order_id }}</span>
                <span >Date: <?php echo $currentdate=date('Y-m-d'); ?></span>
                </span>
              <img src="{{ asset('frontend/images/pclogo.png')}}" alt="logo" width="190" height="150" />
              <span><strong>For Queries Please Contact</strong></span>
              <span><strong>Email: </strong> {{$settings->email}}</span>

              <span><strong>Telephone: </strong> {{$settings->phone}}</span>

              </span>

              </div>
  
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                  <div class="col-sm-8 lilb">
                  <div class="col-md-6" style="float:left; margin-top:-110px;">
                      <div class="form-group">
                      <?php 
                        $uid= $agent->user_id;
                        $user= DB::table('users')->where('id',$uid)->first();

                        ?>
                
<div style="border:1px solid #000000;text-align:center;">
<h5 style="background-color:#019644; padding:2px; text-align:center;color:#ffffff;">To</h5>
<span><strong>{{  $user->first_name }} {{  $user->last_name }}</strong></span>  <br>
<span>            <strong>      {{ $user->address}}</strong>
</span> 
<span>                   <strong> {{$user->email}}</strong>
</span><br>
<strong> {{$user->phone}}  </strong>

                    </div>                   
                      </div>
                      <div class="form-group">
                       
                      </div>
                      <div class="form-group">
                      
                        
                      </div>
                    </div>
                    <!-- To Fields -->
                    <div class="col-md-4"  style="float:right;">
                      
                    </div>
                  

                  </div>
                  <div class="col-sm-4 lilb" style="text-align:right;">
                  
                  

                    <div>
                    <div class="form-group" style="padding-right:45px;">
                     
                      
                    </div>

                    <div>
                      <div class="form-group">

                       
                      </div>
                      </div>

                    <div>
                    <div class="form-group" style="padding-right:25px;">
                   
                        
                      </div>
                    </div>

                   

                  </div>
                   
                    <!-- Serial & Voucher -->
                    
                    <!-- Vat No. -->
                    
                    <!-- Date -->
                   
                    <!-- From Fields -->
                  
                    <!-- AWB & Delivery Place -->
                    
                     
                    </div>
                  </div>
                   <!-- /.row -->
                  <div class="row" style="margin-top:10px;">
                    <div class="col-md-12">
                    <div style="text-align:center;">
                    <label ></label>
                    </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                             <label></label>
                          </div>
                        </div>
                       
                      </div>
                      <div id="more_field">
                        <div class="row multi-field" id="row">
                          <div class="col-md-12">
                            <div class="form-group">
                            <table class="table nob table-bordered">
                            <tr>
                      <th style="background-color:#019644;color:#ffffff;">ID</th>
                      <th style="background-color:#019644;color:#ffffff;">Description</th>
                      <th style="background-color:#019644;color:#ffffff;"> Quantity</th>
                      <th style="background-color:#019644;color:#ffffff;">Unit Cost</th>


                      <th style="background-color:#019644;color:#ffffff;">Total Cost</th>

                            </tr>
                            <?php
                            $totquantity=0; 
                            $unitcost=0; 

                            $oid=$agent->order_id;

                            $prod= DB::table('order_details')->where('order_id',$oid)->get();


                            ?>
                           
                            @foreach ($prod as $pro)
                               
                                
                                <?php

                            $products= DB::table('product')->where('id',$pro->product_id)->get();
                            $totquantity+=$pro->totalquantity;
                            $ord= DB::table('orders')->where('order_id',$oid)->where('user_id',$uid)->first();


                                ?>
                                @foreach ($products as $product)
                                <?php 
                                $unitcost+=$product->price;

                                ?>
                                <tr>
                                <td>{{$product->id}}</td>

                                <td>{{$product->product_name}}                   
                                
                                </td>
                                <td>{{$pro->totalquantity}}</td>

                                <td>{{$settings->currency}}{{$product->price}}</td>

                                <td>{{$settings->currency}}{{$pro->total_price}}</td>
                                </tr>

                                @endforeach
                                @endforeach
                                <tr>
                                <td></td>
                               <td> <?php 
                                if($ord->processor || $ord->ram || $ord->monitor || $ord->ssd){?>
                                <span><label>Add Ons</label><span>
                                <?php $cprs=App\Product::where('id',$ord->processor)->first();?>
													<span>{{$cprs['product_name']}}</span>
													<?php $rprs=App\Product::where('id',$ord->ram)->first();?>
												<span>	{{$rprs['product_name']}}</span>
													<?php $mprs=App\Product::where('id',$ord->monitor )->first();?>
													<span>{{$mprs['product_name']}}	</span>												
													<?php $sprs=App\Product::where('id',$ord->ssd)->first();?>
												<span>	{{$sprs['product_name']}}</span>


                               <?php }
                                
                                ?>
                                </td>
                                <td></td>

                                <td>
                                <?php 
                                if($ord->processor || $ord->ram || $ord->monitor || $ord->ssd){?>
                                <?php $cprs=App\Product::where('id',$ord->processor)->first();
                                if($cprs){
                                ?>

													<span>{{$settings->currency}}{{$cprs['price']}}</span>
                                <?php }
                                $rprs=App\Product::where('id',$ord->ram)->first();
                                                                if($rprs){

                                ?>
												<span>	{{$settings->currency}}{{$rprs['price']}}</span>
                                <?php }    
                                
$mprs=App\Product::where('id',$ord->monitor )->first();
if($mprs){?>
													<span>{{$settings->currency}}{{$mprs['price']}}	</span>												
                                <?php }
                                 $sprs=App\Product::where('id',$ord->ssd)->first();
                                 if($sprs){?>
												<span>	{{$settings->currency}}{{$sprs['price']}}</span>


                               <?php }}
                                
                                ?>
                                </td>
                                <td></td>

                                </tr>
                                <tr>

                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$totquantity}}</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$settings->currency}}{{ $agent->total_amount}}</strong></td>
                    <td  ></td>

                </tr > 

                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Grand Total</strong></td>
                    <td style="background-color: #D8FDBA" ><strong>{{$settings->currency}}{{ $agent->total_amount}}</strong></td>
                    

                </tr > 
                             
                              </table>
                              <h6><strong>Note: One Month Harware Warranty</strong></h6>
                            </div>
                          </div>
                     
                          
                        </div>
                      </div>
                    
                    </div>
                 
                    
                      <div class="col-sm-12" style="margin-top:50px;">
                      <div class="col-sm-8" style="float:left;">
                      </div>

                      

                      </div>
                     
                          <!-- .row -->
                          
                          <!-- /.row -->
                          <div class="row">
                            <div class="col-md-12 offset-md-6">
                              <div class="form-group">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <input name="total" id="result_hidden" type="hidden">
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="col-sm-12" style="margin-top:300px;">
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="row" style="margin-top:20px; text-align:center;">
                    <div class="col-md-4 offset-md-4">
                      <!-- VAT is here -->
                      <button onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>Print</button>


                    </div>
                  </div>
                </div>
              </form>
              <!-- /.form -->

            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
     <style>
      span::before {
  content: "\A";
  white-space: pre;
}
img{
  margin-top:-120px;
}

.card-header{
  border:none;
}

     </style>            
                    
@endsection

@push('scripts')
<!-- Select2 -->
  <script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
  {{-- <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> --}}
<!-- Custom JS -->
  <script type="text/javascript">
    
    
      


    
  </script>
@endpush