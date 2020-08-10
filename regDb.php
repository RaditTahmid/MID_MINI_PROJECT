<?php
	
	session_start();
	
	if(isset($_POST['submit'])){

		$id 		        = $_POST['id'];
		$password 			= $_POST['password'];
		$confirmPassword 	= $_POST['confirmPassword'];
		$name           	= $_POST['name'];
		$email   	 		= $_POST['email'];
		$type   	 		= $_POST['type'];

		if(empty($id) || empty($password) || empty($confirnPassword)|| empty($name)|| empty($email))
		{
			echo "You must enter credentials";
		}
		else
		{
			
			$mysqlConnection = mysqli_connect ('localhost:5555', 'root', '', 'webtech');
			$query = "insert into users values id='".$id."',password='".$password."', confirmPassword='".$confirmPassword."', name='".$name."', email='".$email."', type='".$type."' ";
			$sqlConnectionString = mysqli_query($mysqlConnection, $query);
			header('location: login.php');
		}	

	}
	else
	{
		header('location: login.php');
	}




?>