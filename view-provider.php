<?php 
session_start();

require_once("db_connections/db_connector.php"); 

if(isset($_GET["id"])){
	$id = trim(htmlentities(($_GET["id"])));
   } 
   else{ 
	 header("Location: ../list-provider.php");
     exit; 
	}

$consultant_tb = $mysqli->query("SELECT * FROM members_details_account 
WHERE member_id = '{$id}' ");
if($consultant_tb->num_rows==1){ 
$consultant = $consultant_tb->fetch_object(); 

$page_title = $consultant->first_name." ".$consultant->last_name ." | Profile";
} else {
	 header("Location: list-provider.php");
     exit; 
}


include("header_links.php"); 
include("header_menu.php");  ?>


<div style="margin-bottom: 120px;" > </div>


  <div id="w">
    <div id="content" class="clearfix">
   
   <?php 
   
   $pro_details_tb = $mysqli->query("SELECT * FROM counsellors_professional_details 
		             WHERE member_id = '{$consultant->member_id}' ")  or die($mysqli->error);
   $pro_details = $pro_details_tb->fetch_object(); 
   
   ?>
    
      
<div class="col-sm-3">
    <div class="well" >

    <div class="cbp-l-member-img">  
  <img src="/CounsellingSystem/img-members/<?php echo $consultant->profile_image; ?>" class="img-responsive" style="width: 250px; height: 200px; margin: 5px;" alt="Image">
  
   </div>
   
   
   <br>

   
   <div class="provider-name-title-container margin-top text-center">
   <h6 class="ng-binding"><?php echo $consultant->first_name."  ".$consultant->last_name; ?></h6>
   
   <h7 class="provider-title ng-binding" data-ng-show="provider.title"><?php echo $pro_details->job_title; ?></h7>
   
   <h7 data-ng-show="provider.isOrganisation" class="provider-title ng-binding ng-hide"></h7>
   
   
    <br> <br>
   <a class="btn btn-primary" href="booking/book-me.php?id=<?php echo $consultant->member_id; ?>" >Book Appointment</a>
   
   </div>
   
  
   
   

  <br>

   <br> <br> <br>

   
   
   </div>
</div>


<div class="col-sm-7">
  <div class="well" style="line-height: 1.9em;" >

<?php  echo $pro_details->detailed_description; ?>

</div>



<div class="well">
<strong>Services Offered:</strong> <?php 
        
		$services_tb = $mysqli->query("SELECT service_name FROM counselling_services 
		WHERE service_id = '{$pro_details->service_offered}'  ");
		
		$service = $services_tb->fetch_object();
			
		echo $service->service_name; 
?>
</div>


<div class="well">
<strong>Qualifications: </strong>

<?php 
        $qualifications_tb = $mysqli->query("SELECT qualification_name FROM counselling_qualifications 
		WHERE qualification_id = '{$pro_details->qualification}'  ");
		
		$qualification = $qualifications_tb->fetch_object();
			
		echo $qualification->qualification_name; 
?>

</div>




<div class="well" style="text-align: center;">

 <a class="btn btn-primary" href="booking/book-me.php?id=<?php echo $consultant->member_id; ?>" >Book Appointment</a>

</div>






</div>





    </div><!-- @end #content -->
  </div><!-- @end #w -->
















  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <script src="js/custom.js"></script>


<?php include("footer.php"); ?> 