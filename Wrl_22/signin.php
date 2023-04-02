<?php
// Include connection
include("connection.inc.php");

session_start();

	// Check if the user is already logged in, if yes then redirect them to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: veiw_appointments3.php");
		exit;
	}

	//session_start();
	// If form submitted, insert values into the database.
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST['Username'];
		$password = $_POST['Password'];

		$query = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";

		$result = mysqli_query($conn, $query);
		$rows = mysqli_num_rows($result);

		if($rows > 0){
			// Store data in session variables
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			header('Location: veiw_appointments3.php');

		}else{
			// We use the /?error=1 to link to our PHP below; which will GET and print it if we have failed to login
			header("Location: login.php/?error=1");
		}
	}else{
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="styles.css" />

	<style>
	body
	{
		background-color: lightblue;
	}
	</style>

	</head>

	<body>
	<div class="login-form">
		<h1>Login Form:</h1>

		<!-- Print a message using GET. This matches to the code above on the IF/ELSE for login. -->
		<?php if(isset($_GET["error"])):?>
		<div class="error">Invalid Username or Password</div>
		<?php endif; ?>

		<!-- Login Form -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="login">
		<input type="text" name="Username" placeholder="Enter username..." class="enter_username" required />
		<br>
		<br>
		<input type="password" name="Password" placeholder="Password" class="enter_password" required />
		<br>
		<br>
		<input name="submit" type="submit" value="Login" />
		</form>

		<a href="register.php">Click here to register as a new person</a>

		<?php } ?>
		</div>
		</body>
		</html>
