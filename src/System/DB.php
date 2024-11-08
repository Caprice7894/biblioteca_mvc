<?php
namespace App\System;

use PDO;
use PDOException;

class DB{
	private static $instance = null;

	private $pdo;

    private function __construct() {
    	$dbData = [
	        'dsn' => 'sqlite:'. __DIR__ .'/../../database.db',
	        // 'user' => 'myuser',
	        // 'password' => 'mypassword',
    	];
        try {
            $this->pdo = new PDO(...$dbData);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e)  
 		{
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
	private function __clone(){}

	public static function getInstance(){
		if(self::$instance === null){
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function getConnection(){
		return $this->pdo;
	}
}