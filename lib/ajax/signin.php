<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;
use lib\functions\url as url;
use lib\functions\validate as validate;
use lib\database\userexists as userexists;

class signin{
	public function index(){
		$this->out["message"] = "";
		$this->out["error"] = "true";
		$this->out["redirect"] = "";

		$lang = new l();
		$this->removeEverything = array(
			"removeAllSymbols"=>"true",
			"removeAllWhitespaces"=>"true",
			"removeAllTags"=>"true"
		);
		$this->data["csrf"] = validate\replace::call(url\request::method("POST","csrf"), $this->removeEverything); 
		$this->data["val"] = json_decode(url\request::method("POST","val"));

		$userexists = new userexists();
		$password = validate\strings::encode($this->data["val"][1]);

		if($this->data["csrf"]!=$_SESSION["CSRF"]){
			$this->out["message"] = $lang->index("sessionError");
			$this->out["redirect"] = "";
		}else if(empty($this->data["val"][0]) || empty($this->data["val"][1])){
			$this->out["message"] = $lang->index("allFieldsRequired");
		}else if($userexists->index($this->data["val"][0], $password)){
			$user = new \lib\database\user(); 
			$namelname = $user->getuser($this->data["val"][0]);

			$_SESSION[c::SESSION_USERNAME] = $this->data["val"][0]; 
			$_SESSION[c::SESSION_NAMELNAME] = $namelname['namelname']; 
			
			$this->out["message"] = $lang->index("userexists");
			$this->out["error"] = "false";
			$this->out["redirect"] = c::WEBSITE."profile";
		}else{
			$this->out["message"] = $lang->index("userPassError");
			$this->out["redirect"] = "";
		}
		return $this->out;
	}
}
?>