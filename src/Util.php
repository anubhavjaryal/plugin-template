<?php

namespace Ism\Template;

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
	public static function getServiceAuthHeaders() {
		return [ 
				'Content-type: application/json',
				'Authorization: Basic ' . base64_encode ( env ( 'APP_SERVICE_NAME', 'LOCALHOST' ) . ":" . env ( 'APP_KEY', 'LOCALHOST' ) ) 
		];
	}
	public static function postWebService($url, $data, $serviceHeader = [], $returnTransfer = true, $sslVerifyPeer = false, $timeout = 60) {
		$response = null;
		try {
			$ch = curl_init ();
			$curlFields = [ 
					CURLOPT_RETURNTRANSFER => $returnTransfer,
					CURLOPT_URL => $url,
					CURLOPT_POST => true,
					CURLOPT_SSL_VERIFYPEER => $sslVerifyPeer,
					CURLOPT_TIMEOUT => $timeout,
					CURLOPT_POSTFIELDS => json_encode ( $data ) 
			];
			if ($serviceHeader != [ ]) {
				$curlFields [CURLOPT_HTTPHEADER] = $serviceHeader;
			} else {
				$curlFields [CURLOPT_HTTPHEADER] = [ 
						'Content-type: application/json' 
				];
			}
			curl_setopt_array ( $ch, $curlFields );
			$response = curl_exec ( $ch );
			curl_close ( $ch );
		} catch ( \Exception $e ) {
			throw $e;
		}
		return $response;
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
