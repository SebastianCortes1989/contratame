<?php

use Contratame\Entities\User;

class AuthController extends BaseController {

	
	public function login(){
		$data = Input::only('username', 'password', 'remember');

		$credentials = ['email'=>$data['username'], 'password'=>$data['password']];

		if(Auth::attempt($credentials, $data['remember'])){
			return Redirect::back();
		}

		return Redirect::back()->with('login_error', 1);
	}

	public function logout(){
		Auth::logout();

		return Redirect::back();
	}

}
