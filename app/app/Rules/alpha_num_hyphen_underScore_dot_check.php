<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * 入力チェック
 * 半角英数、-（ハイフン）、_（アンダースコア）、.（ドット）チェック
 */
class alpha_num_hyphen_underScore_dot_check implements Rule
{
	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string  $attribute
	 * @param  mixed  $value
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		// $valueに対して、バリデーション成功となるルールを記載
		return preg_match('/^[a-zA-Z0-9_.-]+$/', $value);
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		// バリデーションルールに引っかかった場合のメッセージ
		return trans('validation.alpha_dot_underBar_check');
	}
}
