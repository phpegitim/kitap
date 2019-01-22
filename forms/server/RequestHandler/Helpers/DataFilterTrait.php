<?php

namespace RequestHandler\Helpers;

trait DataFilterTrait {

	private static $filterAlgroritmArr = ['str' => FILTER_SANITIZE_STRING, 'int' => FILTER_SANITIZE_NUMBER_INT];

	public static function filter($value, $dataType) {

		if (!is_array($value))
			$value = filter_var($value, self::$filterAlgroritmArr[$dataType]);
		else
			foreach ($value as $key => $subValue)
				$value[$key] = self::filter($subValue, $dataType);
			
		return $value;

	}

}
