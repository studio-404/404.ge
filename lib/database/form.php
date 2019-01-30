<?php
namespace lib\database;

use config\main as c;
use lib\database\connection as connection;

class form{
	public $conn;

	public function __construct(){
		$connection = new connection();
		$this->conn = $connection->conn();
	}

	public function selectform(){
		$fetch['fetch'] = array();
		
		$sql = "SELECT `id`,`name`,`formhiddenname` FROM `form` WHERE `parent`=:zero AND `type`=:type AND `status`=:zero";
		$prepare = $this->conn->prepare($sql);
		
		$prepare->execute(array(
			":type"=>"form", 
			":zero"=>0 
		));

		$fetch['count'] = $this->countForms();

		if($prepare->rowCount()){
			$fetch["fetch"] = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
		}
		return $fetch;
	}

	public function countForms(){
		$sql = "SELECT count(`id`) as sum FROM `form` WHERE `parent`=:zero AND `type`=:type AND `status`=:zero";
		$prepare = $this->conn->prepare($sql);
		
		$prepare->execute(array(
			":type"=>"form", 
			":zero"=>0 
		));

		if($prepare->rowCount()){
			$fetch = $prepare->fetch(\PDO::FETCH_ASSOC); 
			return $fetch["sum"];
		}
		return 0;
	}
}
?>