<?php
@include("watcher/render/parts/head.php");
?>
<a href="?page=show-all">Show All Files</a> | 
<a href="?page=check-file" style="color:red">Check file list</a> | 
<a href="?page=create-file">Create New File List</a>
<br />
<h2>Check files</h2>
<?php
$newFile = array();
$i = 0;
foreach ($nowArray as $v) {
	if(!in_array($v, $oldJson)){
		$newFile[$i] = $v;
		echo sprintf("<b style='color:red'>[ %s ] %s</b><br />", date("d-m-Y H:i:s", filectime($v)), $v);
		$i++;
	}else{
		echo sprintf("<b>[ %s ] %s</b><br />", date("d-m-Y H:i:s", filectime($v)), $v);
	}
	
}
if(count($newFile) > 0 && $options['SEND_EMAIL']){
	$sendemail = new \watcher\functions\sendemail();
	$sendemail->index($options, $newFile);

	/* Get All Files And Folders */
	$get_all_folders_files = new \watcher\functions\get_all_folders_files();
	$folder_files_array = $get_all_folders_files->index($options);
	/* Create Json File */
	$create_json_file = new \watcher\functions\create_json_file();	
	$create_json_file->index($options, $folder_files_array);

}
@include("watcher/render/parts/footer.php");
?>