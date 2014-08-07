@extends('_master')
 
 @section('title')
 
 		What??

 @stop

 @section('content')

 	<h1>Welcome to What??</h1>
 	
 	
 	<p>
 		What?? Is Solely based on the idea that wisdom must be shared and must always be debated upon.  What?? Will provide you the perfect platform to ask questions and actively debate them with others till a conclusion is reached.
	<br>
		Have fun,
	<br>
		Abdul

	</p>


 	{{ Form::open(array('url' => '/view_all_questions', 'method' => 'GET')) }}

		{{ Form::label('query','Search for questions:') }} &nbsp;
		{{ Form::text('query', 'Search by Question, Genre or Context') }} &nbsp;
		
		<button type="submit" class="btn btn-default btn-lg">
 		<span class="glyphicon glyphicon-search"></span>
		</button>

	{{ Form::close() }}

 @stop