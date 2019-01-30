<?php
namespace lib\admin;

use config\main as c;
use lib\database\user as user;

class users{
	public function index($posted){
		$user = new user();
		
		$itemperpage = 10;
		$activepage = (int)\lib\functions\url\request::method("GET","page");
		$limit = \lib\database\limit::gen($itemperpage, $activepage);
		$query = $user->getalluser($limit);

		echo "<table>";	
		echo "<tr>";
		echo "<td colspan=\"9\"><button data-goto=\"?load=adduser\" class=\"goto\">Add user</button></td>";
		echo "</tr>";	
		echo "<tr>";
		echo "<td colspan=\"9\">All: ".$query["count"]."</td>";
		echo "</tr>";	
		
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>register date</th>";
		echo "<th>mobile</th>";
		echo "<th>namelname</th>";
		echo "<th>email</th>";
		echo "<th>website</th>";
		echo "<th>approve</th>";
		echo "<th>blocked</th>";
		echo "<th>action</th>";
		echo "</tr>";
		foreach ($query["fetch"] as $value) {
			echo "<tr>";
			echo "<td>".$value["id"]."</td>";
			echo "<td>".date("d-m-Y g:m:s",$value["register_date"])."</td>";
			echo "<td>".$value["mobile"]."</td>";
			echo "<td>".$value["namelname"]."</td>";
			echo "<td>".$value["email"]."</td>";
			echo "<td>".$value["website"]."</td>";
			echo "<td>".$value["approve"]."</td>";
			echo "<td>".$value["blocked"]."</td>";
			echo "<td>";
			echo "<a href=\"?load=edituser&amp;id=".$value["id"]."\">Edit / </a> ";

			if($value["blocked"]==1){
				echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to unblock user ?\" data-goto=\"?load=ban&amp;id=".$value["id"]."&status=false\" class=\"confirm\" title=\"".htmlentities($value["blocked_comment"])."\">unblock /</a> ";
			}else{
				echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to block user ?\" data-goto=\"?load=ban&amp;id=".$value["id"]."&status=1\" class=\"confirm\">Block /</a> ";
			}
			echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to delete user ?\" data-goto=\"?load=deleteuser&amp;id=".$value["id"]."\" class=\"confirm\">Delete</a> ";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo \lib\functions\pagination\administratorpage::index("?load=users", $query["count"], $itemperpage, $activepage);
	}
}
?>