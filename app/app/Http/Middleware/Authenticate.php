<?php

namespace App\Http\Middleware;

use DateTime;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string|null
	 */
	protected function redirectTo($request)
	{
		if (! $request->expectsJson()) {

			//公開日（2022年9月17日 15時30分）
			$dateTime = new DateTime();
			$openDateTime = new DateTime('2022-09-17 15:30:00');

			if ($dateTime >= $openDateTime) {
				//公開日以降（about画面に遷移）
				return route('about');
			} else {
				//公開日前（comming soon画面表示）
				return route('before');
			}
		}
	}
}
