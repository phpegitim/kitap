<?php

class Programmer {
	public function code() {
		return 'kod yazıyor...';
	}

}

class Tester {
	public function test() {
		return 'test yapıyor...';
	}

}

class User {
	public function using() {
		return 'kullanıyor...';
	}

}


class ProjectManagement {
	
	public function process($member) {
			
		if ($member instanceof Programmer)
			return $member -> code();
		else if ($member instanceof Tester)
			return $member -> test();

		throw new Exception('bilinmeyen üye türü');
	}

}

$projectManagment = new ProjectManagement;
echo $projectManagment->process(new Programmer());
//echo $projectManagment->process(new User);