<?php
namespace lib\functions\file; 

class create{
	public function index($fileOpen, $content){
		try{
			$myfile = fopen($fileOpen, "w");
			fwrite($myfile, $content);
			fclose($myfile);
		}catch(Exception $e){
			
		}
	}
}
?>