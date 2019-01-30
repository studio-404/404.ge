<section class="mask" onclick="website.popup('close', '<?=$_SESSION['CSRF']?>', 'false')"><i class="fa fa-spinner myspin" aria-hidden="true"></i></section>
<section class="popup">
	<section class="header"><span>&nbsp;</span> <i class="fa fa-times" aria-hidden="true" onclick="website.popup('close', '<?=$_SESSION['CSRF']?>', 'false')"></i></section>
	<section class="content">
		
	</section>
</section>
<header>
	<section class="logo"><i class="fa fa-barcode" aria-hidden="true"></i></section>
	<section class="top-nav">
		<nav class="desktop">
			<ul>
				<li class="home">
					<a href="<?=$c::WEBSITE?>" <?=(!isset($this->params[0]) || $this->params[0]=="home") ? "class=\"active\"" : ""?> data-title="<?=$lang->index("home")?>"><i class="fa fa-home" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="javascript:void(0)" <?=(isset($this->params[0]) && $this->params[0]=="addpost") ? "class=\"active\"" : ""?> onclick="website.popup('open', '<?=$_SESSION['CSRF']?>', 'addpost')"><?=$lang->index("addpost")?></a>
				</li>
				<?=$cache->index("topMenu")?>
			</ul>
		</nav>
		<nav class="mobile" data-status="closed" onclick="website.mobileNavClick()">
			<p><i class="fa fa-bars" aria-hidden="true"></i></p>
			<ul></ul>
		</nav>
	</section>
</header>