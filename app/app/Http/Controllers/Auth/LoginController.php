<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function user_name()
	{
		return 'user_name';
	}

	/**
	 * ログイン後のリダイレクト先
	 *
	 * @return void
	 */
	public function redirectPath()
	{
		return '/';
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return 'user_name';
	}

	/**
	 * Validate the user login request.
	 * ログイン時のバリデーションチェック
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin(Request $request)
	{
		$request->validate([
			$this->username() => 'required|string|min:4|max:100',
			'password' => 'required|string|min:8|max:100',
		]);
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		$username = $request->input($this->username());
		$password = $request->input('password');

		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			$credentials = ['email' => $username, 'password' => $password];
		} else {
			$credentials = [$this->username() => $username, 'password' => $password];
		}

		return $this->guard()->attempt(
			$credentials, $request->filled('remember')
		);
	}
}
