<!doctype html>
<html>
<head>
		<meta charset='utf-8'>

	<title>@yield('title','What??')</title>
	<!-- online bootsrap stylesheet -->
	<link rel="stylesheet" href="//MAXCDN.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	@yield('head')

</head>

<body>
	
	 @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
   
	@yield('content')

</body>

</html>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
