<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactSendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * お問い合わせ画面表示
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('contacts.contact');
	}

	/**
	 * メール送信処理
	 *
	 * @param Request $request
	 * @return void
	 */
	public function send(Request $request)
	{
		//入力チェック
		$request->validate([
			'name' => ['required', 'string', 'max:50'],
			'email' => ['required', 'string', 'email', 'max:100'],
			'message' => ['required', 'string', 'max:1000'],
		]);

		//入力値を設定
		$inputs = $request->only(['name', 'email', 'message']);
		$inputs['version'] = 0;

		//保存
		Contact::create($inputs);

		//メール送信
		Mail::to($inputs['email'])->send(new ContactSendmail($inputs));

		//再送信を防ぐためにトークンを再発行
		$request->session()->regenerateToken();

		return view('contacts.thanks');
	}

}