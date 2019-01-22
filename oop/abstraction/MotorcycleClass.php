<?php

class MotorcycleClass extends AbstractVehicle {

	private $helmet;
	private $helmetStatus = false;
	private $longDistanceMinVal = 20;

	public function setHelmet(HelmetClass $helmet) {
		$this -> helmet = $helmet;
	}

	public function getHelmet() {
		return $this -> helmet;
	}

	public function setHelmetStatus(bool $status) {

		if ($this -> getHelmet() == null)
			throw new Exception('Henüz takacak bir kask yok. Yola çıkamazsınız.');

		$this -> helmetStatus = true;

	}

	public function getHelmetStatus() {
		return $this -> helmetStatus;
	}

	public function checkMCRequirements(int $distance) {
		if ($this -> helmet == null)
			throw new InvalidArgumentException('Kask olmadan yola çıkamazsınız');

		if ($this -> getHelmetStatus() == false)
			throw new InvalidArgumentException('Yola çıkmadan önce kaskınızı takmalısınız');

		if ($distance > $this -> longDistanceMinVal)
			if ($this -> helmet -> getType() != 'longDistance')
				throw new InvalidArgumentException('Bu kask ile uzun yola çıkamazsınız.');

		return true;
	}

	public function run(int $distance) {
		
		$this -> start();

		$this -> testVehicleRequirements2Run($distance);

		$this -> checkMCRequirements($distance);

		echo 'Yola çıkıldı.<br>';

		/// bu aşamada yolda bir takım kontroller yapılabilir, olası sorunlar (yağ sıcaklığı, arıza durumu vb.) kontrol edilebilir.

		echo 'Varış noktasına ulaşıldı.<br>';

	}

}
