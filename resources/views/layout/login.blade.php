<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.0/axios.min.js"></script>
</head>
<body>
	<section class="background_blue">
		<div class="container">
			<h1>HANGRY</h1>
			<div class="wraped">
				<div class="form_head">
					<h3>Member Login</h3>
					<p>발급받은 아이디와 패스워드를 입력해 주세요.</p>
					<span class="glyphicon glyphicon-user form_head_icon" aria-hidden="true"></span>
				</div>
				<div class="form_body">
					<div class="form-group">
					    <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					    <p class="form_error" v-if="!email&&email_err">@{{email_err}}</p>
					</div>
					<div class="form-group">
						<input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						<p class="form_error" v-if="!password&&password_err">@{{password_err}}</p>
					</div>
					<div class="form-group" v-if="login_fail">
						<p class="form_error">@{{login_fail}}</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary col-md-12" type="subimt" v-on:click="login">Login</button>
					</div>
					<div class="form-group">
						<p><input type="checkbox" aria-label="..." v-model="is_remember"> 내 아이디 기억하기</p>
					</div>
				</div>
				<div class="form_bottom">
					<p><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 비밀번호를 잊으셨습니까?</p>
				</div>
			</div>
		</div>
	</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.min.js"></script>
<script src="{{url('js/login.js')}}"></script>
</html>