<nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#activity"  class="sel" >All My Booking</a></li>
          <li><a href="#friends">Active Sessions</a></li>
          <li><a href="#bio">My Bio Details</a></li>
          <li><a href="#settings">Settings</a></li>
        </ul>
</nav>     

                  
    <section id="activity" >
       
       <p><strong>All My Booking and Sessions:</strong></p>
       
       
<table class="table table-bordered table-striped table-hover sortable" >
<tr><th>Booking No.</th><th>Counsellor Name</th><th>Session Booked</th><th>Booking Date</th>

<th>Option 1</th>
<th>Option 2</th>

</tr>

 <?php
 
  	$query = $mysqli->query("SELECT * FROM phpmyreservation_reservations WHERE reservation_user_id = '{$_SESSION['ses_member_id']}' AND reservation_status !='0'  ORDER BY reservation_made_time DESC ")or die('error'); 

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
	 
	 
	 $member_detail_tb = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account WHERE member_id = '{$reservation->reservation_counsellor_id}' ");
      $member_detail = $member_detail_tb->fetch_object();
	 
	 
	 
	
echo <<< EOT
		
		<tr class="activity" > 
		<td> $reservation->reservation_id </td>
		
		<td> <a href="/CounsellingSystem/booking/book-me.php?id={$reservation->reservation_counsellor_id}" > $member_detail->first_name  $member_detail->last_name</a>  </td>
		
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
		req.open('GET', 'profile-student-active.php', true);
		req.send(); 
	}
	
	setInterval(function(){chat_ajax()}, 1500)
	
	//chat_ajax();
	
     </script> 
        
        
        <div id="active_session">                    
                    	  
           
            </div>
        
        
      </section>
                      
           
  
      <section id="bio"  class="hidden">
              
        <table style="font: 14px;" >
		<tr><td> <p>  First Name: &nbsp;&nbsp;&nbsp;</p> 
       </td>  <td> 
       
        <p>
		   <input class="input100 form-control" type="text" name="username" placeholder="First Name" value="<?php echo $user->first_name; ?>" >
        </p>
        
        
       </td></tr>
       
       
	   <tr><td> <p>Last Name:</p></td>  <td> <p>
      <input class="input100 form-control" type="text" name="username" placeholder="Last Name" value="<?php echo $user->last_name; ?>" >
      
       </p> </td></tr>
       
	   <tr><td> <p>Email:</p></td>  <td> <p>
       <input class="input100 form-control" type="text" name="username" placeholder="Email" value="<?php echo $user->email; ?>" >
	   
       
       </p> </td></tr>
        
		<tr><td> <p>Level:</p></td>  <td> 
      
      <p>
      	   
	   <?php echo "Student"; ?>
	   
	   </p>
         
          </td></tr>
        
		</table>                   
        
     </section>   
           
           
           
           
      
      
      <section id="settings"  class="hidden" >
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> <?php echo $user->email; ?></p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <?php /*?><p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p><?php */?>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      </section>
           