@extends('_master')
 
 @section('title')
 
 		Debate/Discuss

 @stop

 @section('content')

 	<h1>Debate here</h1>
	{{$questions['$_POST["question_id"]']}}

	<br>

	{{$question['Context']}}

	<br>
		
	{{$question['Genre']}}
		
	<br>
	<hr> 

 @stop