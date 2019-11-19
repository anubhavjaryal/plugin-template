<?php

namespace Ism\Filter;

class Util {
	public static function validateParameters($req, $param) {
		$arr = [ ];
		foreach ( $req as $k ) {
			if (! isset ( $param [$k] ) || ( (!in_array(gettype($param [$k]), ['array', 'object'])) && strlen ( $param [$k] ) == 0)) {
				$arr [] = $k . ' not found';
			}
		}
		return $arr;
	}
	public static function response($condition, $message = null, $data = null, $metadata = [], $customizedStatus = null) {
		return [
			'status'=> $customizedStatus ?? ($condition ? Constant::SUCCESS : Constant::ERROR),
			'message' => $message,
			'metadata' => $metadata,
			'data' => $data
		];
	}
}
