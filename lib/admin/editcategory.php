<?php
namespace lib\admin;

use config\main as c;
use lib\database\pages as pages;
use lib\functions\form\make as make;

class editcategory{
	public function index($posted){
		$id = \lib\functions\url\request::method("GET","id");
		$pages = new pages();
		$fetchAll = $pages->index("editcategoryselect");
		echo "<h2>Edit Category</h2>";
		
		echo make::open(array(
			"action"=>"",
			"method"=>"post",
			"id"=>"editcatalog"
		)); 
		if(!empty($posted["message"])):
			echo '<p>'.$posted["message"].'</p>';
		endif;
		
		echo make::inputHidden(array(
			"name"=>"submit",
			"value"=>"editcategory"
		)); 

		echo make::inputHidden(array(
			"name"=>"categoryid",
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
			"value"=>$fetchAll[0]['title'],
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
			"value"=>$fetchAll[0]['meta_title'],
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
			"value"=>$fetchAll[0]['meta_description'],
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
			"value"=>$fetchAll[0]['meta_keyword'],
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
			"value"=>$fetchAll[0]['description']
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
			"value"=>$fetchAll[0]['redirect'],
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
			"value"=>$fetchAll[0]['slug'],
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
			"value"=>$fetchAll[0]['position'],
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
		$checked = ($fetchAll[0]["visibility"]==0) ? 'true' : 'false';
		echo make::checkbox(array(
			"name"=>"categoryvisibility",
			"chackboxTitle"=>"Visiable",
			"value"=>"1",
			"checked"=>$checked
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