<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="description" content="gablly 公開までしばらくお待ちください。。。">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'gablly') }} - commin soon...</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Rampart+One&family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet">

	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

	<style>
		* {
			margin: 0px;
			padding: 0px;
		}

		.container {
			font-size: 1.5em;
		}

		.container h1 {
			font-family: 'Rampart One', cursive;
			font-family: 'Source Sans Pro', sans-serif;
			text-align: center;
			margin-top: 5em;
		}

		.container .countdown {
			font-family: 'Rampart One', cursive;
			font-family: 'Source Sans Pro', sans-serif;
			text-align: center;
			padding-top: 1em;
		}
	</style>

</head>
<body>
	<script>
		let countdown = setInterval(function(){
			const now = new Date()  //今の日時
			const target = new Date('2022', '9' -1, '17','15','30','00') //ターゲット日時を取得
			const remainTime = target - now  //差分を取る（ミリ秒で返ってくる

			//指定の日時を過ぎていたら処理をしない
			if(remainTime < 0) {
				//残りの日時を0で上書き
				document.getElementById("countdown-day").textContent  = '00'
				document.getElementById("countdown-hour").textContent = '00'
				document.getElementById("countdown-min").textContent  = '00'
				document.getElementById("countdown-sec").textContent  = '00'
				window.location.href = "about";
				return false 
			}
			//差分の日・時・分・秒を取得
			const difDay  = Math.floor(remainTime / 1000 / 60 / 60 / 24)
			const difHour = Math.floor(remainTime / 1000 / 60 / 60 ) % 24
			const difMin  = Math.floor(remainTime / 1000 / 60) % 60
			const difSec  = Math.floor(remainTime / 1000) % 60

			//残りの日時を上書き
			document.getElementById("countdown-day").textContent  = difDay
			document.getElementById("countdown-hour").textContent = difHour
			document.getElementById("countdown-min").textContent  = difMin
			document.getElementById("countdown-sec").textContent  = difSec

			//指定の日時になればカウントを止める
			if(remainTime < 0) clearInterval(countdown)

		}, 1000)    //1秒間に1度処理
	</script>

	<div id="app">
		<div class="container">

			<h1 >comming soooon...</h1>

			<div id="countdownArea" class="countdown">
				<span id="countdown-day"></span> days
				<span id="countdown-hour"></span> hrs
				<span id="countdown-min"></span> mins
				<span id="countdown-sec"></span> secs
			</div>

		</div>
	</div>
</body>
</html>
