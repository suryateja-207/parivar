<?php

include '../connect.php';




$n = $_POST['uname'];
$e = $_POST['email'];
$d = $_POST['message'];
$sub = $_POST['subject'];


  if(!empty($_POST['email']) && isset($_POST['email'])) {
	//checks if email already exists
	
	
	$insertQuery = "insert into complaint (email,name,subject,details) values ('".$e."','".$n."','".$sub."','".$d."')";
	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
	$result = mysql_query($insertQuery);
		echo $result;
		if($result)
		{
		 $_SESSION['complaint_ngo'] =true;
		 //echo "<script type='text/javascript'>alert('complaint was  posted successfully')</script>";
		}
		if (!$result)
		{
			echo "'$f','$e','$m','$p',Error: ";
		}
		
		
		header("location: ../ngo_Wall.php");
	}

?>