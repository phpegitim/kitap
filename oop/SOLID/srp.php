<?php

interface EmailManInterface {
	public static function checkSMTPConn();
	public static function send(EmailClass $email);
}

interface MobAppNotifManInterface {
	public function checkOSVersion(String $deviceInfoStr);
}

class EmailClass {

	private $from;
	private $to;
	private $title;
	private $body;

	function __construct($from, $to, $title, $body) {
		$this -> setFrom($from);
		$this -> setTo($to);
		$this -> setTitle($title);
		$this -> setBody($body);
	}

	public function getFrom() {
		return $this -> from;
	}

	public function setFrom(string $from) {
		$this -> from = $from;
	}

	public function getTo() {
		return $this -> to;
	}

	public function setTo(Array $to) {
		// kapsülleme yapılmalı
		$this -> to = $to;
	}

	public function getTitle() {
		return $this -> title;
	}

	public function setTitle(string $title) {
		// kapsülleme yapılmalı
		$this -> title = $title;
	}

	public function getBody() {
		return $this -> body;
	}

	public function setBody(string $body) {
		// kapsülleme yapılmalı
		$this -> body = $body;
	}

}

class EmailManager implements EmailManInterface {

	public static function checkSMTPConn() {
		// Burada soket işlemleri ile, SMTP portuna bir istek gönderip durumunu anlayabiliriz.
		// erişilemiyor ya da aktif değil ise istisna fırlatırız.
		return true;

	}

	public static function send(EmailClass $email) {
		self::checkSMTPConn();

		echo 'email<br>' . $email -> getFrom() . '<br>adresinden<br>' . implode(',', $email -> getTo()) . '<br>adreslerine gönderildi<br>';
		return true;
	}

}

abstract class UserClass {

	private $userName;
	private $password;

	public function getUserName() {
		return $this -> userName;
	}

	public function setUserName($userName) {
		$this -> userName = $userName;
	}

	public function getPassword() {
		return $this -> password;
	}

	public function setPassword($password) {
		$this -> password = $password;
	}

}

class StaffClass extends UserClass {

	private $position;

	public function getPosition() {
		return $this -> position;
	}

	public function setPosition($position) {
		$this -> position = $position;
	}

}

$staff = new StaffClass();
$staff -> setUserName('ahmet@gelistir.org');

$staffChef = new StaffClass();
$staffChef -> setPosition('chef');
$staffChef -> setUserName('mehmetali@gelistir.org');

$action = 'passwordReminder';

if ($action == 'passwordReminder') {
	$email = new EmailClass('system@dikeyseksen.com', [$staff -> getUserName(), $staffChef -> getUserName()], 'Şifre değiştirme', 'Lütfen parolanızı değiştirmek için linke tıklayın...');

	$sendEmail = EmailManager::send($email);
}
