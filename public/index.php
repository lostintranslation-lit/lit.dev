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
			<div class='flexbox page_title'>
				<!-- just changed the title temporarily for fun -->
				<h1>Luis's Loco Lingo!</h1>
			</div>
		<!-- <span class="random_image"></span> this did not quite work-->
		<div class='flexbox page_content'>

	<script>

		var delay=50; //set 1/2 second delay
		var curindex=0;

		var randomimages=new Array();

		for (n=0;n<29;n++)
		{
			randomimages[n] = "/img/Luis_Pic/" + (n+1) + ".png";
		}

		document.write('<img name="defaultimage" src="'+randomimages[Math.floor(Math.random()*(randomimages.length))]+'" style="width:400px;height:400px;">');
		//this did not work: $('.random_image').append('<img name="defaultimage" src="'+randomimages[Math.floor(Math.random()*(randomimages.length))]+'" style="width:400px;height:400px;">')
				
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

