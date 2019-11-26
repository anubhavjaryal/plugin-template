<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	public function get($params){
		$params = Input::only('id','action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->get($params);
	}
	public function add($params){
		$params = Input::only('action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->add($params);
	}
	public function update($params){
		$params = Input::only('id','action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->update($params);
	}
	public function delete($params){
		$params = Input::only('id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->delete($params);
	}
}
