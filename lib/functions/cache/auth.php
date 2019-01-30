<?php
namespace lib\functions\cache;

use config\main as c;
use lib\functions\lang as lang;
use lib\functions\file\create as create;

class auth{
	public static function index(){
		$lang = new lang\l();
		$fileHandling = new create();
		$file = c::CACHE."auth.html";
		if(!file_exists($file)):
			ob_start();
				$out = "<main>\n";
				$out .= "<section class=\"login-form\">\n";
				
				$out .= "<form action=\"javascript:void(0)\" method=\"post\">\n";
				$out .= "<h4>".$lang->index("auth")."</h4>\n";
				$out .= "<p class=\"msg\" id=\"msg1\"></p>\n";
				$out .= "<label>".$lang->index("mobnumber").": </label>";
				$out .= "<input type=\"text\" name=\"username\" id=\"auth-username\" value=\"\" />";
				$out .= "<label>".$lang->index("pass").": </label>";
				$out .= "<input type=\"password\" name=\"password\" id=\"auth-password\" value=\"\" />";
				$out .= "<input type=\"submit\" value=\"".$lang->index("signin")."\" onclick=\"website.auth()\" />";
				$out .= "<div class=\"clear\"></div>";
				$out .= "</form>";

				$out .= "</section>";


				$out .= "<section class=\"register-form\">";

				$out .= "<form action=\"\" method=\"post\">";
				$out .= "<h4>".$lang->index("registration")."</h4>";
				$out .= "<p class=\"msg\" id=\"msg2\"></p>\n";
				$out .= "<label>".$lang->index("mobnumber").": </label>";
				$out .= "<input type=\"text\" name=\"username\" id=\"sign-username\" value=\"\" />";
				$out .= "<label>".$lang->index("namelname").": </label>";
				$out .= "<input type=\"text\" name=\"namelname\" id=\"sign-namelname\" value=\"\" />";
				$out .= "<label>".$lang->index("pass").": </label>";
				$out .= "<input type=\"password\" name=\"password\" id=\"sign-password\" value=\"\" />";
				$out .= "<label>".$lang->index("repass").": </label>";
				$out .= "<input type=\"password\" name=\"re-password\" id=\"sign-repassword\" value=\"\" />";
				$out .= "<input type=\"submit\" value=\"".$lang->index("registration")."\" onclick=\"website.signin()\" />";
				$out .= "</form>";
				$out .= "</section>";
				$out .= "</main>";

				$out .= "<div class=\"clear\"></div>";
				echo $out;
			$content = ob_get_contents();
			ob_end_clean();
			$fileHandling->index($file, $content);
			return file_get_contents($file);
		else:
			return file_get_contents($file);
		endif;
	}
}
?>