<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
$did=$_SESSION['SESS_MEMBER_ID'];
if(isset($_GET['nid'])){
$c=$_GET['nid'];
$queryngo = "SELECT * FROM ngo WHERE ngo_id=".$c;
$resultngo = mysqli_query($conn,$queryngo);
$row = mysqli_fetch_assoc($resultngo);
$add = $row['address'];
}
//if(!isset($_SESSION['logd'])){
	//		header("location: index.php");  
		//}
if(isset($_GET['did'])){
$a=$_GET['did'];
$querydonor = "SELECT * FROM general_user WHERE donor_id=".$a;
$resultdonor = mysqli_query($conn,$querydonor);
$row = mysqli_fetch_assoc($resultdonor);
$add = $row['address'];
}
if(isset($_SESSION['edit_profile']) )	{	
 
	
	echo "<script type='text/javascript'>alert('your profile sucessfully updated')</script>";
	$_SESSION['edit_profile'] = false;
	unset($_SESSION['edit_profile']);
	   }

?>
<?php
$uploadDir = 'upload/';
//if(isset($_POST['editpro'])){
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
   echo "<script type='text/javascript'>alert('Your Profile Was Edited Successfully')</script>";
}
}

 //}
	
	
	
	//unset();
	   

if(isset($_POST['upload']))
{
$fileName = $_FILES['userfile']['name'];
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$filePath = $uploadDir . $fileName;

$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
echo "Error uploading file";
exit;
}

include '../library/config.php';
include '../library/opendb.php';

if(!get_magic_quotes_gpc())
{
$fileName = addslashes($fileName);
$filePath = addslashes($filePath);
}


$query="UPDATE `general_user` SET `image`='$filePath' WHERE `donor_id`={$_SESSION['SESS_MEMBER_ID']}";

mysqli_query($conn,$query) or die('Error, query failed : ' . mysql_error());

include '../library/closedb.php';

