<?php
namespace lib\admin;

use config\main as c;
use lib\database\pages as pages;

class deletecategory{
	public function  index($posted){
		$id = \lib\functions\url\request::method("GET","id");
		$pages = new pages();
		
		echo "<h2>Delete Category</h2>";
		if($pages->deletecategory($id)):
			$clear = new \lib\functions\cache\clearcache();
			$clear->index("public/cache");
			echo '<p>Item Deleted !</p>';
		endif;
	}
}
?>