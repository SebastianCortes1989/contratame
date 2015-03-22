<?php

use Contratame\Entities\User;
use Contratame\Repositories\CandidateRepo;
use Contratame\Repositories\CategoryRepo;
use Contratame\Managers\RegisterManager;
use Contratame\Managers\AccountManager;
use Contratame\Managers\ProfileManager;
use Contratame\Components\FieldBuilder;
use \Lang;

class UsersController extends BaseController {

	protected $candidateRepo;
	protected $categoryRepo;

	public function __construct(CandidateRepo $candidateRepo, CategoryRepo $categoryRepo){
		$this->candidateRepo = $candidateRepo;
		$this->categoryRepo = $categoryRepo;
	}

	public function signUp(){
		$fieldBuilder = new FieldBuilder;

		return View::make('users/sign-up', compact('fieldBuilder'));
	}

	public function register(){
		$user = $this->candidateRepo->newCandidate();

		$manager = new RegisterManager($user, Input::all());
		$manager->save();		
		
		return Redirect::action('HomeController@index');
	}

	public function account(){
		$user = Auth::user();

		return View::make('users/account', compact('user'));
	}

	public function updateAccount(){
		$user = Auth::user();

		$manager = new AccountManager($user, Input::all());
		$manager->save();	
		
		return Redirect::action('HomeController@index');
	}

	public function profile(){
		$user = Auth::user();
		$candidate = $user->candidate;

		$categories = $this->categoryRepo->getList();
		$job_types  = Lang::get('utils.job_types');

		return View::make('users/profile', compact('user', 'candidate', 'job_types', 'categories'));
	}

	public function updateProfile(){
		$user = Auth::user();
		$candidate = $user->candidate;

		$manager = new ProfileManager($candidate, Input::all());
		$manager->save();	
		
		return Redirect::action('HomeController@index');
	}

}
