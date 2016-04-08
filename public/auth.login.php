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
 			index.php;
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

	</body>

</html>
