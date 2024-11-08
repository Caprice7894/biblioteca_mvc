<?php
namespace App\Models;

use App\System\DB;

class Model{
	protected $fields = [];
	protected $table = null;
	protected $db = null;
	public $id = null;

	public function __construct(?Array $data=null)
	{
		$db = DB::getInstance();
		$this->db = $db->getConnection();
		if($this->table === null){
			$className = explode('\\', get_class($this));
			$modelName = $className[sizeof($className) - 1];
			$this->table = strtolower($modelName).'s';
		}

		foreach($this->fields as $field){
			if(isset($data[$field])){
				$this->$field = $data[$field];
			}
		}

		if(isset($data['id'])){
			$this->id = $data['id'];
		}
	}

	public function find(String|Int $where='', ?Array $values=null){
		if(is_int($where)){
			return $this->findById($where);
		}

		$stmt = $this->db->prepare("SELECT * FROM {$this->table} $where");
		
		if($values !== null) $stmt->execute($values);
		else $stmt->execute();

		$results = $stmt->fetchAll($this->db::FETCH_ASSOC);
		$modelArray = [];
		foreach($results as $result){
			$modelArray[] = new $this($result);
		}
		return $modelArray;
	}

	private function findById($id) {
		$stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
		$stmt->execute([$id]);
		$result = $stmt->fetch($this->db::FETCH_ASSOC);
		if($result){
			foreach($result as $field=>$value){
				$this->$field = $value;
			}
			return true;
		}
		return false;
	}

	public function save(){
		$values = [];
		$fields = [];
		foreach($this->fields as $field){
			if(isset($this->$field) || $this->$field !== null){
				$values[] = '?';
				$fields[] = $field;
			}
		}
		$fieldString = implode(',', $fields);
		$valueString = implode(',', $values);
		$query = "INSERT INTO 
			{$this->table}
			($fieldString)
			VALUES ($valueString)";

		$stmt = $this->db->prepare($query);
		$campos = [];
		foreach($fields as $field){
			$campos[] = $this->$field;
		}
		if($stmt->execute($campos)){
			return intval($this->db->lastInsertId());
		}
		return false;
	}

	public function update(){
		if($this->id === null)
			return false;
		$fields = [];
		foreach($this->fields as $field){
			$fields[] = $field . '=?';
		}
		$vals = implode(',', $fields);
		$query = "UPDATE {$this->table} SET {$vals} WHERE id = ?";
		$stmt = $this->db->prepare($query);
		$values = [];
		foreach($this->fields as $field){
			$values[]=$this->$field;
		}
		$values[]=$this->id;
		if($stmt->execute($values)){
			return true;
		}
		return false;
	}

	public function delete(Int $id){
		if($this->id === null)
			$this->id = $id;
		
		$query = "DELETE FROM {$this->table} WHERE id = ?";

		$stmt = $this->db->prepare($query);
		
		$values[]=$this->id;
		if($stmt->execute($values)){
			return true;
		}
		return false;
	}
}