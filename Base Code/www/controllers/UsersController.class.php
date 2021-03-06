<?php

class UsersController{

	public function defaultAction(){
		echo "users default";
	}

	public function addAction(){
		$user = new Users();
		$form = $user->getRegisterForm();


		$v = new View("addUser", "front");
		$v->assign("form", $form);

	}

	public function saveAction(){

		$user = new Users();
		$form = $user->getRegisterForm();

		//Est ce qu'il y a des données dans POST ou GET($form["config"]["method"])
		$method = strtoupper($form["config"]["method"]);
		$data = $GLOBALS["_".$method];


		if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

			$validator = new Validator($form,$data);

			if(empty($validator->errors)){
				$user->setFirstname($data["firstname"]);
				$user->setLastname($data["lastname"]);
				$user->setEmail($data["email"]);
				$user->setPwd($data["pwd"]);
				$user->save();
			}

		}

		$v = new View("addUser", "front");
		$v->assign("form", $form);


	}


	public function loginAction(){

		$v = new View("loginUser", "front");

	}


	public function forgetPasswordAction(){

		$v = new View("forgetPasswordUser", "front");

	}
}
