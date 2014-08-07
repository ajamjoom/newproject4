@extends('_auth_master')
 
 @section('title')
 
 		Sign Up

 @stop

 @section('head')
<!--not working
    <link rel="stylesheet" href="public/styles/signup_stylesheet.css" type="text/css">
-->
 @stop

 @section('content')

 	<h1>Sign Up</h1>


{{ Form::open(array('url' => '/signup')) }}

	Username:<br>
    {{ Form::text('username') }}
	<!-- not sure if the user error are even there, doesnt work-->
	@foreach ($errors->get('user') as $message)

    	<div class='error'>{{ $message }}</div>
    
	@endforeach
    
    <br><br>
    
    Email:<br>
    {{ Form::text('email') }}

	@foreach ($errors->get('email') as $message)

    	<div class='error'>{{ $message }}</div>

	@endforeach
    <br><br>
    
    Password:<br>
    {{ Form::password('password') }}

	@foreach ($errors->get('password') as $message)

    	<div class='error'>{{ $message }}</div>
    
	@endforeach
    <br><br>
<button type="submit" class="btn btn-default btn-sm">
         <span ></span> Sign Up
        </button>
{{ Form::close() }}

 @stop