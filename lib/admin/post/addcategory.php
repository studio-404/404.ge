<?php
namespace lib\admin\post;

use config\main as c;
use lib\database\pages as pages;

class addcategory{
	public function index(){
		$data["id"] = (int)\lib\functions\url\request::method("POST","parent"); 
		$data["title"] = \lib\functions\url\request::method("POST","categoryname"); 
		$data["meta_title"] = \lib\functions\url\request::method("POST","categorymetatitle"); 
		$data["meta_description"] = \lib\functions\url\request::method("POST","categorymetadescription"); 
		$data["meta_keyword"] = \lib\functions\url\request::method("POST","categorymetakeywords"); 
		$data["description"] = \lib\functions\url\request::method("POST","categorydescription"); 		
		$data["redirect"] = \lib\functions\url\request::method("POST","categoryredirect"); 
		$data["slug"] = \lib\functions\url\request::method("POST","categoryslug"); 
		$data["position"] = \lib\functions\url\request::method("POST","categoryposition"); 
		$data["visibility"] = (\lib\functions\url\request::method("POST","categoryvisibility")==1) ? "0" : "1"; 

		$pages = new pages();
		if($pages->insertCategoryTitle($data)){
			$clear = new \lib\functions\cache\clearcache();
			$clear->index("public/cache");
			$out["message"] = "Data has been inserted successfully !";
		}else{
			$out["message"] = "Data is not inserted !";
		}
		return $out;
	}
}
?>