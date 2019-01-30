<?php
namespace lib\functions\cache;

use config\main as c;
use lib\database\pages as pages;
use lib\functions\lang as lang;

class header{
	public function top(){
		$this->slug = new \lib\functions\url\slug();
		$this->params = $this->slug->params();

		if(!empty($this->params)){ $imp = implode("-", $this->params); }
		else{ $imp = ""; }

		$this->fileHandling = new \lib\functions\file\create();
		$lang = new lang\l();

		$file = c::CACHE."header".$imp.".html";
		if(!file_exists($file)):
			ob_start();
			echo "<!DOCTYPE html>\n";
			echo "<html>\n";
			echo "<head>\n";
			echo $this->meta($lang, $this->params);
			echo "<title>".$this->title($lang, $this->params)."</title>\n";
			echo $this->css($lang, $this->params);
			echo $this->js($lang, $this->params);
			echo "</head>\n";
			echo "<body>\n";

			$this->content = ob_get_contents();
			ob_end_clean();
			$this->fileHandling->index($file, $this->content);
			return file_get_contents($file);
		else: 
			return file_get_contents($file);
		endif;
	}

	public function title($lang, $slug){
		$title = $lang->index("home");
		if(!empty($slug[0])) :
			switch ($slug[0]) { 
				case 'login': 
					$title = $lang->index("login");
					break;
				case 'category':
					$title = $lang->index("category");
					break;
				case 'view':
					$title = $lang->index("view");
					break;
				case 'profile':
					$title = $lang->index("profile");
					break;
				case 'search':
					$title = $lang->index("search");
					break;
				default:
					$title = $lang->index("home");
					break;
			}
		endif;
		return $title;
	}

	public function meta($lang, $slug){
		$meta = "";
		$meta .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
		$meta .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />\n";
		$meta .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0\" />\n";
		return $meta;
	}

	public function css($lang, $slug){
		$css = "";
		$css .= "<link href=\"".c::WEBSITE."public/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		$css .= "<link href=\"".c::WEBSITE."public/css/font-awesome-css.min.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		return $css;
	}

	public function js($lang, $slug){
		$js = "";
		$js .= "<script src=\"".c::WEBSITE."public/js/jquery.js\"></script>\n";
		$js .= "<script src=\"".c::WEBSITE."public/js/scripts.js\"></script>\n";
		$js .= "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBb7JZAejFpfrFm7MGf_40VST2XTUn4wFU\"></script>\n";
		return $js;
	}

	public function footer(){
		$this->fileHandling = new \lib\functions\file\create();
		$file = c::CACHE."footerrr.html";
		if(!file_exists($file)):
			ob_start();
			echo "\n</body>\n";
			echo "</html>\n";
			$this->content = ob_get_contents();
			ob_end_clean();
			$this->fileHandling->index($file, $this->content);
			return file_get_contents($file);
		else: 
			return file_get_contents($file);
		endif;
	}
}
?>