@extends('_master')
 
 @section('title')
 
 		All your forums

 @stop

 @section('content')

 	<h1>my forums</h1>
	
	@foreach($questions as $question)
	
		<br>
	
		{{$question['Question']}}
	
		<br>

		{{$question['Context']}}
	
		<br>
		
		{{$question['Genre']}}
		
		<br>
		<hr>
		@endforeach
 @stop