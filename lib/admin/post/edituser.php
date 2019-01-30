<?php
namespace lib\admin\post;

use config\main as c;
use lib\database\user as user;

class edituser{
	public function index(){
		$data["id"] = (int)\lib\functions\url\request::method("POST","userid"); 
		$data["mobile"] = \lib\functions\url\request::method("POST","mobile"); 
		$data["namelname"] = \lib\functions\url\request::method("POST","namelname"); 
		$data["email"] = \lib\functions\url\request::method("POST","email"); 
		$data["website"] = \lib\functions\url\request::method("POST","website"); 
		
		$user = new user();
		if($user->edituser($data)){
			$clear = new \lib\functions\cache\clearcache();
			$clear->index("public/cache");
			$out["message"] = "Data has been updated successfully !";
		}else{
			$out["message"] = "Data is not updated !";
		}
		return $out;
	}
}
?>