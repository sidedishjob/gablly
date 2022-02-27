// 入力欄制御（ラベル位置）
var input_name = document.querySelectorAll(".js-input");

input_name.forEach(function (target) {
	target.addEventListener("change",function() {
		if (this.value) {
			this.classList.add('not-empty');
		} else {
			this.classList.remove('not-empty');
		}
	});
});
