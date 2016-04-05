<?php 
include_once "../bootstrap.php";
	
	$type = Input::get('type');

	if (Input::has('type')) {

		$list_item = Ad::getFromForKey('*', 'type_id', 'typet', 'typet', $type);	

	}


?>

<!DOCTYPE html>
<html>

	<head>

		<title>ads.index.php</title>

		<meta charset="utf-8">
		<link rel="stylesheet" href="/css/main.css">
		<?= $font_links;  ?>

		<style type="text/css">

			
			#ad_index {

				flex-direction: column;

			}

			.list_item {

				display: flex;
				width: 25%;
				justify-content: space-between;
				align-content: center;
				flex-wrap: wrap;
			}

			#ad_index .list_item img, #ad_index .list_item h3 {

				display: block;
			}

		</style>

	</head>

	<body>

		<div class="flexbox page_title"> 
			<h1><?=$type ?></h1>
		</div>


		<div id="ad_index" class="flexbox page_content"> 
		
			<?php foreach ($list_item as $key => $value):?>

				<?php  $id = intval($value['id']) ?>	
				<div class="list_item"><h3><?=$value['id']; ?></h3><h3><?= $value['label']; ?></h3> <img <?= 'src="img/Luis_Pic/' . Ad::getForKeyCol($id,'luis_score','luis','img_file') .'"';?>" style="width:50px;height:50px;"></div>


			<?php endforeach; ?>
		
		</div>

	</body>

</html>


