@extends('layouts.app')
@section('title', '投稿編集')
@section('js')
<script src="{{ asset('js/post.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					@if($errors->any() || session()->has('exclusive_lock_error'))
						<div class="mb-5 pt-1 pb-1 error-area text-center">
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
							@if(session()->has('exclusive_lock_error'))
								<span class="invalid-feedback d-block error-message" role="alert">
									<strong>{{ session('exclusive_lock_error') }}</strong>
								</span>
							@endif
						</div>
					@endif
					<!-- errorMessage Area-->

					<form method="POST" action="/posts/update">
						@csrf

						<div class="row">
							<div class="mb-0 jusify-content-center col-6 d-flex align-items-center">
								<div class="input-group">
									<img id="image_prev" src="{{ asset($post->image_path) }}" alt="Phot by $user_name on $day.">
								</div>
							</div>

							<div class="mb-0 justify-content-center col-6">
								<div class="input-group">
									<input id="title" type="text" class="form-control input-text js-input @error('title') is-invalid @enderror" name="title" value="@error('title'){{ old('title') }}@enderror{{ $post->title }}" required autocomplete="title" placeholder="" autofocus>
									<label class="label" for="title">タイトル</label>
								</div>
								<div class="input-group">
									<textarea id="body" type="text" class="form-control input-text js-input @error('body') is-invalid @enderror" name="body" value="" required autocomplete="コンテンツ" placeholder="" autofocus>@error('body'){{ old('body') }}@enderror{{ $post->body }}</textarea>
									<label class="label label-body" for="body">コンテンツ</label>
								</div>
							</div>
						</div>

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="button" onclick="history.back()" class="btn btn-outline-dark">
									{{ __('キャンセル') }}
								</button>
							</div>
							<div class="col-auto">
									<button type="submit" name="update" class="ms-3 btn btn-outline-dark">
									{{ __('更　新') }}
								</button>
							</div>
							<div class="col-auto">
								<button type="submit" name="delete" onclick="return confirm('投稿を削除します。')" class="ms-5 btn btn-outline-danger">
									{{ __('削　除') }}
								</button>
							</div>
						</div>

						<input name="id" type="hidden" value="{{$post->id}}">
						<input name="version" type="hidden" value="{{$post->version}}">
					</form>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
