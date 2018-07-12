
<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
$ngo_id=$_SESSION['SESS_MEMBER_ID'];
$d = $_POST['details'];
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
$t = date("h:i:s");
$c = $_POST['category'];
 $insertQuery = "insert into ngo_post (details,category,time,date1,ngo_id) values ('".$d."','".$c."', '".$t."', '".$dt."', '".$ngo_id."')";
	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
	$result = mysqli_query($conn,$insertQuery);
	 echo "hello";
		if (!$result)
		{
			//echo "'$v','$e','$d','$c',Error: ";
		}
		
		else{
					
					$_SESSION['ngo_generalpost']=true;
		}
		header("location: ../list of all events-NGO.php");
	
?>