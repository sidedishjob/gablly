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
	@yield('js')

	<!-- icon -->
	<script src="https://kit.fontawesome.com/235a170713.js" crossorigin="anonymous"></script>

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
				<a class="navbar-brand" href="{{ route('posts.index') }}" style="color: white; font-weight: bold; font-size: 200%;">
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
						<!-- Authentication Links -->
						@guest

							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
							@endif

						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->user_name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('posts.create') }}">新規投稿</a>
									<a class="dropdown-item" href="{{ route('users.edit') }}">プロフィール編集</a>
								</div>
							</li>
						@endguest
					</ul>

				</div>
			</div>
		</nav>
		<!-- header -->

		<!-- main contents -->
		<main class="main">
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
					<a class="nav-link" href="{{ route('posts.index') }}"><span class="btn-text">トップページへ<span class="mrg-15">&gt;</span></span></a>
				</li>
				@if (Auth::check())
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="btn-text">ログアウト<span class="mrg-15">&gt;</span></span></a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}"><span class="btn-text">ログイン<span class="mrg-15">&gt;</span></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}"><span class="btn-text">会員登録<span class="mrg-15">&gt;</span></span></a>
					</li>
				@endif
				<li class="nav-item">
					<a class="nav-link" href="{{ route('contact') }}"><span class="btn-text">お問い合わせ<span class="mrg-15">&gt;</span></span></a>
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
