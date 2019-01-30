<?php
namespace lib\functions\lang;

use config\main as c;

class l{
	public function index($string){
		$file = c::LANG;
		if(file_exists($file)){
			$get = file_get_contents($file);
			$json = json_decode($get, true);
			extract($json, EXTR_PREFIX_SAME, "wddx");
			if(!empty($$string)){
				return $$string;
			}else{
				return "ERROR: ".$string;
			}
		}
	}
} 
?>