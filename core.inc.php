<?php
require 'connect.inc.php';
//include 'nlogin.html';
ob_start();
session_start();
// $current_file=$_SERVER['SCRIPT_NAME'];
// $ref=$_SERVER['HTTP_REFERER'];
/*$ip_addr=$_SERVER['REMOTE_ADDR'];
$q="INSERT INTO visitors VALUES('$ip_addr')";

mysql_query($q);
*/

function loggedin(){
  if(isset($_SESSION['user_id'])){
    return true;
  } else {
    return false;
  }
}
function getuser($field){
  $id = $_SESSION['user_id'];
  $query = "SELECT $field FROM 'users' WHERE users_id='$user_id'";
  $result = mysqli_query($connect,$query) or die(mysqli_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
    return mysqli_result($result,0,$field);
  }
}
?>