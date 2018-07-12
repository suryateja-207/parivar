<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
$donorid=$_SESSION['SESS_MEMBER_ID'];
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
$t = date("h:i:s");


$i = $_POST['item'];
$p = $_POST['pin'];
$q = $_POST['quantity'];
$a = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['details'];


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

  if(!empty($_POST['quantity']) && isset($_POST['quantity'])) {
	//checks if email already exists
	
	
	$insertQuery = "insert into donation_post (pincode,category,quantity,details,address,contact,time,date1,donorid) values ('".$p."','".$i."','".$q."','".$d."', '".$a."', '".$c."', '".$t."', '".$dt."', '".$donorid."')";
	
	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
	$result = mysqli_query($conn,$insertQuery);
		//echo $result;
		if (!$result)
		{
			echo "'$q','$e','$d','$a',Error: ";
		}
		else{
					
					$_SESSION['donor_post']=true;
		}
		header("location: ../list of all posts.php");
	}
?>