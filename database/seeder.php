<?php  

require_once	"../models/BaseModel.php";
require_once	"../models/Ad.php";
require_once	"../utils/Input.php";
require_once	"db_p_pop.php";


BaseModel::truncate('lit');


foreach ($arr as $key => $row) {
	
	$key = new Ad($row);
	var_dump($key);
	$key->save();

}


