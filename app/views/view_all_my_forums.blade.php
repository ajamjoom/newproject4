@extends('_master')
 
 @section('title')
 
 		All your forums

 @stop

 @section('content')

 	<h1>my forums</h1>
	
	@foreach ($user->questions as $question)
    
		{{ Form::open(array('url' => '/debating' , 'method' => 'GET')) }}

			{{ Form::hidden('question_id', $question['id']) }}

			{{ Form::submit(' Debate') }}

		{{ Form::close() }}
		<br>
		{{ Form::open(array('url' => '/view_all_my_forums' , 'method' => 'POST')) }}

			{{ Form::hidden('question_id', $question['id']) }}
			{{ Form::hidden('delete_from_library', 'delete') }}

			{{ Form::submit(' unfollow') }}

		{{ Form::close() }}
		
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


