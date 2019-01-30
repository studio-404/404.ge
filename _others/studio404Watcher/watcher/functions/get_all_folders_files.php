<?php
namespace watcher\functions;

class get_all_folders_files{
	public function index($options){
		$gaff = $this->dirToArray($options["IGNORE_FOLDERS"], $options["DIR"]);
		$all = $this->iter($gaff);
		return $all;
	}

	private function dirToArray($m, $dir) { 
   		$result = array(); 
		$cdir = scandir($dir); 
		foreach ($cdir as $key => $value) 
		{ 
			if (!in_array($value, array(".",".."))) 
			{
				$ndir = $dir . DIRECTORY_SEPARATOR . $value;
				if (is_dir($ndir)) 
				{
					if(in_array($ndir, $m)){ continue; }
					$result[] = $this->dirToArray($m, $ndir); 
				} 
				else 
				{ 
					$result[] = $ndir; 
				} 
			} 
		} 
	   	return $result; 
	}

	private function iter($gaff){
		$iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($gaff));
		$n = array();
		foreach($iterator as $v) {
		   $n[] = $v;
		}
		return $n;
	}


} 
?>