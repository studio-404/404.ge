<?php
class lib_database_addcompany extends lib_database_connection{
	public function insert($company){
		$conn = $this->conn(); 
		$sql = 'INSERT INTO `_projectx_table` SET `company`=:company';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":company"=>$company 
		));
		if($prepare->rowCount() > 0){
			echo "Done";
		}else{
			echo "Error";
		}
	}

	public function name($cid){
		$conn = $this->conn(); 
		$sql = 'SELECT `company` FROM `_projectx_table` WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":id"=>$cid 
		));
		if($prepare->rowCount() > 0){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
			echo $fetch['company'];
		}else{
			echo "Error";
		}
	}

	public function edit($cid,$txt){
		$conn = $this->conn(); 
		$sql = 'UPDATE `_projectx_table` SET `company`=:company WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":id"=>$cid, 
			":company"=>$txt 
		));
		if($prepare->rowCount() > 0){
			echo "Done";
		}else{
			echo "Error";
		}
	}
}
?>