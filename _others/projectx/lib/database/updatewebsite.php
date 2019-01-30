<?php
class lib_database_updatewebsite extends lib_database_connection{
	public function updateme($id,$o){
		$conn = $this->conn();
		$sql = 'UPDATE `_projectx_company_websites` SET `website`=:website, `gadaixada`=:gadaixada, `gadasaxdeli`=:gadasaxdeli, `price`=:price WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$gadaixada = str_replace("/","-",$o['gadaixada']);
		$gadaixada = strtotime($gadaixada);

		$gadasaxdeli = str_replace("/","-",$o['gadasaxdeli']);
		$gadasaxdeli = strtotime($gadasaxdeli);
		$prepare->execute(array(
			":id"=>$id,
			":website"=>$o['website'],
			":gadaixada"=>$gadaixada,
			":gadasaxdeli"=>$gadasaxdeli,
			":price"=>$o['price'] 
		));
		$done = 'Done';
		return $done;
	}
}
?>