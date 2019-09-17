<?php  session_start();
require_once("../../db_connections/db_connector.php");

if(isset($_POST['save_professional_details'])) {
	
	$member_id = $_POST["member_id"];
	$job_title = htmlentities($_POST["job_title"]);
	$institution = $_POST["institution"];
	$gender = $_POST["gender"];
	$service_name = $_POST["service_name"];
	$qualification = $_POST["qualification"];
	$brief_description = mysqli_real_escape_string($mysqli, $_POST["brief_description"]);
	$detailed_description = urldecode(mysqli_real_escape_string($mysqli, $_POST["detailed_description"]) );
	
	
	$error="";	

	if($error != "" ){
	 $_SESSION['form_error'] = "There was error in your submission:-<br />".$error;
	 header("Location: profile.php");
	 exit;
	 }
	
	$mysqli->query("UPDATE counsellors_professional_details SET job_title = '{$job_title}', gender  = '{$gender}',  service_offered  = '{$service_name}' , qualification = '{$qualification}' , brief_introduction = '{$brief_description}', detailed_description = '{$detailed_description}', institution  = '{$institution}', date_updated = NOW() WHERE member_id = '{$member_id}' LIMIT 1  ") or  die("error! ".$mysqli->error);
	  	
	$_SESSION['message'] = "Your Professional Details has been updated.";
	header("Location: profile.php");
	exit();
	
	}
	else{
	header("Location: profile.php");
	exit();
	}
	
	
	?>