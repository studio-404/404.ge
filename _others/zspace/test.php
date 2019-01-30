<?php
class Database{
	private static $instance;

	public static function getInstance(){ 
		if(!isset(Database::$instance)){ 
			Database::$instance = new Database();
		}

		return Database::$instance;
	}

	private function __construct(){

	}

	public function getQuery(){
		return "Hi there !";
	}
}

$db = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();

// var_dump($db);
// var_dump($db2);
// var_dump($db3);
echo $db->getQuery();
?>