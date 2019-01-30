<?php
namespace lib\admin\post;

use config\main as c;
use lib\database\user as user;
use lib\functions\url\request as request;

class adduser{
	public function index(){
		$data[0] = request::method("POST","mobile"); 
		$data[1] = request::method("POST","namelname"); 
		$data[2] = request::method("POST","password"); 
		$data[3] = request::method("POST","email"); 
		$data[4] = request::method("POST","website"); 
		

		$user = new user();
		if($user->adduser($data, false)){
			$clear = new \lib\functions\cache\clearcache();
			$clear->index("public/cache");
			$out["message"] = "Data has been inserted successfully !";
		}else{
			$out["message"] = "Data is not inserted !";
		}
		return $out;
	}
}
?>