//新規投稿作成画面

//アップロード画像プレビュー
window.addEventListener('DOMContentLoaded', function() {
	document.getElementById('image_path').addEventListener('change', function(element) {
		const reader = new FileReader;

		reader.onload = function(element) {
			document.getElementById('image_prev').setAttribute('src', element.target.result);
		}

		reader.readAsDataURL(element.target.files[0]);
	});
});
