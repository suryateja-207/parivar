<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if(isset($_GET['nid'])){
$did=$_GET['nid'];
$queryedit="UPDATE `ngo` SET `accepted`='0' , `rejected`='1' WHERE `ngo_id`={$did}";
$res=mysqli_query($conn,$queryedit) or die('Error, query failed : ' . mysql_error());
if($res){
$_SESSION['blocked_ngo']=true;
}
header("location: userprofileother1NGO.php?nid=".$did);
}
if(isset($_GET['did'])){
$did=$_GET['did'];
$queryedit="UPDATE `general_user` SET `verified_user`='0' WHERE `donor_id`={$did}";
$res=mysqli_query($conn,$queryedit) or die('Error, query failed : ' . mysql_error());
header("location: userprofileother1Donor.php?did=".$did);
if($res){
$_SESSION['blocked_donor']=true;
}
}




?>