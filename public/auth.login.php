<?php 

include_once "../bootstrap.php";
require_once "../utils/Auth.php";
require_once "../utils/Input.php";

function pageController()
{
	if(Input::has('username') && Input::has('password')) {
		$username = Input::get('username');
		$password = Input::get('password');

		$result = Auth::attempt($username, $password);

		if($result) {
			header("Location: authorized.php");
			die();
		}
	}

	$attemptedUsername = inputHas('username') ? inputGet('username') : '';

	$attemptedPassword = inputHas('password') ? inputGet('password') : '';

}

?>

<!DOCTYPE html>
<html>

	<head>

		<title>Login Form</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="/css/main.css">
		<?= $font_links;  ?>

	</head>

	<body>
		<?php include_once '../views/partials/navbar.php'; ?>
		<h1>Log In</h1>

		<form method="POST">
        	<label>Username</label>
        	<input type="text" name="username" placeholder="Enter Username"><br>
        	<label>Password</label>
        	<input type="text" name="password" placeholder="Enter Password"><br>
        	<input type="submit" name="submit">
    	</form>
    	<h3>Or</h3>

    	<a href="/users.create.php" target="_blank">New Users Click Here</a>

    	<div class='flexbox page_content'>
			<img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
		<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>


	</body>

</html>
