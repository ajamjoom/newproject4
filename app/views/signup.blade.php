@extends('_auth_master')
 
 @section('title')
 
 		Sign-up

 @stop

 @section('content')

 	<h1>Sign up</h1>

{{ Form::open(array('url' => '/signup')) }}

	Username:<br>
    {{ Form::text('username') }}<br><br>

    Email:<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

 @stop