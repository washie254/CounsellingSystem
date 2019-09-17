<?php session_start();

require_once("db_connections/db_connector.php");

$page_title = "Counsellors & Psychologists"; ?> 


<?php include("header_links.php");
      include("header_menu.php");
 ?> 
      
      

   <div style="margin-bottom: 120px;" > </div>
   
    <!-- Section: team -->
    <section id="doctor" class="home-section2 bg-gray paddingbot-00">
      <div class="container marginbot-00">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDownXX" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h3 class="h-bold">Our Online Counsellors</h3>
                <?php /*?><p>Here is a list of frequent counsellors</p><?php */?>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div id="filters-container" class="cbp-l-filters-alignLeft">
              <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor1" class="cbp-filter-item">Anxiety (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor2" class="cbp-filter-item">Anger (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor3" class="cbp-filter-item">Depression (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor4" class="cbp-filter-item">Relationship (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor5" class="cbp-filter-item">Grief (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".counsellor6" class="cbp-filter-item">Addiction (
                <div class="cbp-filter-counter"></div>)</div>
            </div>

           
           
            <div id="grid-container" class="cbp-l-grid-team">
              <ul>
              
         <?php
		 
		 $consultant_tb = $mysqli->query("SELECT * FROM members_details_account 
		 WHERE student_or_counsellor = '2'
		 ORDER BY first_name ASC LIMIT 30 ") or die($mysqli->error);
         while($consultant = $consultant_tb->fetch_object()) {

          $pro_details_tb = $mysqli->query("SELECT * FROM counsellors_professional_details 
		   WHERE member_id = '{$consultant->member_id}' ")  or die($mysqli->error);
          $pro_details = $pro_details_tb->fetch_object(); 
		  
		  if($pro_details->service_offered != ''){
		   
		   $tab = '';
		   if($pro_details->service_offered ==2 ){
		   $tab = 'counsellor1';
		   }
		   elseif($pro_details->service_offered ==4){
		   $tab = 'counsellor2';
		   }
		   elseif($pro_details->service_offered ==1){
		   $tab = 'counsellor3';
		   }
		   elseif($pro_details->service_offered ==3){
		   $tab = 'counsellor4';
		   }
		   elseif($pro_details->service_offered ==5){
		   $tab = 'counsellor5';
		   }
		   elseif($pro_details->service_offered ==6){
		   $tab = 'counsellor6';
		   }
           		    
		   $member_link = "/CounsellingSystem/view-provider.php?id={$consultant->member_id}";
		   $member_image = "/CounsellingSystem/img-members/".$consultant->profile_image;		   
		   
		  
             echo '                 
             <li class="cbp-item '.$tab.'">
                  <a href="'.$member_link.'" class="cbp-caption cbp-singlePageX">
                    <div class="cbp-caption-defaultWrap">
                      <img src="'.$member_image.'" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text">VIEW PROFILE</div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="'.$member_link.'" class="cbp-singlePageX cbp-l-grid-team-name">'.$consultant->first_name."  ".$consultant->last_name .'</a>
                  <div class="cbp-l-grid-team-position">'.$pro_details->job_title.'</div>
                </li> ';               
          	  
		  
		   }
		   
		   }
		   ?>          
                

              </ul>
            </div>
          </div>
        </div>
      </div>

    <br><br>
    
    </section>
    <!-- /Section: team -->


    
    




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
