@extends('layouts.app')
@section('title', 'お探しのページは見つかりませんでした')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					@php
						$status_code = $exception->getStatusCode();
						$message = $exception->getMessage();

						if (!$message) {
							switch ($status_code) {
								case 400:
									$message = 'Bad Request';
									break;
								case 401:
									$message = '認証に失敗しました';
									break;
								case 403:
									$message = 'アクセス権がありません';
									break;
								case 404:
									$message = 'Not Found';
									break;
								case 408:
									$message = 'タイムアウトです';
									break;
								case 414:
									$message = 'リクエストURIが長すぎます';
									break;
								case 419:
									$message = '不正なリクエストです';
									break;
								case 500:
									$message = 'Internal Server Error';
									break;
								case 503:
									$message = 'Service Unavailable';
									break;
								default:
									$message = 'エラー';
									break;
							}
						}
					@endphp

					<h2>{{ $status_code }} {{ $message }}</h2>
					@if ($status_code == 404)
						<p>{{ __('お探しのページは見つかりません') }}</p><br>
					@else
						<p>{{ __('問題が発生しました') }}</p><br>
					@endif
					<p>
						{{ __('お探しのページは一時的にアクセス出来ない状態にあるか、') }}<br>
						{{ __('移動もしくは削除された可能性があります。') }}<br>
						{{ __('お手数ですが、gabllyトップページから再度アクセスしてください。') }}
					</p>

					<div class="row mt-4 justify-content-center">
						<div class="col-auto">
							<a href="{{ route('top') }}">
							<button type="button"  class="btn btn-outline-dark">
								{{ __('トップページへ戻る') }}
							</button>
							</a>
						</div>
					</div>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
