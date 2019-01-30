<?php 
namespace lib\functions\cache;

use config\main as c;
use lib\database\pages as pages;

class navigations{

	public function index($call){
		$this->slug = new \lib\functions\url\slug();
		$this->params = $this->slug->params();
		$this->pages = new pages();
		$this->fileHandling = new \lib\functions\file\create();
		switch($call){
			case "topMenu":
					$session = (isset($_SESSION[c::SESSION_USERNAME])) ? "signed" : "nope";
					$file = c::CACHE."topmenu".$session.$this->params[0].".html";
					if(!file_exists($file)):
						$this->topMenu = $this->pages->index("topmenu");
						ob_start();
						if(count($this->topMenu)){
							foreach ($this->topMenu as $value) {
								$active = ($this->params[0]==$value['slug']) ? 'class="active"' : '';
								if($session=="nope" && $value['slug']=="profile"){ continue; }
								if($session!="nope" && $value['slug']=="login"){ continue; }
								if($session!="nope" && $value['slug']=="profile"){ $addnamelname = " ( ".$_SESSION[c::SESSION_NAMELNAME]." )"; }else{
									$addnamelname = "";
								}
								echo sprintf(
									"<li><a href=\"%s\" %s>%s</a></li>",
									c::WEBSITE.$value['slug'],
									$active,
									$value['title'].$addnamelname
								);
							}				
						}
						if($session!="nope"){
							echo "<li>
								<a href=\"javascript:void(0)\" onclick=\"website.signOut()\">
									<i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i>
								</a>
							</li>";
						}
						$this->content = ob_get_contents();
						ob_end_clean();
						$this->fileHandling->index($file, $this->content);
						return file_get_contents($file);
					else: 
						return file_get_contents($file);
					endif;
				break;
			case "subCatalog": 
					$file = c::CACHE."subcatalog".$this->params[1].".html";
					if(!file_exists($file)):
						$this->subcat = $this->pages->index("subcat");
						ob_start();
						if(count($this->subcat)){
							foreach ($this->subcat as $value) {
								$active = (implode("/",$this->params)==$value['slug']) ? 'class="active"' : '';
								echo sprintf(
									"<li><a href=\"%s\" %s>%s</a></li>",
									c::WEBSITE.$value['slug'],
									$active,
									$value['title']
								);
							}				
						}
						$this->content = ob_get_contents();
						ob_end_clean();
						$this->fileHandling->index($file, $this->content);
						return file_get_contents($file);
					else: 
						return file_get_contents($file);
					endif;
				break;
			case "currentSlugTitle":
					$imp = implode("-", $this->params);
					$file = c::CACHE."current".$imp.".html";
					if(!file_exists($file)):
						$this->currentCat = $this->pages->index("currentCat");
						ob_start();
						if(count($this->currentCat)){
							echo sprintf(
								"<p class=\"chosen\"><i class=\"fa fa-long-arrow-right\" aria-hidden=\"true\"></i>&nbsp;<a href=\"%s\">%s</a></p>",
								c::WEBSITE.$this->currentCat['slug'],
								$this->currentCat['title']
							);
						}
						$this->content = ob_get_contents();
						ob_end_clean();
						$this->fileHandling->index($file, $this->content);
						return file_get_contents($file);
					else: 
						return file_get_contents($file);
					endif;
				break;
				case "subNavCat":
						$file = c::CACHE."subnav".implode("-", $this->params).".html";
						if(!file_exists($file)):
							$this->subNavCat = $this->pages->index("subNavCat");
							ob_start();
							if(count($this->subNavCat)){
								echo '<nav class="sub-category"><ul>';
								foreach ($this->subNavCat as $value) {
									echo sprintf(
										"<li><a href=\"%s\">%s</a></li>",
										c::WEBSITE.$value['slug'],
										$value['title']
									);
								}	
								echo '</ul></nav>';			
							}
							$this->content = ob_get_contents();
							ob_end_clean();
							$this->fileHandling->index($file, $this->content);
							return file_get_contents($file);
						else: 
							return file_get_contents($file);
						endif;
					break;
				case "profileNav":
						$file = c::CACHE."profile".implode("-", $this->params).".html";
						if(!file_exists($file)):
							$this->profileNav = $this->pages->index("profileNav");
							ob_start();
							if(count($this->profileNav)){
								foreach ($this->profileNav as $value) {
									$active = (implode("/",$this->params)==$value['slug']) ? 'class="active"' : '';
									if(empty($this->params[1]) && $value['slug']=="profile/manage"){ $active = 'class="active"'; }
									echo sprintf(
										"<li><a href=\"%s\" %s>%s</a></li>",
										c::WEBSITE.$value['slug'],
										$active,
										$value['title']
									);
								}										
							}
							$this->content = ob_get_contents();
							ob_end_clean();
							$this->fileHandling->index($file, $this->content);
							return file_get_contents($file);
						else: 
							return file_get_contents($file);
						endif;
					break;
		}
	}
}
?>