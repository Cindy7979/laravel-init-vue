<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.0/axios.min.js"></script>
</head>
<body>
	<nav class="nav_inline">
		<div class="nav_left">
			<button type="button" class="navbar_btn">
		        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
		    </button>
		    <p>{{$user->name}}</p>
		</div>
		<div class="icon_right">
			<button type="button" class="navbar_btn">
				<span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
				<span class="badge badge-warning">4</span>
			</button>
			<button type="button" class="navbar_btn">
				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
			</button>
		</div>
	</nav>
	 <!-- end :: nav -->
	<aside class="col-md-3 left_aside">
		<div class="left_aside_default">
			<div class="user_info">
				@if($user->image) 
					<img src="{{$user->image}}">
				@else 
					<img src="{{url('image/profile_default_img.png')}}">
				@endif
				<p class="strong">{{$user->name}}</p>
				<p>{{$user->email}}</p>
			</div>
			<div class="user_detail">
				
			</div>
		</div>
	</aside>
	<!-- end :: aside -->
	<section class="col-md-9 container background_gray">
		@yield('contents')
	</section>
	<!-- end :: contents -->
	<footer>
		<p>Copyright.</p>
	</footer>
	<!-- end :: footer -->
</body>
</html>