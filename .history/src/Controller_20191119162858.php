<?php

namespace Ism\Template;

class Controller extends  {
	protected $table = 'template_map';
	protected $fillable = array (
			'society_id',
			'action',
			'sub_action',
			'template_id'
	);
	
}
