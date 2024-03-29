<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController {
	public function get(){
		$params = Input::only('id','action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->get($params);
	}
	public function add(){
		$params = Input::only('action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->add($params);
	}
	public function update(){
		$params = Input::only('id','action','sub_action','template_id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->update($params);
	}
	public function delete(){
		$params = Input::only('id');
		$params['society_id'] = Util::getSocietyId();
		return (new Service)->delete($params);
	}
	public function generate(){
		$params = Input::only('action', 'sub_action', 'data', 'html');
		$res = (new Service)->generateTemplate(Util::getSocietyId(), $params['data'], $params['action'], $params['sub_action']);
		if($params['html']){
			return $res['data'][$params['html']] ?? $res;
		}else{
			return $res;
		}
	}
}
