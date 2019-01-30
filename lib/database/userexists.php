<?php
namespace lib\database;

use lib\database\connection as connection;

class userexists{
	public $conn;	

	public function index($mobile, $password = false){
		$connection = new connection();
		$conn = $connection->conn();
		if(!$password){
			$sql = "SELECT `id` FROM `users` WHERE `mobile`=:mobile AND `blocked`!=1 AND `terminate`=:zero";
		}else{
			$sql = "SELECT `id` FROM `users` WHERE `mobile`=:mobile AND `password`=:password AND `approve`=:approve AND `blocked`!=1 AND `terminate`=:zero";
		}
		$prepare = $conn->prepare($sql);
		
		if(!$password){	
			$prepare->execute(array(
				":mobile"=>$mobile, 
				":zero"=>0
			));
		}else{
			$prepare->execute(array(
				":mobile"=>$mobile, 
				":password"=>$password, 
				":approve"=>"true", 
				":zero"=>0
			));
		}

		if($prepare->rowCount()){
			return true;
		}
		return false;
	}
}
?>