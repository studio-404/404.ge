<?php
namespace lib\functions\validate;

class replace{

	public static function call($str, $arg = array()){
		$out = $str;
		if(!empty($arg["removeAllSymbols"]) && $arg["removeAllSymbols"]=="true"){
			$out = self::removeAllSymbols($out);
		}
		if(!empty($arg["removeAllWhitespaces"]) && $arg["removeAllWhitespaces"]=="true"){
			$out = self::removeAllWhitespaces($out);
		}
		if(!empty($arg["removeLastWhitespace"]) && $arg["removeLastWhitespace"]=="true"){
			$out = self::removeLastWhitespace($out);
		}
		if(!empty($arg["removeAllTags"]) && $arg["removeAllTags"]=="true"){
			$out = self::removeAllTags($out);
		}
		return $out;
	}

	public static function removeAllSymbols($str){
		$out = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
		return $out;
	}
	
	public static function removeAllWhitespaces($str){
		$out = str_replace(' ', '', $str);
		return $out;
	}

	public static function removeLastWhitespace($str){
		$out = trim($str, " ");
		return $out;
	}

	public static function removeAllTags($str){
		$out = strip_tags($str);
		return $out;
	}
	
}
?>