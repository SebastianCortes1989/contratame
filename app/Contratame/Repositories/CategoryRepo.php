<?php

namespace Contratame\Repositories;
use Contratame\Entities\Category;

class CategoryRepo extends BaseRepo{

	public function getModel(){
		return new Category;
	}
	
	public function find($id){
		return $this->model->find($id);
	}

	public function getList(){
		return $this->model->lists('name', 'id');
	}
}