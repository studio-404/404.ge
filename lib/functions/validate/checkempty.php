<?php
namespace lib\functions\validate;

class checkempty{
	public static function arrayHasEmptyValue($arr){
		return array_search("", $arr) !== false;
	}
}
?>