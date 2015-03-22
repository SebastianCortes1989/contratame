<?php 

namespace Contratame\Entities;

use \Eloquent;

class Candidate extends \Eloquent {
	protected $fillable = [];

	public function user(){
		return $this->hasOne('Contratame\Entities\User', 'id', 'id');
	}

	public function category(){
		return $this->belongsTo('Contratame\Entities\Category', 'category_id');
	}

	public function getJobTypeTitleAttribute(){
		return \Lang::get('utils.job_types.'. $this->job_type);
	}

}