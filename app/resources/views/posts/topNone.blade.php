@extends('layouts.app')
@section('title', '投稿一覧')
@section('css')
<link href="{{ asset('css/posts/post.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">

			<div class="card">
				<div class="card-body text-center">

					<a class="d-inline-block" href="{{ route('posts.create') }}">
						<button type="button" class="btn btn-lg btn-outline-dark" name="">
							{{ __('新 規 投 稿 作 成 画 面 へ 　→') }}
						</button>
					</a>

				</div>
			</div>
			<!-- card -->

		</div>
	</div>
</div>
@endsection
