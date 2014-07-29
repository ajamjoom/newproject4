@extends('_master')
 
 @section('title')
 
 		All Questions

 @stop

 @section('content')

 	<h1>all Q</h1>

 	{{ Form::open(array('url' => '/view_all_questions', 'method' => 'GET')) }}

		{{ Form::label('query','Search for a question:') }} &nbsp;
		{{ Form::text('query') }} &nbsp;
		{{ Form::submit('Search!') }}

	{{ Form::close() }}

 	@foreach($questions as $question)
		
		<br>
	
		{{ Form::open(array('url' => '/view_all_questions' , 'method' => 'POST')) }}

			{{ Form::hidden('added_question', 'add') }}
			{{ Form::hidden('question_id', $question['id']) }}

			{{ Form::submit('Join Forum') }}

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