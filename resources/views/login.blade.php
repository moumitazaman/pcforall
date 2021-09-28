@extends('layouts.app')

@section('content')
<link href="{{ asset('login.css') }}" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo asset('/').'backend/img/pclogo.png';?>" id="icon" alt="User Icon" />
      <h1>Admin Panel</h1>
    </div>

    <!-- Login Form -->
    
    <!-- Login Form -->
    <form class="login-form" action="{{ route('adminlogin.post') }}" method="POST" role="form">
    @csrf
      <input class="fadeIn second @error('email') is-invalid @enderror" id="login" type="email" id="email" name="email" placeholder="Email address" autofocus value="{{ old('email') }}">
      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      <input class="fadeIn third @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Password">
      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <!-- Remind Passowrd -->
    
    

  </div>
</div>

 
@endsection