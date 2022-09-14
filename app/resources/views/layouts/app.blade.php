<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="description" content="gablly であなただけの記憶の美術館を作ってみましょう">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'gablly') }} - @yield('title')</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/auth.js') }}" defer></script>
	<script src="{{ asset('js/validation.js') }}" defer></script>
	@yield('js')

	<!-- icon -->
	<script src="https://kit.fontawesome.com/235a170713.js" crossorigin="anonymous"></script>

	<!-- Fonts -->
	<link href="//fonts.gstatic.com" rel="dns-prefetch">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/common.css')}}" rel="stylesheet">
	@yield('css')

</head>
<body>
	<div id="app">

		<!-- header -->
		<nav id="header-nav" class="navbar navbar-expand-md navbar-light header-about">
			<div class="container">
				<a class="fw-bold fs-2 navbar-brand" href="{{ route('top') }}">
					{{ config('app.name', 'gablly') }}
				</a>

				<!-- ハンバーガーメニュー -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

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
								<a class="nav-link" href="{{ route('register') }}">
									<span class="btn-text">{{ __('会員登録') }}</span>
								</a>
							</li>
							@endif
							@if (Route::has('login'))
								<li class="nav-item mrg-15">
									<a class="nav-link" href="{{ route('login') }}">
										<span class="btn-text">{{ __('ログイン') }}</span>
									</a>
								</li>
							@endif

						@else
							<li class="nav-item">
								<a class="nav-link" href="{{ route('posts.create') }}">
									<span class="btn-text">{{ __('新規投稿') }}</span>
								</a>
							</li>
							<li class="nav-item mrg-15">
								<a class="nav-link" href="{{ route('users.edit') }}">
									<span class="btn-text">{{ __('プロフィール編集') }}</span>
								</a>
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
			<p class="fs-4">{{ config('app.name', 'gablly') }}</p>
			<ul class="nav justify-content-center fw-bold">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('top') }}"><span class="btn-text">トップページへ<span class="mrg-15">&gt;</span></span></a>
				</li>
				@if (Auth::check())
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="btn-text">{{ __('ログアウト') }}<span class="mrg-15">&gt;</span></span></a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">
							<span class="btn-text">{{ __('ログイン') }}<span class="mrg-15">&gt;</span></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">
							<span class="btn-text">{{ __('会員登録') }}<span class="mrg-15">&gt;</span></span>
						</a>
					</li>
				@endif
				<li class="nav-item">
					<a class="nav-link" href="{{ route('contact') }}">
						<span class="btn-text">{{ __('お問い合わせ') }}<span class="mrg-15">&gt;</span></span>
					</a>
				</li>
			</ul>
			<div class="container justify-content-center">
				<p>© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</p>
			</div>
		</footer>
		<!-- footer -->

	</div>
</body>
</html>
