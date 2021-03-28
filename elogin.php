 <!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Login</title>

</head>
<body>
<?php
require('connect.inc.php');
session_start();

if (isset($_POST['username'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = stripslashes($username);
	$username = mysqli_real_escape_string($connect,$username);
	$password = stripslashes($password);
	$password = mysqli_real_escape_string($connect,$password);

	$query = $connect->query("SELECT * FROM users WHERE username='$username' and password='$password'");
	$rows = $query->fetch_assoc();

	if($rows['id']){
		$_SESSION['user_id'] = $rows['id'];
		header("Location: core.php"); // Redirect user to index.php
	} else {
		echo '<script type="text/javascript">'; 
echo 'alert("Access Denied");'; 
echo 'window.location.href = "examadminlogin.html";';
echo '</script>';
		
	}
}
?>
<!--<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div> -->

</body>
</html>









