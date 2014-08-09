@extends('_master')
 
 @section('title')
 
 		What??

 @stop

 @section('content')
<center>
 <h1>Welcome to What??</h1>
 	
 <p>
 What?? Is Solely based on the idea that wisdom must be shared and must always be debated upon.  What?? Will provide you the perfect platform to ask questions and actively debate them with others till a conclusion is reached.
<br>
Have fun,
<br>
Abdul
</p>
</center>
<!-- center the search bar-->
<!--search bar-->
<form class="navbar-form navbar-left" role="search" method="GET" action="/view_all_questions" >
  		
  	<div class="form-group">	
    	<input name ="query" type="text" class="form-control" placeholder="Search by Question, Genre or Context">
  	</div>
  		
  	<button type="submit" class="btn btn-default">
 		<span class="glyphicon glyphicon-search"></span>
	</button>
		
</form>

 @stop