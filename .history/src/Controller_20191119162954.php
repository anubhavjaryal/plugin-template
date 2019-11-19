<?php

namespace Ism\Template;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	protected $table = 'template_map';
	protected $fillable = array (
			'society_id',
			'action',
			'sub_action',
			'template_id'
	);
	
}
