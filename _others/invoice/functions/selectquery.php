<?php
class selectquery extends connection{
	public function select($colums,$table,$where,$orderby,$limit,$fetchType="all"){
		$CONNECTION = $this->conn();
		$sql = 'SELECT '.$colums.' FROM '.$table.' WHERE '.$where.' '.$orderby.' '.$limit;
		$prepare = $CONNECTION->prepare($sql);
		$prepare->execute();
		if($fetchType=="all"){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	public function update($table,$set,$where){
		$CONNECTION = $this->conn();
		$sql = 'UPDATE '.$table.' SET '.$set.' '.$where;
		$prepare = $CONNECTION->prepare($sql);
		$prepare->execute();
		return "true";
	}
}
?>