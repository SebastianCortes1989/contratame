<?php

namespace Contratame\Entities;

use \Eloquent;

class Category extends \Eloquent {
	protected $fillable = [];
	protected $paginate = 10;

	public function candidates(){
		return $this->hasMany('Contratame\Entities\Candidate', 'category_id');
	}

	public function getPaginateCandidatesAttribute(){
		return $this->candidates()->paginate($this->paginate);
	}
}