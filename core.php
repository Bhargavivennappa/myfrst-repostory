<?php
require('connect.inc.php');
require('core.inc.php');
if(loggedin()) {
  $username='Admin';
  //echo "WELCOME ".$username;
  include 'examarrangement.html';
} else {
	header('Location: examadminlogin.html');
}
?>