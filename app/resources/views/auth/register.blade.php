@extends('layouts.app')
@section('title', '会員登録')
@section('css')
<link href="{{ asset('css/auth/common.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					<div class="error-area">
						@error('user_name')
							<span class="invalid-feedback d-block @error ('user_name') error-message @enderror" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						@error('email')
							<span class="invalid-feedback d-block @error ('email') error-message @enderror" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						@error('password')
							<span class="invalid-feedback d-block @error ('password') error-message @enderror" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-regular fa-user fa-lg form-icon"></i>
									<input id="user_name" type="text" class="form-control input-text js-input @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" placeholder="" autofocus>
									<label class="label" for="user_name">ユーザー名</label>
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
									<i class="fa-solid fa-key fa-lg form-icon"></i>
									<input id="password" type="password" class="form-control input-text js-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
									<label class="label" for="password">パスワード</label>
								</div>
							</div>
						</div>

						<div class="row mb-5 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-solid fa-key fa-lg form-icon"></i>
									<input id="password-confirm" type="password" class="form-control input-text js-input" name="password_confirmation" required autocomplete="new-password">
									<label class="label" for="password-confirm">パスワード（再入力）</label>
								</div>
							</div>
						</div>

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="submit" class="btn btn-outline-dark">
									{{ __('登録') }}
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
