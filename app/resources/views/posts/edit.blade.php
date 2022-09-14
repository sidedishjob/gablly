@extends('layouts.app')
@section('title', '投稿編集')
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
							@error('exclusive_lock_error')
								<span class="invalid-feedback d-block @error ('exclusive_lock_error') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						@endif
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="/posts/update" onsubmit="return postCheck()">
						@csrf
						<input name="id" type="hidden" value="{{$post->id}}">
						<input name="version" type="hidden" value="{{$post->version}}">

						<div class="row">
							<div class="mb-0 jusify-content-center col-6 d-flex align-items-center">
								<div class="input-group">
									<img id="image_prev" src="{{ asset($post->image_path) }}" alt="Phot by $user_name on $day.">
								</div>
							</div>

							<div class="mb-0 justify-content-center col-6">
								<div class="mt-3 input-group">
									<i class="fa-regular fa-image fa-lg form-icon"></i>
									<input id="title" type="text" class="form-control input-text js-input @error('title') is-invalid @enderror" name="title" value="@error('title'){{ old('title') }}@enderror{{ $post->title }}" required autocomplete="title" placeholder="" autofocus>
									<label class="label" for="title">{{ __('タイトル') }}</label>
								</div>
								<div class="input-group">
									<i class="fa-regular fa-keyboard fa-lg form-icon"></i>
									<textarea id="body" type="text" class="form-control input-text js-input @error('body') is-invalid @enderror" name="body" value="" required autocomplete="コンテンツ" placeholder="" autofocus>@error('body'){{ old('body') }}@enderror{{ $post->body }}</textarea>
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
							</div>
							<div class="col-auto">
									<button type="submit" class="ms-3 btn btn-outline-dark" name="update">
									{{ __('更　新') }}
								</button>
							</div>
							<div class="col-auto">
								<button type="submit" class="ms-5 btn btn-outline-danger" name="delete" onclick="return confirm('投稿を削除します。')">
									{{ __('削　除') }}
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
