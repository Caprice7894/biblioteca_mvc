<?php
namespace App\Models;

class AuthorBook extends Model{
	protected $fields = [
		'author_id',
		'book_id'
	];
	protected $table = 'author_book';
}