<section>
	<form action="<?=$c::WEBSITE?>category/all" method="GET" class="search-form">
		<?php
		$search = lib\functions\url\request::method("GET","search");
		?>
		<input type="text" name="search" value="<?=htmlentities($search)?>" placeholder="<?=$lang->index("keyword")?>" />
		<input type="submit" value="<?=$lang->index("search")?>" />
		<div class="clear"></div>
	</form>
</section>