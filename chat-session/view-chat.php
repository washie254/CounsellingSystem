<?php session_start();
require_once("../db_connections/db_connector.php");

if( isset($_GET['id']) ) {
$reservation_id = $_GET["id"];
$_SESSION['reservation_id'] = $_GET["id"];
}else{
header("Location: /CounsellingSystem/login/profile/profile.php");
}

$page_title = "Counselling Session"; 

?>



<?php include("../header_links.php"); ?> 

  <link rel="stylesheet" href="style.css" media="all" />
        
        
   <script>
	function chat_ajax(){
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200){
				document.getElementById('chat_box').innerHTML = req.responseText;
			}
		}
		req.open('GET', 'session-chat-table.php', true);
		req.send(); 
	}
	
	setInterval(function(){chat_ajax()}, 1500)
	
	//chat_ajax();
	
     </script>
 
<?php include("../header_menu.php"); ?> 
       
   <div style="margin-bottom: 120px;" > </div>
           
        <div id="container">
           
		 <div>
		 		 
		<a href="#">
		<button style="letter-spacing: 1px; line-height: 1; text-transform: capitalize; font-size: 12px; font-weight: 400; float: right; background-color: #6c757d;" type="button" class="btn btn-success btn-sm">Closed Session</button>
		</a>

        
        <?php 
		 
		 $query = $mysqli->query("SELECT reservation_counsellor_id, reservation_user_id FROM phpmyreservation_reservations WHERE reservation_id = '{$reservation_id}'  ")or die('error'); 

	     $reservation = $query->fetch_object();
		 		 
		 $member_detail_tb = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account WHERE member_id = '{$reservation->reservation_counsellor_id}' ");
         $member_detail = $member_detail_tb->fetch_object();
		 
		 $member_detail_tb2 = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account WHERE member_id = '{$reservation->reservation_user_id}' ");
         $member_detail2 = $member_detail_tb2->fetch_object();
		 	  
		 ?>
                    
           
       <h6>Counselling Session: <strong><?php echo $member_detail->first_name." ".$member_detail->last_name ?></strong>
      
	  To: <strong><?php echo $member_detail2->first_name." ".$member_detail2->last_name ?></strong>
                       
     ,    Booking ID: <strong><?php echo $reservation_id; ?></strong>  </h6>                       
                        
                       
        </div>
              
              
           
            <div id="chat_box">                    
                    
	  
           
            </div>
            
           
            
<?php /*?>       <div >
          <form  method="post" action="session-chat-submit.php" >
               
                <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>" />
                
                <textarea style="padding-top: 10px;" class="form-control" name="chat_message" placeholder="Enter Message"></textarea>
                
                <br />
                
                <input class="btn btn-success" type="submit" name="submit" value="Send" />
            </form>  
            
            <br /><br /><br /><br /><br /><br />
            
			</div> <?php */?>                  
            
            
        </div>
        <br />

<input type="hidden" name="scroll_submit_form" id="scroll_submit_form" />

	<?php include("../footer.php"); ?> 
