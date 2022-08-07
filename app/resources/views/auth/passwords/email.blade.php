@extends('layouts.app')
@section('title', 'パスワード忘れた方')
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
					@if($errors->any())
						<div class="mb-5 pt-1 pb-1 error-area text-center">
							@error('email')
								<span class="invalid-feedback d-block @error ('email') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					@endif
					<!-- errorMessage Area-->
					<!-- successMessage Area-->
					@if(session('status'))
						<div class="mb-5 pt-1 pb-1 success-area text-center">
							<span class="d-block success-message" role="alert">
								<strong>{{ session('status') }}</strong>
							</span>
						</div>
					@endif
					<!-- successMessage Area-->

					<div class="row mb-5 justify-content-center text-area">
						<h2 class="mb-4 w-auto">{{ __('パスワードを忘れた場合') }}</h2>
						<p class="w-auto">{{ __('ご登録頂いたメールアドレスを入力してください。') }}<br>
							{{ __('メールアドレス宛に、パスワード再設定ページのURLが記載されたメールをお送り致します。') }}</p>
					</div>

					<form method="POST" action="{{ route('password.email') }}">
						@csrf

						<div class="row mb-4 justify-content-center">
							<div class="col-md-6">
								<div class="input-group">
									<i class="fa-regular fa-envelope fa-lg form-icon"></i>
									<input id="email" type="email" class="form-control input-text js-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
									<label class="label" for="email">メールアドレスを入力してください</label>
								</div>
							</div>
						</div>

						<div class="row mb-2 justify-content-center">
							<div class="col-auto">
								<button type="submit" class="btn btn-outline-dark">
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
