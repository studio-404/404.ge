<?php
namespace lib\admin;

use config\main as c;
use lib\database\pages as pages;

class subcategory{
	public function index($posted){
		$pages = new pages();
		$fetchAll = $pages->index("subcategory");
		$id=\lib\functions\url\request::method("GET","id");
		echo "<table>";	
		echo "<tr>";
		echo "<td colspan=\"5\"><button data-goto=\"?load=addcategory&id=".$id."\" class=\"goto\">Add new category</button></td>";
		echo "</tr>";	
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Position</th>";
		echo "<th>Title</th>";
		echo "<th>Slug</th>";
		echo "<th>Action</th>";
		echo "</tr>";
		if(count($fetchAll)):
		foreach ($fetchAll as $value) {
			echo "<tr>";			
			echo "<td>".$value["id"]."</td>";
			echo "<td>".$value["position"]."</td>";
			echo "<td>".$value["title"]."</td>";
			echo "<td>".$value["slug"]."</td>";
			
			echo "<td>";
			echo "<a href=\"?load=subcategory&amp;id=".$value["id"]."\">Sub / </a>";
			echo "<a href=\"?load=editcategory&amp;id=".$value["id"]."\">Edit / </a>";
			echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to delete item ?\" data-goto=\"?load=deletecategory&amp;id=".$value["id"]."\" class=\"confirm\">Delete</a> ";
			echo "</td>";
			
			echo "</tr>";
		}
		else:
			echo "<tr>";
			echo "<td colspan=\"5\">Sorry Sub Category Does not Exists !</td>";
			echo "</tr>";
		endif;
		echo "</table>";
	}
}
?>