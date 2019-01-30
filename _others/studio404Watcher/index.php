<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set("Asia/Tbilisi");

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

define("DIR", $_SERVER['DOCUMENT_ROOT']);
define("WATCHER_FOLDER", "studio404Watcher");

$options = array( 
	"SEND_EMAIL"=> true,
	"EMAILTO"=>"giorgigvazava87@gmail.com", 
	"EMAILTO_NAME"=>"Giorgi", 
	"EMAILFROM"=>"info@404.ge", 
	"EMAILFROM_NAME"=>"404.ge/public_html - watcher", 
	"EMAIL_SUBJECT"=>"Sombody upload file or files to your project", 
	"IGNORE_FOLDERS"=>array(
		DIR."/".WATCHER_FOLDER
	),
	"DIR"=>DIR, 
	"HOMEPAGE"=>"/".WATCHER_FOLDER."/",
	"WATCHER_FOLDER"=>WATCHER_FOLDER,
	"JSON_FILE"=>sprintf("%s/%s/result.json", $_SERVER['DOCUMENT_ROOT'], WATCHER_FOLDER), 	
	"JSON_FILE_LOG"=>sprintf("%s/%s/log", $_SERVER['DOCUMENT_ROOT'], WATCHER_FOLDER)	
); 

$bootstrap = new watcher\lanch\bootstrap();
$bootstrap->index($options);
?>
