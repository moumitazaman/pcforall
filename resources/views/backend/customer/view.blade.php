@extends('backend.layouts.app')

@section('title', 'View Customer List')

@push('styles')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

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
                <h1 class="m-0 text-dark">Customer Details</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Customer</li>
                  <li class="breadcrumb-item active">Customer Detail</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <div class="content">
          <div class="container-fluid">
            <div class="card card-default">


<!-- /.card-header -->
<div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="col-md-8">
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                      <label>Customer Name : </label><span style="margin-left:8px;">{{  $customer->first_name }} {{  $customer->last_name }}</span>

                        
                      </div>
                      <div class="form-group">
                      <label>Customer Address : </label><span style="margin-left:8px;">{{  $customer->address }}</span>

                        
                      </div>
                      <div class="form-group">
                      <label>Customer Phone: </label><span style="margin-left:8px;">{{  $customer->phone }}</span>

                        
                      </div>
                    </div>
                    
                    </div>
                    
                    
                      
                    </div>
                  </div>
                  <!-- /.row -->




            </div>
            </div>
            </div>
                      
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                  </div>
                 
                    
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