<?php 
session_start();

require_once "../bootstrap.php";
var_dump($_SESSION);

$msg = 'Login Form';
if (array_key_exists('LOGGED_IN_USER', $_SESSION)) {
	$msg = 'crazy - you are already logged in :)';
}

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

		$user_id = $user->find();
		if (!is_null($user_id)) {

			$user_id = $user_id['id'];
			if (Auth::attempt('guest', 'password')) {

				$arr = Ad::getFromForKey('id', 'user_edit', 'user', 'id', $user_id);
				
				if (!empty($arr)) {
					
					$arr = arrDimDown($arr);

				}

				Auth::setAds($arr);
			}
			$msg = "Hello! sucessful Login my friend";

		} else {
			$msg = "Hey! Your username and password don't match what's on file!";
		}
	}

?>

<!DOCTYPE html>
<html>

	<head>

		<title>Logged in</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="/css/main.css">
		<?= $font_links;  ?>

	</head>

	<body>
		<?php include_once '../views/partials/navbar.php'; ?>
		<div class="page_title"><h1><?= $msg; ?></h1></div>

		<div class="questions page_content">
			<form method="POST">
	        	
		        	<p><label for="username">Username:</label>
		        	<input type="text" id="username" name="username" placeholder="Enter your username"></p>
		        	       
	        		 <p><label for="password">Password:</label>
	        		<input type="text" id="password" name="password" placeholder="Enter your password"></p>  	
	        	
	        		<p><input type="submit"></p>  		

	        	<h4>or</h4>

	    		<a href="/users.create.php" target="_blank">New Users Click Here</a>

	    	</form>

				
	    	 <!-- <div class='flexbox page_content'> -->

	    	
	    	<!-- </div> -->

				<p align='center'><img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/></p>
			<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>
		</div>

	</body>

</html>
