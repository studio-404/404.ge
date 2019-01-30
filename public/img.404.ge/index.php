<?php
class main{
	const MIN_PHP_VERSION = "5.4.4";
	const DIR = "/home/geoweb/public_html/";
	const LANG = "/home/geoweb/public_html/lang/ge.json";
	const PUBLIC_FOLDER_NAME = "public";
	const CHARSET = "utf-8";
	const WEBSITE = "http://404.ge/";
	const PUBLIC_FOLDER = "http://404.ge/public/";
	const AUTHER = "Giorgi Gvazava";
	const NAME = "Gum Tree";
	const DESC = "Gum Tree";
	const KEYWORDS = "Gum Tree";
	const DB_HOST = "localhost";
	const DB = "geoweb_gum";
	const DB_USER = "geoweb_gum";
	const DB_PASS = "qTyww8lNP7K3MB?PwT";
	const SESSION_PREFIX = "gum_";
	const EMAIL_USERNAME = "info@404.ge";
	const EMAIL_SUBJECT = "Neo-A - Contact form";
	const EMAIL_TO_NAME = "Giorgi";
	const EMAIL_TO = "giorgigvazava87@gmail.com";
	const EMAIL_NAME = "Gum";
}

class crop{
	public function dojob($f, $w, $h, $blackAndWhite){
		$img = $f;
		$w = is_null($w) ? $h : $w;
		$h = is_null($h) ? $w : $h;
		$ext = strtolower(substr(strrchr($img, '.'), 1));
		if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))){
			return false;
		} 
		
		$cache_file_name = sha1('crop_' . $img . $w . $h . $blackAndWhite) . '.' . $ext;
		
		$file_path = main::DIR.main::PUBLIC_FOLDER_NAME.'/temporaty/' . $cache_file_name;

		ini_set("gd.jpeg_ignore_warning", 1);
		if (file_exists($file_path))
		{
			$outUrl = str_replace(main::DIR,"",$file_path);
			return main::WEBSITE.$outUrl;
		}
		else
		{
			$src = main::DIR.main::PUBLIC_FOLDER_NAME.'/temporaty/' . sha1('to_crop_' . $img . $w . $h) . '.' . $ext;
			
			$without = str_replace(main::WEBSITE, "", $img);
			
			@copy($without, $src);
			$this->make_thumb($src, $w, $h, $file_path, $ext, $blackAndWhite);
			@unlink($src);
			$outUrl = str_replace(main::DIR,"",$file_path);
			return main::WEBSITE.$outUrl;
		}
	}


	private function make_thumb($img_name, $new_w, $new_h, $new_name = null, $ext, $blackAndWhite)
	{
		try
		{
		    switch($ext)
		    {
		        case 'JPEG':
		        case 'JPG':
		        case 'jpeg':
		        case 'jpg':
		            $src_img = imagecreatefromjpeg($img_name);
		            break;
		        case 'PNG':
		        case 'png':
		            $src_img = imagecreatefrompng($img_name);
		            break;
		        case 'GIF':
		        case 'gif':
		            $src_img = imagecreatefromgif($img_name);
		            break;
		        default:
		            return false;
		    }

		    $old_w = (imagesx($src_img)) ? imagesx($src_img) : 1;
		    $old_h = (imagesy($src_img)) ? imagesy($src_img) : 1;
		    $new_x = 0;
		    $new_y = 0;
		    if($old_h==0 || $new_h==0){ exit(); }
			
			if($old_w/$old_h > $new_w/$new_h) {
		        $orig_h = $old_h;
		        $orig_w = round($new_w * $orig_h / $new_h);
		        $new_x = ($old_w - $orig_w) / 2;
			} else {
		        $orig_w = $old_w;
		        $orig_h = round($new_h * $orig_w / $new_w);
		        $new_y = ($old_h - $orig_h) / 2;
			}

		    $dst_img = @imagecreatetruecolor($new_w, $new_h);
		    if($blackAndWhite==1){
		    	$this->ImageToBlackAndWhite($src_img);
			}
			@imagecopyresampled($dst_img, $src_img, 0, 0, $new_x, $new_y, $new_w, $new_h, $orig_w, $orig_h);
		    @imagejpeg($dst_img, $new_name, 100);

		    @imagedestroy($dst_img);
		    @imagedestroy($src_img);
		}catch(Exception $e){
			return false;
		}
	}

	private function ImageToBlackAndWhite($im) {
		try{
			imagefilter($im, IMG_FILTER_GRAYSCALE);
			imagefilter($im, IMG_FILTER_CONTRAST, 0);
			imagefilter($im, IMG_FILTER_BRIGHTNESS, 0); 
		}catch(Exception $e){ 
			return false;
		}
	}

} 
class request{
	public static function method($type, $item){
		if($type=="POST" && isset($_POST[$item])){
			return filter_input(INPUT_POST, $item);
		}else if($type=="GET" && isset($_GET[$item])){
			return filter_input(INPUT_GET, $item);
		}else{
			return '';
		}
	}
}
if(
	request::method("GET","f") && 
	request::method("GET","w") && 
	request::method("GET","h") && 
	is_numeric(request::method("GET","w")) && 
	is_numeric(request::method("GET","h")) &&
	is_numeric(request::method("GET","bw"))
){
	$file = main::DIR."public/img/".request::method("GET","f");
	if(file_exists($file)){
		$image = new crop(); 
		$src = $image->dojob(
			$file, 
			request::method("GET","w"), 
			request::method("GET","h"), 
			request::method("GET","bw")
		);
		$im = file_get_contents($src);
		header("Content-type: image/jpeg");
		echo $im;
	}
	
}
?>
