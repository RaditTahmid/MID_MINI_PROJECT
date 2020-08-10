<?php
	session_start();
	
	if(isset($_POST['submit']))
	{

		$id 		= $_POST['id'];
		$password 	= $_POST['password'];

		if(empty($id) || empty($password))
		{
			echo "You can't leave any fields empty !";
		}
		else
		{
			
			$mysqlConnection = mysqli_connect ('localhost:5555', 'root', '', 'webtech');
			$query = "select * from users where userId='".$id."' and password='".$password."'";
			
			$sqlConnectionString = mysqli_query($mysqlConnection, $query);
			$countDbRows = mysqli_fetch_assoc($sqlConnectionString);

			if(count($countDbRows) > 0)
			{
				$_SESSION['status'] = "OK";
				header('location: publicHome.php');
			}
			else
			{
				header('location: login.php?msg=IncorrectUserIdPasswordCombination');
			}
		}	

	}
	else
	{
		header('location: login.php');
	}




?>