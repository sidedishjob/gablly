//入力チェック

//**********バリデーション設定値**********
//文字数
const minLength4 = 4;
const minLength8 = 8;
const maxLength30 = 30;
const maxLength50 = 50;
const maxLength100 = 100;
const maxLength1000 = 1000;
//メールアドレス形式
const emailRegexp = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
const userNameRegexp = /^[a-zA-Z0-9_.-]+$/;
//エラーメッセージ
const requiredMessage = 'は、必ず指定してください。';
const minLengthMessage = '文字以上で入力してください。';
const maxLengthMessage = '文字以下で入力してください。';
const notRegexMessage  = 'の、形式が正しくありません。';
const notUserNameRegexMessage = 'は、半角英数字及びダッシュ(-)及び下線(_)及びドット(.)がご利用できます。';
const confirmMessage = 'が、一致していません。'
//**********バリデーション設定値**********

//エラー初期化（エラーメッセージ削除）
const errorInit = (element) => {
	//入力欄のエラーアイコン非表示
	element.forEach( function(obj){
		obj.classList.remove('is-invalid');
	});
	//エラーエリア非表示
	const errorArea = document.getElementById('error_area');
	while (errorArea.firstChild) {
		errorArea.removeChild(errorArea.firstChild);
	}
	errorArea.classList.remove('d-block');
}

//エラーメッセージ表示（span要素を生成して親要素に追加）
const createError = (element, errorMessage) => {
	//入力欄にエラーアイコン表示
	element.classList.add('is-invalid');
	//エラーエリア表示
	const errorArea = document.getElementById('error_area');
	errorArea.classList.add('d-block');
	//エラーメッセージ生成&表示
	const errorSpan = document.createElement('span');
	errorSpan.classList.add('invalid-feedback', 'error-message');
	errorSpan.setAttribute('role', 'alert');
	errorSpan.textContent = errorMessage;
	errorArea.appendChild(errorSpan);
}

