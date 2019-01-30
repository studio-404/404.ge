<?php
namespace lib\functions\validate;

class ip{
	public static function index(){
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$ip_address = $_SERVER["HTTP_CLIENT_IP"];
		}else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}else{
			$ip_address = $_SERVER["REMOTE_ADDR"];
		}
		return $ip_address;
	}
}
?>