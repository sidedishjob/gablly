<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="description" content="【デモページ】gablly であなただけの記憶の美術館を作ってみましょう">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'gablly') }} - DEMO</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/auth.js') }}" defer></script>
	<script src="{{ asset('js/posts/top.js') }}" defer></script>
	<script src="{{ asset('js/posts/swiper-bundle.min.js') }}" defer></script>
	
	<!-- Fonts -->
	<link href="//fonts.gstatic.com" rel="dns-prefetch">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/common.css')}}" rel="stylesheet">
	<link href="{{ asset('css/posts/swiper-bundle.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
	
</head>
<body>
	<div id="app">

		<!-- header -->
		<nav id="header-nav" class="navbar navbar-expand-md navbar-light header-about">
			<div class="container">
				<a class="fw-bold fs-2 navbar-brand" href="{{ route('top') }}">
					{{ config('app.name', 'gablly') }}
				</a>
			</div>
		</nav>
		<!-- header -->

		<!-- main contents -->
		<main class="main">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col">
			
						<div class="card card-top">
							<div class="card-body">
			
								<div class="row mt-3 mb-3 flex-nowrap infinite-slider">
			
									<div class="swiper">
										<div class="col m-3 swiper-wrapper">
			
											<!-- slide-1 -->
											<div class="swiper-slide inside1">
												<article class="slide" onclick="flip(this, 1)" id="slideNum1">
													<!-- Front -->
													<div class="slide-front slide-front-item-1">
														<div class="slide-media img-cover">
															<img src="{{ asset('image/demo/01_mountain.png') }}" alt="Phot by mountain.">
														</div>
														<div class="slide-content">
															<h2 class="slide-title text-center fs-5 fw-bold mt-4">{{ __('mountain') }}</h2>
														</div>
													</div>
													<!-- Front -->
			
													<!-- Back -->
													<div class="slide-back slide-back-item-1">
														<div class="slide-content">
															<p class="slide-body text-body fs-5 fw-bold">{{ __('夕焼け') }}</p>
														</div>
														<div class="slide-link">
															{{ __('投稿編集 ⇢') }}
														</div>
													</div>
													<!-- Back -->
												</article>
											</div>
											<!-- slide-1 -->
			
											<!-- slide-2 -->
											<div class="swiper-slide inside2">
												<article class="slide" onclick="flip(this, 2)" id="slideNum2">
													<!-- Front -->
													<div class="slide-front slide-front-item-2">
														<div class="slide-media img-cover">
															<img src="{{ asset('image/demo/02_bridge.jpg') }}" alt="Phot by bridge.">
														</div>
														<div class="slide-content">
															<h2 class="slide-title text-center fs-5 fw-bold mt-4">{{ __('bridge') }}</h2>
														</div>
													</div>
													<!-- Front -->
			
													<!-- Back -->
													<div class="slide-back slide-back-item-2">
														<div class="slide-content">
															<p class="slide-body text-body fs-5 fw-bold">{{ __('無限の空間') }}</p>
														</div>
														<div class="slide-link">
															{{ __('投稿編集 ⇢') }}
														</div>
													</div>
													<!-- Back -->
												</article>
											</div>
											<!-- slide-2 -->
			
											<!-- slide-3 -->
											<div class="swiper-slide inside3">
												<article class="slide" onclick="flip(this, 3)" id="slideNum3">
													<!-- Front -->
													<div class="slide-front slide-front-item-3">
														<div class="slide-media img-cover">
															<img src="{{ asset('image/demo/03_city.jpg') }}" alt="Phot by city.">
														</div>
														<div class="slide-content">
															<h2 class="slide-title text-center fs-5 fw-bold mt-4">{{ __('city') }}</h2>
														</div>
													</div>
													<!-- Front -->
			
													<!-- Back -->
													<div class="slide-back slide-back-item-3">
														<div class="slide-content">
															<p class="slide-body text-body fs-5 fw-bold">{{ __('夕焼けに染まる街') }}</p>
														</div>
														<div class="slide-link">
															{{ __('投稿編集 ⇢') }}
														</div>
													</div>
													<!-- Back -->
												</article>
											</div>
											<!-- slide-3 -->
			
											<!-- slide-4 -->
											<div class="swiper-slide inside4">
												<article class="slide" onclick="flip(this, 4)" id="slideNum4">
													<!-- Front -->
													<div class="slide-front slide-front-item-4">
														<div class="slide-media img-cover">
															<img src="{{ asset('image/demo/04_falling.jpg') }}" alt="Phot by falling man.">
														</div>
														<div class="slide-content">
															<h2 class="slide-title text-center fs-5 fw-bold mt-4">{{ __('falling man') }}</h2>
														</div>
													</div>
													<!-- Front -->
			
													<!-- Back -->
													<div class="slide-back slide-back-item-4">
														<div class="slide-content">
															<p class="slide-body text-body fs-5 fw-bold">{{ __('携帯に吸い込まれているのか
																男が落ちているのか') }}
															</p>
														</div>
														<div class="slide-link">
															{{ __('投稿編集 ⇢') }}
														</div>
													</div>
													<!-- Back -->
												</article>
											</div>
											<!-- slide-4 -->
			
										</div>
									</div>
			
								</div>
			
							</div>
						</div>
						<!-- card -->
			
					</div>
				</div>
			</div>
		</main>
		<!-- main contents -->

		<!-- footer -->
		<footer>
			<p class="fs-4">{{ config('app.name', 'gablly') }}</p>
			<ul class="nav justify-content-center fw-bold">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('top') }}"><span class="btn-text">トップページへ<span class="mrg-15">&gt;</span></span></a>
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