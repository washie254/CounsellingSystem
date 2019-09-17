<?php session_start();

if (isset($_SESSION['ses_member_id'])&&isset($_SESSION['ses_member_email']) ) {
header("Location: profile/profile.php");
     exit;
} else {
	  
	}

$page_title = "Log In"; ?> 


<?php include("../header_links.php"); ?> 
	
	<?php /*?><link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/bootstrap/css/bootstrap.min.css"><?php */?>
	
	<script src="/CounsellingSystem/login/vendor/bootstrap/js/bootstrap.min.js"></script>	
	
	<script src="/CounsellingSystem/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/fonts/iconic/css/material-design-iconic-font.min.css">
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/animate/animate.css">	
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/animsition/css/animsition.min.css">
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/css/util.css">	
			
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/css-hamburgers/hamburgers.min.css">
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/css/main.css">
	
	

<?php include("../header_menu.php"); ?> 

	
<div style="margin-bottom: 110px;" > </div>
	
	
	<div class="limiter">
	
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			
			<div style=" padding-left:25px; background: #fff; color:#F00; font-size:18px; ">
              <?php if(!empty($_SESSION['form_error']))  { echo $_SESSION['form_error']; }  ?>
            </div>
			
			
				<form class="login100-form validate-form" method="post" action="login_handler.php" >
				
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login_account" >
							Login
						</button>
					</div>

					<div class="text-center p-t-10">
										
					<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="/CounsellingSystem/login/signup/signin.php">
							<strong>SIGN UP NOW	</strong>					
						</a>
					</div>	
											
					
					<div class="text-center p-t-06">
										
					<span class="txt1">
						<a class="txt1" href="#">
							Forgot Password?
						</a><br>  
				
					</div>
					
					
					
					<div class="text-center w-full p-t-115">
						
					</div>
					
					
				</form>
			</div>
			
			
		</div>
	</div>

	

	
	<script src="/CounsellingSystem/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="/CounsellingSystem/login/vendor/bootstrap/js/popper.js"></script>
	<script src="/CounsellingSystem/login/vendor/select2/select2.min.js"></script>
	<script src="/CounsellingSystem/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/CounsellingSystem/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="/CounsellingSystem/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="/CounsellingSystem/login/js/main.js"></script>
	
	
	<?php if(isset($_SESSION['form_error'])){
	unset($_SESSION['form_error']);
	} ?>

	<?php include("../footer.php"); ?> 
	


