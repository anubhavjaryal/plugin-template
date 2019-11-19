<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;
use Ism\Filter\Util;

class Controller extends BaseController {
	public function get($params){
		if(($r = $this->validate($params, false, ['society_id']))!== true){
			return Util::setServiceResponse(false, "Some fields are not provided", $r);
		}
		$ts = Template::where('society_id', $r['society_id'])->get();
		return Util::setServiceResponse(true, sizeof($ts)." found.", $ts);
	}
	public function add($params){
		if(($r = $this->validate($params))!== true){
			return Util::setServiceResponse(false, "Some fields are not provided", $r);
		}
		$t = new Template($params);
		return $t->save() ? Util::setServiceResponse(true, "Some fields are not provided", $t) : Util::setServiceResponse(false, "Not saved");
	}
	public function update($params){
		if(($r = $this->validate($params, true))!== true){
			return Util::setServiceResponse(false, "Some fields are not provided", $r);
		}
		$t = new Template($params);
		return $t->save() ? Util::setServiceResponse(true, "Some fields are not provided", $t) : Util::setServiceResponse(false, "Not saved");		
	}
	public function delete($params){
		
	}
	//
	private function validate($params, $isUpdate=false, $reqNew = []){
		$reqd = $reqNew ?? ['society_id', 'action', 'sub_action', 'template_id'];
		if($isUpdate){
			$reqd[] = 'id';
		}
		return Util::validateParameters($reqd, $params);
	}
}
