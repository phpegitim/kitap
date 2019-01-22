<?php

namespace RequestHandler;

class RequestHandler implements Interfaces\RequestHandler {

	use Helpers\DataFilterTrait;

	static function post(string $key, string $dataType) {

		if (!isset($_POST[$key]))
			throw new \InvalidArgumentException(__METHOD__ . ': ' . $key . ' parametresi geçerli değil');

		return self::filter($_POST[$key], $dataType);

	}

	static function get(string $key, string $dataType) {

		if (!isset($_GET[$key]))
			throw new \InvalidArgumentException(__METHOD__ . ':parametre geçerli değil');

		return self::filter($_GET[$key],$dataType);

	}

}
