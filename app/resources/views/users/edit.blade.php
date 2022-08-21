@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('js')
<script src="{{ asset('js/user.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/users/user.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- errorMessage Area-->
					@error('is_passchange_Error')
						<!-- パスワード変更時エラーリダイレクト判断用 -->
						<div id="isError" hidden></div>
					@enderror
					<div id="error_area" class="mb-5 pt-1 pb-1 error-area text-center @if($errors->any()) d-block @endif">
						@if($errors->any())
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
						@endif
					</div>
					<!-- errorMessage Area-->
					<!-- successMessage Area-->
					@if(session()->has('success_message'))
						<div class="mb-5 text-center">
							<div class="mb-3 pt-1 pb-1 success-area">
								<span class="d-block success-message" role="alert">
									<strong>{{ session('success_message') }}</strong>
								</span>
							</div>
							@if(session()->has('email_verify_message'))
								<div class="pt-1 pb-1 email-verify-area">
									<span class="d-block success-message" role="alert">
										<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
											@csrf

											<strong>
												{{ session('email_verify_message') }}<br>

												{{ __('メールに記載されているリンクをクリックして、登録手続きを完了してください。') }}<br>
												{{ __('メールが届いていなければ、') }}
												<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('こちらをクリックして再送信してください。') }}</button>
											</strong>

										</form>
									</span>
								</div>
							@endif
						</div>
					@endif
					<!-- successMessage Area-->

					<form method="POST" action="{{ route('users.update') }}" onsubmit="return userCheck()">
						@csrf
						<input name="id" type="hidden" value="{{$user->id}}">
						<input name="version" type="hidden" value="{{$user->version}}">

						<!-- box1 Area -->
						<div id="box1" class="box prof-change">
							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-regular fa-user fa-lg form-icon"></i>
										<input id="user_name" type="text" class="form-control input-text js-input box1-item @error('user_name') is-invalid @enderror" name="user_name" value="{{ $user->user_name }}" required autocomplete="user_name" placeholder="" autofocus oninput="btnActive()">
										<label class="label" for="user_name">ユーザー名</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-regular fa-envelope fa-lg form-icon"></i>
										<input id="email" type="email" class="form-control input-text js-input box1-item @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" oninput="btnActive()">
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
										<input id="current_password" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="current_password" autocomplete="current_password" oninput="btnActive()">
										<label class="label" for="current_password">現在のパスワード</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-solid fa-key fa-lg form-icon"></i>
										<input id="password" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="password" autocomplete="new-password" oninput="btnActive()">
										<label class="label" for="password">新しいパスワード</label>
									</div>
								</div>
							</div>

							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<div class="input-group">
										<i class="fa-solid fa-key fa-lg form-icon"></i>
										<input id="password_confirm" type="password" class="form-control input-text js-input box2-item @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" oninput="btnActive()">
										<label class="label" for="password_confirm">新しいパスワード（再入力）</label>
									</div>
								</div>
							</div>
						</div>
						<!-- box2 Area -->

						<!-- box3 Area -->
						<div id="box3" class="box user-delete">
							<div class="row mb-5 justify-content-center">
								<div class="col-md-6">
									<h2>{{ __('アカウント削除') }}</h2><br>
									<p>{{ __('アカウントを削除すると投稿したデータは全て削除されます。') }}<br>{{ __('アカウントを削除しますか？') }}</p>
								</div>
							</div>
						</div>
						<!-- box3 Area -->

						<div class="row mb-0 justify-content-center">
							<div class="col-auto">
								<button type="submit" id="updateBtn" class="btn btn-outline-dark" name="update" disabled>
									{{ __('更　新') }}
								</button>
								<button type="submit" id="deleteBtn" class="btn btn-outline-danger" name="delete" onclick="return confirm('アカウントを削除します。')" style="display: none">
									{{ __('アカウントを削除する') }}
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
				<li class="nav-item">
					<button type="button" id="boxChangeBtn3" class="nav-link btn box-tab user-delete-tab" onclick="boxChange(this)">アカウント削除</button>
				</li>
			</ul>

		</div>
	</div>
</div>
@endsection

