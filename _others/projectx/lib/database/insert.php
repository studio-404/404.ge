<?php
class lib_database_insert extends lib_database_connection{
	public function insert_deseases($title,$content){
		$conn = $this->conn(); 
		// $sql = 'INSERT INTO `medical_deseases` SET `title`=:title, `content`=:content';
		// $prepare = $conn->prepare($sql); 
		// $prepare->execute(array(
		// 	":title"=>$title, 
		// 	":content"=>$content 
		// ));
		// if($prepare->rowCount()){
		// 	echo "inserted !"; 
		// }else{
		// 	echo "Error";
		// }
		// echo "<br />";
	}
}
?>