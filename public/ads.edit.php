<?php 

include_once "../bootstrap.php";
require_once '../utils/auth.php';

?>

<!DOCTYPE html>
<html>

	<head>

		<title>Ad Editing Form</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="/css/main.css">
		
	</head>

	<body>

		<h1>Edit</h1>

		<div class="questions">
			<form method="POST">
				<label>Label</label>
	        	<input type="text" name="Label" placeholder="Enter Label">
			</form>

			<form>
				<label for="lang_origin">Select Language of Origin: </label>
				<select id="lang_origin" name="lang_origin">
				    <option value="1">English</option>
				    <option value="2">Spanish</option>
				</select>
			</form>

			<form>
				<label for="lang_trans">Select Translated Language: </label>
				<select id="lang_trans" name="lang_trans">
				    <option value="1">English</option>
				    <option value="2">Spanish</option>
				</select>
			</form>

			<form>
				<label for="description">Description</label>
	                <textarea id="description" name="Description" rows="5" cols="40" placeholder="Brief Description"></textarea>
			</form>

			<form action="img">
				<p>Upload Your Bad Translation Picture:</p>
			  	<input type="file" name="pic" accept="image/*">
			  	<input type="submit">
			</form>

			<form>
				<label for="type_id">Select Translation Type: </label>
				<select id="type_id" name="type_id">
				    <option value="1">Signs</option>
				    <option value="2">Tattoos</option>
				</select>
			</form>

			<form>
				<label for="luis_score">Select Luis's level of disgust : </label>
				<select id="luis_score" name="luis_score">
				    <option value="1">Meh</option>
				    <option value="2">Facepalm</option>
				</select>
			</form>	
		</div>

		<div class='flexbox page_content'>
			<img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
		<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>
	</body>

</html>
