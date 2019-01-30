<?php
namespace lib\database;

use lib\database\connection as connection;
use lib\functions\validate as validate;

class user{
	public $conn;	
	public $lastAffectedIdl;

	function __construct(){
		$this->connection = new connection();
		$this->conn = $this->connection->conn();
	}

	public function getalluser($limit = "0,10"){
		$sql = "SELECT * FROM `users` WHERE `terminate`=:zero LIMIT ".$limit;
		$prepare = $this->conn->prepare($sql);
				
		$prepare->execute(array(
			":zero"=>0
		));

		if($prepare->rowCount()){
			$out["fetch"] = $prepare->fetchAll(\PDO::FETCH_ASSOC);
			$out["count"] = $this->countUsers();
		}
		return $out;
	}

	public function countUsers(){
		$sql = "SELECT COUNT(`id`) as allx FROM `users` WHERE `terminate`=:zero";
		$prepare = $this->conn->prepare($sql);
				
		$prepare->execute(array(
			":zero"=>0
		));

		if($prepare->rowCount()){
			$fetch = $prepare->fetch(\PDO::FETCH_ASSOC);
			return $fetch["allx"];
		}
		return "0";
	}

	public function getuser($mobile){
		
		$sql = "SELECT * FROM `users` WHERE `mobile`=:mobile AND `terminate`=:zero";
		$prepare = $this->conn->prepare($sql);
				
		$prepare->execute(array(
			":mobile"=>$mobile, 
			":zero"=>0
		));

		if($prepare->rowCount()){
			return $prepare->fetch(\PDO::FETCH_ASSOC);
		}
		return false;
	}

	public function getuserById($id){
		
		$sql = "SELECT * FROM `users` WHERE `id`=:id AND `terminate`=:zero";
		$prepare = $this->conn->prepare($sql);
				
		$prepare->execute(array(
			":id"=>$id, 
			":zero"=>0
		));

		if($prepare->rowCount()){
			return $prepare->fetch(\PDO::FETCH_ASSOC);
		}
		return false;
	}

	public function adduser($vals, $sendSms = true){
		$register_ip = validate\ip::index(); 
		$browser = new validate\browser(); 
		$register_browser = $browser->index();
		$mobile = (int)$vals[0];
		$namelname =  validate\replace::call(
			$vals[1], 
			array(
				"removeAllSymbols"=>"true"
			)
		);
		$password = validate\strings::encode($vals[2]);
		$email = (!empty($vals[3])) ? $vals[3] : "";
		$website = (!empty($vals[4])) ? $vals[4] : "";
		if($sendSms){
		$approve = strtolower(validate\csrf::generete(5));
	}

		$sql = "INSERT INTO `users` SET 
		`register_date`=:timex,
		`register_ip`=:register_ip,
		`register_browser`=:register_browser,
		`last_signed`=:timex,
		`mobile`=:mobile,
		`namelname`=:namelname,
		`email`=:email,
		`website`=:website,
		`approve`=:approve, 
		`password`=:password,
		`blocked`=:zero,
		`terminate`=:zero";

		$prepare = $this->conn->prepare($sql);
				
		$prepare->execute(array(
			":timex"=>time(), 
			":register_ip"=>$register_ip, 
			":register_browser"=>$register_browser['name'], 
			":mobile"=>$mobile, 
			":namelname"=>$namelname, 
			":email"=>$email, 
			":website"=>$website, 
			":approve"=>$approve, 
			":password"=>$password,
			":zero"=>0
		));

		if($prepare->rowCount()){
			$this->lastAffectedIdl =  $this->conn->lastInsertId();
			if($sendSms){
				$numberFormat = sprintf("995%s", $mobile);
				$sms = new \lib\sms\send();
				if($sms->index(array($numberFormat), $approve)){
					return true;
				}
			}else{
				return true;
			}
		}
		return false;
	}

	public function edituser($vals){
		$sql = "UPDATE `users` SET `mobile`=:mobile, `namelname`=:namelname, `email`=:email, `website`=:website WHERE `id`=:id";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":id"=>$vals['id'], 
			":mobile"=>$vals['mobile'],
			":namelname"=>$vals['namelname'],
			":email"=>$vals['email'],
			":website"=>$vals['website']
		));
		if($prepare->rowCount()){
			return true;
		}
		return false;
	}

	public function blockuser($id, $status = 1, $blocked_comment = ""){
		if($status=="false"){ $status = 0; }
		$sql = "UPDATE `users` SET  `blocked`=:blocked, `blocked_comment`=:blocked_comment WHERE `id`=:id";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":id"=>$id,
			":blocked_comment"=>$blocked_comment, 
			":blocked"=>$status
		));
		if($prepare->rowCount()){
			return true;
		}
		return false;
	}

	public function deleteuser($id){
		$sql = "UPDATE `users` SET `terminate`=:terminate WHERE `id`=:id";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":id"=>$id,
			":terminate"=>1
		));
		if($prepare->rowCount()){
			return true;
		}
		return false;
	}

	public function checkAprove($id, $value){
		$sql = "SELECT `approve` FROM `users` WHERE `id`=:id AND `approve`=:approve";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":id"=>$id, 
			":approve"=>$value
		));
		if($prepare->rowCount()){
			$sqlUpdate = "UPDATE `users` SET `approve`=:truex WHERE `id`=:id";
			$prepareUpdate = $this->conn->prepare($sqlUpdate);
			$prepareUpdate->execute(array(
				":id"=>$id, 
				":truex"=>"true"
			));
			if($prepareUpdate->rowCount()){
				return true;
			}
		}
		return false;
	}

	public function updatePassowrd($mobile, $newpassword){
		$sql = "UPDATE `users` SET `password`=:newpassword WHERE `mobile`=:mobile AND `blocked`=:zero AND `terminate`=:zero";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":newpassword"=>$newpassword, 
			":mobile"=>$mobile,
			":zero"=>0
		));
		if($prepare->rowCount()){
			return true;
		}
		return false;
	}
}
?>