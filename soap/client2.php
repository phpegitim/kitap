<?php

try {

	$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublicV2.asmx?WSDL");
 
	$params = [
		'TCKimlikNo'=>11111111111,
		'Ad'=>'MEHMET ALİ',
		'Soyad'=>'UYSAL',
		'SoyadYok'=>false,
		'DogumGun'=>20,
		'DogumGunYok'=>false,
		'DogumAy'=>3,
		'DogumAyYok'=>false,
		'DogumYil'=>1985,
		'CuzdanSeri'=>'K11',
		'CuzdanNo'=>990015,
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
