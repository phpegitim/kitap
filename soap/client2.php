<?php

try {

	$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublicV2.asmx?WSDL");
 
	$params = [
		'TCKimlikNo'=>38035335156,
		'Ad'=>'MEHMET ALİ',
		'Soyad'=>'UYSAL',
		'SoyadYok'=>false,
		'DogumGun'=>30,
		'DogumGunYok'=>false,
		'DogumAy'=>3,
		'DogumAyYok'=>false,
		'DogumYil'=>1986,
		'CuzdanSeri'=>'U11',
		'CuzdanNo'=>991215,
		'TCKKSeriNo'=>''
	];  	
	
	$result = $client -> KisiVeCuzdanDogrula($params);

	if ($result -> KisiVeCuzdanDogrulaResult === true)
		echo 'Cüzdan bilgileri <b>doğru!</b>';
	else
		echo 'Cüzdan bilgileri <b>hatalı!</b>';

} catch (SoapFault $e) {
	echo $e -> getMessage();
}
