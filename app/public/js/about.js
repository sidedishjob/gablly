// ABOUT画面

// section fadeIn
const arraySection = document.querySelectorAll('.box');

window.addEventListener('load', function () {
	sectionFadeIn();
});
window.addEventListener('scroll', function () {
	sectionFadeIn();
});

// section表示
function sectionFadeIn () {
	arraySection.forEach(function (element) {
		// ターゲットの位置を取得ƒ
		const target = element.getBoundingClientRect().top + window.pageYOffset; // offset().top;
		// スクロール量を取得
		const scroll = window.scrollY;
		// ウィンドウの高さを取得
		const height = element.clientHeight;
		// ターゲットまでスクロールするとフェードインする
		if (scroll > target - height) {
			// クラスを付与
			element.classList.add('active');
		} else {
			// element.classList.remove('active');
		}
	});
};

// loading画面表示&非表示
window.addEventListener('DOMContentLoaded', function() {
	const loader = document.getElementById('loader');
	loader.classList.add('loaded');
	const box = document.getElementById('box1');
	if (box != null) {
		box.classList.add('active');
	}
});