<?php 
include_once '../bootstrap.php';
// marketing homepage

?>

<!DOCTYPE html>
<html>
	<head>	
		<title>index.php</title>		
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>

	<body>

		<?php include_once "../views/partials/navbar.php"; ?>

			<!-- <div class='flexbox page_title'> -->
			<h2><p align='center'>Ever felt a little "Lost in Translation"???<br> 
			Join our followers and check out</h2>	
				<h1 align='center'>Luis's Loco Lingo!</h1></p>
			</div>
		
		<div class='flexbox page_content'>

	<script>

		var delay=50; //set 1/2 second delay
		var curindex=0;

		var randomimages=new Array();

		for (n=0;n<29;n++)
		{
			randomimages[n] = "/img/Luis_Pic/" + (n+1) + ".png";
		}

		document.write('<img name="defaultimage" src="'+randomimages[Math.floor(Math.random()*(randomimages.length))]
			+'" style="width:400px;height:400px;">');
		
				
		function rotateimage()
		{
			if (curindex==(tempindex=Math.floor(Math.random()*(randomimages.length)))){
				curindex=curindex==0? 1 : curindex-1;
			} else {
				curindex=tempindex;
				document.images.defaultimage.src=randomimages[curindex];
				}			
		}
		
		setInterval("rotateimage()",delay);

	</script>

		</div>
	</body>

</html>

