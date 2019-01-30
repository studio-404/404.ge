<?php
function __autoload($class_name){
	$class_load = false;
	if(file_exists('functions/'.$class_name.'.php')){// auto load function
    	@include 'functions/'.$class_name.'.php';
    	$class_load = true;
	}
	if(!$class_load){
		echo "Class: <b>".$class_name."</b> can't load.."; exit();
	}
}
?>
<!DOCTYPE html>
<html lang="ge">
<head>
	<meta charset="utf-8" />
	<title>Invoices</title>
</head>
<body>
	<a href="?page=welcome">Invoices</a> | 
	<a href="?page=csv">CSV</a> <br /><br />
<?php
$page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : "welcome";
$content = new content(); 
$content->load($page);
?>
</body>
</html>