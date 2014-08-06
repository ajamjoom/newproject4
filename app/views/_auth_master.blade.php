<!doctype html>
<html>
<head>
		<meta charset='utf-8'>

	<title>@yield('title','What??')</title>
	<link rel="stylesheet" href="//MAXCDN.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


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
	
	@yield('content')


</body>

</html>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
