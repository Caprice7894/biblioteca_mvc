<?php
namespace App\Controllers;

use App\Models\Author;

class AuthorController{

	public function index(){
		$author = new Author(null);
		$authors = $author->find();

		view("authors/authors", ['authors'=>$authors]);
	}

	public function show(Int $id){
		$author = new Author();
		$author->find($id);
		$books = $author->books();

		view("authors/author", ['author'=>$author, 'books'=>$books]);
	}

	public function create(){

		$authorData = [
			'name' => $_POST['name'],
			'surname' => $_POST['surname'],
			'bibliography' => $_POST['bibliography'],
			'city' => $_POST['city'],
			'country' => $_POST['country'],
			'birthdate' => $_POST['birthdate'],
			'phone' => $_POST['phone']
		];

		$author = new Author($authorData);
		$result = $author->save();
		header("Content-Type:application/json");
		if($result){
			echo true;
			return;
		}
		echo false;
	}

	public function edit(Int $id){
		$author = new Author();
		$author->find($id);

		view("authors/author_edit", ['author'=>$author]);
	}

	public function update(Int $id){

		$author = new Author();
		if(!$author->find(intval($id))){
			http_response_code(404);
			echo "Autor no encontrado";
			return;
		}

		$authorData = [
			'name' => $_POST['name'] ?? $author->name,
			'surname' => $_POST['surname'] ?? $author->surname,
			'bibliography' => $_POST['bibliography'] ?? $author->bibliography,
			'city' => $_POST['city'] ?? $author->city,
			'country' => $_POST['country'] ?? $author->country,
			'birthdate' => $_POST['birthdate'] ?? $author->birthdate,
			'phone' => $_POST['phone'] ?? $author->phone,
		];

		foreach($authorData as $key=>$val){
			$author->$key = $val;
		}

		$result = $author->update();
		header("Content-Type:application/json");
		if($result){
			echo json_encode($author);
			return;
		}
		echo false;
	}

	public function delete($id){
		$author = new Author(['id'=>$id]);
		http_response_code(204);
		echo $author->delete($id);
	}
}