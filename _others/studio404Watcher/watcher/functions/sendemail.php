<?php
namespace watcher\functions;

class sendemail{

	public function index($options, $newFiles){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		$headers .= "To: ".$options["EMAILTO_NAME"]." <".$options["EMAILTO"].">\r\n";
		$headers .= "From: ".$options["EMAILFROM_NAME"]." <".$options["EMAILFROM"].">\r\n";

		$body = "<h1>Please Check File Path:</h1>";
		foreach ($newFiles as $v) {
			$body .= "<p style=\"color:#555555\">".$v."</p>";
		}

		if(!mail($options["EMAILTO"], $options["EMAIL_SUBJECT"], $body, $headers)){
			return false;
		}
		$this->log($options, $body);
		return true;
	}

	public function log($o, $body){
		$JSON_FILE_LOG = $o["JSON_FILE_LOG"]."/".time().".txt"; 
		file_put_contents($JSON_FILE_LOG, $body);
	}

}
?>