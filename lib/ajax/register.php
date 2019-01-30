<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;
use lib\functions\url as url;
use lib\functions\validate as validate;
use lib\database\userexists as userexists;

class register{
	public function index(){
		$this->out["title"] = "";
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
		$this->data["val"] = json_decode(url\request::method("POST","val"));

		$userexists = new userexists();

		if(validate\checkempty::arrayHasEmptyValue($this->data["val"])){
			$this->out["message"] = $lang->index("allFieldsRequired");
		}else if(
			!validate\strings::startWith($this->data["val"][0], 0, 1, "5") || 
			validate\strings::countString($this->data["val"][0]) != 9
		){
			$this->out["message"] = $lang->index("mobileFormatError");
		}else if(validate\strings::countString($this->data["val"][2]) <= 5){
			$this->out["message"] = $lang->index("tooEasyPassword");
		}else if(!validate\strings::match($this->data["val"][2], $this->data["val"][3])){
			$this->out["message"] = $lang->index("noMatchPassword");
		}else if($userexists->index($this->data["val"][0])){
			$this->out["message"] = $lang->index("userexists");
		}else if($this->data["csrf"]!=$_SESSION["CSRF"]){
			$this->out["message"] = $lang->index("sessionError");
		}else{
			$user = new \lib\database\user();
			if($user->adduser($this->data["val"])){
				$this->out["title"] = $lang->index("accountApprove");
				$this->out["message"] = $lang->index("done");
				$this->out["error"] = "false";
				$this->out["redirect"] = c::WEBSITE."profile";
				$this->out["form"] .= \lib\functions\form\make::open(array(
					"action"=>"javascript:void(0)",
					"method"=>"post",
					"id"=>"approveaccount"
				)); 

				$this->out["form"] .= \lib\functions\form\make::label(array(
					"for" => "mobileMsg",
					"name" => $lang->index("mobileMsg"),
					"require"=>"true"
				));

				$this->out["form"] .= \lib\functions\form\make::inputText(array(
					"name"=>"mobileMsg",
					"id"=>"mobileMsg",
					"class"=>"formdata mobileMsg",
					"value"=>"",
					"placeholder"=>"****",
					"require"=>"true",
					"match"=>"false"
				));

				$this->out["form"] .= \lib\functions\form\make::inputSubmit(array(
					"name"=>"approve-button",
					"id"=>"approve-button",
					"class"=>"approve-button",
					"value"=>$lang->index("approve"),
					"onclick"=>"website.approve('approveaccount', '".$user->lastAffectedIdl."')"
				));

				$this->out["form"] .= \lib\functions\form\make::close();

				
			}else{
				$this->out["message"] = $lang->index("error");
			}
		}
		
		return $this->out;
	}
}
?>