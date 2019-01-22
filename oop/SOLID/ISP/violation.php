<?php
interface Workable {
	public function canCode();
	public function code();
	public function test();
}

class Programmer implements Workable {
	public function canCode() {
		return true;
	}

	public function code() {
		return 'kodluyor...';
	}

	public function test() {
		return 'yerel sunucuda test yapıyor...';
	}

}

class Tester implements Workable {
	public function canCode() {
		return false;
	}

	public function code() {
		throw new Exception('Opps! Ben kodlama yapamam...');
	}

	public function test() {
		return 'yerel sunucuda test yapıyor...';
	}

}

class ProjectManagement {
	public function processCode(Workable $member) {
		if ($member -> canCode()) {
			$member -> code();
		}
	}

}

$projectManagement = new ProjectManagement;
echo $projectManagement->processCode(new Tester);

