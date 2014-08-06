@extends('_master')
 
 @section('title')
 
 		Ask!

 @stop

 @section('content')

 	<h1>"Wisdom begins in wonder." -Socrates</h1>

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

		{{ Form::submit(' Ask! ') }}

	{{ Form::close() }}

 @stop