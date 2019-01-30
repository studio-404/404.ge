<?php
$csv = new csv();
$fetch_csv = $csv->csv_to_array('csv/transactions.csv',',');
echo "<pre>";
print_r($fetch_csv);
echo "</pre>";
?>