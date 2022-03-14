@extends('layouts.app')
@section('title', 'ログイン')
@section('css')
<link href="{{ asset('css/auth/common.css')}}" rel="stylesheet">
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
					@error('email')
						<span class="invalid-feedback @error ('email') error-message @enderror" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					@error('password')
						<span class="invalid-feedback @error ('password') error-message @enderror" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<!-- errorMessage Area-->

					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<input id="email" type="email" class="form-control input-text js-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								<label class="label" for="email">User Name or Email</label>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<input id="password" type="password" class="form-control input-text js-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
								<label class="label" for="password">Password</label>
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
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
