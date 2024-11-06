<?php
namespace App\Controllers;

class UserController{
	public function __construct()
	{
		return;
	}

	public function index($id){
		throw new \Error("Exepcion generica");
		echo 'este el index - ' . $id;
	}
}