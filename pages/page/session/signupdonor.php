<?php

//include '../connect.php';
$server = "localhost";
$user = "root";
$pass = "";	
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);

//Start session
session_start();


$name=$_POST['name'];
$usern=$_POST['uname'];
$pass=sha1($_POST['password']);
$em=$_POST['email'];
$ad=$_POST['address'];
$pcode=$_POST['pincode'];
$con=$_POST['mobile'];

//echo 'hello  '.$e.' '.$f.' '.$m.' '.$p.' '.$pin.' ';


	//stores photo of donor 
	/*if ($_FILES["image"]["error"] > 0)
	{
		$filePath = "img/logos/default_donor.jpeg";
	}

	else
	{
		$randomName = substr(sha1(rand()), 0, 10);
		$filePath = "img
		
		
		
		
		
		
		
		
		/logos/_".$randomName."_".$_FILES["image"]["name"];
	  
		if(!move_uploaded_file($_FILES["image"]["tmp_name"],"../".$filePath))
		{
			$filePath = "img/logos/default_donor.jpeg";
		}
	}*/
   $checkEmail = mysqli_query($conn,"SELECT * FROM general_user WHERE email = '$em'");
   //echo "hello";
   if(mysqli_num_rows($checkEmail)>0){
	$_SESSION['UNREGDONOR_EMAIL_EXISTS_ERRMSG_ARR'] = true;
	echo "jaffa";
	Header("location: ../index.php");
}


 else
{
	$query = "SELECT MAX(donor_id) AS data FROM general_user";
	$sql =  mysqli_query($conn,"SELECT MAX(donor_id) AS data FROM general_user");
	$sql = mysqli_fetch_array($sql);
	$donor_id= $sql['data'];
	$donor_id = $donor_id + 1;
	
	
	//$donor_id=20;
	//inserts the details of donr in the database
	$insertQuery = "INSERT INTO `general_user` (`donor_id`, `name`, `contact`, `email`, `username`, `password`, `pincode`, `address`) 
					VALUES ('$donor_id','$name','$con','$em','$usern','$pass','$pcode','$ad')";
															
	//echo "'$donor_id','$name','$con','$em','$usern','$pass','$pcode','$ad'";
	$result = mysqli_query($conn,$insertQuery);
	//strlen()
	//$pid = mysql_insert_id();
	//$checkbox1 = $_POST['box'];
	//$result = mysql_query($insertQuery);
		echo $result;
		if (!$result)
		{
			//echo "'$f','$e','$m','$p',Error: ";
			$_SESSION['error_donor']=true;
		}
		else
		{

			$_SESSION['just_donor']=true;
				//echo "<script type='text/javascript'>alert('your account was created successfully')</script>";
		}
		header("location: ../index.php");
	}

?>