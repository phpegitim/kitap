<?php
interface Mailer {
	public function send();
}

class SmtpMailer implements Mailer {
	public function send() {
	}

}

class SendGridMailer implements Mailer {
	public function send() {
	}

}

class SendWelcomeMessage {
	private $mailer;
	public function __construct(Mailer $mailer) {
		$this -> mailer = $mailer;
	}
}
