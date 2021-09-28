@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link href="{{ asset('register.css') }}" rel="stylesheet">
<script src="{{ asset('registerjs.js') }}" defer></script>
<script src="{{ asset('front/js/postcodes.min.js') }}"></script>

<style>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card animated bounceInDown myForm">
                <div class="card-header" style="text-align:center;"><h2>{{ __('Register') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="login-form">
                        @csrf

                        <div class="col form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm_password" required type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id='message'></span>
                            </div>
                        </div>
                        <div class="form-row psc">
                             <label style="padding-right:5px;">Postcode: </label> 
                <div id="postcode_lookup_field"></div>
                               
                            </div>
                        
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                <p>
                <label for="sAddressLine1">Address line 1 * :</label>
                <input type="text" id="line1" name="line1" class="form-control" placeholder="property name/no. and street name" class="" value="" maxlength="25">
</div>
<div class="form-group col-md-6">
                <label for="sAddressLine2">Address line 2 :</label>
                <input type="text" id="line2" name="line2" class="form-control" placeholder="further address details (optional)" class="" value="" maxlength="25">
</div>
<div class="form-group col-md-6">
                <label for="sAddressLine2">Address line 3 :</label>
                <input type="text" id="line3" name="line3" class="form-control" placeholder="further address details (optional)" class="" value="" maxlength="25">
</div>
<div class="form-group col-md-6">
                <label for="sCity">Town / City * :</label>
                <input type="text" id="posttown" name="city" class="form-control" placeholder="name of town or city" class="" value="" maxlength="25" required>
</div>
<div class="form-group col-md-6">
                <label for="sAddressLine3">County :</label>
                <input id="county" type="text" class="form-control" name="county" placeholder="name of county (optional)" class="" value="" maxlength="25">
</div>
<div class="form-group col-md-6">
                <label for="sAddressLine3">Postcode :</label>
                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" class="" value="" maxlength="25">
</div>
<div class="form-group col-md-6">
                <label for="sCountry">Country :</label>
                <input type="text" id="country" name="country" class="form-control" value="United Kingdom" readonly="">
</div>
                                   
                               
                            </div>
                        

                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">Phone*</label>
                                    <input required type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                </div>
                           

                        <div class="form-group row mb-0" style="text-align:center; padding-left:200px;">
                            <div class="col-md-12 offset-md-4" style="margin-bottom:10px;">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ url('/') }}"> <button type="button" class="btn btn-warning">
                                    {{ __('Go back') }}
                                </button></a>
                               
                            </div>
                            <div class="col-md-6 offset-md-4">
                            

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

</script>

   
      

@endsection
