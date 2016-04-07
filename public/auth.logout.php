<?php 

session_start();
include_once "../bootstrap.php";

// var_dump($_SESSION);

Auth::logout();
// header('Location: /auth.login.php');
// die();
?>	

<!DOCTYPE html>
<html>
	<head>
		<title>Logout Action</title>
		<meta charset="utf-8">
	</head>
	<body>
		<!-- <div class='flexbox page_content'> -->
			<p align="center"><img src="/img/ads.img/panda.jpeg" alt="panda" style="width:400px;height:400px;"/></p>
			<h1><p align="center">этот класс является сумасшедшим</p></h1>
			<h1><p align="center"><i>(You are now logged out.)</i></p></h1>
			<a align='left' href="/index.php">Oops! Please take me back home.</a>
		<!-- </div> -->
	</body>
</html>
