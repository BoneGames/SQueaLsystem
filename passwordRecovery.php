<?php
	$server_name = "localhost";
	$server_username = "root";
	$server_password = "";
	$database_name = "squealsystem";
	
	$email = $_POST["emailPost"];
	
	// Make Connection
	$conn = new mysqli($server_name, $server_username, $server_password, $database_name);
	// Check Connection
	if(!$conn)
	{
		die("Connection Failed.".mysqli_connect_error());
	}
	
	$finduser = "SELECT email FROM users";
	$finduserresult = mysqli_query($conn, $finduser);
	
	// If there are more than 0 rows
	if(mysqli_num_rows($finduserresult) > 0)
	{
		// 
		while($row = mysqli_fetch_assoc($finduserresult))
		{
			// if the row 'email' contains the $email entered by supposed user.
			if($row['email'] == $email)
			{
				echo "email";
				return;
			}
			
		}
		echo "failure";

	}
?>