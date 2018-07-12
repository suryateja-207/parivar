<?php

//include '../connect.php';
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
//echo "hello";
//Start session
session_start();

$name=$_POST['name'];
$usern=$_POST['uname'];
$email=$_POST['email'];
$pass=sha1($_POST['password']);
$em=$_POST['email'];
//$password=sha1($_POST['upwd']);
$mob=$_POST['mobile'];
$pcode=$_POST['pin'];
$ad=$_POST['address'];
$cit=$_POST['city'];
$sta=$_POST['state'];
$hp=$_POST['headperson'];
//$city = $_POST['cityunreg'];
//$state = $_POST['stateunreg'];


//stores the logo of Ngo

// checks if the email already exists
//echo "hello";
$checkEmail = mysqli_query($conn,"SELECT * FROM ngo WHERE email = '$email'");

if(mysqli_num_rows($checkEmail)>0){
	$_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR'] = true;
	Header("location: ../index.php");
}
else
{
	$varificationCode = substr(sha1(rand()), 0, 20);
	$sql =  mysqli_query($conn,"SELECT MAX(ngo_id) AS data FROM ngo");
	$sql = mysqli_fetch_array($sql);
	$ngo_id= $sql['data'];
	$ngo_id = $ngo_id + 1;
	
	//inserts the details of Ngo in the database
	$insertQuery = "INSERT INTO `ngo`(`ngo_id`, `name`, `contact`, `email`, `username`, `password`, `pincode`, `address`,`city`, `state`, `headperson`) 
	VALUES ('$ngo_id','$name','$mob','$email','$usern','$pass','$pcode','$ad','$cit','$sta','$hp')";

	
	$result = mysqli_query($conn,$insertQuery);
	//$pid = mysql_insert_id();
	//$checkbox1 = $_POST['box'];
	//$result = mysql_query($insertQuery);
		//echo $result;
		
		if (!$result)
		{
			echo "'$f','$e','$m','$p',Error: ";
		}
		else
		{
			    $_SESSION['just_ngo']=true;
				//echo "<script type='text/javascript'>alert('admin will confirm your request in some time')</script>";
		}
		header("location: ../index.php");
	}

?>