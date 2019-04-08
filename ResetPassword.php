<?php
$server_name = "localhost";
$server_username = "root";
$server_password = "";
$database_name = "squealsystem";

$password = $_POST["passwordPost"];
$email = $_POST["emailPost"];

// Create connection
$conn = new mysqli($server_name, $server_username, $server_password, $database_name);
// Check connection
if (!$conn) {
    die("Connection Failed.".mysqli_connect_error());
} 

$newPassword = "UPDATE users SET password = '".$password."' WHERE email = '".$email."'";
$newPasswordResult = mysqli_query($conn, $newPassword);

if($newPasswordResult)
{
	echo "Success";
	return;
}
else
{
	echo "Failure"
	return;
}

?>