@extends('_auth_master')
 
 @section('title')
 
 		Login

 @stop

 @section('content')
	
	<h1>Log in</h1>

	{{ Form::open(array('url' => '/login')) }}

    	Username<br>
    	{{ Form::text('username') }}<br><br>

    	Password:<br>
    	{{ Form::password('password') }}<br><br>

    	{{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop
