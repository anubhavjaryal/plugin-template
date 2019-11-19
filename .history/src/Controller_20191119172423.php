<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;
use Ism\Filter\Util;

class Controller extends BaseController {
	public function get($params){
		$params = Input::only('id','society_id','action','sub_action','template_id');
		return (new Service)->get($params);
	}
	public function add($params){
		$params = Input::only('society_id','action','sub_action','template_id');
		return (new Service)->add($params);
	}
	public function update($params){
		$params = Input::only('id','society_id','action','sub_action','template_id');
		return (new Service)->update($params);
	}
	public function delete($params){
		if(($r = $this->validate($params, true, ['id', 'society_id']))!== true){
			return Util::response(false, "Some fields are not provided", $r);
		}
		$res = Template::where('id', $params['id'])->where('society_id', $params['society_id'])->first();
		return $res ? ( $res->delete() ? Util::response(true, "Deleted successfully") : Util::response(false, "Not successfully") ): Util::response(false, "Not Found");
	}
}
