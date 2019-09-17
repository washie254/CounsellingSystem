<?php  session_start();
require_once("../db_connections/db_connector.php");

if(isset($_POST['login_account'])) {
		
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$error="";
	
	$password = sha1($password);
	
	$check_member = $mysqli->query("SELECT member_id, email, first_name, admin_permission  FROM members_details_account 
             WHERE email  = '{$username}' AND password = '{$password}'  ") 
			 or die("Error! Please try again");
			 
     if($check_member->num_rows != 1){
        $_SESSION['form_error'] ="Incorrect combination of Email and Password.<br />";
		header("Location: login.php");
        exit;
     } 	
	
	$member_dt = $check_member->fetch_object();
	
	$_SESSION['ses_member_id']= $member_dt->member_id; 
    $_SESSION['ses_member_email']= $member_dt->email;
	$_SESSION['ses_user_name'] = $member_dt->first_name;
	$_SESSION['user_is_admin'] = $member_dt->admin_permission;
	
	header("Location: profile/profile.php");
	exit();	
	
	
	}
	else{
	header("Location: login.php");
	exit();
	}
	
	
	?>