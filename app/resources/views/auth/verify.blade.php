@extends('layouts.app')
@section('title', 'メールアドレスを確認してください')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<!-- successMessage Area-->
					@if (session('resent'))
						<div class="mb-5 pt-1 pb-1 success-area text-center">
							<span class="d-block success-message" role="alert">
								<strong>{{ __('新しい確認リンクがメールアドレスに送信されました。') }}</strong>
							</span>
						</div>
					@endif
					<!-- successMessage Area-->

					<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
						@csrf

						<h2>{{ __('ユーザー登録を完了してください') }}</h2><br>
						<p>
							{{ __('メールに記載されているリンクをクリックして、登録手続きを完了してください。') }}<br>
							{{ __('メールが届いていなければ、') }}
							<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('こちらをクリックして再送信してください。') }}</button>
						</p>

					</form>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
