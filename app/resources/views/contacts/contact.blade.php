@extends('layouts.app')
@section('title', 'お問い合わせ')
@section('css')
<link href="{{ asset('css/contact.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					@if($errors->any())
						<div class="mb-5 pt-1 pb-1 error-area text-center">
							@error('name')
								<span class="invalid-feedback d-block @error ('name') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('email')
								<span class="invalid-feedback d-block @error ('email') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('message')
								<span class="invalid-feedback d-block @error ('message') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					@endif
					<!-- errorMessage Area-->

					<form method="POST" action="{{ route('contact.send') }}">
						@csrf

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-regular fa-user fa-lg form-icon"></i>
									<input id="name" type="text" class="form-control input-text js-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="" autofocus>
									<label class="label" for="name">お名前</label>
								</div>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-regular fa-envelope fa-lg form-icon"></i>
									<input id="email" type="email" class="form-control input-text js-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
									<label class="label" for="email">メールアドレス</label>
								</div>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-solid fa-comments fa-lg form-icon"></i>
									<textarea id="message" type="text" class="form-control input-text js-input @error('message') is-invalid @enderror" name="message" required autocomplete="コンテンツ" placeholder="" autofocus>{{ old('message') }}</textarea>
									<label class="label label-body" for="message">お問い合わせ内容</label>	
								</div>
							</div>
						</div>

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="submit" onclick="return confirm('入力内容で送信してよろしいですか？')"  class="btn btn-outline-dark">
									{{ __('送信') }}
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
