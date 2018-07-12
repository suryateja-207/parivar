<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if(isset($_GET['nid'])){
$c=$_GET['nid'];
$queryngo = "SELECT * FROM ngo WHERE ngo_id=".$c;
$resultngo = mysqli_query($conn,$queryngo);
$row = mysqli_fetch_assoc($resultngo);
}
if(isset($_GET['did'])){
$a=$_GET['did'];
$querydonor = "SELECT * FROM general_user WHERE donor_id=".$a;
$resultdonor = mysqli_query($conn,$querydonor);
$row = mysqli_fetch_assoc($resultdonor);
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
				<form action="search.php" method="post">
				<div class="col-md-3 col-md-offset-4" style="padding-top:10px;">
				
				</div>
				</form>
            <ul class="nav navbar-top-links navbar-right">
			<?php
					if($_SESSION['SESS_TYPE'] == "NGO")
					$headstart1="ngo_wall.php?nid=".$_SESSION['SESS_MEMBER_ID'];
					else
					$headstart1="donor_Wall.php?did=".$_SESSION['SESS_MEMBER_ID'];
					?>
			<li class="active"><a href="<?php echo $headstart1; ?>"> Home</a></li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					<?php
					if($_SESSION['SESS_TYPE'] == "NGO")
					$headstart2="NGOprofile.php?nid=".$_SESSION['SESS_MEMBER_ID'];
					else
					$headstart2="userprofileself.php?did=".$_SESSION['SESS_MEMBER_ID'];
					?>
                        <li><a href="<?php echo $headstart2; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                      <?php
                      if($_SESSION['SESS_TYPE'] == "NGO"){ ?>
                        <li>
                            <a href="list of all ngos-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
                        
                        <li>
                            <a href="list of all events-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Upcoming Events</a>
                        </li>
                        
                        <li>
                            <a href="list of all donors-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Donors</a>
                        </li>
                       
					   <li>
                            <a href="list of all donations-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Donations</a>
                        </li>
                      <?php } ?>
					  <?php
					  if($_SESSION['SESS_TYPE'] == "DONOR") { ?>
					  <li>
                            <a href="list of all ngos.php" class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
						<li>
                            <a href="list of all posts.php" class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> My Posts</a>
                        </li>
						<?php } ?>
                        
                        
                       
                      
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
                        <h1 class="page-header">Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
			
		
				<form method="post" enctype="multipart/form-data" >
				<div id="DIV_7"  style="width:20%";>
				<a href="#">	<img src="
				<?php 
				if(isset($_GET['did'])){
										$queryposts1 = "SELECT * FROM `general_user` WHERE `donor_id`==$a";}
									else{
										$queryposts1 = "SELECT * FROM `ngo` WHERE `ngo_id`=$c";
									}
				//$sql={$_SESSION['SESS_MEMBER_ID']}";
				$result=mysqli_query($conn,$queryposts1);
				
			
				while($row1=mysqli_fetch_array($result,MYSQL_ASSOC)){
				echo $row1['image'];	
				}
				
				?>
				" alt="" id="IMG_8" height="300px" width="100%" /></a>
				<div class="form-group">
							
						</div>
						
				</div>
			</form>
						<!--/col-->
	 <div class="row">
                <div class="col-lg-6"style="margin-left:300px;margin-top:-300px ;width:70%";>
                    <div class="panel panel-primary";>
                        <div class="panel-heading">
                            Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab" class="sidebarlinkcolor" >INFORMATION</a>
                                </li>
                               
                                <li><a href="#messages" data-toggle="tab" class="sidebarlinkcolor" >RECENT ACTIVITIES</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                   
						<div id="DIV_25";>
							
							<p id="P_27">
							<br>
								<strong id="STRONG_28">Donor Name: </strong> <?php echo $row['name']; ?>
							</p>
							<p id="P_29">
								<strong id="STRONG_30">Email :</strong> <?php echo $row['email'] ?>
							</p>
							<p id="P_31">
								<strong id="STRONG_32">Contact No.:</strong><?php echo $row['contact'] ?>
							</p>
							<p id="P_100">
								<strong id="STRONG_32"> Address:</strong> <?php echo $row['address'] ?>
							</p>
						
						</div> 
						</div>
                                
                                <div class="tab-pane fade" id="messages">
                                    <h4>Past Activities</h4>
									<?php
									if(isset($_GET['did'])){
										$queryposts3 = "SELECT * FROM donation_post WHERE donorid=$a";}
									else{
										$queryposts3 = "SELECT * FROM ngo_post WHERE ngo_id=$c";
									}
										$resultpost3 = mysqli_query($conn,$queryposts3);
										while($row3 = mysqli_fetch_assoc($resultpost3)) {
									?>
                                    <p><?php echo $row3['category']; ?></p>
									<p><?php echo $row3['details']; ?></p>
									<p><?php echo $row3['date1']; ?></p>
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
