<?php session_start(); ob_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
setcookie("ses_member_id", "", time()-3600);
setcookie("ses_member_email", "", time()-3600);
header("Location: ../login.php");
exit;   ?>
