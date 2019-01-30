<?php
@include("watcher/render/parts/head.php");
?>
<a href="?page=show-all" style="color:red">Show All Files</a> | 
<a href="?page=check-file">Check file list</a> | 
<a href="?page=create-file">Create New File List</a>
<br />
<h2>All Files</h2>
<?php
foreach ($folder_files_array as $v) {
	echo sprintf("<b>[ %s ] %s</b><br />", date("d-m-Y H:i:s", filectime($v)), $v);
}
@include("watcher/render/parts/footer.php");
?>