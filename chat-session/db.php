<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'chat';
$db_host = '127.0.0.1';

/*$con = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($con->connect_error) {
     die('Error : '.$con->connect_error);
}
*/
$con = new mysqli($db_host, $db_username, $db_password, $db_name);





?>