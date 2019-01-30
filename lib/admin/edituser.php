<?php
namespace lib\admin;

use config\main as c;
use lib\database\user as user;
use lib\functions\form\make as make;

class edituser{
	public function index($posted){
		$id = \lib\functions\url\request::method("GET","id");
		$user = new user();
		$fetchAll = $user->getuserById($id);
		echo "<h2>Edit User</h2>";

		echo make::open(array(
			"action"=>"",
			"method"=>"post",
			"id"=>"edituser"
		)); 

		// echo '<form action="" method="post">';
		if(!empty($posted["message"])):
			echo '<p>'.$posted["message"].'</p>';
		endif;
		
		echo make::inputHidden(array(
			"name"=>"submit",
			"value"=>"edituser"
		)); 

		echo make::inputHidden(array(
			"name"=>"userid",
			"value"=>$id
		)); 

		echo make::label(array(
			"for" => "mobile",
			"name" => "mobile",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"mobile",
			"id"=>"mobile",
			"class"=>"mobile",
			"value"=>$fetchAll['mobile'],
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "namelname",
			"name" => "Firstname Lastname",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"namelname",
			"id"=>"namelname",
			"class"=>"namelname",
			"value"=>$fetchAll['namelname'],
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "email",
			"name" => "Email",
			"require"=>"false"
		)); 
		
		echo make::inputText(array(
			"name"=>"email",
			"id"=>"email",
			"class"=>"email",
			"value"=>$fetchAll['email'],
			"placeholder"=>"",
			"require"=>"false",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "website",
			"name" => "Website",
			"require"=>"false"
		)); 
		
		echo make::inputText(array(
			"name"=>"website",
			"id"=>"website",
			"class"=>"website",
			"value"=>$fetchAll['website'],
			"placeholder"=>"",
			"require"=>"false",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		
		echo make::label(array(
			"for" => "cv",
			"name" => "CV",
			"require"=>"false"
		)); 
		echo (!empty($fetchAll["cv"])) ? '<a href="'.$fetchAll["cv"].'">Load CV</a>' : '<p><a style="color:green">No CV</a></p>';
		
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
?>