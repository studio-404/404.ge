<?php
namespace lib\sms;

use config\main as c;
use lib\sms\textlocal as textlocal;
use lib\functions\file\create as create;

class send{
	public function index($numbers = array(), $message){
		$textlocal = new textlocal(c::TEXTLOCAL_EMAIL, c::TEXTLOCAL_PASSWORD, c::TEXTLOCAL_APIKEY);
		$sender = c::TEXTLOCAL_SENDERNAME;
		$response = $textlocal->sendSms($numbers, $message, $sender);

		if($response->status == "success"){
			return true;
		}
		return false;
	}
}
?>