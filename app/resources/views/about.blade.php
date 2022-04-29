@extends('layouts.app')
@section('title', 'トップ')
@section('js')
<script src="{{ asset('js/common.js') }}" defer></script>
@endsection
@section('css')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="box1" class="box">
	<div class="container">
		<div class="door-container">
			<div class="door-item">
				<img src="{{ asset('image/about_door.png') }}" alt="door">
			</div>
		</div>
	</div>
</section>

<section id="box2" class="box">
	<div class="container">
			<div class="text-item -text-1">
				<p>あのときの景色。</p>
			</div>
			<div class="text-item -text-2">
				<p>あのときの感情。</p>
			</div>
			<div class="text-item -text-3">
				<p>あのときの匂い。</p>
			</div>
			<div class="text-item -text-4">
				<p>あのときの音。</p>
			</div>
			<div class="text-item -text-5">
				<p>あのときの感触。</p>
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
		<div class="text-item -title-text">
			<p>あなただけの<span class="mrg-15"></span><span class="fs-1 fw-bold">記憶の美術館</span></p>
			<p class="-title-text-en lh-base text-nowrap">
				<span class="text-danger">Ga</span>llery o<span class="text-danger">f </span>Memo<span class="text-danger">ry</span>
			</p>
		</div>
		<div class="logo-item">
			<p class="fs-1 fw-bold">{{ config('app.name', 'gablly') }}</p>
		</div>
	</div>
</section>

<section id="box5" class="box">
	<div class="container">
		<div class="door-container">
			<div class="door-item">
				<img src="{{ asset('image/about_door.png') }}" alt="door">
			</div>
		</div>
	</div>
</section>

<section id="box6" class="box">
	<div class="container">
		<div class="text-body">
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
			<a class="btn" href="{{ route('register') }}">会員登録</a>
		</div>
	</div>
</section>
@endsection
