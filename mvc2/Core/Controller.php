<?php

namespace Core;

abstract class Controller {

	protected $params = [];

	public function __construct($params) {
		$this -> params = $params;
	}

	public function __call($name, $args) {

		if (!method_exists($this, $name))
			throw new \Exception($name . ' işlemi bu controller\'da bulununamadı "' . get_class($this) . '"');

	}

}
