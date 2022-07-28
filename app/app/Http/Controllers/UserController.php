<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\alpha_num_hyphen_underScore_dot_check;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * プロフィール編集画面表示
	 *
	 * @return void
	 */
	public function edit()
	{
		$user = User::where('id', Auth::id())->first();

		return view('users.edit', ['user' => $user]);
	}

	/**
	 * プロフィール更新処理
	 *
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request)
	{
		$id = Auth::id();
		//レコードを検索
		$user = User::findOrFail($id);

		//新しいパスワードのバリデーションチェック
		$validator = Validator::make($request->all(), [
			'user_name' => ['required','string', 'min:4', 'max:30', new alpha_num_hyphen_underScore_dot_check()],
			'email' => ['required', 'string', 'email', 'max:100'],
		]);


		//楽観的排他制御（version）
		if (!($request->version == $user->version)) {
			//バージョン番号が一致しない場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('exclusive_lock_error', '変更を保存できません。ページの再読込お願いします。');
		}

		//入力値に変更があるかチェック
		if ($request->user_name === $user->user_name && $request->email === $user->email) {
			//登録値と変更が無い場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('unchanged_error', '項目が変更されていません。');
		}

		if ($validator->errors()->any()) {
			//エラーがあれば編集画面に戻す
			return redirect()->back()->withErrors($validator);
		}


		//入力値を設定
		//変更があれば更新
		$user->user_name = $request->user_name;
		$user->email = $request->email;
		$user->version = $user->version + 1;

		//保存（更新）
		$user->save();

		return redirect()->to('users/edit')->with('success_message', 'プロフィールを更新しました。');
	}

	/**
	 * パスワード変更処理
	 *
	 * @param Request $request
	 * @return void
	 */
	public function changePassword(Request $request)
	{
		$id = Auth::id();
		//レコードを検索
		$user = User::findOrFail($id);

		//新しいパスワードのバリデーションチェック
		$validator = Validator::make($request->all(), [
			'password' => ['required', 'string', 'min:8', 'max:100', 'confirmed'],
		]);

		//楽観的排他制御（version）
		if (!($request->version == $user->version)) {
			//バージョン番号が一致しない場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('exclusive_lock_error', '変更を保存できません。ページの再読込お願いします。');
		}

		//現在のパスワード一致確認
		if (!(password_verify($request->current_password, $user->password))) {
			//現在のパスワードが一致しない場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('currentpass_notmatch_error', '現在のパスワードが一致しません。');
		}

		//現在のパスワード（登録値）と新しいパスワードに変更があるかチェック
		if (password_verify($request->password, $user->password)) {
			//登録値と変更が無い場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('unchanged_error', 'パスワードが変更されていません。');
		}

		if ($validator->errors()->any()) {
			//下記エラーでboxChange js発火判断用（パスワード変更タブに切替）
			$validator->errors()->add('is_passchange_Error', 'これはBOX判断用（パスワード変更時にエラー有）');
			//エラーがあれば編集画面に戻す
			return redirect()->back()->withErrors($validator);
		}

		//入力値を設定
		//パスワードハッシュ化
		$user->password = bcrypt($request->password);
		$user->version = $user->version + 1;

		//パスワード変更（更新）
		$user->save();

		return redirect()->to('users/edit')->with('success_message', 'パスワードを変更しました。');
	}

	/**
	 * プロフィール更新またはパスワード変更の判定
	 *
	 * @param Request $request
	 * @return void
	 */
	public function updateOrChange(Request $request)
	{
		if ($request->has('update')) {
			//プロフィール更新処理
			$this->update($request);
		} else if ($request->has('change')) {
			//パスワード変更処理
			$this->changePassword($request);
		}

		return redirect()->to('users/edit');
	}
}
