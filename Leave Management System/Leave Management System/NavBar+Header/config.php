<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "leave system";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
