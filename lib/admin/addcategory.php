<?php
namespace lib\admin;

use config\main as c;
use lib\functions\form\make as make;

class addcategory{
	public function index($posted){
		$id = \lib\functions\url\request::method("GET","id");
		echo "<h2>Add Category</h2>";

		echo make::open(array(
			"action"=>"",
			"method"=>"post",
			"id"=>"addcatalog"
		)); 
		if(!empty($posted["message"])):
			echo '<p>'.$posted["message"].'</p>';
		endif;
		
		echo make::inputHidden(array(
			"name"=>"submit",
			"value"=>"addcategory"
		)); 

		echo make::inputHidden(array(
			"name"=>"parent",
			"value"=>$id
		)); 

		echo make::label(array(
			"for" => "categoryname",
			"name" => "Title",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categoryname",
			"id"=>"categoryname",
			"class"=>"categoryname",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		
		echo make::label(array(
			"for" => "categorymetatitle",
			"name" => "Meta Title",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categorymetatitle",
			"id"=>"categorymetatitle",
			"class"=>"categorymetatitle",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categorymetadescription",
			"name" => "Meta Description",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categorymetadescription",
			"id"=>"categorymetadescription",
			"class"=>"categorymetadescription",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categorymetakeywords",
			"name" => "Meta Keywords",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categorymetakeywords",
			"id"=>"categorymetakeywords",
			"class"=>"categorymetakeywords",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categorydescription",
			"name" => "Description",
			"require"=>"true"
		));
		echo make::textarea(array(
			"name"=>"categorydescription",
			"value"=>""
		));
		
		echo make::label(array(
			"for" => "categoryredirect",
			"name" => "Redirect",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categoryredirect",
			"id"=>"categoryredirect",
			"class"=>"categoryredirect",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categoryslug",
			"name" => "Slug",
			"require"=>"true"
		)); 
		
		echo make::inputText(array(
			"name"=>"categoryslug",
			"id"=>"categoryslug",
			"class"=>"categoryslug",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categoryposition",
			"name" => "Position",
			"require"=>"true"
		));
		echo make::inputText(array(
			"name"=>"categoryposition",
			"id"=>"categoryposition",
			"class"=>"categoryposition",
			"value"=>"",
			"placeholder"=>"",
			"require"=>"true",
			"match"=>"false",
			"autocomplete"=>"off"
		));

		echo make::label(array(
			"for" => "categoryvisibility",
			"name" => "Visibility",
			"require"=>"false"
		));
		echo make::checkbox(array(
			"name"=>"categoryvisibility",
			"chackboxTitle"=>"Visiable",
			"value"=>"1",
			"checked"=>"true"
		));
		echo make::inputSubmit(array(
			"name"=>"noname",
			"id"=>"noname",
			"class"=>"noname",
			"value"=>"Submit",
			"onclick"=>""
		));

		echo make::close(); 
	}
}
?>