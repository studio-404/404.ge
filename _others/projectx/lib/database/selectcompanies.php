<?php
class lib_database_selectcompanies extends lib_database_connection{
	public function select_all(){
		$conn = $this->conn(); 
		$sql = 'SELECT * FROM `_projectx_table` WHERE `status`!=1 ORDER BY `company` ASC';
		$prepare = $conn->prepare($sql); 
		$prepare->execute();
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$fetch = array();
		}
		return $fetch;
	}
}
?>