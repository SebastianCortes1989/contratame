<?php

namespace Contratame\Components;
use \Lang, \Session, \File, \View, \Form;

class FieldBuilder{

	protected $defaultClass = [
		'default' => 'form-control',
		'checkbox' => ''
	];

	protected $form;
	protected $view;
	protected $session;

	/*public function __construct(Form $form, View $view, Session $session){
		$this->form = $form;
		$this->view = $view;
		$this->session = $session;
	}*/

	public function buildCssClass($type, &$attributes){
		$defaultClass = $this->getDefaultClass($type);

		if(isset($attributes['class'])){
			$attributes['class'] .= ' '. $defaultClass;
		} else{
			$attributes['class'] = $defaultClass;
		}
	}

	public function getDefaultClass($type){
		if(isset($this->defaultClass[$type])){
			return $this->defaultClass[$type];
		}

		return $this->defaultClass['default'];
	}

	public function buildLabel($name){

		if(Lang::has('validation.attributes.'. $name)){
			$label = Lang::get('validation.attributes.'. $name);
		}else{
			$label = str_replace('-', ' ', $name);
		}

		return ucfirst($label);
	}

	public function buildControl($type, $name, $value = null, $attributes = array(), $options = array()){
		switch ($type) {
			case 'select':
				return Form::select($name, $options, $value, $attributes);
			case 'password':
				return Form::password($name, $attributes);
			case 'checkbox':
				return Form::checkbox($name);
			default:
				return Form::input($type, $name, $value, $attributes);
		}
	}

	public function buildError($name){
		$error = null;
		if(Session::has('errors')){
			$errors = Session::get('errors');

			if($errors->has($name)){
				$error = $errors->first($name);
			}
		}

		return $error;
	}

	public function buildTemplate($type){
		if (File::exists('app/views/fields/' . $type . '.blade.php'))
        {
            return 'fields.' . $type;
        }

        return 'fields.default';
	}

	public function input($type, $name, $value = null, $attributes = array(), $options = array()){
		$css = $this->buildCssClass($type, $attributes);
		$label = $this->buildLabel($name);
		$control = $this->buildControl($type, $name, $value, $attributes, $options);
		$error = $this->buildError($name);
		$template = $this->buildTemplate($type);

		return View::make('fields.default', compact('name', 'label', 'control', 'error'));
	}

	public function password($name, $attributes = null){
		return $this->input('password', $name, '', $attributes);
	}

	public function __call($method, $parameters){
		array_unshift($parameters, $method);
		
		return call_user_func_array([$this, 'input'], $parameters);
	}
}