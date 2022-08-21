@extends('layouts.app')
@section('title', 'ABOUT')
@section('js')
<script src="{{ asset('js/about.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- loading -->
<div id="loader">
	<div class="sk-cube-grid">
		<div class="sk-cube sk-cube1"></div>
		<div class="sk-cube sk-cube2"></div>
		<div class="sk-cube sk-cube3"></div>
		<div class="sk-cube sk-cube4"></div>
		<div class="sk-cube sk-cube5"></div>
		<div class="sk-cube sk-cube6"></div>
		<div class="sk-cube sk-cube7"></div>
		<div class="sk-cube sk-cube8"></div>
		<div class="sk-cube sk-cube9"></div>
	</div>
</div>
<!-- loading -->

<section id="box1" class="box">
	<div class="container">
		<div class="text-item -title-text fw-bold">
			<p>{{ __('記憶') }}<span class="">{{ __('の') }}</span>{{ __('美術館') }}</p>
		</div>
		<div class="logo-item">
			<h1 class="fw-bold">{{ config('app.name', 'gablly') }}</h1>
		</div>
	</div>
</section>

<section id="box2" class="box">
	<div class="container fw-bold">
		<div class="bg-img -bg-img-top"></div>
		<div class="bg-img -bg-img-bottom"></div>
		<div class="text-item -text-1 fs-2">
			<p>
				<span class="fs-5 ls-1 fw-normal">{{ __('あのときの ')}}</span>
				{{ __('景色。') }}
			</p>
		</div>
		<div class="text-item -text-2 fs-2">
			<p>
				<span class="fs-5 ls-1 fw-normal">{{ __('あのときの ')}}</span>
				{{ __('感情。') }}
			</p>
		</div>
		<div class="text-item -text-3 fs-2">
			<p>
				<span class="fs-5 ls-1 fw-normal">{{ __('あのときの ')}}</span>
				{{ __('匂い。') }}
			</p>
		</div>
		<div class="text-item -text-4 fs-2">
			<p>
				<span class="fs-5 ls-1 fw-normal">{{ __('あのときの ')}}</span>
				{{ __('音。') }}
			</p>
		</div>
		<div class="text-item -text-5 fs-2">
			<p>
				<span class="fs-5 ls-1 fw-normal">{{ __('あのときの ')}}</span>
				{{ __('感触。') }}
			</p>
		</div>
	</div>
</section>

<section id="box3" class="box">
	<div class="container">
		<div class="door-container">
			<div class="door-item">
				<img src="{{ asset('image/about_door.png') }}" alt="door">
			</div>
		</div>
	</div>
</section>

<section id="box4" class="box">
	<div class="container">
		<div class="text-body fw-bold">
			<p>
				一つとして同じのない<br><br>
				あなたの完全オリジナル<br><br>
				あなたにしか作れない<br><br>
				あなたの記憶を表現した美術館<br><br>
				人生のギャラリー<br><br>
				etc...
			</p>
			<p>
				山  人  絵  植物  食  建築<br><br>
				どんな展示にしてもいい
			</p>
			<p>
				統一されているのもよし、バラバラでもよし
			</p>
		</div>
		<div class="link-item">
			<a class="btn" href="{{ route('register') }}">会員登録 ▶</a>
		</div>
	</div>
</section>
@endsection
