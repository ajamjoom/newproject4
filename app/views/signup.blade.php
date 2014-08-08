@extends('_auth_master')
 
 @section('title')
 
 		Sign Up

 @stop

 @section('head')
    <link rel="stylesheet"  href="{{ asset('styles/signup_stylesheet.css')}}">

 @stop

 @section('content')

    <br><br><br>

 	<center><h1>Sign Up</h1><center>

 <form class="col-md-12" action="/signup" method="POST">
   
    <div class="form-group">
        <input type="text" name="username" class="form-control input-sm" placeholder="Username">
    </div>
    
    @foreach ($errors->get('user') as $message)

        <div class='error'>{{ $message }}</div>
    
    @endforeach
    
        <div class="form-group">
            <input type="email" name="email" class="form-control input-sm" placeholder="Email">
        </div>
    
     @foreach ($errors->get('email') as $message)

        <div class='error'>{{ $message }}</div>

    @endforeach
    
    <div class="form-group">
        <input type="password" name="password" class="form-control input-sm" placeholder="Password">
    </div>

    @foreach ($errors->get('password') as $message)

        <div class='error'>{{ $message }}</div>
    
    @endforeach

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm btn-block">Sign Up</button>
        <span class="pull-right"><a href="/login">Login with a regestered user</a></span>
    </div>

</form>
 
 @stop
