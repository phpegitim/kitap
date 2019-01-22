<?php

class Mailer {
}

class SendWelcomeMessage {
	private $mailer;
	public function __construct(Mailer $mailer) {
		$this -> mailer = $mailer;
	}

}

$sendWelcMsg = new SendWelcomeMessage(new Mailer);
var_dump($sendWelcMsg);