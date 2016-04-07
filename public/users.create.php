<?php 

include_once "../bootstrap.php";

$message = Input::get('message');
$error = '';

if ($_POST && Input::get('username', '') != '' && Input::get('password', '') != '') {
	$user = new User;
	$user->username = Input::get('username');
	$user->password = Input::get('password');
	$user->save();
} elseif ($_POST) {
	$error = "Hey! Don't forget to include both username and password!";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Signup</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/css/main.css">
	</head>
	<body>
		<h1>New User Signup</h1>
		<p>Welcome to Loco Luis Lingo! We're glad you could join us. Please take a moment to join our 
			growing community of "loco language lovers"!</> 
		<div>
			<form method="POST">
	    		<p>Please create an account below:</p>
	    		<p>
			        <label for="username">Username:</label>
			        <input id="username" name="username" type="text">
			    </p>    
			    <p>
			        <label for="password">Password:</label>
			        <input id="password" name="password" type="password">
			    </p>
			    <p>
			        <button id="myBtn" type="submit" name="message" value="GRACIAS!">Submit</button>
			    </p>
			    <p><h3><?php echo $error ?></h3></p>
			</form>
		</div>						
			<h2 align="center">Loco Leader Luis<br> says:</h2>
			<h2 id="message" align="center"><?= $message ?></h2>
			
		<div class='flexbox page_content'>
			<img src="/img/Luis_Pic/1.png" alt="Luis" style="width:400px;height:400px;"/>
			<layer id="placeholderlayer"></layer>
			<div id="placeholderdiv"></div>
		</div>	
	</body>
</html>
