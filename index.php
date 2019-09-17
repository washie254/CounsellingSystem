<?php session_start();

require_once("db_connections/db_connector.php");

$page_title = "Online Student Counselling System"; ?> 


<?php include("header_links.php");
      include("header_menu.php");
 ?> 
      
      
    <!-- Section: intro -->
    <section id="intro" class="intro">     
      <div class="intro-content">
        <div class="container">
          <div class="row">
          
          <div class="text-center">
           <h4 class="h-light">Get Caring, Improve Your Life</h4>
           </div>
           
            <div class="col-lg-6">
             
             
              <!--<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra">Online Student Counselling System</h2>
              </div>-->
              
              
              <div class="wow fadeInUpXX" data-wow-offset="0" data-wow-delay="0.1s">
                <h4 class="h-light text-center">Online Counselling Service</h4>
              </div>
              <div class="well well-trans">
                <div class="wow fadeInRightXX" data-wow-delay="0.1s">

                  <ul class="lead-list">
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Access our online counselling service immediately</strong><br />
                    Effective support when you need it, without the travel</span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your favourite doctor</strong><br />We've got a group of qualified counsellors with experience.</span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Only use friendly environment</strong><br />Find a quiet space and get comfortable. </span></li>
                  </ul>
                  <p class="text-right wow bounceInXX" data-wow-delay="0.4s">
                    <a href="/CounsellingSystem/list-provider.php" class="btn btn-skin btn-lg">Start Counselling <i class="fa fa-angle-right"></i></a>
                  </p>
                </div>
              </div>


            </div>
            
            
            
            <!--<div class="col-lg-6">
              <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <img src="img/dummy/img-1.png" class="img-responsive" alt="" />
              </div>-->
              
              
              
              
              <div class="col-lg-6">
              
              
              <!--<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra">Online Student Counselling System</h2>
              </div>-->
              
              
              <div class="wow fadeInUpXX" data-wow-offset="0" data-wow-delay="0.1s">
                <h4 class="h-light text-center">What You Will Get </h4>
              </div>
              <div class="well well-trans">
                <div class="wow fadeInRightXX" data-wow-delay="0.1s">

                  <ul class="lead-list">
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Your Perfect Counsellor</strong><br />
                    You'll find an excellent choice of online counsellors. </span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Qualifications & Accountability</strong><br />Our counsellors have been screened to ensure they are qualified.</span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Real Privacy</strong><br />Your secure data will never be shared with 3rd party systems.</span></li>
                  </ul>
                  <p class="text-right wow bounceInXX" data-wow-delay="0.4s">
                    <a href="#" class="btn btn-skin btn-lg">Learn more <i class="fa fa-angle-right"></i></a>
                  </p>
                </div>
              </div>


            </div>
              
                           
                            
              
              
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

      <div class="container">
        <div class="row">
         
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUpXX" data-wow-delay="X0.2s">
              <div class="box text-center">

                <i class="fa fa-check fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Choose Your Counsellor</h4>
                <p>
                  We've got a fantastic group of qualified counsellors and psychologists with experience across all areas of mental health.
                </p>
              </div>
            </div>
          </div>
          
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUpXX" data-wow-delay="X0.2s">
              <div class="box text-center">

                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Book Your Appointment</h4>
                <p>
                  Just click your chosen provider's calendar to book your appointment.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUpxx" data-wow-delay="0.2s">
              <div class="box text-center">
                <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Get Help By Counsellor</h4>
                <p>
                  We'll send you a link to your secure online counselling session. Just click on the link to get started. 
                  
                  
                  <?php /*?><a id="service" href="" ></a>
                  <section id="service"></section><?php */?>
                  
                  <a id="service" href="" ></a>
                  
                </p>
              </div>
            </div>
          </div>
          
         
        </div>      
        
      </div>
      
	  

    </section>


    <!-- Section: services -->
    <section id="serviceXX" class="home-section nopadding paddingtop-60">

      <div class="container">

        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="wow fadeInUpXX" data-wow-delay="0.2s">
              <img src="img/dummy/img-1.jpg" class="img-responsive" alt="" />
            </div>
          </div>
          
          
          <div class="col-sm-4 col-md-4">

            <div class="wow fadeInRightXX" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-stethoscope fa-3x"></span>
                </div>
                <div class="service-desc">
				<h5 class="h-light"><a href="">Anxiety Counselling</a></h5>
                  <p>Let us help you move past the anxiety that is preventing you from living life to the fullest.</p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRightXX" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-wheelchair fa-3x"></span>
                </div>
                <div class="service-desc">
				<h5 class="h-light"><a href="">Depression Counselling</a></h5>
                  <p>Leave the heaviness of depression behind you with the right strategies and a caring counsellor.</p>
                </div>
              </div>
            </div>
            <div class="wow fadeInRightXX" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-plus-square fa-3x"></span>
                </div>
                <div class="service-desc">
				<h5 class="h-light"><a href="">Effective Relationship</a></h5>
                  <p>Open the lines of communication as a couple and take steps to improve your daily life.</p>
                </div>
              </div>
            </div>


          </div>
          <div class="col-sm-4 col-md-4">

            <div class="wow fadeInRightXX" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-h-square fa-3x"></span>
                </div>
                <div class="service-desc">
				<h5 class="h-light"><a href="">Anger Management</a></h5>
                  <p>Discover your peaceful nature and leave the anger where it belongs.</p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRightXX" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-filter fa-3x"></span>
                </div>
                <div class="service-desc">
				<h5 class="h-light"><a href="">Grief Counselling</a></h5>
                  <p>Losing a loved one is a pain that can't be described. Let us help you find the peace you deserve.</p>
                  
                  
                  
                </div>
              </div>
            </div>
            <div class="wow fadeInRightXX" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-user-md fa-3x"></span>
                </div>
                
                <div class="service-desc">
                
                
                
				<h5 class="h-light"><a href="">Addiction Therapy</a></h5>
                 
                 <a id="counsellor" href="" ></a>
                 
                  <p>Effective strategies & therapies to help you change your circumstances and achieve your goals.</p>
                  
                  
                  
                  
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
    <!-- /Section: services -->


    <!-- Section: team -->
    <section id="doctor" class="home-section2 bg-gray paddingbot-00">
      <div class="container marginbot-00">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDownXX" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our Featured Online Counsellors</h2>
                <p>Here is a list of frequent counsellors</p>
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
