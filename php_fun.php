<?php 

function arrDimDown($arr_2D){

	if (is_array($arr_2D[0])) {
		
		$arr_1D = [];

		foreach ($arr_2D as $l1) {
			foreach ($l1 as $l2) {
				
				array_push($arr_1D, $l2);
			}
		}	

		return $arr_1D;
	}

	return $arr_2D;
}

function isSelected($current_option, $selected_option) {

	$selection = '';
	
	if ($current_option == $selected_option) {
		
		$selection = "selected";
	}

	return $selection;
}

function htmlElmPermission($current_id, $permission_array){

	$element_com = ['',''];
	
	if (array_search($current_id, $permission_array)=== false) {
		
		$element_com = ['<!--' , '-->'];

	}


	return $element_com;

}

