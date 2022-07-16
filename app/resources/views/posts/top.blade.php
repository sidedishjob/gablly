@extends('layouts.app')
@section('title', '投稿一覧')
@section('js')
<script src="{{ asset('js/post.js') }}" defer></script>
<!-- CDN読み込み -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
@endsection
@section('css')
<!-- CDN読み込み -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
{{-- <link href="{{ asset('css/auth/common.css')}}" rel="stylesheet"> --}}
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">

			<div class="card">
				<div class="card-body">

					<form method="POST" action="/posts">
						@csrf

						<div class="row mt-5 mb-5 flex-nowrap infinite-slider">

							<div class="swiper">
								<div class="col m-3 swiper-wrapper">
									@foreach ($posts as $post)
									<a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="swiper-slide">
										<article class="slide">
											<div class="slide-media img-cover">
												<img src="{{ asset($post->image_path) }}" alt="">
											</div>
											<div class="slide-content">
												<h2 class="slide-title text-title fs-5 fw-bold mt-3">{{ __($post->title) }}</h2>
											</div>
										</article>
									</a>
									@endforeach
								</div>
							</div>

						</div>


						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="submit" class="btn btn-outline-dark">
									{{ __('キャンセル') }}
								</button>
								<button type="submit" class="btn btn-outline-dark">
									{{ __('投稿') }}
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
