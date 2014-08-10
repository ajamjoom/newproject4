@extends('_master')
 
 @section('title')
 
 		Ask!

 @stop
  @section('head')
   <!--link to stylesheet page to color the error txt-->
    <link rel="stylesheet"  href="{{ asset('styles/add_question.css')}}">
 @stop

 @section('content')

 <center>	<h1>"Wisdom begins in wonder." -Socrates</h1>
<!-- form to add a new question -->
 	{{ Form::open(array('url' => '/add_question', 'method' => 'POST')) }}

		Question*: {{ Form::text('Question') }} <br><br>
		
	@foreach ($errors->get('Question') as $message)

        <div class='error'>{{ $message }}</div>
    
    @endforeach
		
		Context(Optional): {{ Form::textarea('Context') }} <br><br>
		Genre*: {{ Form::select('Genre', array(
			'Politics' => 'Politics',
			'Sports' => 'Sports',
			'Music' => 'Music',
			'Trading' => 'Trading',
			'Technology' => 'Technology',
			'Health' => 'Health'
			), 'Politics')}} <br><br>
 
 @foreach ($errors->get('Genre') as $message)

        <div class='error'>{{ $message }}</div>
    
    @endforeach

		<button type="submit" class="btn btn-default btn-sm">
 			 <!--<span ></span>-->
 			  Ask!
		</button>
	{{ Form::close() }}
</center>
 @stop