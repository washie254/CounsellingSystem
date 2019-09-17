<?php

// Configuration

function get_configuration($data) {
	/*$query = mysqli_query("SELECT * FROM " . global_mysql_configuration_table)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');
	
	$configuration = mysql_fetch_array($query);
	return($configuration[$data]);*/	
	
	//$query = mysqli_query("SELECT * FROM " . global_mysql_configuration_table)or die('error');
	
$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}	
	
	$query = $mysqli->query("SELECT * FROM " . global_mysql_configuration_table) or die('error');
	
	$configuration = mysqli_fetch_array($query);
	return($configuration[$data]);
	
	//$configuration = $query->fetch_obect();
	//return ($configuration->$data)	
	
}















// Reservations

function highlight_day($day)
{
	$day = str_ireplace(global_day_name, '<span id="today_span">' . global_day_name . '</span>', $day);
	return $day;
}


function read_reservation($week, $day, $time, $counsellor_idx )
{

$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}

$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time' AND reservation_counsellor_id = '$counsellor_idx'  ") or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysqli->error()) . '</span>');
	$reservation = $query->fetch_object();
	
		
	return($reservation->reservation_user_name);
	
	//return("Booked");
	
	//return($reservation->reservation_user_name);
	
	//return($reservation['reservation_user_name']);

	/*$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$reservation = mysql_fetch_array($query);
	return($reservation['reservation_user_name']);*/
}


function show_reservation_student_side($week, $day, $time, $counsellor_idx)
{

$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}

$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time' AND reservation_user_id = '$counsellor_idx' AND reservation_status !='0' AND reservation_status !='1' ") or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysqli->error()) . '</span>');

if($query->num_rows > 0){
$reservation = $query->fetch_object();

//$my_return = $reservation->reservation_user_name;
//$my_return = '<b>Booked</b>';

$member_detail_tb = $mysqli->query("SELECT member_id, first_name, last_name  FROM members_details_account 
WHERE member_id = '{$reservation->reservation_counsellor_id}' ");
$member_detail = $member_detail_tb->fetch_object();

$my_return = $member_detail->first_name;


}else{
$my_return = '';
}

return($my_return);
	
	
		
	
	
	//return("Booked");
	
	//return($reservation->reservation_user_name);
	
	//return($reservation['reservation_user_name']);

	/*$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$reservation = mysql_fetch_array($query);
	return($reservation['reservation_user_name']);*/
}




function read_reservation_details($week, $day, $time, $counsellor_idx) {
	/*$query = mysql_query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$reservation = mysql_fetch_array($query);*/
	
	
$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}


$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time' AND reservation_user_id = '$counsellor_idx'    ")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysqli->error()) . '</span>');
	$reservation = $query->fetch_object();
	

	if(empty($reservation))
	{
		return(0);
		
	}
	else
	{
		/*return('<b>Reservation made:</b> ' . $reservation->reservation_made_time . '<br><b>User\'s email:</b> ' . $reservation->reservation_user_email);*/
		
		return('<b>Reservation made:</b> ' . $reservation->reservation_made_time . '<br><b></b>');
	}
}




