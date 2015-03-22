<?php

namespace Contratame\Repositories;
use Contratame\Entities\Candidate;
use Contratame\Entities\Category;
use Contratame\Entities\User;

class CandidateRepo extends BaseRepo{

	public function getModel(){
		return new Candidate;
	}
	
	public function findLast($take = 10){
		$category = Category::with([
			'candidates' => function($q) use ($take){
				$q->take($take);
				$q->orderBy('created_at', 'DESC');
			},
			'candidates.user']
			)->get();
		
		return $category;
	}

	public function newCandidate(){
		$user = new User();
		$user->type = 'candidate';
		
		return $user;
	}



}