<?php
namespace lib\admin;

use config\main as c;
use lib\database\pages as pages;

class category{
	public function index($posted){
		$pages = new pages();
		$fetchAll = $pages->index("subcat");

		echo "<table>";	
		echo "<tr>";
		echo "<td colspan=\"5\"><button data-goto=\"?load=addcategory&id=0\" class=\"goto\">Add new category</button></td>";
		echo "</tr>";	
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>position</th>";
		echo "<th>Title</th>";
		echo "<th>Slug</th>";
		echo "<th>Action</th>";
		echo "</tr>";
		foreach ($fetchAll as $value) {
			echo "<tr>";
			echo "<td>".$value["id"]."</td>";
			echo "<td>".$value["position"]."</td>";
			echo "<td>".$value["title"]."</td>";
			echo "<td>".$value["slug"]."</td>";
			echo "<td>";
			echo "<a href=\"?load=subcategory&amp;id=".$value["id"]."\">Sub / </a>";
			echo "<a href=\"?load=editcategory&amp;id=".$value["id"]."\">Edit / </a> ";
			echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to delete item ?\" data-goto=\"?load=deletecategory&amp;id=".$value["id"]."\" class=\"confirm\">Delete</a> ";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>