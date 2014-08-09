@extends('_master')
 
 @section('title')
 
 		My Library

 @stop

 @section('content')
<center>
 	<h1>My Library</h1>
	
	@foreach ($user->questions as $question)
    
		{{ Form::open(array('url' => '/debating' , 'method' => 'GET')) }}

		{{ Form::hidden('question_id', $question['id']) }}

		<button type="submit" class="btn btn-default btn-sm">
 		<span class="glyphicon glyphicon-comment"></span> Open Forum
		</button>
		
		{{ Form::close() }}

		<br>
		{{ Form::open(array('url' => '/view_all_my_forums' , 'method' => 'POST')) }}

			{{ Form::hidden('question_id', $question['id']) }}
			{{ Form::hidden('delete_from_library', 'delete') }}

		<button type="submit" class="btn btn-default btn-sm">
 		 <span class="glyphicon glyphicon-trash"></span>
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
 </center>
 @stop