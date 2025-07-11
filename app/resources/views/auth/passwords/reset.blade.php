@extends('layouts.app')
@section('title', 'パスワード再設定')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">
					<!-- errorMessage Area-->
					<div id="error_area"  class="mb-5 pt-1 pb-1 error-area text-center @if($errors->any()) d-block @endif">
						@if($errors->any())
							@error('email')
								<span class="invalid-feedback @error ('email') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('password')
								<span class="invalid-feedback d-block @error ('password') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						@endif
					</div>
					<!-- errorMessage Area-->

					<form method="POST" action="{{ route('password.update') }}" onsubmit="return resetPasswordCheck()">
						@csrf

						<input type="hidden" name="token" value="{{ $token }}">

						<div class="row mb-5 justify-content-center">
							<div class="col">
								<div class="input-group">
									<i class="fa-regular fa-envelope fa-lg form-icon"></i>
									<input id="email" type="email" class="form-control input-text js-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
									<label class="label" for="email">{{ __('メールアドレス') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-5 justify-content-center">
							<div class="col">
								<div class="input-group">
									<i class="fa-solid fa-key fa-lg form-icon"></i>
									<input id="password" type="password" class="form-control input-text js-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
									<label class="label" for="password">{{ __('パスワード') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-5 justify-content-center">
							<div class="col">
								<div class="input-group">
									<i class="fa-solid fa-key fa-lg form-icon"></i>
									<input id="password_confirm" type="password" class="form-control input-text js-input" name="password_confirmation" autocomplete="new-password">
									<label class="label" for="password_confirm">{{ __('新しいパスワード（再入力）') }}</label>
								</div>
							</div>
						</div>

						<div class="row mb-2 justify-content-center">
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
