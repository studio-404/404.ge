<section>
	<nav class="navigation">
		<ul>
		<?php
		if($this->params[0]=="profile"):
			echo $cache->index("profileNav");
		else:
			echo $cache->index("subCatalog");
		endif;
		?>		
		</ul>
	</nav>
</section>