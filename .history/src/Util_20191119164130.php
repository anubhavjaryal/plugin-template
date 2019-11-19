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
	public static function setServiceResponse($condition, $message = null, $data = null, $errorCodes = [], $metadata = [], $customizedStatus = null) {
		$res [Constant::STATUS] = $customizedStatus ? $customizedStatus : ($condition ? Constant::SUCCESS : Constant::ERROR);
		$res [Constant::DATA] = $data;
		$res [Constant::MESSAGE] = $message;
		$res [Constant::METADATA] = $metadata;
		return $res;
	}
}
