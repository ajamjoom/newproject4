@extends('_master')
 
 @section('title')
 
 		Ask a Question

 @stop

 @section('content')

 	<h1>Ask a Question, Start a new discussion forum!</h1>

 	{{ Form::open(array('url' => '/add_question', 'method' => 'POST')) }}

		Question: {{ Form::text('Question') }} <br><br>
		Context: {{ Form::textarea('Context') }} <br><br>
		Genre: {{ Form::select('Genre', array(

			'Politics' => 'Politics',
			'Sports' => 'Sports',
			'Music' => 'Music',
			'Trading' => 'Trading',
			'Technology' => 'Technology',
			'Health' => 'Health'
			), 'Politics')}} <br><br>

		{{ Form::submit('Open Forum!') }}

	{{ Form::close() }}

 @stop