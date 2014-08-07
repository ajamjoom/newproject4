@extends('_master')
 
 @section('title')
 
 		All Questions

 @stop

 @section('content')

 	<h1>Previously Asked Questions</h1>

 	{{ Form::open(array('url' => '/view_all_questions', 'method' => 'GET')) }}

		{{ Form::label('query','Search for questions:') }} &nbsp;
		{{ Form::text('query', 'Search by Question, Genre or Context') }} &nbsp;
		<button type="submit" class="btn btn-default btn-lg">
 		 <span class="glyphicon glyphicon-search"></span>
		</button>
	{{ Form::close() }}

 	@foreach($questions as $question)
		
		<br>
	
		{{ Form::open(array('url' => '/view_all_questions' , 'method' => 'POST')) }}

			{{ Form::hidden('added_question', 'add') }}
			{{ Form::hidden('question_id', $question['id']) }}

		<button type="submit" class="btn btn-default btn-lg">
 		 <span class="glyphicon glyphicon-plus"></span>To Library
		</button>

		{{ Form::close() }}
	
		<br>
		{{"Question:"}}

		{{$question['Question']}}
	
		<br>
		{{"Context:"}}

		{{$question['Context']}}
	
		<br>
		{{"Genre:"}}

		{{$question['Genre']}}
		
		<br>
		<hr>

	@endforeach

 @stop