<?php

interface Workable {
	public function work();
}

class Programmer implements Workable {
	public function work() {
		return 'kod yazıyor..';
	}

}

class Tester implements Workable {
	public function work() {
		return 'test ediyor.';
	}

}

class User implements Workable {
	public function work() {
		return 'kullanıyor.';
	}

}

class ProjectManagement {
	public function process(Workable $member) {
		return $member -> work();
	}
}

$projectManagment = new ProjectManagement;
//echo $projectManagment->process(new Programmer());
echo $projectManagment->process(new User);