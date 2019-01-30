<?php
namespace lib\functions\cache;

use config\main as c;

class clearcache{
	public function index($path){
		$fullpath = "rm -rf ".c::DIR.$path."/*";
		shell_exec($fullpath);
	} 
}
?>