@extends('layouts.app')
@section('title', '新規投稿')
@section('js')
<script src="{{ asset('js/posts/create.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card card-post">
				<div class="card-body">

					<!-- errorMessage Area-->
					<div id="error_area" class="mb-5 pt-1 pb-1 error-area text-center @if($errors->any()) d-block @endif">
						@if($errors->any())
							@error('title')
								<span class="invalid-feedback d-block @error ('title') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('body')
								<span class="invalid-feedback d-block @error ('body') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('image_path')
								<span class="invalid-feedback d-block  @error ('image_path') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('post_limit_error')
								<span class="invalid-feedback d-block  @error ('post_limit_error') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						@endif
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="/posts" enctype="multipart/form-data" onsubmit="return postCheck()">
						@csrf

						<div class="row">
							<div class="col-6 mb-0 jusify-content-center d-flex align-items-center">
								<div class="input-group">
									<img id="image_prev" src="{{ asset('/image/12_no_image.png') }}">
									<label class="upload-label btn btn-outline-dark">
										{{ __('画像を選択') }}
										<input id="image_path" type="file" accept="image/*"  name="image_path">
									</label>
								</div>
							</div>

							<div class="col-6 justify-content-center">
								<div class="mt-3 input-group">
									<i class="fa-regular fa-image fa-lg form-icon"></i>
									<input id="title" type="text" class="form-control input-text js-input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="" autofocus>
									<label class="label" for="title">{{ __('タイトル') }}</label>
								</div>
								<div class="input-group">
									<i class="fa-regular fa-keyboard fa-lg form-icon"></i>
									<textarea id="body" type="text" class="form-control input-text js-input @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="コンテンツ" placeholder="" autofocus></textarea>
									<label class="label label-body" for="body">{{ __('コンテンツ') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<a href="{{ route('top') }}" tabindex="-1">
									<button type="button" class="btn btn-outline-dark">
										{{ __('キャンセル') }}
									</button>
								</a>
								<button type="submit" class="ms-3 btn btn-outline-dark">
									{{ __('投　稿') }}
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
