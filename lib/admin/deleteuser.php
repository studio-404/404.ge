<?php
namespace lib\admin;

use config\main as c;
use lib\database\user as user;

class deleteuser{
	public function index($posted){
		$id = \lib\functions\url\request::method("GET","id");
		$user = new user();
		
		echo "<h2>Delete user</h2>";
		if($user->deleteuser($id)):
			echo '<p>User Deleted !</p>';
		endif;
	}
} 
?>