<?php  session_start();
require_once("../../db_connections/db_connector.php");

if(isset($_POST['create_new_account'])) {
		
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_pass = $_POST["confirm-pass"];
	$register_counsellor = $_POST["register-counsellor"];
	
	$error="";
	
	$check_email_existence = $mysqli->query("SELECT email FROM members_details_account 
             WHERE email  = '{$email}'  ") 
			 or die("Error! Please try again"); 
     if($check_email_existence->num_rows>0){
        $_SESSION['form_error'] ="Email Already Exist.<br /> ";
		header("Location: signin.php");
        exit;
     } 
	  
	 if($password != $confirm_pass)
     {
     $error .= "Password do not Match! <br />";
     }  
	

	if($error != "" ){
	 $_SESSION['form_error'] = "There was error in your submission:-<br />".$error;
	 header("Location: signin.php");
	 exit;
	 }
	 
	 
	 
	 if(isset( $_POST['register-counsellor'] ) ) {
         $student_or_counsellor = 2;
        }
       else {
         $student_or_counsellor = 1;
       }
	 
	 
	 $password_ency = sha1($password);
	  
	
	$mysqli->query("INSERT INTO members_details_account ( first_name, last_name, email, password, student_or_counsellor, profile_image, create_time)
    VALUES ( '{$first_name}', '{$last_name}', '{$email}', '{$password_ency}', '{$student_or_counsellor}', 'avatar.png',  NOW()  )");
	  
	  
	$search_member_tb = $mysqli->query("SELECT member_id, email, first_name, admin_permission  FROM members_details_account 
             WHERE email  = '{$email}' ");
			 
	$member_dt = $search_member_tb->fetch_object();	
	
	
	if($student_or_counsellor == 2){
	$mysqli->query("INSERT INTO counsellors_professional_details ( member_id, date_created)
      VALUES ( '{$member_dt->member_id}',  NOW()  )");
	 }
	
	  
	$_SESSION['ses_member_id']=$member_dt->member_id; 
    $_SESSION['ses_member_email']=$member_dt->email;
	$_SESSION['ses_user_name'] = $member_dt->first_name;
	$_SESSION['user_is_admin'] = $member_dt->admin_permission;
	
	$_SESSION['message'] = "Your Account has been created succesifully";
	header("Location: ../profile/profile.php");
	exit();
		
	
	}
	else{
	header("Location: signin.php");
	exit();
	}
	
	
	?>