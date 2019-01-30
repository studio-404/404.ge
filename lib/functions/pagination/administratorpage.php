<?php
namespace lib\functions\pagination; 

class administratorpage{
	public static function index($link, $allitems, $perpage, $activepage){
		$out = "";
		$each = (int)floor($allitems / $perpage);
		if($each){
			$out = "<ul class=\"navigation\">";
			for ($x=1; $x<=$each; $x++) { 
				$href = $link."&page=".$x;
				$style = ($activepage==$x) ? " style='color:red'" : "";
				$out .= "<li><a href=\"".$href."\"".$style.">".$x."</a></li>";
			}
			$out .= "</ul>";
		}
		return $out;
	}
}
?>