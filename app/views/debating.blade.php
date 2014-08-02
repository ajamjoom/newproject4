@extends('_master')
 
 @section('title')
 
 		Debate/Discuss

 @stop

 @section('content')

 	<h1>Debate here</h1>
<br>
{{$questions['Question']}}
<br>
{{$questions['Context']}}
<br>
{{$questions['Genre']}}

	
 @stop