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
 
    //Array to store validation errors
    $errmsg_arr = array();
 
    //Validation error flag
    $errflag = false;
 
    //Function to sanitize values received from the form. Prevents SQL injection
 
 
    //Sanitize the POST values
    $email = $_POST['emailNgo'];
    $password = $_POST['passwordNgo'];
	//echo $password;
    $password = sha1($password);

    //Create query
	$qry="SELECT * FROM ngo WHERE email='$email' AND password='$password'";
	$result=mysqli_query($conn,$qry);
 	//echo "string ".$qry;
    //Check whether the query was successful or not
    if($result) {
		//echo "hello";
        if(mysqli_num_rows($result) > 0) {
            //Login SuccessfuL
			//echo "hello";
            session_regenerate_id();
            $member = mysqli_fetch_assoc($result);
			
            if($member['accepted'] == '1'){
                $_SESSION['SESS_MEMBER_ID'] = $member['ngo_id'];
                $_SESSION['SESS_EMAIL'] = $member['email'];
                $_SESSION['SESS_TYPE'] = "NGO";
				$_SESSION['SESS_NAME']=$member['name'];
				$_SESSION['SESS_CONTACT']=$member['contact'];
				$_SESSION['SESS_PINCODE']=$member['pincode'];
				$_SESSION['SESS_UNAME']=$member['username'];
				$_SESSION['SESS_ADDRESS']=$member['address'];
				$_SESSION['logn']=true;
                session_write_close();
				//echo $_SESSION['SESS_MEMBER_ID'];
				//$headerStat = "location: ../ngo_Wall.php?nid=".$_SESSION['SESS_MEMBER_ID'];
				//if($member['ngo_id']==1){
				//	header("location: ../admin.php");
				//}
				//else
				
                header("location: ../ngo_wall.php?nid=".$_SESSION['SESS_MEMBER_ID']);
					
            }else{
                $_SESSION['not_accepted_yet'] = true;
                session_write_close();
                header("location: ../index.php");  
            }
            
        }
        else {
                $_SESSION['LOGIN_NGO_ERRMSG_ARR'] = true;
                session_write_close();
                header("location: ../index.php");
        }
    }else {
        echo "Query failed";
    }
?>