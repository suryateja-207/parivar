<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
$ngoid=$_SESSION['SESS_MEMBER_ID'];

//$dt = $_POST['date1'];
//$t = $_POST['time'];
$v = $_POST['venue'];
//$c = $_POST['contact'];
$d = $_POST['details'];
//date_default_timezone_set('Asia/Kolkata');
$dt = $_POST['date1'];
$t = $_POST['time'];


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

  
	//checks if email already exists
	
	
	$insertQuery = "insert into event (details,venue,time,date1,ngoid) values ('".$d."','".$v."', '".$t."', '".$dt."', '".$ngoid."')";
	echo "hello";
	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
	$result = mysqli_query($conn,$insertQuery);
		//echo $result;
		if (!$result)
		{
			//echo "'$v','$e','$d','$c',Error: ";
		}
		else{
					
					$_SESSION['ngo_postevent']=true;
		}
		
		header("location: ../list of all events-NGO.php");
	
	
?>