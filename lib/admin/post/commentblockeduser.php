<?php
namespace lib\admin\post;

use config\main as c;
use lib\database\user as user;

class commentblockeduser{
	public function index(){
		$userid = \lib\functions\url\request::method("POST", "userid");
		$comment = \lib\functions\url\request::method("POST", "comment");
		$user = new user();
		if($user->blockuser($userid, 1, $comment)){
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