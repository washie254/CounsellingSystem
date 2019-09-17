<?php

require_once("../db_connections/db_connector.php");

if( isset($_GET['id']) ) {

$reservation_id = $_GET["id"];

    $mysqli->query("UPDATE phpmyreservation_reservations SET reservation_status = '4' 
	WHERE reservation_id = '{$reservation_id}'  ")
    or die("please try again: ");	


	header("Location: /CounsellingSystem/login/profile/profile.php");
	exit;

}


?>
