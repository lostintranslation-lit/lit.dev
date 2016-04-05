<?php 

$filename = "ExcelDatabase.csv";
$strg = file_get_contents($filename);

$arr = explode('"',$strg);
$arr = explode("\n",$strg);


$table_cols = array_shift($arr);
$table_cols = explode(",", trim($table_cols));


foreach ($arr as $key => &$row) {

	$row = explode(",",trim($row));
	$row = array_combine($table_cols,$row);
	
}
