<?php 

include_once "../bootstrap.php";

$error = '';
// function pageController()
// {
// 	if(Input::has('username') && Input::has('password')) {
// 		$username = Input::get('username');
// 		$password = Input::get('password');
// 		$result = Auth::attempt($username, $password);
// 		if($result) {
// 			header("Location: authorized.php");
// 			die();
// 		}
// 	}
// 	$attemptedUsername = inputHas('username') ? inputGet('username') : '';
// 	$attemptedPassword = inputHas('password') ? inputGet('password') : '';
// }

	if ($_POST && Input::get('username', '') != '' && Input::get('password', '') != '') {
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Input::get('password');
		$result = Auth::attempt($username, $password);
		if($result == true) {
 			
			die();
		
		} else {
			$error = "Hey! Your username and password don't match what's on file!";
		}
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
        	<p>
	        	<label for="username">Username:</label>
	        	<input type="text" name="username" id="username" placeholder="Enter Username">
	        </p>
	        <p>
        		<label for="password">Password:</label>
        		<input type="password" name="password" placeholder="Enter Password">
        	</p>
        	<p>
        		<button id="myBtn" type="submit" name="submit"></button>
        	</p>
    	</form>
			
    	 <div class='flexbox page_content'>
			<img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
		<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>


	</body>

</html>
