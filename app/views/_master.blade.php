<!doctype html>
<html>
<head>
		<meta charset='utf-8'>

	<title>@yield('title','What??')</title>
	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	

	@yield('head')

</head>

<body>
	
	 @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    @if(Auth::check())
    <a href='/logout'>Log Out {{ Auth::user()->username; }}</a>
	@else 
    <a href='/signup'>Sign Up</a> or <a href='/login'>Log In</a>
	@endif

	<dev class='linksbar'>
	 	<br>
	 	<a href = '/'>Home</a>
	 	<br>
	 	<a href = '/add_question'>Ask a Question</a>
	 	<br>
	 	<a href = '/view_all_questions'>View All Questions</a>
	 	<br>
	 	<a href = '/view_all_my_forums'>My Library</a>
	</dev>
	
	@yield('content')


</body>

</html>