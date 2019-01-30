<!DOCTYPE html>
<html lang="ge">
<head>
<meta charset="UTF-8">
<title>Table Responsive - Action</title>
<link rel="stylesheet" href="<?=$c["website.directory"]?>/css/reset.css">
<link rel="stylesheet" href="<?=$c["website.directory"]?>/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script src="<?=$c["website.directory"]?>/js/jquery.js"></script>
<script src="<?=$c["website.directory"]?>/js/scripts.js"></script>
</head>
<body>

<div class="popup">
	<div class="popup-mask"></div>
	<div class="loader">
		<img src="<?=$c["website.directory"]?>/img/photo-228.gif" />
	</div>
	<div class="popup-box" style="display:none">
		<div class="popup-close"><a href=""><i class="fa fa-times" aria-hidden="true"></i></a></div>
		<div class="popup-header">პოპაპის სათაური</div>
		<div class="popup-body">ტექსტი ან ფორმა</div>
		<input type="hidden" name="popuptype" id="popuptype" value="false" />
		<div style="clear:both"></div>
		<div class="popup-footer">
			<div class="button-yes">შესრულება</div>
			<div class="button-no">გაუქმება</div>
		</div>
	</div>
</div>