//ログイン時
function loginCheck() {
	//入力値取得（ユーザー名orメールアドレス、パスワード）
	const userName = document.getElementById('user_name');
	const password = document.getElementById('password');

	//エラー初期化
	errorInit([userName, password]);

	//エラー判定
	let isError = false;

	//必須チェック
	if (userName.value == '') {
		//ユーザー名orメールアドレス
		createError(userName, 'ユーザー名またはメールアドレス' + requiredMessage);
		isError = true;
	}
	if (password.value == '') {
		//パスワード
		createError(password, 'パスワード' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if (userName.value.length < minLength4) {
		//最小:ユーザー名orメールアドレス
		createError(userName, 'ユーザー名またはメールアドレスは、' + minLength4 + minLengthMessage);
		isError = true;
	}
	if (password.value.length < minLength8) {
		//最小:パスワード
		createError(password, 'パスワードは、' + minLength8 + minLengthMessage);
		isError = true;
	}
	if (userName.value.length > maxLength100) {
		//最大:ユーザー名orメールアドレス
		createError(userName, 'ユーザー名またはメールアドレスは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}
	if (password.value.length > maxLength100) {
		//最大:パスワード
		createError(password, 'パスワードは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}

//投稿時（新規&編集）
function postCheck() {
	//入力値取得（画像、タイトル、コンテンツ）
	const imagePath = document.getElementById('image_path');
	const title = document.getElementById('title');
	const body = document.getElementById('body');

	//エラー初期化
	if (imagePath == null) {
		//投稿編集
		errorInit([title, body]);
	} else {
		//新規投稿
		errorInit([imagePath, title, body]);
	}

	//エラー判定
	let isError = false;

	//必須チェック
	if (imagePath != null && imagePath.value == '') {
		//画像（新規投稿の場合のみ）
		createError(imagePath, '画像' + requiredMessage);
		isError = true;
	}
	if (title.value == '') {
		//タイトル
		createError(title, 'タイトル' + requiredMessage);
		isError = true;
	}
	if (body.value == '') {
		//コンテンツ
		createError(body, 'コンテンツ' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if (title.value.length > maxLength50) {
		//最大:タイトル
		createError(title, 'タイトルは、' + maxLength50 + maxLengthMessage);
		isError = true;
	}
	if (body.value.length > maxLength1000) {
		//最大:コンテンツ
		createError(body, 'コンテンツは、' + MaxLength1000 + maxLengthMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}

//お問い合わせ送信時
function contactCheck() {
	//入力値取得（お名前、メールアドレス、お問い合わせ内容）
	const name = document.getElementById('name');
	const email = document.getElementById('email');
	const message = document.getElementById('message');

	//エラー初期化
	errorInit([name, email, message]);

	//エラー判定
	let isError = false;

	//必須チェック
	if (name.value == '') {
		//ユーザー名orメールアドレス
		createError(name, 'お名前' + requiredMessage);
		isError = true;
	}
	if (email.value == '') {
		//メールアドレス
		createError(email, 'メールアドレス' + requiredMessage);
		isError = true;
	}
	if (message.value == '') {
		//お問い合わせ内容
		createError(message, 'お問い合わせ内容' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if (name.value.length > maxLength50) {
		//最大:お名前
		createError(name, 'お名前は、' + maxLength50 + maxLengthMessage);
		isError = true;
	}
	if (email.value.length > maxLength100) {
		//最大:メールアドレス
		createError(email, 'メールアドレスは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}
	if (message.value.length > maxLength1000) {
		//最大:お問い合わせ内容
		createError(message, 'お問い合わせ内容は、' + maxLength1000 + maxLengthMessage);
		isError = true;
	}

	//形式チェック
	if (!emailRegexp.test(email.value)) {
		//メールアドレス
		createError(email, 'メールアドレス' + notRegexMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}

//ユーザー（会員登録&プロフィール編集編集）
function userCheck() {
	//入力値取得（ユーザー名orメールアドレス、パスワード）
	const userName = document.getElementById('user_name');
	const email = document.getElementById('email');
	const password = document.getElementById('password');
	const passwordConfirm = document.getElementById('password_confirm');

	//処理判定（タイトルから処理を判定）
	const titleName = document.title;
	//prosesssNum : 処理判定用番号
	let processNum = 0;
	//prosesssNumステータス
	//prosessNum = 0 : アカウント削除（処理なし）
	//prosessNum = 1 : 会員登録（チェック全て適用）
	//prosessNum = 2 : プロフィール編集
	//prosessNum = 3 : パスワード変更
	if (titleName.endsWith('登録')) {
		//プロフィール編集
		processNum = 1;
	} else if (titleName.endsWith('編集')) {
		//パスワード変更
		processNum = 2;
	} else if (titleName.endsWith('変更')) {
		//パスワード変更
		processNum = 3;
	} else {
		//アカウント削除（処理なし）
		return true;
	}

	//エラー初期化
	errorInit([userName, email, password, passwordConfirm]);

	//エラー判定
	let isError = false;

	//必須チェック
	if ((processNum == 1 || processNum == 2) && userName.value == '') {
		//ユーザー名
		createError(userName, 'ユーザー名' + requiredMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 2) && email.value == '') {
		//メールアドレス
		createError(email, 'メールアドレス' + requiredMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 3) && password.value == '') {
		//パスワード
		createError(password, 'パスワード' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if ((processNum == 1 || processNum == 2) && userName.value.length < minLength4) {
		//最小:ユーザー名
		createError(userName, 'ユーザー名は、' + minLength4 + minLengthMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 3) && password.value.length < minLength8) {
		//最小:パスワード
		createError(password, 'パスワードは、' + minLength8 + minLengthMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 2) && userName.value.length > maxLength30) {
		//最大:ユーザー名
		createError(userName, 'ユーザー名は、' + maxLength30 + maxLengthMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 2) && email.value.length > maxLength100) {
		//最大:メールアドレス
		createError(email, 'メールアドレスは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 3) && password.value.length > maxLength100) {
		//最大:パスワード
		createError(password, 'パスワードは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}

	//形式チェック
	if ((processNum == 1 || processNum == 2) && !userNameRegexp.test(userName.value)) {
		//ユーザー名
		createError(userName, 'ユーザー名' + notUserNameRegexMessage);
		isError = true;
	}
	if ((processNum == 1 || processNum == 2) && !emailRegexp.test(email.value)) {
		//メールアドレス
		createError(email, 'メールアドレス' + notRegexMessage);
		isError = true;
	}

	//一致チェック
	if ((processNum == 1 || processNum == 3) && !(password.value === passwordConfirm.value)) {
		//パスワード = パスワード（再入力）
		createError(password, 'パスワード' + confirmMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}

//パスワード再設定（パスワードを忘れた方、パスワード再設定時）
function resetPasswordCheck() {
	//入力値取得（メールアドレス、パスワード）
	const email = document.getElementById('email');
	const password = document.getElementById('password');
	const passwordConfirm = document.getElementById('password_confirm');

	//エラー初期化
	errorInit([email, password, passwordConfirm]);

	//エラー判定
	let isError = false;

	//必須チェック
	if (email.value == '') {
		//メールアドレス
		createError(email, 'メールアドレス' + requiredMessage);
		isError = true;
	}
	if (password.value == '') {
		//パスワード
		createError(password, 'パスワード' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if (password.value.length < minLength8) {
		//最小:パスワード
		createError(password, 'パスワードは、' + minLength8 + minLengthMessage);
		isError = true;
	}
	if (email.value.length > maxLength100) {
		//最大:メールアドレス
		createError(email, 'メールアドレスは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}
	if (password.value.length > maxLength100) {
		//最大:パスワード
		createError(password, 'パスワードは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}

	//形式チェック
	if (!emailRegexp.test(email.value)) {
		//メールアドレス
		createError(email, 'メールアドレス' + notRegexMessage);
		isError = true;
	}

	//一致チェック
	if (!(password.value === passwordConfirm.value)) {
		//パスワード = パスワード（再入力）
		createError(password, 'パスワード' + confirmMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}

//パスワード再設定（パスワードを忘れた方、パスワード再設定メール送信時）
function resetPasswordMailCheck() {
	//入力値取得（メールアドレス、パスワード）
	const email = document.getElementById('email');

	//エラー初期化
	errorInit([email]);

	//エラー判定
	let isError = false;

	//必須チェック
	if (email.value == '') {
		//メールアドレス
		createError(email, 'メールアドレス' + requiredMessage);
		isError = true;
	}

	//文字数チェック
	if (email.value.length > maxLength100) {
		//最大:メールアドレス
		createError(email, 'メールアドレスは、' + maxLength100 + maxLengthMessage);
		isError = true;
	}

	//形式チェック
	if (!emailRegexp.test(email.value)) {
		//メールアドレス
		createError(email, 'メールアドレス' + notRegexMessage);
		isError = true;
	}

	if (isError) {
		return false;
	} else {
		return true;
	}
}
