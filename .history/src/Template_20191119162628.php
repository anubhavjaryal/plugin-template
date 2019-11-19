<?php

namespace Ism\Template;

class Template extends Illuminate\Database\Eloquent\Model {
	protected $table = 'template_map';
	protected $fillable = array (
			'id',
			'society_id',
			'action',
			'sub_action',
			'template_id'
	);
	public function staffJobCard() {
		return $this->hasMany ( 'App\Models\StaffJobCard' );
	}
}
