@extends('_master')
 
 @section('title')
 
 		Welcome to What??

 @stop

 @section('content')

 	<h1>homepage</h1>
 	{{ Form::open(array('url' => '/view_all_questions', 'method' => 'GET')) }}

		{{ Form::label('query','Search for a question:') }} &nbsp;
		{{ Form::text('query') }} &nbsp;
		{{ Form::submit('Search!') }}

	{{ Form::close() }}

 @stop