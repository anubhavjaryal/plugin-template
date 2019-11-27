<?php

namespace Ism\Template;

class Adaptor {
	const URI_GENERATE_TEMPLATE = 'v1/processtemplate';

	public static function getTemplateHost(){
		return env("TEMPLATE_URL", "localhost/notify/public/");
	}

	public static function generateTemplate(Template $template, array $data) {
		$url = self::getTemplateHost().self::URI_GENERATE_TEMPLATE;
		$d['customer_id'] = $template->society_id;
		$d['id'] = $template->society_id;
		$d['data'] = $data;
		$res = Util::postWebService($url, $data, Util::getServiceAuthHeaders(env('TEMPLATE_AUTH')));
		if($res && ($res = json_decode($res, true))){
			return $res;
		}
		return null;
	}
	
}
