<?php
 require_once 'DBConnection.php';

abstract class IDAO extends DBConnection {
	
	protected $table;

	abstract public function insert();
	#abstract public function update($ID);
	
	#public function delete($id, $conn);
	public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DBConnection::prepare($sql);
		$stmt->bindParam(':id', $id); 
		$stmt->execute();
		return $stmt-fetch();
	}
	public function findAll(){
		$sql  = "SELECT * FROM $this->table;";
		$stmt = DBConnection::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}
?>
