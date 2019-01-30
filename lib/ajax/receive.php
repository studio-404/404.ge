<?php
namespace lib\ajax;

use config\main as c;
use lib\database\connection as connection;
use lib\functions\url\request as request;
use lib\functions\validate\replace as replace;

class receive{

	function __construct(){
		// $this->connection = new connection();
		// $this->conn = $this->connection->conn();		
	}

	public function index(){
		$this->removeEverything = array(
			"removeAllSymbols"=>"true",
			"removeAllWhitespaces"=>"true",
			"removeAllTags"=>"true"
		);
		$this->type = replace::call(request::method("POST","type"), $this->removeEverything); 
		$className = "lib\ajax\\".$this->type;
		if (class_exists($className)) {
			$obect = new $className();
			$this->out = $obect->index();
		}else{
			$this->out['message'] = "Class not defined !";
		}


		echo json_encode($this->out);
	}
}
?>