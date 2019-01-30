<?php
@include("website/parts/top.php");
@include("website/parts/search.php");
@include("website/parts/navigation.php");
if(!isset($_SESSION[$c::SESSION_USERNAME])):
	echo $loginCach->index();
else:
?>
<main>
	<section class="slidebox">
		<section class="label" data-content="con1"><i class="fa fa-arrow-down" aria-hidden="true"></i> <?=$lang->index("personaldata")?></section>
		<section class="content con1">
			<?php
			echo \lib\functions\form\make::open(array(
				"action"=>"javascript:void(0)",
				"method"=>"post",
				"id"=>"personaldata"
			));

			echo \lib\functions\form\make::label(array(
				"for"=>"personaldata-mobilenumber",
				"name"=>$lang->index("mobnumber"),
				"require"=>"true"
			));

			echo \lib\functions\form\make::inputText(array(
				"name"=>"personaldata-mobilenumber",
				"id"=>"personaldata-mobilenumber",
				"class"=>"formdata personaldata-mobilenumber",
				"value"=>$_SESSION[$c::SESSION_USERNAME],
				"placeholder"=>"599 ******",
				"require"=>"true",
				"match"=>"false",
				"disabled"=>"true"
			));

			echo \lib\functions\form\make::label(array(
				"for"=>"personaldata-namelname",
				"name"=>$lang->index("namelname"),
				"require"=>"true"
			));

			echo \lib\functions\form\make::inputText(array(
				"name"=>"personaldata-namelname",
				"id"=>"personaldata-namelname",
				"class"=>"formdata personaldata-namelname",
				"value"=>"",
				"placeholder"=>""
			));


			echo \lib\functions\form\make::label(array(
				"for"=>"personaldata-email",
				"name"=>$lang->index("email"),
				"require"=>"false"
			));

			echo \lib\functions\form\make::inputText(array(
				"name"=>"personaldata-email",
				"id"=>"personaldata-email",
				"class"=>"formdata personaldata-email",
				"value"=>"",
				"placeholder"=>""
			));

			echo \lib\functions\form\make::label(array(
				"for"=>"personaldata-website",
				"name"=>$lang->index("website"),
				"require"=>"false"
			));

			echo \lib\functions\form\make::inputText(array(
				"name"=>"personaldata-website",
				"id"=>"personaldata-website",
				"class"=>"formdata personaldata-website",
				"value"=>"",
				"placeholder"=>""
			));

			echo \lib\functions\form\make::label(array(
				"for"=>"personaldata-cv",
				"name"=>$lang->index("cv"),
				"require"=>"false"
			));

			echo \lib\functions\form\make::inputFileUpload(array(
				"name"=>"personaldata-fileupload",
				"id"=>"personaldata-fileupload",
				"hidden_name"=>"formdata personaldata-fileupload-hidden-name",
				"hidden_id"=>"personaldata-fileupload-hidden-id",
				"dragClass"=>"dragable1",
				"dragAndDrop"=>$lang->index("dragAndDrop")
			));

			echo \lib\functions\form\make::inputSubmit(array(
				"name"=>"personaldata-button",
				"id"=>"personaldata-button",
				"class"=>"personaldata-button",
				"value"=>$lang->index("edit"),
				"onclick"=>"website.editprofile()"
			));

			echo \lib\functions\form\make::close();
			?>
		</section>
	</section><div class="clear"></div>

	<section class="slidebox">
		<section class="label" data-content="con2"><i class="fa fa-arrow-down" aria-hidden="true"></i> <?=$lang->index("passwordChange")?></section>
		<section class="content con2">
			<form>
				<p></p>
				<label>ტესტ</label>
				<input type="text" value="" />
				<label>ტესტ</label>
				<input type="password" value="" />
				<input type="submit" value="gogo" />
				<div class="clear"></div>
			</form>
		</section>
	</section><div class="clear"></div>

	
</main>
<div class="clear"></div>
<?php
endif;
@include("website/parts/bottom.php");
?>