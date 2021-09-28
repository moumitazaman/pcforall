@extends('backend.layouts.app')

@section('title', 'Create Product')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        {{-- Messages will display here --}}
        @include('backend.layouts.flash')
        <div class="card card-default">
          <!-- form -->
          <form action="{{ route('backend.settings.update','1') }}" id="sales_info" method="POST">
            @csrf
            @method('PUT')

            <div class="card-header">
              <h3 class="card-title">Change Settings</h3> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 offset-md-3">
                  <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $settings->email }}">
                        
                        @error('email')
                          <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Phone</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Mobile Number" value="{{ $settings->phone }}">
                        
                        @error('phone')
                          <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ $settings->address}}">
                       
                        @error('address')
                          <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Currency</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" placeholder="Currency" value="{{ $settings->currency }}">
                       
                        @error('currency')
                          <div class="invalid-feedback">{{ $errors->first('currency') }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
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