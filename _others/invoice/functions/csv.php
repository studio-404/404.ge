<?php
class csv {
	public function csv_to_array($filename, $delimiter=',')
	{
		$the = array();
	   	$row = 0;
		if (($handle = fopen($filename, "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    $num = count($data);

		   // echo "<p> $num fields in line $row: <br /></p>\n";
		    
		    for ($c=0; $c < $num; $c++) {
		        //echo $data[$c] . "<br />\n";
		        $the[$row][$c] = $data[$c];
		    }
		    $row++;
		  }
		  fclose($handle);
		}
		return $the;
	}
}
?>