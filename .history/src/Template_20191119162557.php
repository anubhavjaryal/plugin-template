<?php

namespace Ism\Template;

class Template extends Illuminate\Database\Eloquent\Model {
	protected $table = 'template_map';
	protected $fillable = array (
			's_id',
			'com_no',
			'description',
			'status',
			'esc_level',
			'user_id',
			'complaint_type',
			'sub_category',
			'sub_category_id',
			'remarks',
			'complaint_date',
			'rating',
			'resident_remarks',
			'spent_time',
			'updated_by',
			'created_by',
			'constant_society_id',
			'img_src',
			'probable_date',
			'probable_time',
			'amount',
			'block',
			'file_url',
	        'closed_at',
			'data',
			'severity',
			'schedule_date'
	);
	public function staffJobCard() {
		return $this->hasMany ( 'App\Models\StaffJobCard' );
	}
}
