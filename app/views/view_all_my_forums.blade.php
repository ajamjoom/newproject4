@extends('_master')
 
 @section('title')
 
 		All your forums

 @stop

 @section('content')

 	<h1>my forums</h1>
	
	@foreach ($user->questions as $question)
    
		{{ Form::open(array('url' => '/debating' , 'method' => 'POST')) }}

			{{ Form::hidden('question_id', $question['id']) }}

			{{ Form::submit(' Debate') }}

		{{ Form::close() }}
		<br>
		{{$question['id']}}
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


