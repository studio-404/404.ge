<?php
namespace lib\database; 

use lib\database\connection as connection;

class categories{
	public $conn;	

	public function topcat(){
		$fetch = array();
		$connection = new connection();
		$conn = $connection->conn();
		$sql = "SELECT * FROM `pages` WHERE `type`=:type AND `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
		$prepare = $conn->prepare($sql);
		
		$prepare->execute(array(
			":type"=>"topmenu", 
			":zero"=>0 
		));

		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
		}
		return $fetch;
	}

	public function subcat(){
		$fetch = array();
		$connection = new connection();
		$conn = $connection->conn();
		$sql = "SELECT * FROM `pages` WHERE `type`=:type AND `subid`=:zero AND  `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
		$prepare = $conn->prepare($sql);
		
		$prepare->execute(array(
			":type"=>"category", 
			":zero"=>0 
		));

		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
		}
		return $fetch;
	}
}
?>