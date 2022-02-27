<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'gablly') }} - @yield('title')</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/auth.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/common.css')}}" rel="stylesheet">
	@yield('css')

</head>
<body>
	<div id="app">

		<!-- header -->
		<nav class="navbar navbar-expand-md navbar-light">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}" style="color: white; font-weight: bold; font-size: 200%;">
					<!-- TODO ロゴ画像に設定 -->
					<!-- <img src="{{ asset('image/logo.png')}} alt="logo""> -->
					{{ config('app.name', 'gablly') }}
				</a>

				<!-- ハンバーガーメニュー -->
				<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button> -->

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto">
					</ul>
					
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
					</ul>

				</div>
			</div>
		</nav>
		<!-- header -->

		<!-- main contents -->
		<main class="py-4">
			@yield('content')
		</main>
		<!-- main contents -->

		<!-- footer -->
		<footer>
			<!-- TODO ロゴ画像に設定 -->
			<!-- <img src="{{ asset('image/logo.png')}}" alt="logo" class="justify-content-center"> -->
			<p style="font-size: large; color: black;">gablly</p><!-- logo画像入れたら削除 -->
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">トップページへ<span class="mrg-15">&gt;</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">ログイン<span class="mrg-15">&gt;</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">会員登録<span class="mrg-15">&gt;</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">お問い合わせ<span class="mrg-15">&gt;</span></a>
				</li>
			</ul>
			<div class="container justify-content-center">
				<p>© 2022 gablly</p>
			</div>
		</footer>
		<!-- footer -->

	</div>
</body>
</html>
