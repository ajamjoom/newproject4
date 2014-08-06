@extends('_auth_master')
 
 @section('title')
 
 		Sign Up

 @stop

 @section('content')

 	<h1>Sign Up</h1>


{{ Form::open(array('url' => '/signup')) }}

	Username:<br>
    {{ Form::text('username') }}<br><br>
	<!-- not sure if the user error are even there, doesnt work-->
	@foreach ($errors->get('user') as $message)

    	<div class='error'>{{ $message }}</div>
    
	@endforeach
    
    Email:<br>
    {{ Form::text('email') }}<br><br>

	@foreach ($errors->get('email') as $message)

    	<div class='error'>{{ $message }}</div>

	@endforeach

    Password:<br>
    {{ Form::password('password') }}<br><br>

	@foreach ($errors->get('password') as $message)

    	<div class='error'>{{ $message }}</div>
    
	@endforeach
    
    {{ Form::submit('Submit') }}

{{ Form::close() }}

 @stop