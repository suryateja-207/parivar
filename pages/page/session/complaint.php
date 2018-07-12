<?php

include '../connect.php';

//Start session
//session_start();


$n = $_POST['uname'];
$e = $_POST['email'];
$d = $_POST['message'];
$sub = $_POST['subject'];


//echo 'hello  '.$e.' '.$f.' '.$m.' '.$p.' '.$pin.' ';


	//stores photo of donor 
	/*if ($_FILES["image"]["error"] > 0)
	{
		$filePath = "img/logos/default_donor.jpeg";
	}

	else
	{
		$randomName = substr(sha1(rand()), 0, 10);
		$filePath = "img/logos/_".$randomName."_".$_FILES["image"]["name"];
	  
		if(!move_uploaded_file($_FILES["image"]["tmp_name"],"../".$filePath))
		{
			$filePath = "img/logos/default_donor.jpeg";
		}
	}*/

  if(!empty($_POST['email']) && isset($_POST['email'])) {
	//checks if email already exists
	
	
	$insertQuery = "insert into complaint (email,name,subject,details) values ('".$e."','".$n."','".$sub."','".$d."')";
	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
	$result = mysql_query($insertQuery);
		echo $result;
		if($result)
		{
		 $_SESSION['complaint_donor'] =true;
		 //echo "<script type='text/javascript'>alert('complaint was  posted successfully')</script>";
		}
		if (!$result)
		{
			echo "'$f','$e','$m','$p',Error: ";
		}
		
		
		header("location: ../donor_Wall.php");
	}

?>