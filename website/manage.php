<?php
@include("website/parts/top.php");
@include("website/parts/search.php");
@include("website/parts/navigation.php");
if(!isset($_SESSION[$c::SESSION_USERNAME])):
	echo $loginCach->index();
else:
	///////////////////////////////////// AUTHERD USER //////////////////////////////////////////
	
?>
<main>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">ს.კ.</th>
      <th scope="col">თარიღი</th>
      <th scope="col">დასახელება</th>
      <th scope="col">ღირებულება</th>
      <th scope="col">მოქმედება</th>
    </tr>
  </thead>
  <tbody>
	<tr>
	<td>206568</td>
	<td>04/01/2016</td>
	<td>მაისური</td>
	<td>35 GEL</td>
	<td>
	<a href="">
	<i class="fa fa-link" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-trash-o" aria-hidden="true"></i>
	</a>
	<div class="clear"></div>
	</td>
	</tr>

	<tr>
	<td>206568</td>
	<td>04/01/2016</td>
	<td>მაისური</td>
	<td>35 GEL</td>
	<td>
	<a href="">
	<i class="fa fa-link" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-trash-o" aria-hidden="true"></i>
	</a>
	<div class="clear"></div>
	</td>
	</tr>

	<tr>
	<td>206568</td>
	<td>04/01/2016</td>
	<td>მაისური</td>
	<td>35 GEL</td>
	<td>
	<a href="">
	<i class="fa fa-link" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-trash-o" aria-hidden="true"></i>
	</a>
	<div class="clear"></div>
	</td>
	</tr>

	<tr>
	<td>206568</td>
	<td>04/01/2016</td>
	<td>მაისური</td>
	<td>35 GEL</td>
	<td>
	<a href="">
	<i class="fa fa-link" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	</a>
	<a href="">
	<i class="fa fa-trash-o" aria-hidden="true"></i>
	</a>
	<div class="clear"></div>
	</td>
	</tr>
    
  </tbody>
</table>
</main>
<div class="clear"></div>
<?php
endif;
@include("website/parts/bottom.php");
?>