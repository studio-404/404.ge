<?php
namespace lib\functions\cache;

use config\main as c;
use lib\database\pages as pages;
use lib\functions\lang as lang;

class login{
	public function index(){// NO CACHE
		$lang = new lang\l();

		echo "<main>";
		echo "<section class=\"login-form\">";
		echo \lib\functions\form\make::open(array(
			"action"=>"javascript:void(0)",
			"method"=>"post",
			"id"=>"authentication"
		));

		echo \lib\functions\form\make::csrf();

		echo \lib\functions\form\make::nameAndMsg(array(
			"name"=>$lang->index("auth"),
			"id"=>"msg1",
		));

		echo \lib\functions\form\make::label(array(
			"for"=>"auth-mobilenumber",
			"name"=>$lang->index("mobnumber"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputText(array(
			"name"=>"auth-mobilenumber",
			"id"=>"auth-mobilenumber",
			"class"=>"formdata auth-mobilenumber",
			"value"=>"",
			"placeholder"=>"599 ******",
			"require"=>"true",
			"match"=>"false"
		));

		echo \lib\functions\form\make::label(array(
			"for"=>"auth-password",
			"name"=>$lang->index("pass"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputPassword(array(
			"name"=>"auth-password",
			"id"=>"auth-password",
			"class"=>"formdata auth-password",
			"value"=>"",
			"require"=>"true",
			"match"=>"false"
		));

		echo \lib\functions\form\make::inputSubmit(array(
			"name"=>"signin-button",
			"id"=>"signin-button",
			"class"=>"signin-button",
			"value"=>$lang->index("signin"),
			"onclick"=>"website.auth('authentication')"
		));

		echo \lib\functions\form\make::inputButton(array(
			"name"=>"recover-button",
			"id"=>"recover-button",
			"class"=>"recover-button",
			"value"=>$lang->index("recover"),
			"onclick"=>"website.recover('recover', '".$_SESSION["CSRF"]."')"
		));

		echo \lib\functions\form\make::close();

		echo "</section><section class=\"register-form\">";

		echo \lib\functions\form\make::open(array(
			"action"=>"javascript:void(0)",
			"method"=>"post",
			"id"=>"registration"
		));

		echo \lib\functions\form\make::csrf();

		echo \lib\functions\form\make::nameAndMsg(array(
			"name"=>$lang->index("registration"),
			"id"=>"msg2",
		));

		echo \lib\functions\form\make::label(array(
			"for"=>"register-mobilenumber",
			"name"=>$lang->index("mobnumber"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputText(array(
			"name"=>"register-mobilenumber",
			"id"=>"register-mobilenumber",
			"class"=>"formdata register-mobilenumber",
			"value"=>"",
			"placeholder"=>"599 ******"
		));


		echo \lib\functions\form\make::label(array(
			"for"=>"register-namelname",
			"name"=>$lang->index("namelname"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputText(array(
			"name"=>"register-namelname",
			"id"=>"register-namelname",
			"class"=>"formdata register-namelname",
			"value"=>"",
			"placeholder"=>""
		));


		echo \lib\functions\form\make::label(array(
			"for"=>"register-password",
			"name"=>$lang->index("pass"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputPassword(array(
			"name"=>"register-password",
			"id"=>"register-password",
			"class"=>"formdata register-password",
			"value"=>""
		));

		echo \lib\functions\form\make::label(array(
			"for"=>"register-repassword",
			"name"=>$lang->index("repass"),
			"require"=>"true"
		));

		echo \lib\functions\form\make::inputPassword(array(
			"name"=>"register-repassword",
			"id"=>"register-repassword",
			"class"=>"formdata register-repassword",
			"value"=>""
		));

		echo \lib\functions\form\make::inputSubmit(array(
			"name"=>"register-button",
			"id"=>"register-button",
			"class"=>"register-button",
			"value"=>$lang->index("registration"),
			"onclick"=>"website.register('registration')"
		));

		echo \lib\functions\form\make::close();

		echo "</section><div class=\"clear\"></div></main>";			
	}
}
?>