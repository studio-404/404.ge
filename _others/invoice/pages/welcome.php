<table width="100%" border="1" cellpadding="5" cellspacing="1" style="text-align:left">
	<tr style="background:#f2f2f2; color:#555555">
		<th>id</th>
		<th>uid</th>
		<th>start_date</th>
		<th>end_date</th>
		<th>user_id</th>
		<th>service</th>
		<th>description</th>
		<th>price</th>
		<th>discount</th>
		<th>paystatus</th>
		<th>insert_admin</th>
		<th>lang</th>
		<th>status</th>
	</tr>
	<?php
	foreach($fetch as $val) : 
	?>
		<tr <?=($val["paystatus"]==1) ? 'style="color:green"' : 'style="color:red"'?>>
			<td><?=$val["id"]?></td>
			<td><a href="http://developer.404.ge/ge/invoices?uid=<?=$val["uid"]?>" target="_blank"><?=$val["uid"]?></a></td>
			<td><?=date("d-m-Y",$val["start_date"])?></td>
			<td><?=date("d-m-Y",$val["end_date"])?></td>
			<td width="120"><?=$getusersname->getUsers($val["user_id"])?></td>
			<td><?=$val["service"]?></td>
			<td><?=$val["description"]?></td>
			<td><?=$val["price"]?></td>
			<td><?=$val["discount"]?></td>
			<td>
				<?php
				if($val["paystatus"]==1){
					echo '<a href="?page=change&amp;id='.$val["id"].'&amp;paystatus=2">გადახდილია</a>';
				}else{
					echo '<a href="?page=change&amp;id='.$val["id"].'&amp;paystatus=1">გადასახდელია</a>';
				}
				?>
			</td>
			<td><?=$val["insert_admin"]?></td>
			<td><?=$val["lang"]?></td>
			<td><?=$val["status"]?></td>
		</tr>
	<?php
	endforeach;
	?>
</table>