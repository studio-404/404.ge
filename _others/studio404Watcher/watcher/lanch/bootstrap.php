<?php
namespace watcher\lanch;

class bootstrap{

	public function index($options){
		$request = new \watcher\functions\request(); 
		$page = $request->method("GET", "page");
		switch($page){
			case "create-file":
				/* Get All Files And Folders */
				$get_all_folders_files = new \watcher\functions\get_all_folders_files();
				$folder_files_array = $get_all_folders_files->index($options);
				/* Create Json File */
				$create_json_file = new \watcher\functions\create_json_file();	
				$create_json_file->index($options, $folder_files_array);
				/* Go To Homepage */
				@include("watcher/render/filecreated.php");
				break;
			case "check-file":
				/* Get All Files And Folders */
				$get_all_folders_files = new \watcher\functions\get_all_folders_files();
				$nowArray = $get_all_folders_files->index($options);
				if(file_exists($options['JSON_FILE'])){
					$oldJson = json_decode(file_get_contents($options['JSON_FILE']), true);
				}else{
					$oldJson = array();
				}
				@include("watcher/render/check.php");
				break;
			default:
				/* Get All Files And Folders */
				$get_all_folders_files = new \watcher\functions\get_all_folders_files();
				$folder_files_array = $get_all_folders_files->index($options);
				@include("watcher/render/show.php");
				break;
		}
		
	}
}
?>