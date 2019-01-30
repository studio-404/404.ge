<!DOCTYPE html>
<html>
<head>
<title>Show Website</title>
<style type="text/css">
body{ margin:0; padding:0; border:0; outline:0; }
img{ margin:0 auto; padding:0; border:0; outline:0; }
.showimage{
	margin:0 auto;
	width:100%;
	text-align:center
}
</style>
</head>
<body>
<?php
function dirToArray($dir) { 
   $result = array(); 
   $cdir = scandir($dir); 
  // if(!is_dir(dir)){ echo "directory not exists ! :P "; exit(); }
  if(!is_array($cdir)){ echo "directory not exists ! :P "; exit(); }
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
         { 
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
         } 
         else 
         { 
            $result[] = $value; 
         } 
      } 
   }    
   return $result; 
}
if(isset($_GET["folder"])){ $folderName = "img/".$_GET["folder"]; }else{ $folderName = "img"; }
$images = dirToArray($folderName);
if(isset($_GET["img"])){ $i = (int)$_GET["img"]; }else{ $i = 0; }
if(is_array($images) && file_exists($folderName."/".$images[$i])) {
	if(empty($images[$i])){ echo "image not exists ! :P "; exit(); }
?>
<div class="showimage">
	<img src="<?=$folderName?>/<?=$images[$i]?>" align="center" alt="" />
</div>
<?php
}
?>
</body>
</html>