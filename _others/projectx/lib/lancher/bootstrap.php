<?php
class lib_lancher_bootstrap extends lib_database_connection{
	function __construct(){

	}

	public function lanch($c){
		$conn = $this->conn(); 
		$page = lib_validate_request::method("GET","page");
		
		switch($page){
			case "ajax":
			$result = "Error";
			$type = lib_validate_request::method("POST","t");
			if($type=="addcompany"){
				$companies = lib_validate_request::method("POST","c");
				$addcompany = new lib_database_addcompany();
				$result = $addcompany->insert($companies);
			}else if($type=="addWebsite"){
				$o[] = lib_validate_request::method("POST","w");
				$o[] = strtotime(str_replace("/","-",lib_validate_request::method("POST","p")));
				$o[] = strtotime(str_replace("/","-",lib_validate_request::method("POST","d")));
				$o[] = lib_validate_request::method("POST","pr");
				$o[] = lib_validate_request::method("POST","cid");
				$addwebsite = new lib_database_addwebsite();
				$result = $addwebsite->insert($o); 
			}else if($type=="deleteWebsite"){
				$did = lib_validate_request::method("POST","did");
				$deletewebsite = new lib_database_deletewebsite();
				$result = $deletewebsite->delete_me($did); 
			}else if($type=="deletecompany"){
				$did = lib_validate_request::method("POST","did");
				$deletecompany = new lib_database_deletecompany();
				$result = $deletecompany->delete_me($did); 
			}else if($type=="editcompany"){
				$cid = lib_validate_request::method("POST","cid");
				$addcompany = new lib_database_addcompany();
				$result = $addcompany->name($cid); 
			}else if($type=="editcompanyform"){
				$cid = lib_validate_request::method("POST","cid");
				$txt = lib_validate_request::method("POST","txt");
				$editcompany = new lib_database_addcompany();
				$result = $editcompany->edit($cid,$txt); 
			}else if($type=="editwebsite"){
				$cid = lib_validate_request::method("POST","cid");
				$o["website"] = lib_validate_request::method("POST","w");
				$o["gadaixada"] = lib_validate_request::method("POST","p");
				$o["gadasaxdeli"] = lib_validate_request::method("POST","d");
				$o["price"] = lib_validate_request::method("POST","pr");
				
				$updatewebsite = new lib_database_updatewebsite();
				$result = $updatewebsite->updateme($cid,$o);
			} 
			echo $result;
			break;
			default: 
			$lib_database_selectcompanies = new lib_database_selectcompanies(); 
			$companies = $lib_database_selectcompanies->select_all();
			$lib_modules_table = new lib_modules_table();
			$data["table.companies"] = $lib_modules_table->print_table($companies);
			include($c["website.directory"]."/index.php");			
		}
	}

}
?>