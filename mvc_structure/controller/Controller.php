<?php

class Controller {
	private $model;

	public function __construct($model) {
		$this -> model = $model;
	}

	public function clicked() {
		$this -> model -> string = 'Veri güncellendi, teşekkurler :)';
	}

}
