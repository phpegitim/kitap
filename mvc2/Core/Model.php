<?php
namespace Core;

abstract class Model {

	protected $dba;

	function __construct() {
		$this -> dba = Lib\DBConnProvider::getInstance() -> getConnection();
	}

}
