<!doctype html>
<html>
<head>
		<meta charset='utf-8'>

	<title>@yield('title','What??')</title>
<!--online version of the Bootsrap style sheet -->
<link rel="stylesheet" href="//MAXCDN.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	@yield('head')

</head>

<body>
	
	 @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
<!--Bootsrap navigation bar for all pages after logging in -->
		<ul class="nav nav-tabs" role="tablist">
  		
  		<li class="active"><a href="/">Home</a></li>
  		<li><a href = '/view_all_questions'>View All Questions</a></li>
 		<li><a href = '/add_question'>Ask a Question</a></li>
  		<li><a href = '/view_all_my_forums'>My Library</a></li>
		 @if(Auth::check())
    
    		<li><a href='/logout'>Log Out {{ Auth::user()->username; }}</a></li>
		@else 
    		<li><a href='/signup'>Sign Up</a> or <a href='/login'>Log In</a></li>

		@endif
		</ul>
	
	@yield('content')


</body>

</html>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
