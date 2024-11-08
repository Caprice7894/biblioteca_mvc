<?php
namespace App\Controllers;

use App\Models\AuthorBook;
use App\Models\Book;

class BookController{

	public function index(){
		$book = new Book();
		$books = $book->find();

		view("books/books", ['books'=>$books]);
	}

	public function show(Int $id){
		$book = new Book();
		if(!$book->find($id)){
			http_response_code(404);
			echo "Libro no encontrado";
			return;
		}
		$authors = $book->authors();

		view("books/book", ['book'=>$book, 'authors'=>$authors]);
	}

	public function create(){

		$bookData = [
			'title' => $_POST['title'],
			'edition' => $_POST['edition'],
			'synopsis' => $_POST['synopsis'],
			'year' => $_POST['year'],
			'isbn' => $_POST['isbn'],
			'publisher_id' => $_POST['publisher_id'],
		];

		$book = new Book($bookData);
		$result = $book->save();

		if($result){
			$book_author_rel = [
				'author_id' => $_POST['author_id'],
				'book_id' => $result
			];
			$ab = new AuthorBook($book_author_rel);
			if($ab->save()){
				echo true;
				return;
			}
			echo false;
			return;
		}
		echo false;
	}

	public function edit(Int $id){
		$book = new Book();
		$book->find($id);

		view("books/book_edit", ['book'=>$book]);
	}

	public function update(Int $id){

		$book = new Book();
		if(!$book->find(intval($id))){
			http_response_code(404);
			echo "Autor no encontrado";
			return;
		}

		$bookData = [
			'title' => $_POST['title'] ?? $book->title,
			'edition' => $_POST['edition'] ?? $book->edition,
			'synopsis' => $_POST['synopsis'] ?? $book->synopsis,
			'year' => $_POST['year'] ?? $book->year,
			'isbn' => $_POST['isbn'] ?? $book->isbn,
			'publisher_id' => $_POST['publisher_id'] ?? $book->publisher_id,
		];

		foreach($bookData as $key=>$val){
			$book->$key = $val;
		}

		$result = $book->update();
		header("Content-Type:application/json");
		if($result){
			echo json_encode($book);
		}
		echo false;
	}

	public function delete($id){
		$book = new Book(['id'=>$id]);
		http_response_code(204);
		echo $book->delete($id);
	}
}