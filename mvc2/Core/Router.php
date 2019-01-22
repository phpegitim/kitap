<?php
namespace Core;
use App\Config;

class Router {

	private $params = [];
	private $controller;
	private $method;

	private function parseUrl(string $url) {

		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$urlArr = explode('/', $url);

		$urlArr = array_filter($urlArr, function($value) {
			return $value !== '';
		});

		$urlLenght = count($urlArr);
		if ($urlLenght < 1) {
			$this -> setController(Config::ROUTE_DEFAULT);
			return;
		}

		$this -> setController(ucfirst($urlArr[0]));

		if ($urlLenght > 1) {
			$this -> setMethod($urlArr[1]);
			$this -> setParams(array_slice($urlArr, 2));
		}

	}

	public function dispatch(string $url) {

		$this -> parseUrl($url);

		if ($this -> controller == null)
			throw new \Exception('Contoller Hatası');

		$cont = 'App\\Controller\\' . $this -> controller . 'Controller';

		if (!class_exists($cont))
			throw new \Exception(get_class() . ': Controller bulunamadı.');

		$controller = new $cont($this -> params);
		if (method_exists($controller, 'initialize'))
			$controller -> initialize();

		if ($this -> getMethod() === null)
			$this -> setMethod($controller::defaultMethod);

		if (method_exists($controller, $this -> getMethod()))
			$controller -> {$this->method}();

	}

	public function getParams() {
		return $this -> params;
	}

	public function setParams($params) {
		$this -> params = $params;
	}

	public function getController() {
		return $this -> controller;
	}

	public function setController($controller) {
		$this -> controller = $controller;
	}

	public function getMethod() {
		return $this -> method;
	}

	public function setMethod($method) {
		$this -> method = $method;
	}

}
