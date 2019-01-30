<?php
namespace lib\ajax;

class signout{
	public function index(){
		session_destroy();
	}
}
?>