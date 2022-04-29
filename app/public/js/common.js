// common
// section fadeIn
const section_name = document.querySelectorAll(".box");

window.onload = function () {
	sectionFadeIn();
};
window.addEventListener("scroll", function () {
	sectionFadeIn();
});

// section表示
function sectionFadeIn () {
	section_name.forEach(function (element) {
		// ターゲットの位置を取得
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
