<?php  session_start();
if (isset($_SESSION['ses_member_id'])&&isset($_SESSION['ses_member_email']) ) {
//Logged In
} else {
	 header("Location: ../login.php");
     exit; 
	}

require_once("../../db_connections/db_connector.php");
$page_title = "User Profile"; 

$profile = $mysqli->query("SELECT * FROM members_details_account 
             WHERE email  = '{$_SESSION['ses_member_email']}' AND member_id = '{$_SESSION['ses_member_id']}' ");

$user = $profile->fetch_object();

//$_SESSION['counsellor_id'] = $_SESSION['ses_member_id'];
?> 


<?php include("../../header_links.php"); ?> 
	
	<?php /*?><link rel="stylesheet" type="text/css" href="/CounsellingSystem/login/vendor/bootstrap/css/bootstrap.min.css"><?php */?>
	
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	 

<?php include("../../header_menu.php"); ?> 

<div style="margin-bottom: 95px;" > </div>	
    
  <div id="w">
    <div id="content" class="clearfix">
     
     
     <div style=" padding-left:25px; color:#00F; font-size:18px; ">
              <?php if(!empty($_SESSION['message']))  { echo $_SESSION['message']; }  ?>
       </div>
     
     
      <div id="userphoto"><img src="<?php echo "/CounsellingSystem/img-members/".$user->profile_image; ?>" alt="default avatar"></div>
      
      
      <h1><?php echo $user->first_name." ".$user->last_name ?>  Profile</h1>
      
      
      <?php if($user->student_or_counsellor == "1" ) {
	  
	  	  echo '<a href="/CounsellingSystem/booking-student/book-me.php?id='.$_SESSION['ses_member_id'].'">
		  <button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400; float: right; top: 1px;" type="button" class="btn btn-primary">View Booking Table</button>	</a>';
	  
	  include("profile-student.php");
	  	  
	  }elseif($user->student_or_counsellor == "2"){
	  
	  echo '<a href="/CounsellingSystem/booking-counsellor/book-me.php?id='.$_SESSION['ses_member_id'].'">
		  <button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400; float: right; top: 1px;" type="button" class="btn btn-primary">View Booking Table</button>	</a>';
	  
	  include("profile-cousellor.php");
	  
	  }  ?>
            
      
      
    </div><!-- @end #content -->
  </div><!-- @end #w -->
  
  
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>	
	
	
	<?php if(isset($_SESSION['message'])){
	unset($_SESSION['message']);
	  } ?>

	<?php include("../../footer.php"); ?> 
	


