<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
$mid=$_SESSION['SESS_MEMBER_ID'];
 if(isset($_SESSION['donor_post']) )	{	
 
	
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
                            <a href="list of all posts.php" class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> My posts</a>
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
                        <h1 class="page-header">List of all Posts </h1>
						<div class="col-lg-3" style="width:50%; padding-left:50px;">
					<div class="panel panel-default">
					 
						<div class="panel-body">
						 
						  
						  <div >
							<div class="media" >
								
								<div class="media-body">
									
									<?php
                                    $queryposts = "SELECT * FROM donation_post WHERE donorid=$mid";
                                    $resultposts = mysqli_query($conn,$queryposts);
                                    //echo $resultposts;
                                    while($row = mysqli_fetch_assoc($resultposts)) {
                                        $post_id = $row['donation_post_id'];
										echo "<br>";
                                        echo "<h4 class=\"media-heading\">"; echo "Details of your post : "; echo $row['details']; echo "</h4>";

                                        $query1 = "SELECT * FROM interested WHERE donation_post_id=$post_id";
                                        $result1 = mysqli_query($conn,$query1);
										echo "Interested NGOs are : ";
                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                            $query2 = "SELECT * FROM ngo WHERE ngo_id='".$row1['ngo_id']."'";
                                            $result2 = mysqli_query($conn,$query2);
                                            $row3=mysqli_fetch_assoc($result2);
                                            echo $row3['name'];
											
                                        }
                                        echo "<br>";
                                        echo "<button class=\"btn btn-primary \" onclick = \"updateSupp($post_id);\" id = \"supp_button\" type=\"button\" style=\"margin-bottom: 15px;\margin-top:5px;\">Already Collected</button>";
										 echo"<hr >";
                                    
                                    }
                                    ?>
									
									<script type="text/javascript">
                        function updateSupp(post_id){
						//alert (post_id);
                          $.post("updatecollected.php", {"variable": post_id})
                           .done(function( data ) {
                                alert( "Marked as collected");
                            });
							
                    }
                    </script>
					
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
