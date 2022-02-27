@extends('layouts.app')
@section('title', '会員登録')
@section('css')
<link href="{{ asset('css/auth/common.css')}}" rel="stylesheet">
{{-- <link href="{{ asset('css/auth/register.css')}}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="row mb-4 justify-content-center">

							<div class="col-md-6">
								{{-- <i class="fa-regular fa-user form-icon"></i> --}}
								<input id="name" type="text" class="form-control input-text js-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="" autofocus>
								<label class="label" for="name">User Name</label>

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<input id="email" type="email" class="form-control input-text js-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
								<label class="label" for="email">Email Address</label>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<input id="password" type="password" class="form-control input-text js-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
								<label class="label" for="password">Password</label>

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="row mb-5 justify-content-center">
							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control input-text js-input" name="password_confirmation" required autocomplete="new-password">
								<label class="label" for="password-confirm">Confirm Password</label>
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
