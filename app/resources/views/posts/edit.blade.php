@extends('layouts.app')
@section('title', '投稿編集')
@section('js')
<script src="{{ asset('js/post.js') }}" defer></script>
@endsection
@section('css')
{{-- <link href="{{ asset('css/auth/common.css')}}" rel="stylesheet"> --}}
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					<div class="error-area">
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
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="/posts" enctype="multipart/form-data">
						@csrf

						<div class="row">
							<div class="mb-0 jusify-content-center col-6 d-flex align-items-center">
								<div class="input-group">
									<img id="image_prev" src="{{ asset('/image/no_image.png') }}">
									<label class="upload-label btn btn-outline-dark">
										画像を選択
										<input id="image_path" type="file" accept="image/*"  name="image_path" required>
									</label>
								</div>
							</div>

							<div class="mb-5 justify-content-center col-6">
								<div class="input-group">
									<input id="title" type="text" class="form-control input-text js-input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="" autofocus>
									<label class="label" for="title">タイトル</label>
								</div>
								<div class="input-group">
									<textarea id="body" type="text" class="form-control input-text js-input @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="コンテンツ" placeholder="" autofocus></textarea>
									<label class="label label-body" for="body">コンテンツ</label>
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
