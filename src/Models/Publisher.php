<?php
namespace App\Models;

class Publisher extends Model{
	protected $fields = [
		'name',
		'bibliography',
		'city',
		'country',
		'address',
		'foundation_date',
		'phone'
	];

	public function books(){
		$books = new Book();
		return $books->find("WHERE publisher_id = ?", [$this->id]);
	}
}