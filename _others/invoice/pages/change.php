<?php
$selectquery = new selectquery();
$paystatus = (isset($_GET['paystatus']) && is_numeric($_GET['paystatus'])) ? $_GET['paystatus'] : 2;
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0;
$update = $selectquery->update("`studio404_invoices`","`paystatus`='".$paystatus."'","WHERE `id`='".$id."'");
if($update=="true"){
	echo "<meta http-equiv='refresh' content='0;url=http://404.ge/invoice/?page=welcome'>";
}
?>