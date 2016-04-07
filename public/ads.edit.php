<?php 

require_once "../bootstrap.php";
$message = 'Edit';

// stuff when the page loads... (for editing)
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

	function isSelected($option,$selected_id,$col,$table) {

		$current_option = Ad::getById($col, $selected_id, $table);
		$selection = '';
		
		if ($current_option == $option) {
			
			$selection = "selected";
		}

		return $selection;
	}

	$lang_opts = Ad::all('lang', 'lang');
	$lang_opts = arrDimDown($lang_opts);


	$type = Ad::all('typet', 'typet');
	$type = arrDimDown($type);


	$luis_score = Ad::all('score', 'luis');
	$luis_score = arrDimDown($luis_score);


	$luis_img = Ad::all('img_file', 'luis');
	$luis_img = arrDimDown($luis_img);


	$luis_score = array_combine($luis_img, $luis_score);


// POST items

	

	var_dump(Ad::arrayColCheck($_POST));

	if (Input::has('id')) {

		$id = Input::get('id');
		
		$id_item = Ad::getById('*', $id);
		var_dump($id_item);
		


	}

	if (Ad::arrayColCheck($_POST)) {
		 
	   
	   foreach ($_POST as $key => &$value) {
            
            $value = Input::escape($value);
        }

		var_dump("in it to win it");
		$new_item = new Ad($_POST);
		$new_item->save();
		$message = "Item submitted - Sucess Ninja!";
		var_dump($new_item);

	}

// 
// file uploads

	var_dump($_FILES);

	
	$tid = Ad::getLastInId(); 
	var_dump($tid);

	// $uploaddir = 'img/ads.img';
	// $uploadfile = $uploaddir . basename($_FILES['img_raw']['name']);

	// echo '<pre>';
	// if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	//     echo "File is valid, and was successfully uploaded.\n";
	// } else {
	//     echo "Possible file upload attack!\n";
	// }

	// echo 'Here is some more debugging info:';
	// print_r($_FILES);

	// print "</pre>";

?>

<!DOCTYPE html>
<html>

	<head>

		<title>Ad Editing Form</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="/css/main.css">
		
	</head>

	<body>

		<?php include_once "../views/partials/navbar.php"; ?>
		
		<div class="page_title"><h1><?= $message; ?></h1></div>

		<div class="questions page_content">
			<form id="page_form" method="POST" enctype="multipart/form-data">

			
	        	<input type="text" name="label" placeholder="Enter Label">
			

				<select id="lang_origin" name="lang_origin">
				  	<option selected disabled>select language of origin</option>
				  	<?php foreach($lang_opts as $id => $lang): ?>
				   		<option value="<?= ++$id ?>"><?= $lang ?></option>
				  	<?php endforeach; ?>  
				</select>
			


				<select id="lang_trans" name="lang_trans">
					<option selected disabled>select translated language</option>
				    <?php foreach($lang_opts as $id => $lang): ?>
				   		<option value="<?= ++$id ?>"><?= $lang ?></option>
				   	<?php endforeach; ?>
				</select>
			
	
	            <textarea id="description" name="description" rows="5" cols="40" placeholder="Brief Description"></textarea>
				
					<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
					<input name="img_file" value="bbb">

				<div id="image_update flexbox">
					<span>Upload Your Bad Translation Image:</span>
				  	<input type="file" name="img_raw" accept="audio/*, video/*, image/*">
				</div>
					

			
				<select id="type_id" name="type_id">
					<option selected disabled>select translation type</option>
			    	<?php foreach($type as $id => $value): ?>
			   			<option value="<?= ++$id ?>"><?= $value ?></option>
			  		<?php endforeach; ?>
				</select>
			
				<select id="luis_score" name="luis_score">
					<option selected disabled>select luis's level of disgust</option>
				   	<?php $id=0; ?>
				   	<?php foreach($luis_score as $img => $luis): ?>
				   		<option value="<?= ++$id ?>" data-img="<?= $img ?>"><?= $luis ?></option>
				  	<?php endforeach; ?>
				</select>

				<button type="submit" value="submit">submit</button>
				<button id="reset" type="reset" value="reset">reset</button>

			</form>	
		</div>

		<div id="test" data-suck="pleasework"></div>

		<div class='flexbox page_content'>
			<img id="luis_img" src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
		<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>



	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		"use strict";
		(function() {

		

			$('#luis_score').on('change', function(){

				var pic_id = $(this).val();
				var pic_file = $(this).find(':selected').data("img");
				console.log(pic_id);
				console.log(pic_file);

				$('#luis_img').attr('src', '/img/Luis_Pic/' + pic_file);


			})

		})();

	</script>

	</body>


</html>
