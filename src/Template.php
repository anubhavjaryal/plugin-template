<?php

namespace Ism\Template;

class Template extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'template_map';
	protected $fillable = [
			'society_id',
			'action',
			'sub_action',
			'template_id'
	];
	public static function getTemplate($societyId, $action, $subaction){
		return self::where('society_id', $societyId)->where('action', $action)->where('sub_action', $subaction)->first();
	}
	public static function getDefaultTemplate($action){
		return self::where('action', $action)->where('sub_action', 'DEFAULT')->first();
	}
}
