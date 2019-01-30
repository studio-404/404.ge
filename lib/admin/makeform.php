<?php
namespace lib\admin;

use config\main as c;
use lib\database\form as form;

class makeform{
	public function index($posted){
		$form = new form();
		$query = $form->selectform();
		echo "<table>";	
		echo "<tr>";
		echo "<td colspan=\"4\"><button data-goto=\"?load=adduser\" class=\"goto\">Add Form</button></td>";
		echo "</tr>";	
		echo "<tr>";
		echo "<td colspan=\"4\">All: ".$query["count"]."</td>";
		echo "</tr>";	
		
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Name</th>";
		echo "<th>Form Hidden Name</th>";
		echo "<th>action</th>";
		echo "</tr>";
		if($query["count"]){
			foreach ($query["fetch"] as $value) {
				echo "<tr>";
				echo "<td>".$value["id"]."</td>";
				echo "<td>".$value["name"]."</td>";
				echo "<td>".$value["formhiddenname"]."</td>";
				echo "<td>";
				echo "<a href=\"?load=edituser&amp;id=".$value["id"]."\">Edit / </a> ";
				echo "<a href=\"javascript:void(0)\" data-ask=\"Would you like to delete user ?\" data-goto=\"?load=deleteuser&amp;id=".$value["id"]."\" class=\"confirm\">Delete</a> ";
				echo "</td>";
				echo "</tr>";
			}
		}else{
			echo "<tr>";
			echo "<td colspan=\"4\">Sorry There is no Form in database !</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>