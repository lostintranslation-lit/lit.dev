<?php 

session_start();
require_once "../utils/Auth.php";

var_dump($_SESSION);

Auth::logout();
header('Location: /auth.login.php');
die();
?>	

<!DOCTYPE html>
<html>

	<head>

		<title>Logout Action</title>

		<meta charset="utf-8">

	</head>

	<body>
	</body>

</html>
