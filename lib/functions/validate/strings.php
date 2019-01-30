<?php
namespace lib\functions\validate;

class strings{
	public static function startWith($string, $from, $to,  $word){
		if(substr($string, $from, $to) === $word){
			return true;
		}
		return false;
	}

	public static function countString($string){
		return mb_strlen($string);
	}

	public static function match($str1, $str2){
		if($str1===$str2){
			return true;
		}
		return false;
	}

	public static function encode($str){
		$out = md5(sha1($str));
		return $out;
	}
}
?>