<?php 
class lib_database_connection{
	public $HANDLER;

	function __construct(){
		//$this->conn();
	}

	public function conn(){
			$host = 'mysql:host=127.0.0.1;dbname=geoweb_404;charset=UTF8'; 
			$this->HANDLER = new PDO($host,"geoweb_batumi","#v1?n9=EWXmd"); 
			$this->HANDLER->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->HANDLER->exec("set names UTF8"); 
		try{}catch(PDOException $e){
			die("Sorry, Database connection problem.."); 
		}
		return $this->HANDLER;
	}

	function __destruct(){
		
	}
}
?>