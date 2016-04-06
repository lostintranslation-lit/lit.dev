<?php 

require_once "../bootstrap.php";

?>

<!DOCTYPE html>
<html>

	<head>

		<title>User Editing Form</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="/css/main.css">


	</head>

	<body>
		<?php include_once "../views/partials/navbar.php";?>
		<h1>Edit Profile</h1>
		  
		<h3>Personal info:</h3>

		<form method="POST">
			<label>First Name: </label>
	        <input type="text" name="First Name" placeholder="Enter First Name">
		</form><br>

		<form method="POST">
			<label>Last Name: </label>
	        <input type="text" name="Last Name" placeholder="Enter Last Name">
		</form><br>

		<form method="POST">
			<label>Email: </label>
	        <input type="text" name="Email" placeholder="Enter Email Address">
		</form><br>

		<h3>Confirm Changes:</h3>
    		<form method="POST">
		        <label>Username: </label>
		        <input type="text" name="username">
		    </form><br>

		    <form method="POST">
		        <label>Password: </label>
		        <input type="password" name="password">
		    </form>
		        <input value="Save Changes" type="button">
            	<input value="Cancel" type="reset">
    		</form>

    		<div class='flexbox page_content'>
			<img src="/img/Luis_Pic/7.png" alt="Luis" style="width:400px;height:400px;"/>
			<layer id="placeholderlayer"></layer><div id="placeholderdiv"></div>

	</body>

</html>
