<?php 

require_once "../bootstrap.php";
$message = 'Edit';
$id_label = '';
$selected_lang_origin = 0;
$selected_lang_trans = 0;
$id_description = '';
$id_img_file = 0;
$selected_type_id = 0;
$selected_luis_score = 0;

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

	function isSelected($current_option, $selected_option) {

		$selection = '';
		
		if ($current_option == $selected_option) {
			
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


	if (Input::has('id')) {

		$id = Input::get('id');
		
		$id_item = Ad::getById('*', $id);
		var_dump($id_item);

		$id_label = $id_item[0]['label'];
		$selected_lang_origin = $id_item[0]['lang_origin'];
		$selected_lang_trans = $id_item[0]['lang_trans'];
		$id_description = $id_item[0]['description'];
		$id_img_file = $id_item[0]['img_file'];
		$selected_type_id = $id_item[0]['type_id'];
		$selected_luis_score = $id_item[0]['luis_score'];


	}

	if (Ad::arrayColCheck($_POST)) {

	    foreach ($_POST as $key => &$value) {
            
            $value = Input::escape($value);
        }

		$new_item = new Ad($_POST);

		


		// file uploads
		var_dump($_FILES);
		if ($_FILES['img_raw']['error'] != 4) {
			
			$uploaddir = 'img/ads.img/';

			$_FILES['img_raw']['name'] = uniqid();

			$extension = explode('/', $_FILES['img_raw']['type'])[1];
			$file_name = basename($_FILES['img_raw']['name']) . '.' . $extension;
			$uploadfile = $uploaddir . $file_name;
			$new_item->img_file = $file_name;

			if (!move_uploaded_file($_FILES['img_raw']['tmp_name'], $uploadfile)) {

			    $message = "file failed to upload";
			} 	 	
		}

		
		// insert into db  
		if ($message != "file failed to upload" && $new_item->img_file != 0) {
			
			if (isset($id)) {
				
				$new_item->save($id);

			} else {

				$new_item->save();
				
			}
			
			$message = "Item submitted - Sucess Ninja!";
		} else {

			$message = $message . " page - lame! it's not working, go cry";
		}
		
	}


var_dump($id_description);

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

	        	<input type="text" name="label" placeholder="Enter Label" value="<?= $id_label; ?>">
	        	
				<p><select id="lang_origin" name="lang_origin">
				  	<option <?= isSelected(0, $selected_lang_origin); ?> disabled>select language of origin</option>
				  	<?php foreach($lang_opts as $id => $lang): ?>
				   		<option value="<?= ++$id ?>" <?= isSelected($id, $selected_lang_origin); ?>><?= $lang ?></option>
				  	<?php endforeach; ?>  
				</select></p>
				
				<p><select id="lang_trans" name="lang_trans">
					<option <?= isSelected(0, $selected_lang_trans); ?> disabled>select translated language</option>
				    <?php foreach($lang_opts as $id => $lang): ?>
				   		<option value="<?= ++$id ?>" <?= isSelected($id, $selected_lang_trans); ?>><?= $lang ?></option>
				   	<?php endforeach; ?>
				</select></p>
				
					<!-- <input name="img_file" value="bbb"> -->
			
					<div id="image_update flexbox">
						<input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
						<input type="hidden" name="img_file" value="<?= $id_img_file ?>" />
						<span>Upload Your Bad Translation Image:</span><br>
					  	<input type="file" name="img_raw" accept="audio/*, video/*, image/*">
					</div>
				

					<p><textarea id="description" name="description" rows="5" cols="40" placeholder="Brief Description"><?= $id_description; ?></textarea></p>
				
				<p><select id="type_id" name="type_id">
					<option <?= isSelected(0, $selected_type_id); ?> disabled>select translation type</option>
			    	<?php foreach($type as $id => $value): ?>
			   			<option value="<?= ++$id ?>" <?= isSelected($id, $selected_type_id); ?>><?= $value ?></option>
			  		<?php endforeach; ?>
				</select></p>
				

				
				<p><select id="luis_score" name="luis_score">
					<option <?= isSelected(0, $selected_luis_score); ?> disabled>select luis's level of disgust</option>
				   	<?php $id=0; ?>
				   	<?php foreach($luis_score as $img => $luis): ?>
				   		<option value="<?= ++$id ?>" <?= isSelected($id, $selected_luis_score); ?> data-img="<?= $img ?>"><?= $luis ?></option>
				  	<?php endforeach; ?>
				</select></p>
				
				<button type="submit" value="submit">submit</button>
				<button id="reset" type="reset" value="reset">reset</button>

			</form>	
		</div>

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
