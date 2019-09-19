<!DOCTYPE html>
<html lang="en">
<head>
	<title>Virtual Account RSUNTAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('Login_v18/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/css/main.css')}}">
<!--===============================================================================================-->
    <style>
        .imagecenter {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
            margin-bottom: 30px;
        }
    </style>
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST" style="padding:50px 55px 55px 55px;">
                    @csrf
                    <img src="{{asset('Login_v18/images/untan.png')}}" class="imagecenter" alt="" />
					<span class="login100-form-title p-b-43">
						MASUK | LOGIN
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>




					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>


				</form>

				<div class="login100-more" style="background-image: url('/Login_v18/images/rsuntan2.jpg');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('Login_v18/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('Login_v18/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/js/main.js')}}"></script>

</body>
</html>
