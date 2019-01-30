<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;
use lib\functions\validate as validate;
use lib\functions\url as url;
use lib\database\user as user;

class approveaccount{
	public function index(){
		$lang = new l();
		$this->out["message"] = $lang->index("error");
		$this->out["error"] = "true";
		$this->out["redirect"] = c::WEBSITE."profile";
		$this->removeEverything = array(
			"removeAllSymbols"=>"true",
			"removeAllWhitespaces"=>"true",
			"removeAllTags"=>"true"
		);
		$user = new user();
		$this->id = validate\replace::call(url\request::method("POST","id"), $this->removeEverything);
		$this->v = validate\replace::call(url\request::method("POST","v"), $this->removeEverything);
		if($user->checkAprove($this->id, $this->v)){
			$this->out["message"] = $lang->index("done");
			$this->out["error"] = "false";

			$this->data = $user->getuserById($this->id);
			$_SESSION[c::SESSION_USERNAME] = $this->data["mobile"];
			$_SESSION[c::SESSION_NAMELNAME] = $this->data["namelname"];
		}
		return $this->out;
	}
}
?>