<?php
$server = "localhost";
$user = "root";
$pass = "";	
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
	//Start session
	session_start();
	//Unset the variables stored in session
	/*unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_PASS']);
	*/
	
	//Include database connection details
	require_once('../connect.php');
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$email = clean($_POST['emailDonor']);
	//echo $emil
	if(empty($_POST['emailDonor'])){
	
	//echo "<script type='text/javascript'>alert('Please enter your email')</script>";
	}
	
	$password = clean($_POST['passwordDonor']);
 	$password = sha1($password);
	
	//echo $password;
	//Create query
	$qry="SELECT * FROM general_user WHERE email='$email' AND password='$password'";
	$result=mysqli_query($conn,$qry);
 	echo "string ".$qry;
 
	//Check whether the query was successful or not
	//invalid username or pswd
	//echo "<script type='text/javascript'>alert('failed!')</script>";
	
	if($result) {
			
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			//echo "hello";
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			
			
			if($member['verified_user'] == '1'){
			
				$_SESSION['SESS_MEMBER_ID'] = $member['donor_id'];
				$_SESSION['SESS_EMAIL'] = $member['email'];
				$_SESSION['SESS_TYPE'] = "DONOR";
				$_SESSION['SESS_NAME']=$member['name'];
				$_SESSION['SESS_CONTACT']=$member['contact'];
				$_SESSION['SESS_PINCODE']=$member['pincode'];
				$_SESSION['SESS_UNAME']=$member['username'];
				$_SESSION['SESS_ADDRESS']=$member['address'];
				$_SESSION['logd']=true;
				session_write_close();
				$headerStat = "location: ../donor_Wall.php?did=".$_SESSION['SESS_MEMBER_ID'];
				//echo "<script type='text/javascript'>alert('fsfhsf')</script>";
				
				header($headerStat);	
			}else{

				//$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = true;
				session_write_close();
				//echo "hiiiiiiiiiiiiii";
				header("location: ../index.php");	
	
	
			}
			
		}
		else {
				//echo "cafdjlasjdflk";
				$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = true;
				session_write_close();
				header("location: ../index.php");
	
			}
	}else {
		echo "Query failed";
	}
?>