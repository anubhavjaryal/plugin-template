<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	public function get($params){
		if(($r = $this->validate($params))!== true){
			return 
		}
	}
	public function add($params){
		
	}
	public function update($params){
		
	}
	public function delete($params){
		
	}
	//
	private function validate($params, $isUpdate=false){
		$reqd = ['society_id', 'action', 'sub_action', 'template_id'];
		if($isUpdate){
			$reqd[] = 'id';
		}
		return Util::validateParameters($reqd, $params);
	}
}
