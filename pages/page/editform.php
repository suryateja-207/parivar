<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if($_SESSION['SESS_TYPE']=="DONOR"){
if(isset($_POST['Edit'])){
$name=$_POST['name'];
$usern=$_POST['uname'];
//$em=$_POST['email'];
$pass=sha1($_POST['password']);
$mob=$_POST['mobile'];
$pcode=$_POST['pincode'];
$ad=$_POST['address'];
unset($_POST['Edit']);
$queryedit="UPDATE `general_user` SET `name`='$name',`username`='$usern',`password`='$pass',`contact`='$mob',`pincode`='$pcode',`address`='$ad' WHERE `donor_id`={$_SESSION['SESS_MEMBER_ID']}";
$res=mysqli_query($conn,$queryedit) or die('Error, query failed : ' . mysql_error());
if($res)
{
	$_SESSION['edit_profile']=true;
   //echo "<script type='text/javascript'>alert('Your Profile Was Edited Successfully')</script>";
   header("location: userprofileself.php");
}
}

}
if($_SESSION['SESS_TYPE']=="NGO"){
if(isset($_POST['Edit'])){
$name=$_POST['name'];
$usern=$_POST['uname'];
//$em=$_POST['email'];
$pass=sha1($_POST['password']);
$mob=$_POST['mobile'];
$pcode=$_POST['pincode'];
$ad=$_POST['address'];
$queryedit="UPDATE `ngo` SET `name`='$name',`username`='$usern',`password`='$pass',`contact`='$mob',`pincode`='$pcode',`address`='$ad' WHERE `ngo_id`={$_SESSION['SESS_MEMBER_ID']}";
$res=mysqli_query($conn,$queryedit) or die('Error, query failed : ' . mysql_error());
if($res)
{
   $_SESSION['edit_profile']=true;
   //echo "<script type='text/javascript'>alert('Your Profile Was Edited Successfully')</script>";
  
    header("location: NGOprofile.php");
}
}

}

?>