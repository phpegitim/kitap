<?php
interface Codeable {
	public function code();
}

interface Testable {
	public function test();
}

class Programmer implements Codeable, Testable {
	public function code() {
		return 'kodluyor..';
	}

	public function test() {
		return 'yerel sunucuda test yapıyor..';
	}

}

class Tester implements Testable {
	public function test() {
		return 'test sunucusunda test yapıyor..';
	}

}

class ProjectManagement {
	public function processCode(Codeable $member) {
		return $member -> test();
	}

}

$projectManagement = new ProjectManagement;
echo $projectManagement->processCode(new Programmer);

