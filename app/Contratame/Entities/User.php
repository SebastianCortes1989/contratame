<?php

namespace Contratame\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use \Eloquent, \Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = ['full_name', 'email', 'password'];

	public function setPasswordAttribute($value){
		$this->attributes['password'] = Hash::make($value);
	}

	public function candidate(){
        return $this->hasOne('Contratame\Entities\Candidate', 'id', 'id');
    }

}
