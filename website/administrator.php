<ul class="administrator-navigation">
	<li><a href="?load=category">Category</a></li>
	<li><a href="?load=users">Users</a></li>
	<li><a href="?load=makeform">Make Form</a></li>
</ul>
<section class="administrator-content">
	<?php
	$posted["message"] = "";
	if(\lib\functions\url\request::method("POST","submit")){
		$submit = \lib\functions\url\request::method("POST","submit");
		$classNamePost = "\lib\admin\post\\".$submit;
		if (class_exists($classNamePost)) {
			$obectPost = new $classNamePost();
			$posted = $obectPost->index();
		}
	}
	$load = \lib\functions\url\request::method("GET","load");
	
	$className = "\lib\admin\\".$load;
	if (class_exists($className)) {
		$obect = new $className();
		$obect->index($posted);
	}else{
		echo "Error Cant Load Class";
	}
	
	?>
</section>
<script>
var js = document.createElement("script");
js.type = "text/javascript";
js.src = "<?=$c::WEBSITE?>public/js/admin.js";
document.body.appendChild(js);
</script>