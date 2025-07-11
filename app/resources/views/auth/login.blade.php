@extends('layouts.app')
@section('title', 'ログイン')
@section('css')
<link href="{{ asset('css/auth/login.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 center-block">

			<!-- card -->
			<div class="card">
				<p class="login-text">
					<span class="fa-stack fa-lg">
						<i class="fa fa-lock fa-stack-1x"></i>
					</span>
				</p>
				<div class="card-body">

					<!-- errorMessage Area-->
					<div id="error_area" class="mb-5 pt-1 pb-1 error-area text-center @if($errors->any()) d-block @endif">
						@if($errors->any())
							@error('user_name')
								<span class="invalid-feedback @error ('user_name') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('password')
								<span class="invalid-feedback @error ('password') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						@endif
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="{{ route('login') }}" onsubmit="return loginCheck()">
						@csrf

						<div class="row mb-5 justify-content-center">
							<div class="col">
								<div class="input-group">
									<i class="fa-regular fa-user fa-lg form-icon"></i>
									<input id="user_name" type="text" class="form-control input-text js-input @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
									<label class="label" for="user_name">{{ __('ユーザー名またはメールアドレス') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col">
								<div class="input-group">
									<i class="fa-solid fa-key fa-lg form-icon"></i>
									<input id="password" type="password" class="form-control input-text js-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
									<label class="label" for="password">{{ __('パスワード') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-auto">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('ログイン状態を記憶') }}
									</label>
								</div>
							</div>
						</div>
						
						<div class="row mb-2 justify-content-center">
							<div class="col-auto">
								<button type="submit" class="btn btn-outline-dark">
									{{ __('ログイン') }}
								</button>
							</div>
						</div>

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										<span class="btn-text">{{ __('パスワードを忘れた方はこちら') }}</span>
									</a>
								@endif
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
