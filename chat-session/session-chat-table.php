<?php session_start();
require_once("../db_connections/db_connector.php");
?>    
                  
                     
  
 <div class="panel-body">
   <ul class="chat">

                                      
 <?php
 					
		$query = $mysqli->query("SELECT * FROM chat_session WHERE  reservation_id = '{$_SESSION['reservation_id']}' 
		ORDER BY date ASC");
	    //$run = $mysqli->query($query);
					
	   while($chat = $query->fetch_object()) {	   
	   
	   
	   $date_session = strftime("%d/%m/%Y  %H:%M %p", strtotime($chat->date) );
	   
	   $member_detail_tb = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account WHERE member_id = '{$chat->user_id}' ");
      $member_detail = $member_detail_tb->fetch_object();
           
	       
       if($chat->user_id != $_SESSION['ses_member_id'] ){
	   
			echo '<li class="left clearfix"><span class="chat-img pull-left">
			  <img src="fff&text=QC.png" alt="User Avatar" class="img-circle" />
					</span>
						<div class="chat-body clearfix">
							<div class="header">
								<strong class="primary-font">'.$member_detail->first_name.'  '.$member_detail->last_name.'</strong> <small class="pull-right text-muted">
									<span class="glyphicon glyphicon-time"></span>'.$date_session.'</small>
							</div>
							
						<p>'.$chat->message.'</p>
						</div>
			</li>';
	   
       
        }	else{
				
			echo '<li class="right clearfix"><span class="chat-img pull-right">
					<img src="fff&text=ME.png" alt="User Avatar" class="img-circle" />
				</span>
					<div class="chat-body clearfix">
						<div class="header">
							<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$date_session.'</small>
							<strong class="pull-right primary-font">'.$member_detail->first_name.'  '.$member_detail->last_name.'</strong>
						</div>
						<p>'.$chat->message.'</p>
					</div>
				</li>';		
		}   
                   
			
        
        
         
        }   ?>	
          
  </ul>
  </div>            
      

		 
<style type="text/css" >
			 
			 
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    XXXoverflow-y: scroll;
    height: 100px;
	margin-bottom: 100px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
			 

</style>