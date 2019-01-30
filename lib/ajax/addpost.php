<?php
namespace lib\ajax;

use config\main as c;
use lib\functions\lang\l as l;

class addpost{
	public function index(){
		$lang = new l();
		$this->out["popup_title"] = $lang->index("addpost");
		if(!isset($_SESSION[c::SESSION_USERNAME])){
			$this->out["message"] = $lang->index("pleasesignin");
			$this->out["error"] = "true";
			$this->out["form"] = "true";
		}else{
			$this->out["message"] = "Boo";
			$this->out["error"] = "false";
			$this->out["form"] = "<p>aa</p>";
		}
		
		return $this->out;
	}
}
?>