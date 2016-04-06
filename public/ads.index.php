<?php 
include_once "../bootstrap.php";
	
	$type = Input::get('type');

	if (Input::has('type')) {

		$list_item = Ad::getFromForKey('*', 'type_id', 'typet', 'typet', $type);	

	}

	$n=1;

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

		<?php include_once "../views/partials/navbar.php"; ?>

		<div class="flexbox page_title"> 
			<h1><?=$type ?></h1>
		</div>


		<div id="ad_index" class="flexbox page_content"> 
		
			<table>
				<tr>
					<th>item</th>
					<th>description</th>
					<th>luis says...</th>
					<th>modify entry</th>
				</tr>
				
				<?php foreach ($list_item as $key => $value):?>

					<!-- <?php  $id = intval($value['id']) ?>	 -->
				<tr>
					<td><?= $n++;  ?></td>
					<td><a href="/ads.show.php?id=<?= $value['id']; ?> "><h3><?= $value['label']; ?></h3></a></td>
					<td><img<?= ' src="img/Luis_Pic/' . Ad::getForKeyCol($id,'luis_score','luis','img_file') .'" ';?>style="width:50px;height:50px;"></td>
					<td>
						<button class="edit" name="id" value="<?= $value['id'] ?>">edit</button>
						<button class="del" name="id" value="<?= $value['id'] ?>">delete</button>
					</td>

					<!-- <form method="GET">
							<button class="edit" name="id" value="<?= $value['id'] ?>">edit</button>
							<button class="del" name="id" value="<?= $value['id'] ?>">delete</button>
					</form> -->

				</tr>

				<?php endforeach; ?>
			</table>
		
		</div>

		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">

			  "use strict";
			  var edit = false;
			  var del = false;
			  var id;
			  
			  $('.edit').on('click', function() {

			  	id = $(this).val();

			  	console.log(id);

			  	edit = confirm("are you sure you want to leave the page to edit this entry?");
			  	console.log(edit);

			  	if (edit) {
			  		console.log('in it to win it');
			  		$.ajax({
					    url: "/js/ajax.php",
					    type: "GET",
					    data: {
					        modify:  'del',
					        id: id
					    }
					}).done(function(data){
						console.log(data);
					});
			  	}

			  });


			  $('.del').on('click', function() {

			  	edit = confirm("are you sure you want to delete this entry?");
			  	console.log(del);

			  });

			  function craptastic() {

			  	alert('all i do is win');
			  }


		</script>

	</body>

</html>


