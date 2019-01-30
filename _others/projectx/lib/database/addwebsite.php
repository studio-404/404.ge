<?php
class lib_database_addwebsite extends lib_database_connection{
	public function insert($o){
		$conn = $this->conn(); 
		$sql = 'INSERT INTO `_projectx_company_websites` SET `website`=?, `gadaixada`=?, `gadasaxdeli`=?, `price`=?, `companyid`=?';
		$prepare = $conn->prepare($sql); 
		$prepare->execute($o);
		if($prepare->rowCount() > 0){
			echo "Done"; 
		}else{
			echo "Error";
		}
	}
}
?>