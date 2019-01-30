<?php
namespace lib\functions\validate;

class browser{

	public function index() 
	{ 
		$u_agent = $_SERVER['HTTP_USER_AGENT']; 
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";

		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		}elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		}elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}

		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){ 
			$bname = 'Internet Explorer'; 
			$ub = "MSIE"; 
		}else if(preg_match('/Firefox/i',$u_agent)) { 
			$bname = 'Mozilla Firefox'; 
			$ub = "Firefox"; 
		}else if(preg_match('/Chrome/i',$u_agent)){ 
			$bname = 'Google Chrome'; 
			$ub = "Chrome"; 
		}else if(preg_match('/Safari/i',$u_agent)){ 
			$bname = 'Apple Safari'; 
			$ub = "Safari"; 
		}else if(preg_match('/Opera/i',$u_agent)){ 
			$bname = 'Opera'; 
			$ub = "Opera"; 
		}else if(preg_match('/Netscape/i',$u_agent)){ 
			$bname = 'Netscape'; 
			$ub = "Netscape"; 
		} 

		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) { }

		$i = count($matches['browser']);
		if ($i != 1) {
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			}else {
				$version= $matches['version'][1];
			}
		}else {
			$version= $matches['version'][0];
		}
		
		if ($version==null || $version=="") {$version="?";}

		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	} 
}
?>