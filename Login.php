<?php
	$servername = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbname = "SQueaLsystem";
	
	$username = $_POST["usernamePost"]; // waiting for username to be sent
	$password = $_POST["passwordPost"];
	
	// make connection
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	//check connection
	if(!$conn)
	{
		die("Connection Failed.".mysql_connect_error());
	}
	
	$checkaccount = "SELECT password FROM users WHERE username = '".$username."'";
	$checkaccountresult = mysqli_query($conn, $checkaccount);

	
	// check username exists
	while($row = mysqli_fetch_assoc($checkaccountresult))
	{
		// check passwords match
		if($row['password'] == $password)
		{
			echo "Login Successful";
			return;
		}
		else
		{
			echo "Incorrect password";
			return;
		}
	}
	echo "Username does not exist";
?>