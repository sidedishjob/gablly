//登録ボタン活性制御（編集された時活性化）
function btnActive() {
	//submitボタン活性化
	document.getElementById('updateBtn').disabled = false;
}

//box切替（プロフィール編集⇄パスワード変更）
function boxChange(obj) {
	//フォームエリア表示切替
	const box1 = document.getElementById('box1');
	const box2 = document.getElementById('box2');
	const box3 = document.getElementById('box3');
	//フォームrequired属性（必須）切替
	const box1ItemsNodeList = document.querySelectorAll('.box1-item');
	const box2ItemsNodeList = document.querySelectorAll('.box2-item');
	/*------ IE11の対策 -----*/
	const box1Items = Array.prototype.slice.call(box1ItemsNodeList);  //Nodelistを配列化
	const box2Items = Array.prototype.slice.call(box2ItemsNodeList);  //Nodelistを配列化
	/*------ IE11の対策 -----*/
	const changeBtn1 = document.getElementById('boxChangeBtn1');
	const changeBtn2 = document.getElementById('boxChangeBtn2');
	const changeBtn3 = document.getElementById('boxChangeBtn3');
	//更新、削除ボタンname属性値&表示切替
	const updateBtn = document.getElementById('updateBtn');
	const deleteBtn = document.getElementById('deleteBtn');

	if (obj.id == 'boxChangeBtn1') {
		//プロフィール編集表示
		box1.style.display = 'block';
		box2.style.display = 'none';
		box3.style.display = 'none';

		//フォームrequired切替
		box1Items.forEach(function(element) {
			//box1の入力欄はrequired付与
			element.required = true;
		});
		 box2Items.forEach(function(element) {
			//box2の入力欄はrequired削除
			element.required = false;
		});

		//クラスを付与
		changeBtn1.classList.add('active');
		changeBtn2.classList.remove('active');
		changeBtn3.classList.remove('active');

		//更新ボタン表示
		updateBtn.style.display = 'block';
		//削除ボタン非表示
		deleteBtn.style.display = 'none';
		//更新ボタンname設定
		updateBtn.setAttribute('name', 'update');

		//タイトル変更
		document.title = 'gablly - プロフィール編集'

	} else if (obj.id == 'boxChangeBtn2') {
		//パスワード変更表示
		box1.style.display = 'none';
		box2.style.display = 'block';
		box3.style.display = 'none';

		//フォームrequired切替
		box1Items.forEach(function(element) {
			//box1の入力欄はrequired削除
			element.required = false;
		});
		 box2Items.forEach(function(element) {
			//box2の入力欄はrequired付与
			element.required = true;
		});

		//クラスを付与
		changeBtn1.classList.remove('active');
		changeBtn2.classList.add('active');
		changeBtn3.classList.remove('active');

		//更新ボタン表示
		updateBtn.style.display = 'block';
		//削除ボタン非表示
		deleteBtn.style.display = 'none';
		//更新ボタンname設定
		updateBtn.setAttribute('name', 'change');

		//タイトル変更
		document.title = 'gablly - パスワード変更'

	} else if (obj.id == 'boxChangeBtn3') {
		//パスワード変更表示
		box1.style.display = 'none';
		box2.style.display = 'none';
		box3.style.display = 'block';

		//フォームrequired切替
		box1Items.forEach(function(element) {
			//box1の入力欄はrequired削除
			element.required = false;
		});
		 box2Items.forEach(function(element) {
			//box2の入力欄はrequired付与
			element.required = false;
		});

		//クラスを付与
		changeBtn1.classList.remove('active');
		changeBtn2.classList.remove('active');
		changeBtn3.classList.add('active');

		//更新ボタン表示
		updateBtn.style.display = 'none';
		//削除ボタン非表示
		deleteBtn.style.display = 'block';

		//タイトル変更
		document.title = 'gablly - アカウント削除'

	}

	//エラー初期化
	const userName = document.getElementById('user_name');
	const email = document.getElementById('email');
	const password = document.getElementById('password');
	const passwordConfirm = document.getElementById('password_confirm');
	errorInit([userName, email, password, passwordConfirm]);
}

//ページ読み込み時
window.addEventListener("load", function () {
	if (this.document.getElementById('isError') != null) {
		//パスワード変更時にエラーの場合
		boxChange(document.getElementById('boxChangeBtn2'));
	}

});