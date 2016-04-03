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
		
		<div class='flexbox page_content'>
	<!-- this is one photo from the Luis_Pic file -->	
		<img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
	
	<!-- this is example code for rotating photos (off the Internet) -->
			<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>

			<script>

			var howOften = 2; //number of seconds before rotating
			var current = 0; //start the counter at 0
			var ns6 = document.getElementById&&!document.all; //detect netscape 6

			// place your images in the array elements here
			var items = new Array();
			    items[0]="<img src="/img/Luis_Pic/1.png" alt="Luis" style="width:400px;height:400px;"/>;
		 	    items[1]="<img src="/img/Luis_Pic/1.png" alt="Luis" style="width:400px;height:400px;"/>;
		 	    items[2]="<img src="/img/Luis_Pic/2.png" alt="Luis" style="width:400px;height:400px;"/>;
		 	   	items[3]="<img src="/img/Luis_Pic/3.png" alt="Luis" style="width:400px;height:400px;"/>;
		 	    items[4]="<img src="/img/Luis_Pic/4.png" alt="Luis" style="width:400px;height:400px;"/>;
		 	    items[5]="<img src="/img/Luis_Pic/5.png" alt="Luis" style="width:400px;height:400px;"/>;
			
			function rotater() {
			    document.getElementById("placeholder").innerHTML = items[current];
			    current = (current==items.length-1) ? 0 : current + 1;
			    setTimeout("rotater()",howOften*1000);
			}

			function rotater() {
			    if(document.layers) {
			        document.placeholderlayer.document.write(items[current]);
			        document.placeholderlayer.document.close();
			    }
			    if(ns6)document.getElementById("placeholderdiv").innerHTML=items[current]
			        if(document.all)
			            placeholderdiv.innerHTML=items[current];

			    current = (current==items.length-1) ? 0 : current + 1; 
			    setTimeout("rotater()",howOften*1000);
			}
			window.onload=rotater;

			</script>
		</div>
	</body>

</html>

