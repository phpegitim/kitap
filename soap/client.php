<?php

try {

	$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
	
	$params = [
		'TCKimlikNo' => 38035335156, 
		'Ad' => 'MEHMET ALİ', 
		'Soyad' => 'UYSAL', 
		'DogumYili' => 1986
	];
	
	$result = $client -> TCKimlikNoDogrula($params);

	if ($result -> TCKimlikNoDogrulaResult === true)
		echo 'Kimlik numarası <b>doğru!</b>';
	else
		echo 'Kimlik numarası <b>hatalı!</b>';

} catch (SoapFault $e) {
	echo $e -> getMessage();
}
