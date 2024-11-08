<?php
namespace App\Controllers;

use App\Models\User;

class UserController{

	public function index(){
		$user = new User(null);
		$users = $user->find();

		view("users", ['users'=>$users]);
	}

	public function create(){

		$userData = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
			'is_admin' => isset($_POST['is_admin'])
		];

		$user = new User($userData);
		$result = $user->save();
		header("Content-Type:application/json");
		if($result){
			echo true;
			return;
		}
		echo false;
	}

	public function edit(Int $id){
		$user = new User();
		$user->find($id);

		view("user_edit", ['user'=>$user]);
	}

	public function update(Int $id){

		$user = new User();
		if(!$user->find(intval($id))){
			http_response_code(404);
			echo "Usuario no encontrado";
			return;
		}

		$userData = [
			'name' => $_POST['name'] ?? $user->name,
			'email' => $_POST['email'] ?? $user->email,
			'password' => (isset($_POST['password']) && !empty($_POST['password']))?password_hash($_POST['password'], PASSWORD_DEFAULT): $user->password(),
			'is_admin' => isset($_POST['is_admin'])
		];

		foreach($userData as $key=>$val){
			if($key === "password")
				$user->newPassword($val);
			else
				$user->$key = $val;
		}

		$result = $user->update();
		header("Content-Type:application/json");
		if($result){
			echo json_encode($user);
			return;
		}
		echo false;
	}

	public function delete($id){
		$user = new User(['id'=>$id]);
		http_response_code(204);
		echo $user->delete($id);
	}
}