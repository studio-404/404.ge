<?php
class content{
	public function load($page){
		$selectquery = new selectquery();
		$fetch = $selectquery->select("*","`studio404_invoices`","`service`='webhosting' AND `lang`=4 AND `status`!=1","ORDER BY `user_id` DESC","",$fetchType="all");
		$getusersname = new getusersname();

		$page = "pages/".$page.".php"; 
		if(file_exists($page)){
			@include($page); 
		}else{
			@include("pages/welcome.php"); 
		}
	}
}
?>