echo "<br>Files uploaded<br>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dont Dump,Donate</a>
            </div>
            <!-- /.navbar-header -->
				<div class="col-md-3 col-md-offset-4" style="padding-top:10px;">
				
			</div>
            <ul class="nav navbar-top-links navbar-right">
			<li class="active"><a href="donor_Wall.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"> Home</a></li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofileself.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                      
                        <li class="divider"></li>
                        <li><a href="session/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
				
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="list of all ngos.php" class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
                        
                        <li>
                            <a href="list of all posts.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> Myposts</a>
                        </li>
                        
                        
                       
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
 </div>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Your Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
			
		
					<form method="post" enctype="multipart/form-data" >
				<div id="DIV_7"  style="width:20%">
				<a href="#">	<img src="
				<?php 
				$sql="SELECT * FROM `general_user` WHERE `donor_id`={$_SESSION['SESS_MEMBER_ID']}";
				$result=mysqli_query($conn,$sql);
				
			
				while($row=mysqli_fetch_array($result,MYSQL_ASSOC)){
				echo $row['image'];	
				}
				
				?>
				" alt="" id="IMG_8" height="300px" width="100%"/></a>
				<div class="form-group">
							<label>Change profile picture</label>
							<input type="file" name="userfile">
						</div>
						<input type="Submit" name="upload">
				</div>
			</form>
						<!--/col-->
	 <div class="row">
                <div class="col-lg-6"style="margin-left:300px;margin-top:-362px ;width:70%";>
                    <div class="panel panel-primary";>
                        <div class="panel-heading">
                           Profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">BASIC INFO</a>
                                </li>
                               
                                <li><a href="#messages" data-toggle="tab" class="sidebarlinkcolor" >RECENT ACTIVITIES</a>
                                </li>
                                
                            </ul>
				<?php
										$querydetails = "SELECT * FROM general_user WHERE donor_id=$did";
										$resultdetails = mysqli_query($conn,$querydetails);
										while($rowdet = mysqli_fetch_assoc($resultdetails)) {
							?>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                   
						<div id="DIV_25";>
							
							<p id="P_27">
							<br>
								<strong id="STRONG_28">Name: </strong> <?php echo $rowdet['name']; ?>
							</p>
							<p id="P_29">
								<strong id="STRONG_30">Email Address:</strong> <?php echo $rowdet['email']; ?> 
							</p>
							<p id="P_31">
								<strong id="STRONG_32">Contact No.:</strong> <?php echo $rowdet['contact']; ?>
							</p>
							<p id="P_100">
								<strong id="STRONG_32">Residential Address:</strong><?php echo $rowdet['address']; ?>
							</p>
						<?php } ?>
							<button type="button" class="btn btn-primary" name="editpro"data-toggle="modal" data-target="#editprofile">Edit Profile</button>
						</div> 
						</div>
						
						
			  
			  		<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Change your details</h4>
								</div>
											<div class="modal-body">
											<div class="container-fluid">
												<section class="container">
														<div class="container-page">				
															<div class="col-md-6">
													<?php
										$querydetails = "SELECT * FROM general_user WHERE donor_id=$did";
										$resultdetails = mysqli_query($conn,$querydetails);
										while($rowdet = mysqli_fetch_assoc($resultdetails)) {
										?>
														<form action="editform.php" method="post">
														  <p>  Name <br> <input type="text" name="name" required="required" value="<?php echo $rowdet['name']; ?>"/></p>
														  <p>  Username <br> <input type="text" name="uname" required="required" value="<?php echo $rowdet['email']; ?>"/></p>
														  <p>  Password <br> <input type="password" name="password" required="required"  value="" minlength="6"/></p>
														  
														  <p> Contact <br> <input type="number" name="mobile" required="required"  value="<?php echo $rowdet['contact']; ?>"/></p>
														  <p> Pin Code <br> <input type="number" name="pincode" required="required" value="<?php echo $rowdet['pincode']; ?>" min="100000" max="999999"/></p>
														  <p> Address <br> <input type="text" name="address" required="required"  value="<?php echo $rowdet['address']; ?>" /></p>
														  <input type="submit" class="btn btn-primary"  name="Edit" value="Submit"  />
														</form>
														<?php } ?>
															</div>
														
											
														</div>
												</section>
											</div>
											</div>
								<div class="modal-footer">
									
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									
								</div>
							</div>
						</div>
					</div>
						
						
						
                                     <div class="tab-pane fade" id="profile">
									<?php
										$queryevents = "SELECT * FROM event";
										$resultevents = mysqli_query($conn,$queryevents);
										while($row = mysqli_fetch_assoc($resultevents)) {
									?>
                                    <h4>List of Upcoming Events</h4>
                                    <p><?php echo $row['details']; ?></p>
									<p><?php echo $row['time']; ?></p>
									<p><?php echo $row['date1']; ?></p>
									<?php } ?>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <?php
									if(isset($_GET['did'])){
										$queryposts = "SELECT * FROM donation_post WHERE donorid=$a";}
									else{
										$queryposts = "SELECT * FROM ngo_post WHERE ngo_id=$c";
									}
										$resultpost = mysqli_query($conn,$queryposts);
										while($row = mysqli_fetch_assoc($resultpost)) {
									?>
                                    <p><h4><?php echo "Category: ";echo $row['category']; ?></h4></p>
									<p><?php echo "Details : "; echo $row['details']; ?></p>
									<p><?php echo "Posted on : ";echo $row['date1']; echo"<br>";?></p>
									<hr>
									<?php }?>
                                </div>
                               
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					</div>
                    <!-- /.panel -->
                </div>
						
						<!--/col-->
							
						
				        <!-- /#page-wrapper -->
						

    </div>
			<footer>
		
		<div class="row" style="color:black;background-color:white;width:100%";>
			
			<div class="col-sm-5">
				© 2015 Dont Dump,Donate by Titans
			</div><!--/.col-->
			
			<div class="col-sm-7 text-right">
				<a type="button" href="Mission.html" class="btn btn-link">Our Mission</a>
				<a type="button" href="FAQs.html"  class="btn btn-link">Frequently Asked Questions</a>
				<a type="button" href="contact.html" class="btn btn-link">Contact Us</a>
			</div><!--/.col-->	
			
		</div><!--/.row-->	

	</footer>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
