<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;
use Ism\Filter\Util;

class Controller extends BaseController {
	public function get($params){
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
}
