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
    <a href='/logout'>Log out {{ Auth::user()->username; }}</a>
	@else 
    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
	@endif

	<dev class='linksbar'>
	 	<br>
	 	<a href = '/'> Home </a>
	 	<br>
	 	<a href = '/add_question'> Add Questions </a>
	 	<br>
	 	<a href = '/view_all_questions'> All Questions </a>
	 	<br>
	 	<a href = '/view_all_my_forums'> My Questions </a>
	</dev>
	
	@yield('content')


</body>

</html>