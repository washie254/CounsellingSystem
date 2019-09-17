<?php

require_once("../db_connections/db_connector.php");

if( isset($_GET['id']) ) {

$reservation_id = $_GET["id"];
$status = '';

$profile = $mysqli->query("SELECT student_or_counsellor FROM members_details_account 
             WHERE email  = '{$_SESSION['ses_member_email']}' AND member_id = '{$_SESSION['ses_member_id']}' ");
$user = $profile->fetch_object();

    if($user->student_or_counsellor == "1" ) {
	  
	  $status = '1';
	  
	  }elseif($user->student_or_counsellor == "2"){
	  
	  $status = '2';
	  
	  }
	  

    $mysqli->query("UPDATE phpmyreservation_reservations SET reservation_status = '{$status}' 
	WHERE reservation_id = '{$reservation_id}'  ")
    or die("please try again: ");	


	header("Location: /CounsellingSystem/login/profile/profile.php");
	exit;

}


?>
