<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
	use Queueable, SerializesModels;

	private $email;
	private $title;
	private $message;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($inputs)
	{
		$this->name = $inputs['name'];
		$this->email = $inputs['email'];
		$this->message = $inputs['message'];
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this
				// ->from('gablly0126@gmail.com')
				->subject('【gablly】お問い合わせありがとうございます')
				->view('contacts.mail')
				->with([
					'name' => $this->name,
					'email' => $this->email,
					'body' => $this->message,
				]);
	}
}
