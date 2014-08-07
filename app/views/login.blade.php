@extends('_auth_master')
 
 @section('title')
 
 		Welcome to What??-Log In

 @stop

 @section('content')
	
	<h1>What??</h1>

	{{ Form::open(array('url' => '/login')) }}

    	Username<br>
    	{{ Form::text('username') }}<br><br>

    	Password:<br>
    	{{ Form::password('password') }}<br><br>

<button type="submit" class="btn btn-default btn-sm">
 		 <span ></span> Log In
		</button>
	{{ Form::close() }}

@stop
