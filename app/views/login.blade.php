@extends('_auth_master')
 
 @section('title')
 
 		Welcome to What??-Log In

 @stop

@section('head')

<!--link to login.css to view background image(not working) -->
	<link rel="stylesheet" href="login.css">

@stop

 @section('content')
	
	<h1>What??</h1>

	{{ Form::open(array('url' => '/login')) }}

    	Username<br>
    	{{ Form::text('username') }}<br><br>

    	Password:<br>
    	{{ Form::password('password') }}<br><br>

		<button type="submit" class="btn btn-default btn-sm">
 			 Log In
		</button>
	{{ Form::close() }}


<form class="col-md-12" action="/login" method="POST">
    <div class="form-group">
        <input type="text" name="username" class="form-control input-sm" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control input-sm" placeholder="Password">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm btn-block">Sign In</button>
        <span class="pull-right"><a href="/signup">New Registration</a></span>
    </div>
</form>
@stop
