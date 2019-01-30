<?php
namespace lib\database;

class limit{
	public static function gen($perpage, $activepage){		
		$from = ($activepage>0) ? (($activepage-1)*$perpage) : 0;
		$to = ", ".$perpage;
		return $from.$to;
	}
}
?>