
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "class";


// crearte connection
$connect = new Mysqli($servername, $username, $password,$db);

// check connection
if($connect->connect_error) {
	die("Connection Failed : " . $connect->error);
} else {
// 	 echo "Successfully Connected";	
}


?>