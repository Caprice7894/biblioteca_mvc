<?php
namespace App\Models;

class User extends Model{
	protected $fields = [
		'name',
		'email',
		'password',
		'is_admin'
	];

	protected String $password;

	public function authCheck($password){
		return password_verify($password, $this->password);
	}

	public function password(){
		return $this->password;
	}
	public function newPassword($password){
		$this->password = $password;
	}
}