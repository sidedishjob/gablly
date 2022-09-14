@extends('layouts.app')
@section('title', 'お問い合わせ完了')
@section('css')
<link href="{{ asset('css/contacts/contact.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<div class="card">
				<div class="card-body">

					<h2>{{ __('お問い合わせメール送信完了') }}</h2><br>
					<p>{{ __('この度はお問い合わせ頂きまして、誠にありがとうございます。') }}<br>
						{{ __('お問い合わせ頂いた内容につきましては、確認の上、ご対応させて頂きます。') }}</p>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
