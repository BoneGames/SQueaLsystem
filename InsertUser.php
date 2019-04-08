<?php
	$server_name = "localhost";
	$server_username = "root";
	$server_password = "";
	$database_name = "squealsystem";
	
	$username = $_POST["usernamePost"];
	$password = $_POST["passwordPost"];
	$email = $_POST["emailPost"];
	
	// Make Connection
	$conn = new mysqli($server_name, $server_username, $server_password, $database_name);
	// Check Connection
	if(!$conn)
	{
		die("Connection Failed.".mysqli_connect_error());
	}
	
	$finduser = "SELECT username FROM users";
	$finduserresult = mysqli_query($conn, $finduser);
	$canmakeaccount = "";
	
	// If there are more than 0 rows with a username recorded
	if(mysqli_num_rows($finduserresult) > 0)
	{
		// 
		while($row = mysqli_fetch_assoc($finduserresult))
		{
			// if the row 'username' already contains the $username entered by prospective user.
			if($row['username'] == $username)
			{
				echo "That Username has already been taken";
				return;
			}
			else
			{
				$canmakeaccount = "Check Email";  // Goes to if statement below
			}
		}
	}
	// if there are no rows with usernames recorded
	else if (mysqli_num_rows($finduserresult) <= 0)
	{
		// Make User
		$makeuser = "INSERT INTO users(username, email, password) VALUES('".$username."', '".$email."', '".$password."')";
		$makeuserresult = mysqli_query($conn, $makeuser);
		if($makeuserresult)
		{
			echo "Success! You're the first user account to have been created!";
		} else {
			echo "cant create first user";
		}
	}

	if ($canmakeaccount == "Check Email" && mysqli_num_rows($finduserresult) > 0)
	{
		$checkemail = "SELECT email FROM users";
		$checkemailresult = mysqli_query($conn, $checkemail);
		if(mysqli_num_rows($checkemailresult) > 0)
		{
			// 
			while($row = mysqli_fetch_assoc($checkemailresult))
			{
				// if the row 'username' already contains the $username entered by prospective user.
				if($row['email'] == $email)
				{
					echo "That email address already has a registered account";
					return;
				}
			}
			$makeuser = "INSERT INTO users(username, email, password) VALUES('".$username."', '".$email."', '".$password."')";
			$makeuserresult = mysqli_query($conn, $makeuser);
			if($makeuserresult)
			{
				echo "Success! Your user account has been created.";
				return;
			} else {
				echo "Error, cant create user";
			}
		}
	} 
?>