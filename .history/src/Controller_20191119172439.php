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
		$params = Input::only('id','society_id');
		return (new Service)->delete($params);
	}
}
