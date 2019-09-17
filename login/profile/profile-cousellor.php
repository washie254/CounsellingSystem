  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/froala_editor.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/froala_style.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/plugins/code_view.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/plugins/image_manager.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/plugins/image.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/plugins/table.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/plugins/video.css">
  <link rel="stylesheet" href="/CounsellingSystem/input-editor/css/codemirror.min.css">  
      
      
       
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#activity"  class="sel" >All Booking</a></li>
          <li><a href="#friends">Active Sessions</a></li>
          <li><a href="#bio">My Bio Details</a></li>
          <li><a href="#settings">Settings</a></li>
        </ul>
       </nav>  
       
         

     
 
     
<section id="activity" > 
 
<p><strong>All My Booking and Sessions:</strong></p>
                   
<table class="table table-bordered table-striped table-hover sortable" >
<tr><th>Booking No.</th><th>Student Name</th><th>Session Booked</th><th>Booking Date</th>

<th>Option 1</th>
<th>Option 2</th>

</tr>

 <?php
 
  	$query = $mysqli->query("SELECT * FROM phpmyreservation_reservations WHERE reservation_counsellor_id = '{$_SESSION['ses_member_id']}' AND reservation_status !='0'  ORDER BY reservation_made_time DESC ")or die('error'); 

	while($reservation = $query->fetch_object())
	{
	
	 $day = $reservation->reservation_year."W".$reservation->reservation_week.$reservation->reservation_day;	 
	 //$date1 = date("Y-m-d", strtotime($reservation->reservation_year."W".$reservation->reservation_week));
	 //$date2  = date("Y-m-d", strtotime($day) );
	 
	 $date_booked = date("d-m-Y", strtotime($day) );
	
	 $day = $reservation->reservation_year."W".$reservation->reservation_week.$reservation->reservation_day;	 
	 $date1 = date("Y-m-d", strtotime($reservation->reservation_year."W".$reservation->reservation_week));
	 $date2  = date("Y-m-d", strtotime($day) );
	 
	 $date_booked = date("d-m-Y", strtotime($day) ) .' &nbsp;  at:  '. $reservation->reservation_time ; 
	 
	 $date_session = strftime("%d/%m/%Y  %H:%M %p", strtotime($reservation->reservation_made_time) );	 
	 
	 $member_detail_tb = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account WHERE member_id = '{$reservation->reservation_user_id}' ");
      $member_detail = $member_detail_tb->fetch_object();
	 
		
echo <<< EOT
		
		<tr class="activity" > 
		<td> $reservation->reservation_id </td>
		
		<td> <a href="#" > $member_detail->first_name  $member_detail->last_name</a>  </td>
		
		<td> $date_booked  </td>
		
		<td> $date_session </td>
		
		
		<td>
		
EOT;


if($reservation->reservation_status == '1'){

         echo  '<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-warning btn-sm">Cancelled by Student</button>';
		  
} 

else if($reservation->reservation_status == '2') {

         echo  '<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-warning btn-sm">Cancelled By Counsellor</button>';

}

else if($reservation->reservation_status == '3') {


/*$session_detail_tb = $mysqli->query("SELECT session_id, reservation_id  FROM chat_session WHERE reservation_id = '{$reservation->reservation_id}' ");
$session_detail = $session_detail_tb->fetch_object();*/


echo  '
<a href="/CounsellingSystem/chat-session/session-chat.php?id='.$reservation->reservation_id.'">
<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-success btn-sm">Continue Session</button>
</a>';

}

else if($reservation->reservation_status == '4') {

echo  '<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400; background-color: #6c757d;" type="button" class="btn btn-warning btn-sm">Session Ended</button>';

}

else if($reservation->reservation_status == '') {

echo  '<a href="/CounsellingSystem/chat-session/start_chat.php?id='.$reservation->reservation_id.'">
<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-primary btn-sm">Start Session</button></a>';

}
			
	
	
echo  "</td>
		
		
		
		
	 <td>";
	 
	 
	 if($reservation->reservation_status == '1'){

         /*echo  '<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-warning btn-sm">Cancelled by Student</button>';*/
		  
} 

else if($reservation->reservation_status == '2') {

         /*echo  '<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-warning btn-sm">Cancelled By Counsellor</button>';*/

}


else if($reservation->reservation_status == '3') {

/*$session_detail_tb = $mysqli->query("SELECT session_id, reservation_id  FROM chat_session WHERE reservation_id = '{$reservation->reservation_id}' ");
$session_detail = $session_detail_tb->fetch_object();*/

echo  '
<a href="/CounsellingSystem/chat-session/end_chat.php?id='.$reservation->reservation_id.'">
<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-success btn-sm">End Session</button>
</a>';

}

else if($reservation->reservation_status == '4') {

echo  '
<a href="/CounsellingSystem/chat-session/view-chat.php?id='.$reservation->reservation_id.'">
<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400; background-color: #6c757d;" type="button" class="btn btn-warning btn-sm">View Session</button> </a>';

}


else if($reservation->reservation_status == '') {

echo  '<a href="/CounsellingSystem/chat-session/cancel_booking.php?id='.$reservation->reservation_id.'">
<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400;" type="button" class="btn btn-warning btn-sm">Cancel Booking</button></a>';

}
	
 echo "</td>
		
 </tr> ";
		
 }
	
	?>
            
