<?php

namespace RequestHandler\Interfaces;

interface RequestHandler {
	public static function get(string $key, string $dataType);
	public static function post(string $key, string $dataType);
}
