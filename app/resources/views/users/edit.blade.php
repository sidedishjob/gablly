@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('js')
<script src="{{ asset('js/user.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/auth/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/users/user.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					@if($errors->any())
						@error('is_passchange_Error')
							<!-- パスワード変更時エラーリダイレクト判断用 -->
							<div id="isError" hidden></div>
						@enderror
						<div class="mb-5 pt-1 pb-1 error-area text-center">
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
							@error('currentpass_notmatch_error')
								<span class="invalid-feedback d-block @error ('currentpass_notmatch_error') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('unchanged_error')
								<span class="invalid-feedback d-block @error ('unchanged_error') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							@error('exclusive_lock_error')
								<span class="invalid-feedback d-block @error ('exclusive_lock_error') error-message @enderror" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					@endif
					<!-- errorMessage Area-->
					<!-- successMessage Area-->
					@if(session()->has('success_message'))
						<div class="mb-5 pt-1 pb-1 success-area text-center">
							<span class="d-block success-message" role="alert">
								<strong>{{ session('success_message') }}</strong>
							</span>
						</div>
					@endif
					<!-- successMessage Area-->

					<form method="POST" action="{{ route('users.update') }}">
						@csrf
						<input name="id" type="hidden" value="{{$user->id}}">
						<input name="version" type="hidden" value="{{$user->version}}">

						<!-- box1 Area -->
						<div id="box1" class="box prof-change">
							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-regular fa-user fa-lg form-icon"></i>
										<input id="user_name" type="text" class="form-control input-text js-input box1-item @error('user_name') is-invalid @enderror" name="user_name" value="{{ $user->user_name }}" required autocomplete="user_name" placeholder="" autofocus onchange="btnActive()">
										<label class="label" for="user_name">ユーザー名</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-regular fa-envelope fa-lg form-icon"></i>
										<input id="email" type="email" class="form-control input-text js-input box1-item @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" onchange="btnActive()">
										<label class="label" for="email">メールアドレス</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
									</div>
								</div>
							</div>
						</div>
						<!-- box1 Area -->

						<!-- box2 Area -->
						<div id="box2" class="box pass-change">
							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-solid fa-key fa-lg form-icon"></i>
										<input id="current_password" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="current_password" autocomplete="current_password" onchange="btnActive()">
										<label class="label" for="current_password">現在のパスワード</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-solid fa-key fa-lg form-icon"></i>
										<input id="password" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="password" autocomplete="new-password" onchange="btnActive()">
										<label class="label" for="password">新しいパスワード</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-solid fa-key fa-lg form-icon"></i>
										<input id="password_confirm" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" onchange="btnActive()">
										<label class="label" for="password_confirm">新しいパスワード（再入力）</label>
									</div>
								</div>
							</div>
						</div>
						<!-- box2 Area -->

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="submit" id="updateBtn" class="btn btn-outline-dark" name="update" disabled>
									{{ __('更　新') }}
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>
			<!-- card -->

			<ul class="nav nav-tabs mt-5 justify-content-center">
				<li class="nav-item">
					<button type="button" id="boxChangeBtn1" class="nav-link btn box-tab active" onclick="boxChange(this)">プロフィール編集</button>
				</li>
				<li class="nav-item">
					<button type="button" id="boxChangeBtn2" class="nav-link btn box-tab" onclick="boxChange(this)">パスワード変更</button>
				</li>
			</ul>

		</div>
	</div>
</div>
@endsection