</table> 
                     
</section>                                                             
                                                     
                    
      
      <section id="friends" class="hidden">
       
        <p><strong>Session Which are Open for Counselling</strong></p>       
    
                
                                        
   <script>
	function chat_ajax(){
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200){
				document.getElementById('active_session').innerHTML = req.responseText;
			}
		}
		req.open('GET', 'profile-counsellor-active.php', true);
		req.send(); 
	}
	
	setInterval(function(){chat_ajax()}, 1500)
	
	//chat_ajax();
	
     </script> 
        
        
    <div id="active_session">                    
                    	  
           
     </div>
        
        
      </section>
          
      
      <section id="bio" class="hidden" >
              
        <table style="font: 14px;" >
		<tr><td> <p>  First Name: &nbsp;&nbsp;&nbsp;</p> 
       </td>  <td> 
       
        <p>
			<input class="input100 form-control" type="text" name="username" placeholder="First Name" value="<?php echo $user->first_name; ?>" >
        </p>
        
        
       </td>  </tr>
       
       
	   <tr><td> <p>Last Name:</p></td>  <td> <p>
      <input class="input100 form-control" type="text" name="username" placeholder="Last Name" value="<?php echo $user->last_name; ?>" >
      
       </p> </td>  </tr>
       
	   <tr><td> <p>Email:</p></td>  <td> <p>
       <input class="input100 form-control" type="text" name="username" placeholder="Email" value="<?php echo $user->email; ?>" >
	   
       
       </p> </td>  </tr>
        
		<tr><td> <p>Level:</p></td>  <td> 
      
      <p>
      
       <?php echo "Counsellor"; ?>
       
	   </p>
         
          </td>  </tr>
        
		</table>
              
           
              
      <p>
	  <h5>Professional Details</h5>   
      </p>       
   
   
   <?php  
   
   $pro_details_tb = $mysqli->query("SELECT * FROM counsellors_professional_details WHERE member_id = '{$user->member_id}' ");
   
   $pro_details = $pro_details_tb->fetch_object();   
   
   if($pro_details->job_title =="" || $pro_details->brief_introduction =="" || $pro_details->detailed_description ==""  ) {
  
   echo " <p style=\"color: #00f;\">
   If Professional Details are not completed your profile will not be viewed by other users.
   </p>
   ";   
   
   }
   
   ?>

    <form class="login100-form validate-form" action="update_counsellor_profile_handler.php" method="post" >
       
       <input type="hidden" name="member_id" value="<?php echo $user->member_id; ?>" > 
       
        <table style="font: 14px; width: 80%;" >
		<tr><td style="width: 20%;"> <p>  Job Title: &nbsp;&nbsp;&nbsp;</p> 
       </td>  <td> 
       
        <p>
	<input class="input100 form-control " type="text" name="job_title" placeholder="Job title" value="<?php echo $pro_details->job_title; ?>" required >
       
      </p>
        
        
       </td>  </tr>
       
       
	   <tr><td> <p>Institution:</p></td>  <td> <p>
      
   <select  class="form-control" name="institution" id="institution" required>
    <option value="1" <?php if($pro_details->institution =="1" ){ /*echo "selected"; */ }  ?>   >Dedan Kimathi University</option>
  </select>	
      
       </p> </td>  </tr>
       
	   <tr><td> <p>Gender:</p></td>  <td> <p>
       
  <select  class="form-control" name="gender" id="gender" required>
    <option value="0" selected >Select Gender</option>
    <option value="1" <?php if($pro_details->gender =="1" ){ echo "selected"; } ?> >Male</option>
    <option  value="2" <?php if($pro_details->gender =="2" ){ echo "selected"; } ?> >Female</option>
  </select>	   
       
       </p> </td>  </tr>
       
     
    <tr><td> <p>Service:</p></td>  <td> 
      
  <p>
       
  <select  class="form-control" name="service_name" id="service_name" required>
   <option value="" >Select Service Offered</option>
    
      <?php 
		 $services_tb = $mysqli->query("SELECT * FROM counselling_services ORDER BY service_name ");
		 while($service = $services_tb->fetch_object()){
			echo '<option  value="'.$service->service_id.'" ';
			if($pro_details->service_offered == $service->service_id){
				echo "selected";
			}	
			echo '>'.$service->service_name.'</option>'; 
		 }
		?>
        
  </select>	   
       
     </p>  </td>  </tr> 
          
  
    
    <tr><td> <p>Qualification:</p></td>  <td> <p>
       
  <select  class="form-control" name="qualification" id="qualification" required>
   <option value="" >Select Qualification</option>
    
      <?php 
		 $qualifications_tb = $mysqli->query("SELECT * FROM counselling_qualifications ORDER BY qualification_name ");
		 while($qualification = $qualifications_tb->fetch_object()){
			echo '<option  value="'.$qualification->qualification_id.'" ';
			if($pro_details->qualification == $qualification->qualification_id){
				echo "selected";
			}	
			echo '>'.$qualification->qualification_name.'</option>'; 
		 }
		?>
        
  </select>	   
       
       </p> </td>  </tr>                        
           
   
   
    <tr><td> <p><strong>Brief Introduction:</strong></p></td>  <td> <p>
       
  <textarea class="form-control" rows="4" name="brief_description" id="brief_description" maxlength="500" required><?php echo $pro_details->brief_introduction; ?></textarea> 
       
       </p> </td>  </tr>      
               


      <tr><td> <p><strong>Detailed Description:</strong></p></td>  <td > <p>
       
		<?php /*?>  <textarea class="form-control" rows="10" name="detailed_description" id="detailed_description" maxlength="3000" required><?php echo $pro_details->detailed_description; ?></textarea> <?php */?>
      
      
      
      <textarea id="edit" class="form-control" style="margin-top: 30px; min-height: 100px;" rows="10"  name="detailed_description" placeholder="Type some text"  ><?php echo $pro_details->detailed_description; ?></textarea>
      
       
       </p> </td>  </tr>  
       
            
     <tr>
     
	 <td></td>
     
    <td>   
    <button type="submit" name="save_professional_details" value="Save Professional Details" id="save_professional_details" class="btn btn-primary">Save Professional Details</button>
    
	</td>
	                    
	</tr>  
     
    
             
        
     </table>     
             
            
              
     </form>                 
               
        
      </section>
      
      
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> <?php echo $user->email; ?></p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <?php /*?><p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p><?php */?>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      </section>
      
      
        <?php /*?><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><?php */?>
        
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/codemirror.min.js"></script>
  
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/xml.min.js"></script>
  
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="/CounsellingSystem/input-editor/js/plugins/entities.min.js"></script>


  <script>
      $(function(){
        $('#edit')
          .on('froalaEditor.initialized', function (e, editor) {
            $('#edit').parents('form').on('submit', function () {
              console.log($('#edit').val());
              //return false;
            })
          })
          .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
      });
  </script>
      
      
      
      
      
      
      
      
      
      


                 
                  
                                              
           