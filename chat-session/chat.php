<?php
$db_username = 'root';
$db_password = '';
$db_name = 'chat';
$db_host = '127.0.0.1';
$con = new mysqli($db_host, $db_username, $db_password, $db_name);
?>       
                   
 <?php
		$query = "SELECT * FROM chat ORDER BY id";
	    $run = $con->query($query);

	    while($row = $run->fetch_array()) :  ?>
                   
                   
			<div id="chat_data">
			
			<span style="color:green;"><?php echo $row['name']; ?> : </span> 
			<span style="color:brown;"><?php echo $row['msg']; ?></span>
			<span style="float:right;"><?php echo $row['date']; ?></span>
			
			</div>
         
          <?php endwhile; ?>	