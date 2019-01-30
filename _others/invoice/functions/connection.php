<?php
class connection{
	public $HANDLER;
	public $hostname = "127.0.0.1";
	public $dbname = "geoweb_developer";
	public $username = "geoweb_developer";
	public $password = "I@Wn9JWJA2LPtZ*F;E";

	public function conn(){
		try{
			$host = 'mysql:host='.$this->hostname.';dbname='.$this->dbname.";charset=utf8"; 
			$this->HANDLER = new PDO($host,$this->username,$this->password); 
			$this->HANDLER->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$this->HANDLER->exec("set names utf8"); 
		}catch(PDOException $e){
			//$e->getMessage();
			die("Sorry, Database connection problem.."); 
		}
		return $this->HANDLER;
	}
}
?>