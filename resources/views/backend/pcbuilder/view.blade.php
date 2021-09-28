@extends('backend.layouts.app')

@section('title', 'Create Sales')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          {{-- Messages will display here --}}
          @include('backend.layouts.flash')
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Sales Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sales</li>
                <li class="breadcrumb-item active">Sales Form</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-default">
            <!-- form -->
            <form action="{{ route('backend.sales.update', $admins->id) }}" id="sales_info" method="POST">

         
@csrf
@method('PUT')    

              <div class="card-header">
                <h3 class="card-title">Update Sales</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                      class="fas fa-remove"></i></button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="col-md-6"> 
                      
                        <div class="form-group">
                          <label for="email">Invoice No.</label>
                          <input type="text" class="form-control" placeholder="Invoice Number" aria-label="Serial Number"
                          aria-describedby="basic-addon2" value="{{ $admins->invoice_no }}" disabled>
                        <input type="hidden" name="invoice_no" value="{{ $admins->invoice_no }}">
                        
                        </div>
                        <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" value="{{$admins->date}}" type="date"/>
      </div>
                        <div class="form-group">
                        <label class="control-label" for="date">Branch</label>

                        <select name="branch" id="branch" class="form-control">
                          <option value="">--Select Branch--</option>
                          @foreach ($branches as $branch)
                              <option value="{{ $branch->id }}"
                              <?php if($branch->id == $admins->branch_id){
                                echo "selected";
                              } ?>
                              >{{ $branch->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      </div>
                     
                      <div class="col-md-6"> 
                      <div class="form-group">
                          <label for="phone_number">Sales Type</label>
                          <select required name="sales_type" id="branch" class="form-control @error('branch_id') is-invalid @enderror">
                            <option value="">--Select Sales Type--</option>
                            <option value="retailer" <?php if($admins->sales_type == 'retailer'){ echo "selected";} ?>>Retail</option>
                            <option value="wholesaler" <?php if($admins->sales_type == 'wholesaler'){ echo "selected";} ?>>Wholesale</option>

                          </select>
                         
                        </div>
                        <div class="form-group">
                          <label for="phone_number">Project ID</label>
                          <select name="project" id="project" class="form-control" required>
                          <option value="">--Select Project--</option>
                          @foreach ($projects as $project)
                              <option value="{{ $project->id }}"  <?php if($project->id == $admins->project_id){
                                echo "selected";
                              } ?>
                               
                              >{{ $project->name }}</option>
                          @endforeach
                        </select>                         
                        </div>
                        <div class="form-group">
                          <label for="password">Sale Rate</label>
                          <input readonly type="number" class="form-control" name="sale_rate" value="{{$admins->sale_rate}}" id="srate"  >

                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label for="name">Customer ID</label>
                          <select name="customer" id="customer" class="form-control" required>
                          <option value="">--Select Customer--</option>
                          @foreach ($customers as $customer)
                              <option value="{{ $customer->id }}" <?php if($customer->id == $admins->customer_id){
                                echo "selected";
                              } ?>
                               
                              >{{ $customer->customer_name }}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="phone_number">Phone</label>
                          <input required type="text" class="form-control" name="mobile_no" id="phone" value="{{$admins->mobile_no}}" title="enter your phone number if any.">

                        </div>
                        <div class="form-group">
                          <label for="password">Address</label>
                          <input required type="text" name="address" class="form-control" id="address"  value="{{$admins->address}}" title="enter a location">

                        </div>
                      </div>
                      
                      <div class="col-md-6"> 
                      <div class="form-group">
                          <label for="password">Quantity</label>
                          <input value="{{$admins->quantity}}" type="number" class="form-control" name="quantity" id="quantity"  >

                        </div>
                    <div class="form-group">
                          <label for="password">Amount</label>
                          <input type="text" class="form-control" name="amount" id="amount"  value="{{$admins->amount}}" title="enter amount">

                        </div>
                        
                      </div>
                      
                      <div class="col-md-6"> 
                        
                      </div>
                      
                      
                    
                   </div>
                      
                    <div class="row">
                      <div class="col-md-12" style="text-align:center">
                        <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ route('backend.sales.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> Add Sales Entry</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
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
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>

  <script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
          $("#project").on('change', function () {
        var id = $("#project").val();
        var quantity = $("#quantity").val();

        $.ajax({
                  url: '{{url('admin/product')}}'+'/'+id,
                  type: "Get",
                  dataType: 'json',//this will expect a json response
                  //data:{id:$("#customer_id").val()}, 
                   success: function(response){ 
                        $("#srate").val(response[0].sales_rate); 
                 
            }
                
        });

    });

    $("#quantity").on('input', function () {
        var quantity = $("#quantity").val();
        var srate = $("#srate").val();
var amount=quantity*srate;
$("#amount").val(amount);


    });
    </script>
   
    @endpush