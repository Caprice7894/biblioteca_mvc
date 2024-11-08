<?php
namespace App\Models;

class Author extends Model{
	protected $fields = [
		'name',
		'surname',
		'bibliography',
		'city',
		'country',
		'birthdate',
		'phone'
	];

	public function books(){
		$book = new Book();
		return $book->find("WHERE id IN (SELECT book_id from author_book where author_id = ?)", [$this->id]);
	}
}