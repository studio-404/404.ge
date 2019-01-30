<?php
class lib_modules_table extends lib_database_connection{
	public function print_table($companies){
		$conn = $this->conn(); 
		$out = '';
		foreach ($companies as $value) {		
	    	$out .= '<tr>';
	      	$out .= '<td style="width:250px;">'.$value['company'].'</td>';
	      	$out .= '<td style="width:600px;">';
			
			$out .= '<table width="100%">';
	        $out .= '<tr>';
	        $out .= '<td style="border-top:none; width:150px"><b>ვებ გვერდი</b> &nbsp;<a href="javascript:;" class="addWebsite" data-companyid="'.$value['id'].'"><i class="fa fa-plus" aria-hidden="true" style="font-size:12px !important;"></i></a></td>';
	        $out .= '<td style="border-top:none"><b>გადახდის თარიღი</b></td>';
	        $out .= '<td style="border-top:none"><b>გადასახდელი აქვს</b></td>';
	        $out .= '<td style="border-top:none"><b>დარჩენილი დღეები</b></td>';
	        $out .= '<td style="border-top:none"><b>ღირებულება</b></td>';
	        $out .= '<td style="border-top:none"><b>წაშლა</b></td>';
	       	$out .= '</tr>';
	       	
	       	$sql = 'SELECT * FROM `_projectx_company_websites` WHERE `companyid`="'.$value['id'].'" AND `status`!=1';
	        $prepare = $conn->prepare($sql); 
	        $prepare->execute();
	        if($prepare->rowCount()){
	        	$websites = $prepare->fetchAll(PDO::FETCH_ASSOC);
	        	foreach ($websites as $v) {
	        		$out .= '<tr>';
			       	$out .= '<td id="website_'.$v['id'].'">'.$v['website'].'</td>';
			        $out .= '<td id="gadaixada_'.$v['id'].'">'.date("d/m/Y", $v['gadaixada']).'</td>';
			        $out .= '<td id="gadasaxdeli_'.$v['id'].'">'.date("d/m/Y", $v['gadasaxdeli']).'</td>';
			        $datediff = ($v['gadasaxdeli']-time());
			        $out .= '<td>'.(floor($datediff/(60*60*24))).'</td>';
			        $out .= '<td id="price_'.$v['id'].'">'.$v['price'].'</td>';
			        $out .= '<td>';
			        $out .= '<a href="javascript:;" class="editWebsite" data-website="'.$v['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:12px !important;"></i></a>&nbsp;';
			        $out .= '<a href="javascript:;" class="deleteWebsite" data-website="'.$v['id'].'"><i class="fa fa-times" aria-hidden="true" style="font-size:12px !important;"></i></a>';
			        $out .= '</td>';
			        $out .= '</tr>';
	        	}
		        
	    	}

	        $out .= '</table>';

	        $out .= '</td>';
	      	$out .= '<td class="t-draft">';
	        $out .= '<a href="javascript:;" class="edit-company" data-companyid="'.$value['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;';
	        $out .= '<a href="javascript:;" class="delete-company" data-companyid="'.$value['id'].'"><i class="fa fa-times" aria-hidden="true"></i></a>&nbsp;&nbsp;';
	      	$out .= '</td>';
	    	$out .= '</tr>';
    	}
		return $out;
	}
}
?>