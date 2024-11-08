<?php
namespace App\Controllers;

use App\Models\Publisher;

class PublisherController{

	public function index(){
		$publisher = new Publisher();
		$publishers = $publisher->find();

		view("publishers/publishers", ['publishers'=>$publishers]);
	}

	public function show(Int $id){
		$publisher = new Publisher();
		if(!$publisher->find($id)){
			http_response_code(404);
			echo "Libro no encontrado";
			return;
		}
		$books = $publisher->books();

		view("publishers/publisher", ['publisher'=>$publisher, 'books'=>$books]);
	}

	public function create(){

		$publisherData = [
			'name' => $_POST['name'],
			'bibliography' => $_POST['bibliography'],
			'city' => $_POST['city'],
			'country' => $_POST['country'],
			'address' => $_POST['address'],
			'foundation_date' => $_POST['foundation_date'],
			'phone' => $_POST['phone'],
		];

		$publisher = new Publisher($publisherData);
		$result = $publisher->save();

		if($result){
			echo true;
			return;
		}
		echo false;
	}

	public function edit(Int $id){
		$publisher = new Publisher();
		$publisher->find($id);

		view("publishers/publisher_edit", ['publisher'=>$publisher]);
	}

	public function update(Int $id){

		$publisher = new Publisher();
		if(!$publisher->find(intval($id))){
			http_response_code(404);
			echo "Autor no encontrado";
			return;
		}

		$publisherData = [
			'name' => $_POST['name'] ?? $publisher->name,
			'bibliography' => $_POST['bibliography'] ?? $publisher->bibliography,
			'city' => $_POST['city'] ?? $publisher->city,
			'country' => $_POST['country'] ?? $publisher->country,
			'address' => $_POST['address'] ?? $publisher->address,
			'foundation_date' => $_POST['foundation_date'] ?? $publisher->foundation_date,
			'phone' => $_POST['phone'] ?? $publisher->phone,
		];

		foreach($publisherData as $key=>$val){
			$publisher->$key = $val;
		}

		$result = $publisher->update();
		header("Content-Type:application/json");
		if($result){
			echo json_encode($publisher);
		}
		echo false;
	}

	public function delete($id){
		$publisher = new Publisher(['id'=>$id]);
		http_response_code(204);
		echo $publisher->delete($id);
	}
}