function make_reservation($week, $day, $time, $counsellor_idx)
{


$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}


	$user_id = $_SESSION['ses_member_id'];
	$user_email = $_SESSION['ses_member_email'];
	$user_name = $_SESSION['ses_user_name'];	
	$price = global_price;
	
	
	if($user_id == $counsellor_idx ){
	return('You can\'t book yourself');
	}
	
	
	if($week == '0' && $day == '0' && $time == '0')
	{
		$mysqli->query("INSERT INTO " . global_mysql_reservations_table . " (reservation_made_time, reservation_week, reservation_day, reservation_time, reservation_price, reservation_user_id, reservation_counsellor_id, reservation_user_email, reservation_user_name) VALUES (now(),'$week','$day','$time','$price','$user_id', '{$counsellor_idx}',   '$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysql->error()) . '</span>');

		return(1);
	}
	elseif($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND reservation_counsellor_id = '$counsellor_idx' AND reservation_status != '0'  AND reservation_status != '1'   ")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysql->error()) . '</span>');

		if($query->num_rows < 1)
		{
			$year = global_year;

			$mysqli->query("INSERT INTO " . global_mysql_reservations_table . " (reservation_made_time,reservation_year,reservation_week,reservation_day,reservation_time,reservation_price,reservation_user_id, reservation_counsellor_id, reservation_user_email,reservation_user_name) VALUES (now(),'$year','$week','$day','$time','$price','$user_id', '$counsellor_idx', '$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysql->error()) . '</span>');

			return(1);
		}
		else
		{
			return('This Counsellor has already been book at this time');
		}
	}
}




function delete_reservation($week, $day, $time, $counsellor_idx)
{

$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}


    /*$user_id = $_SESSION['ses_member_id'];
	if($user_id == $counsellor_idx ){
	return('You can\'t perform this action here, You can\'t book yourself');
	}*/ 


	if($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'  AND reservation_counsellor_id = '$counsellor_idx'  ")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		$user = $query->fetch_object();
		
		if($user->reservation_status == '3'){
		 return('You can\'t remove booking which session had already been started');
		 
		 }

		else if($user->reservation_user_id == $_SESSION['ses_member_id'] || $_SESSION['user_is_admin'] == '1') 		{
			$mysqli->query("UPDATE " . global_mysql_reservations_table . " SET reservation_status = '0'  WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time' AND reservation_counsellor_id = '$counsellor_idx'   ")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

			return(1);
		}
		else
		{
			return('You can\'t remove other users\' reservations');
		}
	}
}

// Admin control panel

function list_users()
{

$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}


	$query = $mysqli->query("SELECT * FROM " . global_mysql_users_table . " ORDER BY user_is_admin DESC, user_name")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars($mysqli->error()) . '</span>');

	$users = '<table id="users_table"><tr><th>ID</th><th>Admin</th><th>Name</th><th>Email</th><th>Reminders</th><th>Usage</th><th>Cost</th><th></th></tr>';

	while($user = $query->fetch_object())
	{
		$users .= '<tr id="user_tr_' . $user->user_id . '"><td><label for="user_radio_' . $user->user_id . '">' . $user->user_id . '</label></td><td>' . $user->user_is_admin . '</td><td><label for="user_radio_' . $user->user_id . '">' . $user->user_name . '</label></td><td><label for="user_radio_' . $user->user_id . '">' . $user->user_email . '</label></td><td>' . $user->user_reservation_reminder. '</td><td>' . count_reservations($user->user_id) . '</td><td>' . cost_reservations($user->user_id) . ' ' . global_currency . '</td><td><input type="radio" name="user_radio" class="user_radio" id="user_radio_' . $user->user_id . '" value="' . $user->user_id . '"></td></tr>';
	}

	$users .= '</table>';

	return($users);
}

