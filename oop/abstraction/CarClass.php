<?php

class CarClass extends AbstractVehicle {

	private $safetyBeltStatus = false;

	public function setSafetyBeltStatus(bool $status) {
		if ($this -> safetyBeltStatus == true)
			throw new Exception('Emniyet kemeri zaten takılı gözüküyor. Takılı değilse kemer mekanizmasını kontrol edin');

		$this -> safetyBeltStatus = true;

	}

	public function getSafetyBeltStatus() {
		return $this -> safetyBeltStatus;
	}

	public function run(int $distance) {

		$this -> start();
		$this -> testVehicleRequirements2Run($distance);

		if ($this -> getSafetyBeltStatus() == false)
			throw new Exception('Yola çıkmaya hazırım ancak, lütfen önce emniyet kemerinizi bağlayın!');

		echo 'Yola çıkıldı.<br>';

		/// bu aşamada yolda bir takım kontroller yapılabilir, olası sorunlar (yağ sıcaklığı, arıza durumu vb.) kontrol edilebilir.

		echo 'Varış noktasına ulaşıldı.<br>';

	}

}
