<?php
@include($c["website.directory.parts"]."/head.php");
?>

<table class="table table-action">
  <thead>
    <tr>
      <th style="width:250px;"><b>კომპანია</b> &nbsp;&nbsp;<a href="javascript:void(0); return false;" class="addCompany"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
      <th style="width:600px;"><b>ვებ გვერდები</b></th>
      <th><b>მოქმედება</b></th>
    </tr>
  </thead>
  
  <tbody>
    <?=$data["table.companies"]?>    
  </tbody>
</table>
<!-- END TABLE -->
<?php
@include($c["website.directory.parts"]."/footer.php");
?>

