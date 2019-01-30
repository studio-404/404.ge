<?php
class lib_database_selectwebsite extends lib_database_connection{

	public function select($id){
		$conn = $this->conn();
		$sql = 'SELECT * FROM `_projectx_company_websites` WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":id"=>$id
		));
		$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		return $fetch;
	}

}
?>