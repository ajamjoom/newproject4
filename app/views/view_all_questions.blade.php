@extends('_master')
 
 @section('title')
 
 		All Questions

 @stop

 @section('content')

 	<h1>Previously Asked Questions</h1>

 	<form class="navbar-form navbar-left" role="search" method="GET" action="/view_all_questions" >
  		
  			<div class="form-group">	
    			<input name ="query" type="text" class="form-control" placeholder="Search by Question, Genre or Context">
  			</div>
  		
  			<button type="submit" class="btn btn-default">
 				<span class="glyphicon glyphicon-search"></span>
			</button>
		
		</form>

<br>
<br>
<br>


 	@foreach($questions as $question)
		
		
	
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