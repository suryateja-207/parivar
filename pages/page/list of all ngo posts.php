<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
//$mid=$_SESSION['SESS_MEMBER_ID'];
 if(isset($_SESSION['ngo_post']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Your post has succesfully posted')</script>";
	$_SESSION['donor_post'] = false;
	unset($_SESSION['donor_post']);
	//unset();
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

    <title>All Posts</title>

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
	
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
                        <h1 class="page-header">List of all Posts </h1>
						<div class="col-lg-3" style="width:50%; padding-left:50px;">
					<div class="panel panel-default">
					 
						<div class="panel-body">
						 
						  
						  <div >
							<div class="media" >
								
								<div class="media-body">
									
									<?php
                                    $queryposts = "SELECT * FROM ngo_post order by ngo_post_id desc";
                                    $resultposts = mysqli_query($conn,$queryposts);
                                    //echo $resultposts;
									$i=0;
                                    while($row = mysqli_fetch_assoc($resultposts)) {
                                        $post_id = $row['ngo_post_id'];
										$ngo_id = $row['ngo_id'];
										$ngopost = "SELECT * FROM ngo where ngo_id = $ngo_id";
										$finalposts = mysqli_query($conn,$ngopost);
										$rowvalue = mysqli_fetch_assoc($finalposts);
										$ngo_name = $rowvalue['name'];
										?>
										
										
                                    <h3 class="media-heading"> Details: <?php echo $row['details']; ?></h3>
								<h2>	<span class=" text-muted small"><em><p><?php  echo "NGO Name: " ; echo $ngo_name; ?><p></em></span></h2>
								<h2>	<span class=" text-muted small"><em><p>	<p> Category: <?php echo $row['category']; ?><p></em></span></h2>
									<h2>	<span class=" text-muted small"><em><p> Posted on: <?php echo $row['date1']; ?><p></em></span></h2>
									

									   <a href="userprofileotherNGO.php?nid=<?php echo 	$ngo_id ; ?>" class=" btn btn-info" style="margin-left:294px;margin-bottom:38px ;margin-top:-119px";>View Complete Profile</a>
										<hr>
                                   <?php }
								   if(isset($_POST['suu'.$i]))
										{	
											//$sql = "UPDATE event set attending=attending+1 where eventid='$id'";
											//$res = mysqli_query($conn,$sql);
											//if($res){
											//	echo "<script type='text/javascript'>alert('YOUR ARE ATTENDING THIS EVENT')</script>";
											//}
											//unset($_POST['subj'.$i]);
										}
                                    ?>
						
								</div>
							</div>
						   </div>
						</div>
					 </div> 
				</div>   
         
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
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
