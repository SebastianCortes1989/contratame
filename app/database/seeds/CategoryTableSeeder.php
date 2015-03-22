<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use \Contratame\Entities\Category;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		Category::create([
			'id' => 1,
			'name' => "Desarrollador Back-End",
			'slug' => "back-end",
		]);

		Category::create([
			'id' => 2,
			'name' => "Desarrollador Front-End",
			'slug' => "front-end",
		]);

		Category::create([
			'id' => 3,
			'name' => "Diseñador",
			'slug' => "desginers",
		]);
	}

}