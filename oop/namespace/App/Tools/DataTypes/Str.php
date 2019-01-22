<?php

namespace App\Tools\DataTypes;

Class Str {

	public static function rand($length = 8) {

		if ($length === null)
			throw new BadMethodCallException(__METHOD__.':uzunluk değeri gönderilmelidir');

		if (!is_numeric($length))
			throw new InvalidArgumentException(__METHOD__.':uzunluk değeri numerik olmalıdır');
		
		// maximum ve minimum uzunluk kontrol cümlesi yazılmalıdır.
		
		$length = intval($length);

		static $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
			$randomString .= $characters[rand(0, $charactersLength - 1)];

		return $randomString;
	}

}
