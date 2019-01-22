<?php

# Uzak bir sunucudaki veri tabanı
$bankAccountDbArr = array(
	1154 => [
				'accountId'=>1154,
				'firstName'=>'Mehmet Ali',
				'lastName'=>'UYSAL',
				'pass'=>'ddac1f6f13bb372a177804adcd3b8a31',
				'balance'=>24100.70
			]
); 

#ATM Sınıfı
class ATMClass {

	private $customerId;
	private $customerPinNum;
	private $account;

	public function verifyCustomer(String $customerId, String $pinNumber):array {

		$result = array('status' => false, 'error' => null, 'errorMsg' => null);

		$getCustomerId = $this -> getCustomerId($customerId);
		if ($getCustomerId['status'] == false)
			return $getCustomerId;

		$getCustomerPIN = $this -> getCustomerPinNumber($pinNumber);
		if ($getCustomerPIN['status'] == false)
			return $getCustomerPIN;

		$this -> customerId = $getCustomerId['data'];
		$this -> customerPinNum = $getCustomerPIN['data'];

		$retrieveAccount = $this -> retrieveAccount();
		if ($retrieveAccount['status'] == false) {

			switch ($retrieveAccount['error']) {
				case 'notFoundErr' :
				case 'matchErr' :	
					$result['error'] = 'argErr';
					$result['errorMsg'] = 'Kullanıcı adı ya da şifre hatalı.';
					break;

				default :
					$result['error'] = 'internalErr';
					$result['error'] = 'Şuan işleminize cevap veremiyoruz. Lütfen daha sonra deneyin.';
					break;
			}

			return $result;
		}

		$this -> account = $retrieveAccount['data'];

		$result['status'] = true;

		return $result;

	}

	private function retrieveAccount():array {

		global $bankAccountDbArr;

		$result = array('status' => false, 'error' => null, 'errorMsg' => null);

		if (!isset($bankAccountDbArr[$this -> customerId])) {
			$result['error'] = 'notFoundErr';
			$result['errorMsg'] = 'Hesap veritabanında bulunamadı';
			return $result;
		}

		$account = $bankAccountDbArr[$this -> customerId];
		if ($account['pass'] != $this -> customerPinNum) {
			$result['error'] = 'matchErr';
			$result['errorMsg'] = 'PIN numarası hatalı';
			return $result;
		}
		
		$result['status'] = true;
		$result['data'] = $account;

		return $result;

	}

	public function withdrawCash(String $amount):array {

		$result = array('status' => false, 'error' => null, 'errorMsg' => null);

		if ($this -> account == null) {
			$result['error'] = 'authErr';
			$result['errorMsg'] = 'Şuan işleminizi gerçekleştiremiyoruz';
			
			/*arayüzdeki bir zaafiyet yüzünden bu metoda, hesap girişi yapmadan erişilebildi ancak engellendi. 
			Bu aşamada log alıp hemen bildirebiliriz.*/
			
			return $result;
		}

		if (!is_numeric($amount)) {
			$result['error'] = 'argErr';
			$result['errorMsg'] = 'Çekilecek değer numerik olmalıdır!';
			return $result;
		}
		
		$amount = (float) $amount;

		global $bankAccountDbArr;

		$this -> account = $bankAccountDbArr[$this -> account['accountId']];
		if ($this -> account['balance'] < $amount) {
			$result['error'] = 'rangeErr';
			$result['errorMsg'] = 'Yeterli bakiyeniz yok!';
			return $result;
		}

		$result['status'] = true;
		return $result;

	}

	public function getCustomerId(String $customerId):array {

		$result = array('status' => false, 'error' => null, 'errorMsg' => null);

		$customerIdLength = strlen($customerId);

		if ($customerIdLength < 4 || $customerIdLength > 8) {
			$result['error'] = 'argErr';
			$result['errorMsg'] = 'Müşteri numarası en az 4 karakter olmalıdır!';
			return $result;
		}

		if (!is_numeric($customerId)) {
			$result['error'] = 'argErr';
			$result['errorMsg'] = 'Müşteri numarası numerik olmalıdır!';
			return $result;
		}

		$result['status'] = true;
		$result['data'] = intval($customerId);
		return $result;

	}



	public function getCustomerPinNumber(String $pinNumber):array {

		$result = array('status' => false, 'error' => null, 'errorMsg' => null);

		$pinNumLength = strlen($pinNumber);

		if ($pinNumLength != 4) {
			$result['error'] = 'argErr';
			$result['errorMsg'] = 'PIN numarası 4 karakter olmalıdır!';
			return $result;
		}

		if (!is_numeric($pinNumber)) {
			$result['error'] = 'argErr';
			$result['errorMsg'] = 'PIN numarası numerik olmalıdır!';
			return $result;
		}
		
		$result['status'] = true;
		$result['data'] = md5($pinNumber);

		return $result;

	}

}

#Bizim kullandığımız ATM
try{
	
	$atmObj = new ATMClass();


	$withDrawnAmount = '24100.71';
	$withdrawCash = $atmObj -> withdrawCash($withDrawnAmount);
	if($withdrawCash['status']==false)
		throw new Exception($withdrawCash['errorMsg'], 2);	

	$verify = $atmObj -> verifyCustomer('1154', '4574');

	if($verify['status']==false)
		throw new Exception($verify['errorMsg'], 1);
	
	echo 'Hesaba giriş yapıldı<br>';
	

	
	echo 'Hesabınızdan '.$withDrawnAmount.' tutarında para çekildi.<br>';	
	
}catch(Exception $e){
	echo '<h3>Kısıtlı olarak müşteriye aktarılan bilgiler</h3>';
	echo $e->getMessage();
}



