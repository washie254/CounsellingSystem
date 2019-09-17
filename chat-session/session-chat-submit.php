<?php session_start();

require_once("../db_connections/db_connector.php");   
	if(isset($_POST['submit'])){
		$reservation_id = $_POST['reservation_id'];
		$chat_message = $_POST['chat_message'];

		$query = "INSERT INTO chat_session (reservation_id, user_id, message, date) VALUES ('$reservation_id', '{$_SESSION['ses_member_id']}', '$chat_message', NOW() )";
		$mysqli->query($query);
		
	 header("Location: session-chat.php?id={$reservation_id}#scroll_submit_form");
	 exit;
	}  
?>

