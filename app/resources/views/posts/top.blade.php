@extends('layouts.app')
@section('title')
{{ Auth::user()->user_name }}
@endsection
@section('js')
<script src="{{ asset('js/posts/top.js') }}" defer></script>
<!-- CDN読み込み -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<!-- CDN読み込み -->
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">

			<div class="card card-top">
				<div class="card-body">

					<div class="row mt-3 mb-3 flex-nowrap infinite-slider">

						<div class="swiper">
							<div class="col m-3 swiper-wrapper">
								@foreach ($posts as $post)
									<div class="swiper-slide inside{{$post->id}}">
										<article class="slide" onclick="flip(this, {{$post->id}})" id="slideNum{{$post->id}}">
											<!-- Front -->
											<div class="slide-front slide-front-item-{{$post->id}}">
												<div class="slide-media img-cover">
													<img src="{{ asset($post->image_path) }}" alt="Phot by $user_name on $day.">
												</div>
												<div class="slide-content">
													<h2 class="slide-title text-title fs-5 fw-bold mt-4">{{ __($post->title) }}</h2>
												</div>
											</div>
											<!-- Front -->

											<!-- Back -->
											<div class="slide-back slide-back-item-{{$post->id}}">
												<div class="slide-content">
													<p class="slide-body text-body fs-5 fw-bold">{{ __($post->body) }}</p>
												</div>
												<div class="slide-link">
													<a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="swiper-slide">
														{{ __('投稿編集 ▶') }}
													</a>
												</div>
											</div>
											<!-- Back -->
										</article>
									</div>
								@endforeach
							</div>
						</div>

					</div>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
