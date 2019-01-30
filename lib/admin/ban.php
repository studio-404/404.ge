<?php
namespace lib\admin;

use config\main as c;
use lib\database\user as user;
use lib\functions\form\make as make;

class ban{
	public function index($posted){
		$id = (int)\lib\functions\url\request::method("GET","id");
		$status = \lib\functions\url\request::method("GET","status");
		$user = new user();
		if($status=="false"){
			echo "<h2>Unblock user</h2>";
			if($user->blockuser($id, $status)):
				echo '<p>Unblocked !</p>';
			endif;
		}else{
			// echo "<h2>block user</h2>";
			// if($user->blockuser($id, $status)):
			// 	echo '<p>blocked !</p><br /><hr />';
			$getuserById = $user->getuserById($id);
			echo "<h2>Comment Why user has been blocked</h2>";
			echo make::open(array(
				"action"=>"",
				"method"=>"post",
				"id"=>"commentblockeduser"
			)); 

			if(!empty($posted["message"])):
				echo '<p>'.$posted["message"].'</p>';
			endif;
			
			echo make::inputHidden(array(
				"name"=>"submit",
				"value"=>"commentblockeduser"
			)); 

			echo make::inputHidden(array(
				"name"=>"userid",
				"value"=>$id
			)); 

			echo make::textarea(array(
				"name"=>"comment", 
				"value"=>$getuserById['blocked_comment']
			));

			echo make::inputSubmit(array(
				"name"=>"noname",
				"id"=>"noname",
				"class"=>"noname",
				"value"=>"Submit",
				"onclick"=>""
			));

			echo make::close(); 
		}
		
	}
}
?>