function reset_user_password($user_id)
{
	$password = random_password();
	$password_encrypted = encrypt_password($password);

	mysql_query("UPDATE " . global_mysql_users_table . " SET user_password='$password_encrypted' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	if($user_id == $_SESSION['user_id'])
	{
		return(0);
	}
	else
	{
		return('The password to the user with ID ' . $user_id . ' is now "' . $password . '". The user can now log in and change the password');
	}
}

function change_user_permissions($user_id)
{
	if($user_id == $_SESSION['user_id'])
	{
		return('<span class="error_span">Sorry, you can\'t use your superuser powers to remove them</span>');
	}
	else
	{
		mysql_query("UPDATE " . global_mysql_users_table . " SET user_is_admin = 1 - user_is_admin WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		return(1);
	}
}

function delete_user_data($user_id, $data)
{
	if($user_id == $_SESSION['user_id'] && $data != 'reservations')
	{
		return('<span class="error_span">Sorry, self-destructive behaviour is not accepted</span>');
	}
	else
	{
		if($data == 'reservations')
		{
			mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}
		elseif($data == 'user')
		{
			mysql_query("DELETE FROM " . global_mysql_users_table . " WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
			mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}

		return(1);
	}
}

function delete_all($data)
{
	$user_id = $_SESSION['user_id'];

	if($data == 'reservations')
	{
		mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}
	elseif($data == 'users')
	{
		mysql_query("DELETE FROM " . global_mysql_users_table . " WHERE user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		mysql_query("DELETE FROM " . global_mysql_reservations_table . " WHERE reservation_user_id!='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}
	elseif($data == 'everything')
	{
		mysql_query("DELETE FROM " . global_mysql_users_table . "")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		mysql_query("DELETE FROM " . global_mysql_reservations_table . "")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}

	return(1);
}

function save_system_configuration($price)
{
	if(validate_price($price) != true)
	{
		return('<span class="error_span">Price must be a number (use . and not , if you want to use decimals)</span>');
	}
	else
	{
		mysql_query("UPDATE " . global_mysql_configuration_table . " SET price='$price'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	}

	return(1);
}

// User control panel

function get_usage()
{
	$usage = '<table id="usage_table"><tr><th>Reservations</th><th>Cost</th><th>Current price per reservation</th></tr><tr><td>' . count_reservations($_SESSION['user_id']) . '</td><td>' . cost_reservations($_SESSION['user_id']) . ' ' . global_currency . '</td><td>' . global_price . ' ' . global_currency . '</td></tr></table>';
	return($usage);
}

function count_reservations($user_id)
{

$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}

	$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$count = $query-> num_rows;
	return($count);
}

function cost_reservations($user_id)
{


$db_username = 'root';
$db_password = '';
$db_name = 'student_online_counselling_system';
$db_host = '127.0.0.1';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
     die('Error : '.$mysqli->connect_error);
}

	$query = $mysqli->query("SELECT * FROM " . global_mysql_reservations_table . " WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	$cost = 0;

	while($reservation = $query->fetch_object())
	{
		$cost =+ $cost + $reservation->reservation_price;	
	}

	return($cost);
}

function get_reservation_reminders()
{
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT * FROM " . global_mysql_users_table . " WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
	$user = mysql_fetch_array($query);

	if($user['user_reservation_reminder'] == 1)
	{
		$return = '<input type="checkbox" id="reservation_reminders_checkbox" checked="checked">';
	}
	else
	{
		$return = '<input type="checkbox" id="reservation_reminders_checkbox">';
	}

	return($return);
}

function toggle_reservation_reminder()
{
	$user_id = $_SESSION['user_id'];
	
	
	mysql_query("UPDATE " . global_mysql_users_table . " SET user_reservation_reminder = 1 - user_reservation_reminder WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

	return(1);
}

function change_user_details($user_name, $user_email, $user_password)
{
	$user_id = $_SESSION['user_id'];

	if(validate_user_name($user_name) != true)
	{
		return('<span class="error_span">Name must be <u>letters only</u> and be <u>2 to 12 letters long</u>. If your name is longer, use a short version of your name</span>');
	}
	if(validate_user_email($user_email) != true)
	{
		return('<span class="error_span">Email must be a valid email address and be no more than 50 characters long</span>');
	}
	elseif(validate_user_password($user_password) != true && !empty($user_password))
	{
		return('<span class="error_span">Password must be at least 4 characters</span>');
	}
	elseif(user_name_exists($user_name) == true && $user_name != $_SESSION['ses_user_name'])
	{
		return('<span class="error_span">Name is already in use. If you have the same name as someone else, use another spelling that identifies you</span>');
	}
	elseif(user_email_exists($user_email) == true && $user_email != $_SESSION['ses_member_email'])
	{
		return('<span class="error_span">Email is already registered</span>');
	}
	else
	{
		if(empty($user_password))
		{
			mysql_query("UPDATE " . global_mysql_users_table . " SET user_name='$user_name', user_email='$user_email' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}
		else
		{
			$user_password = encrypt_password($user_password);

			mysql_query("UPDATE " . global_mysql_users_table . " SET user_name='$user_name', user_email='$user_email', user_password='$user_password' WHERE user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');
		}

		mysql_query("UPDATE " . global_mysql_reservations_table . " SET reservation_user_name='$user_name', reservation_user_email='$user_email' WHERE reservation_user_id='$user_id'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysql_error()) . '</span>');

		$_SESSION['ses_user_name'] = $user_name;
		$_SESSION['ses_member_email'] = $user_email;

		$user_password = strip_salt($user_password);

		setcookie(global_cookie_prefix . '_user_email', $user_email, time() + 3600 * 24 * intval(global_remember_login_days));
		setcookie(global_cookie_prefix . '_user_password', $user_password, time() + 3600 * 24 * intval(global_remember_login_days));

		return(1);
	}
}

?>
