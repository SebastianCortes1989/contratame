<?php

namespace Contratame\Managers;

class ProfileManager extends BaseManager{

	public function getRules(){
		$rules = [
			'website_url' => 'required|url',
			'job_type'    => 'required|in:full, partial, freelance',
			'category_id' => 'required|exists:categories,id',
			'description' => 'required|max:100',
			'avalaible'   => 'in:1, 0',
		];

		return $rules;
	}

	
}