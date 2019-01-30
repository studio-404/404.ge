<?php
class getusersname extends selectquery{

	public function getUsers($user_id){
		$fetch = $this->select("`namelname`","`studio404_users`","`id`='".$user_id."'","","","");
		return $fetch['namelname'];
	}

}
?>