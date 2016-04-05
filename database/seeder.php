<?php  

require_once	"../models/BaseModel.php";
require_once	"../models/Ad.php";
require_once	"db_p_pop.php";

var_dump($arr);

BaseModel::truncate('lit');


foreach ($arr as $key => $row) {
	
	$temp_Ad = new Ad($row);
	$temp_Ad->save();
	var_dump($temp_Ad->__get('label'));

}


