<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
if(isset($_SESSION['ngo_postevent']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Your event has been succesfully posted')</script>";
	$_SESSION['ngo_postevent'] = false;
	unset($_SESSION['ngo_postevent']);
	//unset();
	   }
	   if(isset($_SESSION['ngo_generalpost']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Your post has been succesfully posted')</script>";
	$_SESSION['ngo_generalpost'] = false;
	unset($_SESSION['ngo_generalpost']);
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

    <title>All Events</title>

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
			<li class="active"><a href="ngo_wall.php?nid=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"> Home</a></li>
				
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="NGOprofile.php?nid=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" ><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="list of all ngos-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
                        
                        <li>
                            <a href="list of all events-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Upcoming Events</a>
                        </li>
                        
                        <li>
                            <a href="list of all donations-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Donations</a>
                        </li>
                        
                        <li>
                            <a href="list of all donors-NGO.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View all Donors</a>
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
                        <h1 class="page-header">List of all Events </h1>
						<div class="col-lg-3" style="width:50%; padding-left:50px;">
					<div class="panel panel-default">
					 
						<div class="panel-body">
						 
						  
						  <div >
							<div class="media" >
								
								<div class="media-body">
									
									<?php
									$queryevents = "SELECT * FROM event";
									$resultevents = mysqli_query($conn,$queryevents);
									
									if(mysqli_num_rows($resultevents)==0)
									{
									echo "<script type='text/javascript'>alert('there were no events near by you')</script>";
									}
									$i=0;
									$row = mysqli_fetch_assoc($resultevents);
									if($row==0)
									{
									echo "<script type='text/javascript'>alert('there were no events near by you')</script>";
									}	
									while($row = mysqli_fetch_assoc($resultevents)) {
									
											
									$ngoid5 = $row['ngoid'];
									$ngopost1 = "SELECT * FROM ngo where ngo_id = $ngoid5";
									$finalposts1 = mysqli_query($conn,$ngopost1);
									$rowvalue1 = mysqli_fetch_assoc($finalposts1);
									$organiser = $rowvalue1['name'];
									
									
									$id=$row['eventid'];
									?>
									<h3 class="media-heading"><?php echo $row['details']; ?></h3><br>
									<p> Organiser : <?php echo $organiser ?><p>
									<p> Posted on: <?php echo $row['date1']; ?><p>
									<p> Posted at: <?php echo $row['time']; ?><p>
									<p> Details  : <?php echo $row['details'] ?><p>
									<p> Supporters are: <?php echo $row['support'] ?><p>
									
                                    
									
									<p>
									  <form action="list of all events-Ngo.php" method="post">
									  
									   <button class="btn btn-primary " id = "fav" onclick = "updateSupp();" type="submit" name="subs<?php echo $i; ?>" style="margin-top: 0px; margin-right: 8px;">I support</button>
									   <hr>
									   <?php
									   
										if(isset($_POST['subj'.$i]))
										{	
						

											unset($_POST['subj'.$i]);
										}
										if(isset($_POST['subs'.$i]))
										{	
											$sql = "UPDATE event set support=support+1 where eventid=$id";
											$res = mysqli_query($conn,$sql);
											if($res){
												echo "<script type='text/javascript'>alert('YOU ARE SUPPORTING THIS EVENT, THANKS FOR SUPPORTING')</script>";
											}
											unset($_POST['subs'.$i]);
										}
									   ?>
									   
									   
									   </form>
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
