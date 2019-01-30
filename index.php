<?php
session_start();
session_name("studio404");
error_reporting(E_ALL);
ini_set('memory_limit', '5120M');
ini_set('display_errors', 1);

if($_SERVER["REMOTE_ADDR"]!="94.240.245.46"){
	header("Location: http://ww.404.ge");
	exit();
}

try
{
	function __autoload($className) { 
		$parts = explode('\\', $className);
		$last = array_pop($parts);
		$pop = implode("/",$parts);
		$path = $pop.'/'.$last.'.php';
		if(file_exists($path)){
	    	require $path;
		}else{
			echo "We Could not find $className !";
		}
	} 	

	$validate = new lib\functions\validate\phpversion();
	if(!$validate->check()):
		echo "PHP Version Should be higher then ".$validate->mpv;
		exit();
	endif;

	if(lib\functions\url\request::method("POST", "ajax")=="true"):
		$receive = new lib\ajax\receive();
		$receive->index();
	else:
		$_SESSION["CSRF"] = lib\functions\validate\csrf::generete(15);
		$page = new lib\functions\load\page();
		$page->bootstap();
	endif;


}catch(Exception $e){ 
	echo $e; 
	exit();
}
?>