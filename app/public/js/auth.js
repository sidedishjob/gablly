//入力欄制御 (ラベル位置)
const input_name = document.querySelectorAll('.js-input');

window.addEventListener('load', function () {
	input_name.forEach(function (target) {
		if (target.value) {
			target.classList.add('not-empty');
		} else {
			target.classList.remove('not-empty');
		}
	});
});
input_name.forEach(function (target) {
	target.addEventListener('blur', function() {
		if (this.value) {
			this.classList.add('not-empty');
		} else {
			this.classList.remove('not-empty');
		}
	});
});