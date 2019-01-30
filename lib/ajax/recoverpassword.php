<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;
use lib\functions\url as url;
use lib\functions\validate as validate;
use lib\sms as sms;
use lib\database\user as user;

class recoverpassword{
	public function index(){
		$lang = new l();
		$this->removeEverything = array(
			"removeAllSymbols"=>"true",
			"removeAllWhitespaces"=>"true",
			"removeAllTags"=>"true"
		);

		$this->data["csrf"] = validate\replace::call(url\request::method("POST","csrf"), $this->removeEverything); 
		$this->data["mobile"] = validate\replace::call(url\request::method("POST","m"), $this->removeEverything); 
		
		$this->out["message"] = "<p>".$lang->index("error")."</p>";
		$this->out["error"] = "true";

		if(
			$this->data["csrf"]==$_SESSION["CSRF"] && 
			validate\strings::startWith($this->data["mobile"], 0, 1, "5") && 
			validate\strings::countString($this->data["mobile"]) == 9
		){
			$sms = new sms\send();
			$user = new user();

			$generate = strtolower(validate\csrf::generete(5));
			$generete_encode = validate\strings::encode($generate);
			$generate_msg = "Tqven mogenichaT axali paroli: ".$generate." rekomendirebulia parolis shecvla Tqveni profilidan. --- ".c::NAME;
			if($user->updatePassowrd($this->data["mobile"], $generete_encode)){
				$mobileFormat = sprintf("995%s", $this->data["mobile"]);
				if($sms->index(array($mobileFormat), $generate_msg)){
					$this->out["message"] = "<p>".$lang->index("recieveMsg")."</p>";
					$this->out["error"] = "false";
				}
			}
			
		}

		return $this->out;
	}
}
?>