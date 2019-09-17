<?php 
include_once('main.php');

if (!isset($_SESSION['ses_member_id'])&& !isset($_SESSION['ses_member_email']) ) {
header("Location: ../login/login.php");
     exit;
} else {
	  
	}
	
	
if(isset($_GET["id"])){
	$counsellor_id = trim(htmlentities(($_GET["id"])));
	$_SESSION['counsellor_id'] = $counsellor_id;
   } 
   else{ 
	 header("Location: list-provider.php");
     exit; 
	}
	


$consultant_tb = $mysqli->query("SELECT * FROM members_details_account 
WHERE member_id = '{$counsellor_id}' ");
if($consultant_tb->num_rows==1){ 
$consultant = $consultant_tb->fetch_object(); 

} else {
	 header("Location: list-provider.php");
     exit; 
}
	


$page_title = "Counsellor Booking - ".$consultant->first_name." ".$consultant->last_name; ?> 


<?php include("../header_links.php"); ?> 
	
	<?php /*?><link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/bootstrap/css/bootstrap.min.css"><?php */?>


<noscript><meta http-equiv="refresh" content="0; url=error.php?error_code=2"></noscript>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-cookies.js" type="text/javascript"></script>
<script src="js/jquery-base64.js" type="text/javascript"></script>
<?php include('js/header-js.php'); ?>
<script src="js/main.js" type="text/javascript"></script>

<link href="css/style.css" rel="stylesheet" type="text/css">	
			

<?php include("../header_menu.php"); ?> 	

	
<div style="margin-bottom: 120px;" > </div>


<div style="text-align: center; font: 28px bold; background: #fff; margin-bottom: -20px; padding-top: 15px; padding-bottom: 20px;">Counsellor Booking: <strong><?php echo $consultant->first_name." ".$consultant->last_name; ?></strong> </div>


<div id="notification_div"><div id="notification_inner_div"><div id="notification_inner_cell_div"></div></div></div>
	
	
<div id="content_div"></div>

<div id="preload_div">
<img src="img/loading.gif" alt="Loading">
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
	


