<?php session_start();

if (isset($_SESSION['ses_member_id'])&&isset($_SESSION['ses_member_email']) ) {
header("Location: ../profile/profile.php");
     exit;
} else {
	  
	}

$page_title = "Sign Up Now"; ?> 

<?php include("../../header_links.php"); ?> 
	
	<?php /*?><link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> <?php */?>
	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css"> 
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> 
	<link rel="stylesheet" type="text/css" href="css/util.css">
	
	<?php /*?><link rel="stylesheet" type="text/css" href="css/main.css"><?php */?> 
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/css/main.css">
	
	
		
	
	
   <?php include("../../header_menu.php"); ?> 	
	
	<div style="margin-bottom: 110px;" > </div>
	
	<div class="limiter" style="color: #eed">
	
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			
			<div style=" padding-left:25px; background: #fff; color:#F00; font-size:18px; ">
              <?php if(!empty($_SESSION['form_error']))  { echo $_SESSION['form_error']; }  ?>
            </div>
			
				<form class="login100-form validate-form" action="signin_handler.php" method="post" >
				
					<span class="login100-form-title p-b-34 p-t-27">
						Sign Up Account
					</span>

					<div class="wrap-input100 validate-input" data-validate="First Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100 input100-extra" type="text" name="first_name" placeholder="">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Last Name is required">
						<span class="label-input100">Last Name</span>
						<input class="input100 input100-extra" type="text" name="last_name" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100 input100-extra" type="text" name="email" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<?php /*?><div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div><?php */?>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100 input100-extra" type="password" name="password" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100 input100-extra" type="password" name="confirm-pass" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-0">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="register-counsellor" value="2" >
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
								Register as a Service Provider
								</span>
							</label>
						</div>

						
					</div>
					
								
					<div class="text-center p-t-01">
										
					<span class="txt1">
						By Creating Account You Agree With 
					<a href="#" class="txt2 hov1">Terms of User</a>  
									
						<br><br>
				
					</div>						
					

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							
							<button class="login100-form-btn" name="create_new_account"  >Sign Up</button>
							
						</div>

						<a href="/CounsellingSystem/login/login.php" class="dis-block txt3 hov1 p-r-30 p-t-0 p-b-10 p-l-30">Log In
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script> 
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	
	<?php if(isset($_SESSION['form_error'])){
	unset($_SESSION['form_error']);
	} ?>
	
<?php include("../../footer.php"); ?> 


