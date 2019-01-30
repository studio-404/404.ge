<?php
namespace lib\functions\validate;

class csrf{
	public static function generete($numb){
		$bytes = openssl_random_pseudo_bytes($numb * 2);
		return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $numb);
	}
}
?>