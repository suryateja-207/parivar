<?php
//echo "<script type='text/javascript'>alert('failed!')</script>";
//echo 'this will not happen';
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
echo $dt->format('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All NGOs</title>

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
			<div class="col-md-3 col-md-offset-3" style="padding-top:10px;">
				
			</div>
            <ul class="nav navbar-top-links navbar-right">
			<li class="active"><a href="donor_Wall.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" > Home</a></li>
                 
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofileself.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" ><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="list of all posts.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> My Posts</a>
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
                        <h1 class="page-header">List of all NGOs nearby you </h1>
						<div class="col-lg-3" style="width:50%; padding-left:50px;">
					<div class="panel panel-default">
					 
						<div class="panel-body">
						 
						  
						  <div >
							<div class="media" >
								
								<div class="media-body">
									
									<?php
									$queryngo = "SELECT * FROM ngo";
									$resultngo = mysqli_query($conn,$queryngo);
									$i=0;
									while($row = mysqli_fetch_assoc($resultngo)) {
									$id = $row['ngo_id'];
									//if(($_SESSION['SESS_PINCODE']-$row['pincode']>99) ||($_SESSION['SESS_PINCODE']-$row['pincode'])<-99)
									//continue;
									?>
									<h3 class="media-heading"><?php echo $row['name']; ?></h3>
									<p> Contact: <?php echo $row['contact']; ?><p>
									<p> Address: <?php echo $row['address']; ?><p>
									  <form action="list of all ngos.php" method="post">
									   <a href="userprofileotherNGO.php?nid=<?php echo $id; ?>" class=" btn btn-primary" style="margin-right:10px;">View Complete Profile</a>

									   <button class="btn btn-primary " id = "fav" onclick = "updateSupp();" type="submit"  name="subm<?php echo $i; ?>" style="margin-top: 0px; margin-right: 8px;">Favorite</button>
									  <?php 
									  /*$q=mysql_query("select * from ngo where ngo_id=$row['ngo_id']");
									  $cou=mysql_result($q,0,'favorites');
									  echo $cou;*///echo $row['favourites'];
									  ?>
									   <?php
									   
										if(isset($_POST['subm'.$i]))
										{	//echo "hello";
											$sql = "UPDATE ngo set favourites=favourites+1 where ngo_id='$id'";
											$res = mysqli_query($conn,$sql);
											if($res){
												echo "<script type='text/javascript'>alert('THIS NGO HAD SUCCESSFULLY ADDED TO YOUR FAVOURITES')</script>";
											}
											unset($_POST['subm'.$i]);
										}
									   ?>
									   <button class="btn btn-danger " onclick="window.open('complaintform.php')" type="button" data-toggle="modal" type="button" data-target="#Adddetails"  style="margin-right: 0px; ">Complain</button>
									   </form>
									    <hr >
									</p>
									<?php
									$i=$i+1;
									} ?>
								
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
