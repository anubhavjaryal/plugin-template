<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	public function get($params){
		if(($r = $this->validate($params, false, ['society_id']))!== true){
			return Util::response(false, "Some fields are not provided", $r);
		}
		$ts = Template::where('society_id', $r['society_id'])->get();
		return Util::response(true, sizeof($ts)." found.", $ts);
	}
	public function add($params){
		if(($r = $this->validate($params))!== true){
			return Util::response(false, "Some fields are not provided", $r);
		}
		$t = new Template($params);
		return $t->save() ? Util::response(true, "Added", $t) : Util::response(false, "Not saved");
	}
	public function update($params){
		if(($r = $this->validate($params, true, ['id', 'society_id']))!== true){
			return Util::response(false, "Some fields are not provided", $r);
		}
		$res = Template::where('id', $params['id'])->where('society_id', $params['society_id'])->update($params);
		return $res ? Util::response(true, "Updated successfully") : Util::response(false, "Not saved");
	}
	public function delete($params){
		if(($r = $this->validate($params, true, ['id', 'society_id']))!== true){
			return Util::response(false, "Some fields are not provided", $r);
		}
		$res = Template::where('id', $params['id'])->where('society_id', $params['society_id'])->first();
		return $res ? ( $res->delete() ? Util::response(true, "Deleted successfully") : Util::response(false, "Not successfully") ): Util::response(false, "Not Found");
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
