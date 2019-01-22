<?php

class LogClass {

	public $logData = [];
	public $logFile;
	private $fileHandle;

	function __construct($logFile) {
		$this -> setHandle($logFile);
	}

	function __destruct() {
		fclose($this -> fileHandle);
	}

	public function init() {
		$this -> read();
	}

	public function setHandle($logFile) {
		$this -> logFile = $logFile;
		$this -> fileHandle = fopen($logFile, 'a+');
	}

	public function read() {
		while ($line = fgets($this -> fileHandle))
			$this -> logData[] = unserialize($line);
	}

	public function write($logArr) {
		fwrite($this -> fileHandle, serialize($logArr) . PHP_EOL);
	}


	 function __clone() {
	 	$this -> logData = [];
	 	$this -> logFile = null;
	 }

}

$logClassObj = new LogClass('../log.txt');
$logClassObj -> init();

//var_dump($logClassObj);

$logClassObj2 = clone $logClassObj;
$logClassObj2 -> logData = [];
$logClassObj2 -> setHandle('../log2.txt');
$logClassObj2 -> init();
var_dump($logClassObj);
var_dump($logClassObj2);

/*

$logClassObj2 = $logClassObj;
$logClassObj2 -> logData = [];
var_dump($logClassObj);



 */

