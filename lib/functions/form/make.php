<?php
namespace lib\functions\form;

class make{

	public static function csrf(){
		$out = "<input type=\"hidden\" name=\"csrf\" value=\"".$_SESSION["CSRF"]."\" />";
		return $out;
	}

	public static function inputHidden($args){
		$out = "<input type=\"hidden\" name=\"".$args['name']."\" value=\"".$args['value']."\" />";
		return $out;
	}

	public static function open($args, $enctype = "application/x-www-form-urlencoded"){
		$out = "<form action=\"".$args['action']."\" method=\"".$args['method']."\" id=\"".$args['id']."\" enctype=\"".$enctype."\">"; 
		return $out;
	}

	public static function nameAndMsg($args){
		$out = "<h4>".$args['name']."</h4>";
		$out .= "<p class=\"msg\" id=\"".$args['id']."\"></p>";
		return $out;
	}



	public static function label($args){
		$require = ($args['require']=="true") ? '<font color="red">*</font>' : '';
		$out = "<label for=\"".$args['for']."\">".$args['name'].": ".$require."</label>";
		return $out;
	}

	public static function inputText($args){
		$disabled = (!empty($args['disabled']) && $args['disabled']=="true") ? " disabled='disabled'" : "";
		$autocomplete = (!empty($args['autocomplete']) && $args['autocomplete']=="off") ? " autocomplete='off'" : "";
		$out = "<input type=\"text\" name=\"".$args['name']."\" id=\"".$args['id']."\" class=\"".$args['class']."\" value=\"".$args['value']."\" placeholder=\"".$args['placeholder']."\"".$disabled." ".$autocomplete." />";
		return $out;
	}

	public static function inputPassword($args){
		$out = "<input type=\"password\" name=\"".$args['name']."\" id=\"".$args['id']."\" class=\"".$args['class']."\" value=\"".$args['value']."\" />";
		return $out;
	}

	public static function inputButton($args){
		$out = "<input type=\"button\" name=\"".$args['name']."\" id=\"".$args['id']."\" class=\"".$args['class']."\" value=\"".$args['value']."\" onclick=\"".$args['onclick']."\" />";
		return $out;
	}

	public static function inputSubmit($args){
		$out = "<input type=\"submit\" name=\"".$args['name']."\" id=\"".$args['id']."\" class=\"".$args['class']."\" value=\"".$args['value']."\" onclick=\"".$args['onclick']."\" />";
		return $out;
	}

	public static function textarea($args){
		$out = "<textarea name=\"".$args["name"]."\">".$args["value"]."</textarea>";
		return $out;
	}

	public static function checkbox($args){
		$checked = (!empty($args['checked']) && $args['checked']=="true") ? " checked='checked'" : "";
		$out = "<label>".$args['chackboxTitle']." <input type=\"checkbox\" name=\"".$args["name"]."\" value=\"".$args["value"]."\" ".$checked."  /></label>";
		return $out;
	}	

	public static function range($args){
		$autocomplete[0] = (!empty($args[0]['autocomplete']) && $args[0]['autocomplete']=="off") ? " autocomplete='off'" : "";
		$out = "<section class=\"range\">";
		$out .= "<input type=\"text\" name=\"".$args[0]['name']."\" id=\"".$args[0]['id']."\" class=\"".$args[0]['class']."\" value=\"".$args[0]['value']."\" placeholder=\"".$args[0]['placeholder']."\" ".$autocomplete[0]." />";

		$autocomplete[1] = (!empty($args[1]['autocomplete']) && $args[1]['autocomplete']=="off") ? " autocomplete='off'" : "";
		$out .= "<input type=\"text\" name=\"".$args[1]['name']."\" id=\"".$args[1]['id']."\" class=\"".$args[1]['class']."\" value=\"".$args[1]['value']."\" placeholder=\"".$args[1]['placeholder']."\" ".$autocomplete[1]." />";
		
		$out .= "</section>"; 
		return $out;
	}

	public static function roundCheckboxes($args, $activeNum){
		$out = "<input type=\"hidden\" name=\"".$args["name"]."\" id=\"".$args["id"]."\" value=\"".$activeNum."\" />";
		$x = 1;
		$time = time();
		foreach ($args['items'] as $value) {
			$active = ($activeNum==$value["baseid"]) ? "active" : "";
			$unique = "r".$x.$time;
			$out .= "<section class=\"checkboxes-rounded ".$args["mainClass"]." ".$active."\" id=\"".$unique."\" onclick=\"website.checkboxCheckRounded('".$args["mainClass"]."','".$unique."', '".$args["id"]."')\">
						<section class=\"b\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></section>
						<section class=\"t\" data-baseid=\"".$value["baseid"]."\">".$value["title"]."</section>
					</section>";
			$x++;
		}
		return $out;
	}

	public static function cornerCheckboxes($args, $activeNum){
		$out = "<input type=\"hidden\" name=\"".$args["name"]."\" id=\"".$args["id"]."\" value=\"".$activeNum."\" />";
		$x = 1;
		$time = time();
		foreach ($args['items'] as $value) {
			$active = ($activeNum==$value["baseid"]) ? "active" : "";
			$unique = "c".$x.$time;
			$out .= "<section class=\"checkboxes ".$args["mainClass"]." ".$active."\" id=\"".$unique."\" onclick=\"website.checkboxCheck('".$unique."', '".$args["id"]."')\">
						<section class=\"b\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></section>
						<section class=\"t\" data-baseid=\"".$value["baseid"]."\">".$value["title"]."</section>
					</section>";
			$x++;
		}
		return $out;
	}

	//

	public static function inputFileUpload($args){
		$out = "<input type=\"file\" name=\"".$args['name']."\" id=\"".$args['id']."\" value=\"\"  style=\"margin: 0;padding: 0;width: 1px;height: 1px;position: absolute;opacity: 0;\" />";
		$out .= "<input type=\"hidden\" name=\"".$args['hidden_name']."\" id=\"".$args['hidden_id']."\" value=\"\" />";
		$out .= "<div class=\"".$args["dragClass"]."\" onclick=\"website.clickElement('#".$args['id']."')\" style=\"margin: 0 0 10px 0;padding: 50px 0;text-align: center;width: calc(100% - 2px);background-color: #f2f2f2;border: solid 1px #e57373;color:#e57373;float: left;clear: both;\">".$args["dragAndDrop"]."</div>";
		return $out;
	}

	public static function close(){
		$out = "</form>"; 
		return $out;	
	}
}
?>