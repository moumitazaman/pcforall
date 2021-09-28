@extends('backend.layouts.app')

@section('title', 'Invoice')

@push('styles')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <?php 
		$settings=App\Setting::where('id',1)->first();


				?>
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
          <div class="container-fluid">
            <div class="card card-default">
<div style="margin-top:2px; text-align:center;">
<button onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>Print</button>


</div>
              <!-- form -->
              <form>
                @csrf
                <div class="card-header" style="margin-top:50px;">
                <div class="col-sm-12">
                <div style="text-align:center;">
                <img src="{{ asset('/backend/img/logo.jpg') }}" />
                </div>
                <h3 style="margin-top:70px; text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">Receipt Voucher</h3>
                <span  id="basic-addon2">Invoice#: </span>{{ $bill->invoice_no }}

                <div  class="col-sm-6 inv"><span style="float:right;" >VAT#: {{ $settings->vat_no}}</span></div>


              </div>
  
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                  <div class="col-sm-8 lilb">
                  <div class="col-md-4" style="float:left;">
                      <div class="form-group">
                      <?php 
                    $cus= DB::table('customer')->where('customer_id',$bill->customer_id)->first();
                        ?>
                        <input name="from_name" type="text"  value="{{  $cus->customer_name }}">
                        
                      </div>
                      <div class="form-group">
                  {{ $cus->address}}
                       
                      </div>
                      <div class="form-group">
                        <input name="from_phone" type="text"   value="{{$cus->phone}}">
                        
                      </div>
                    </div>
                    <!-- To Fields -->
                    <div class="col-md-4"  style="float:right;">
                      
                    </div>
                  

                  </div>
                  <div class="col-sm-4 lilb" style="text-align:right;">
                  
                  

                    <div>
                    <div class="form-group" style="padding-right:45px;">
                      <?php 
                      $branch_id=Auth::user()->branch_id;
                      $branch= DB::table('branches')->select('name')->where('id',$branch_id)->first();
                      ?>

<span id="basic-addon2">Branch: </span>{{$branch->name}}
</div>

                      
                    </div>

                    <div>
                      <div class="form-group">

                       
                      </div>
                      </div>

                    <div>
                    <div class="form-group" style="padding-right:25px;">
                          <span id="basic-addon2">Date: </span>{{ $bill->created_at->format('d/m/Y') }}
                       
                        
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
                  <div class="row" style="margin-top:100px;">
                    <div class="col-md-12">
                    <div style="text-align:center;">
                    <label >Receipt</label>
                    </div>
                    <?php 
                    $proj= DB::table('products')->where('project_id',$bill->project_id)->first();
                        ?>
                      
                      <div id="more_field">
                        <div class="row multi-field" id="row">
                          <div class="col-md-12">
                            <div class="form-group">
                            <table class="table">
                            <th>SL No.</th>
                            <th>Project</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>


                           <tr>
                           <td>1</td>
                           <td>{{$proj->name}}</td>

                           <td>{{$bill->sale_rate}}</td>
                           <td>{{$bill->quantity}}</td>
                           <td>{{$bill->amount}}</td>

                           </tr>
                               
                             
                              </table>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                            <table class="table">
                           
                                </table>
                             
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    
                    </div>
                 
                    <div class="col-md-12">
                      <div class="card-default">
                        <div class="card-body">
                          <!-- .row -->
                          <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                               <div> <label for="qty_cartoon">Previous Due: </label>{{ $bill->due}}</div>
                        
                                 <div><label for="weight">Paid Amount: </label>{{ $bill->amount}} </div>
                                 @if($bill->amount - $bill->due>0)
                                 <div><label for="per_kg">Current Due: </label>{{ 0 }} </div>
                                 @endif
                                 @if(($bill->amount - $bill->due) < 0)
                                 <div><label for="per_kg">Current Due: </label>{{ abs($bill->amount - $bill->due) }} </div>
                                 @endif



                              </div>
                             
                            </div>
                           
                           
                           
                            
                            
                            </div>
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <div class="col-sm-12" style="margin-top:50px;">
                      <div class="col-sm-8" style="float:left;">
                      </div>
                      <div class="col-sm-4" style="text-align:right;padding-right:150px; float:right; font-size:20px;border:1px solid #cccccc;">
                      <label for="Total" style="padding-right:5px;">Total: </label> {{ $bill->amount}}</div>

                      

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
               <!-- <img src="{{ asset('/backend/img/footer.png') }}"class="footimg" />-->
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
      <!-- /.content-wrapper -->
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
  <style>
  input,textarea{
      border:0;
      background:transparent;
  }
  .inv{
      float:right !important;
  }
  span{
    font-size: 18px; 
    font-weight: bold;

  }
  .headimg{
    width:100%;
        height: 154px;
  }
  .footimg{
    width:100%;
    height: 84px;
    
  }
  .bgimg{
    background-image: url('{{ asset('backend/img/watermark.png')}}');
    background-color: #ffffff; /* Used if the image is unavailable */
        background-repeat: no-repeat;
        background-position: 50% 50%; 
        background-size:729px 424px;
  }
  .lilb{
    border:1px solid #cccccc;
  }
  .nob{
    background:transparent;
  }
  @media print {
  /* button selectors */
  .btn, button, submit { 
    display: none;
  }
}
  </style>
@endpush