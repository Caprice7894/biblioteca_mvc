<?php
namespace App\Models;

class Book extends Model{
	protected $fields = [
		'title',
		'edition',
		'synopsis',
		'year',
		'isbn',
		'publisher_id',
	];

	public function authors(){
		$author = new Author();
		return $author->find("WHERE id IN (SELECT author_id from author_book where book_id = ?)", [$this->id]);
	}
}