<?php
namespace lib\database;

use lib\database\connection as connection;
use lib\functions\url\slug as slug;

class pages{
	public $conn;	

	public function index($call){
		$fetch = array();
		$connection = new connection();
		$conn = $connection->conn();
		$this->slug = new \lib\functions\url\slug();
		$this->params = $this->slug->params();
		switch($call){
			case "topmenu":
				$sql = "SELECT * FROM `pages` WHERE `type`=:type AND `visibility`=:zero AND `status`=:zero";
				$prepare = $conn->prepare($sql);
				
				$prepare->execute(array(
					":type"=>"topmenu", 
					":zero"=>0 
				));

				if($prepare->rowCount()){
					$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
				}
				break;
			case "subcat":
				$sql = "SELECT * FROM `pages` WHERE `type`=:type AND `subid`=:zero AND  `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
				$prepare = $conn->prepare($sql);
				
				$prepare->execute(array(
					":type"=>"category", 
					":zero"=>0 
				));

				if($prepare->rowCount()){
					$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
				}
				break;
			case "currentCat":
					$sql = "SELECT `title`, `slug` FROM `pages` WHERE `type`=:type AND `slug`=:slug AND  `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
					$prepare = $conn->prepare($sql);
					$imp = implode("/", $this->params);
					$prepare->execute(array(
						":type"=>"category", 
						":slug"=>$imp,
						":zero"=>0 
					));

					if($prepare->rowCount()){
						$fetch = $prepare->fetch(\PDO::FETCH_ASSOC); 
					}
				break;
			case "subNavCat":
					$sql = "SELECT `title`, `slug` FROM `pages` WHERE `type`=:type AND `subid`=:subid AND  `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
					$prepare = $conn->prepare($sql);
					$prepare->execute(array(
						":subid"=>$this->params[1], 
						":type"=>"category", 
						":zero"=>0 
					));

					if($prepare->rowCount()){
						$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
					}
				break;
			case "subcategory":
					$sql = "SELECT `id`, `position`, `title`, `slug` FROM `pages` WHERE `type`=:type AND `subid`=:subid AND  `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
					$prepare = $conn->prepare($sql);
					$prepare->execute(array(
						":subid"=>\lib\functions\url\request::method("GET","id"), 
						":type"=>"category", 
						":zero"=>0 
					));

					if($prepare->rowCount()){
						$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
					}
				break;
			case "editcategoryselect":
					$sql = "SELECT * FROM `pages` WHERE `type`=:type AND `id`=:id AND `status`=:zero ORDER BY `position` ASC";
					$prepare = $conn->prepare($sql);
					$prepare->execute(array(
						":id"=>\lib\functions\url\request::method("GET","id"), 
						":type"=>"category", 
						":zero"=>0 
					));

					if($prepare->rowCount()){
						$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
					}
				break;
			case "profileNav":
				$sql = "SELECT `title`, `slug` FROM `pages` WHERE `type`=:type AND `visibility`=:zero AND `status`=:zero ORDER BY `position` ASC";
					$prepare = $conn->prepare($sql);
					$prepare->execute(array(
						":type"=>"profile", 
						":zero"=>0 
					));

					if($prepare->rowCount()){
						$fetch = $prepare->fetchAll(\PDO::FETCH_ASSOC); 
					}
				break;
		}
		return $fetch;
	}

	public function updateCategory($data){
		$connection = new connection();
		$conn = $connection->conn();
		$sql = "UPDATE `pages` SET 
		`title`=:title, 
		`meta_title`=:meta_title, 
		`meta_description`=:meta_description, 
		`meta_keyword`=:meta_keyword, 
		`description`=:description, 
		`redirect`=:redirect, 
		`slug`=:slug, 
		`position`=:position, 
		`visibility`=:visibility 
		WHERE `id`=:id";
		$prepare = $conn->prepare($sql);
		$prepare->execute(array(
			":title"=>$data["title"], 
			":meta_title"=>$data["meta_title"], 
			":meta_description"=>$data["meta_description"], 
			":meta_keyword"=>$data["meta_keyword"], 
			":description"=>$data["description"], 
			":redirect"=>$data["redirect"], 
			":slug"=>$data["slug"], 
			":position"=>$data["position"], 
			":visibility"=>$data["visibility"], 
			":id"=>$data["id"]
		));
		if($prepare->rowCount()){
			return true;
		}
		return false;
	}

	public function insertCategoryTitle($data){
		$connection = new connection();
		$conn = $connection->conn();
		$sql = "INSERT INTO `pages` SET 
		`subid`=:subid,
		`title`=:title, 
		`meta_title`=:meta_title, 
		`meta_description`=:meta_description, 
		`meta_keyword`=:meta_keyword, 
		`description`=:description, 
		`redirect`=:redirect, 
		`slug`=:slug, 
		`type`=:type, 
		`position`=:position, 
		`visibility`=:visibility 
		";
		$prepare = $conn->prepare($sql);
		$prepare->execute(array(
			":title"=>$data["title"], 
			":meta_title"=>$data["meta_title"], 
			":meta_description"=>$data["meta_description"], 
			":meta_keyword"=>$data["meta_keyword"], 
			":description"=>$data["description"], 
			":redirect"=>$data["redirect"], 
			":slug"=>"", 
			":type"=>"category", 
			":position"=>$data["position"], 
			":visibility"=>$data["visibility"], 
			":subid"=>$data["id"]
		));
		if($prepare->rowCount()){

			$insertid = $conn->lastInsertId();
			$slug = "category/".$insertid."/".$data["slug"];
			$sql2 = "UPDATE `pages` SET 
			`slug`=:slug
			WHERE `id`=:id";
			$prepare2 = $conn->prepare($sql2);
			$prepare2->execute(array(
				":slug"=>$slug, 
				":id"=>$insertid
			));
			if($prepare2->rowCount()){
				return true;
			}
		}
		return false;
	}

	public function deletecategory($i){
		$connection = new connection();
		$conn = $connection->conn();
		$sql2 = "UPDATE `pages` SET 
		`status`=:one
		WHERE `id`=:id";
		$prepare2 = $conn->prepare($sql2);
		$prepare2->execute(array(
			":one"=>1, 
			":id"=>$i
		));
		if($prepare2->rowCount()){
			return true;
		}
		return false;
	}

}
?>