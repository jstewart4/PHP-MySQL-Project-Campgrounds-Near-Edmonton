<?php 
session_start();
include ("../includes/header.php");

$return = $_GET['return'];

if (isset($_POST['submit'])) {
	//$msg = "Form has been submitted";
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo "$username | $password";

	if (($username == "jamie") && ($password == "Password123")){
		$msg = "Welcome $username"; // Successfull Login: create a session var that we will check for on all secure pages
		//create your own random value for the name of your session:
		$_SESSION['jaergijnaeir444'] = session_id();

		switch ($return) {
			case 'edit':
				header("Location:edit.php");
				break;
			case 'insert':
				header("Location:insert.php");
				break;

			default:
				header("Location:../index.php");
				break;
		}
		
	}else{
		$msg = "Incorrect Login"; // Unsuccessful login
	}
}// \ if isset submit

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Secure Login</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Please Login</h1>
			<h3>You must login in order to edit, add or delete a contact.</h3>
		</div>
		<div class="col-md-6">
			<div class="form">
				<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" name="username" class="form-control" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label for="submit"></label><input type="submit" name="submit" value="Login">
					</div>
				</form>
			</div>
		</div>
		<div class="message">
		<?php 
		if ($msg) {
			echo $msg;
		}
		 ?>
		</div>
	</div>
</body>
</html>

<?php
include ("../includes/footer.php");
?>