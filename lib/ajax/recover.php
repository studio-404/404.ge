<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;
use lib\functions\url as url;
use lib\functions\validate as validate;

class recover{

	public function index(){
		$this->out["message"] = "";
		$this->out["error"] = "true";
		$this->out["redirect"] = "";
		$this->out["form"] = "";

		$lang = new l();
		$this->removeEverything = array(
			"removeAllSymbols"=>"true",
			"removeAllWhitespaces"=>"true",
			"removeAllTags"=>"true"
		);
		$this->data["csrf"] = validate\replace::call(url\request::method("POST","csrf"), $this->removeEverything); 
		
		if($this->data["csrf"]!=$_SESSION["CSRF"]){
			$this->out["title"] = $lang->index("msg"); 
			$this->out["message"] = "<p>".$lang->index("error")."</p>";
		}else{
			$this->out["title"] = $lang->index("recover");
			$this->out["message"] = $lang->index("done");
			$this->out["error"] = "false";

			$this->out["form"] .= \lib\functions\form\make::open(array(
				"action"=>"javascript:void(0)",
				"method"=>"post",
				"id"=>"recover"
			));

			$this->out["form"] .= \lib\functions\form\make::label(array(
				"for" => "mobile_recovery_password",
				"name" => $lang->index("mobnumber"),
				"require"=>"true"
			));

			$this->out["form"] .= \lib\functions\form\make::inputText(array(
				"name"=>"mobile_recovery_password",
				"id"=>"mobile_recovery_password",
				"class"=>"mobile_recovery_password",
				"value"=>"",
				"placeholder"=>"599******",
				"require"=>"true",
				"match"=>"false"
			));

			$this->out["form"] .= \lib\functions\form\make::inputSubmit(array(
				"name"=>"recover-password",
				"id"=>"recover-password",
				"class"=>"recover-password",
				"value"=>$lang->index("recover"),
				"onclick"=>"website.recoverPassword('".$_SESSION["CSRF"]."')"
			));

			$this->out["form"] .= \lib\functions\form\make::close();
		}

		return $this->out;
	}

}
?>