<?php
@include("website/parts/top.php");
@include("website/parts/search.php");
@include("website/parts/navigation.php");
if(!isset($_SESSION[$c::SESSION_USERNAME])):
	echo $loginCach->index();
else:
?>
<main>
	favourites
</main>
<div class="clear"></div>
<?php
endif;
@include("website/parts/bottom.php");
?>