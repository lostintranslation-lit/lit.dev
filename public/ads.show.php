<?php 
include_once "../bootstrap.php";

$id = Input::get('id');

$list_item = Ad::getById('*', $id);

$lang_origin = Ad::getForKeyCol($id, 'lang_origin', 'lang', 'lang');
$lang_trans = Ad::getForKeyCol($id, 'lang_trans', 'lang', 'lang');

?>

<!DOCTYPE html>
<html>

	<head>

		<title>ads.show.php</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/main.css">


		<?= $font_links;  ?>

		<style type="text/css">

			.details{

				justify-content: center;
				width: 90%;
				padding:5%;
			}

		</style>	

	</head>

	<body>

		<!-- this is the navbar -->
		<?php include_once '../views/partials/navbar.php'; ?>
		
		<div class="flexbox page_title">
			
			<h1><?= $list_item[0]['label']; ?></h1>

		</div>
		
		<div class="flexbox page_content">

			<img<?= ' src="img/ads.img/' . $list_item[0]['img_file'] . '"'; ?> style="width:600px;height:600px;">

		</div>

		<div class="flexbox page_content">
			<div><h2><?= $list_item[0]['description']; ?></h2></div>
		</div>

		<div class="flexbox page_content">
			
			<table>
				<tr>
					<th>Luis Says...</th>
					<th>Language of Origin:</th>
					<th>Language of Translation:</th>
				</tr>
				<tr>
					<td><img<?= ' src="img/Luis_Pic/' . Ad::getForKeyCol($id,'luis_score','luis','img_file') .'" ';?>style="width:50px;height:50px;"></td>
					<td><?= $lang_origin ?></td>
					<td><?= $lang_trans ?></td>
				</tr>
			</table>
			
		</div>

	</body>

</html>
