<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname="ngo";
$maxdist = 5;
$conn = mysqli_connect($server, $user, $pass, $dbname);
session_start();
//if(!isset($_SESSION['logd'])){
	//		header("location: index.php");  
		//}

$id=$_SESSION['SESS_MEMBER_ID'];
if(isset($_POST['maxdistance'])){
$maxdistance= $_POST['maxdistance'];

}
else 
{
$maxdistance = 20;
}
date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
$dt->format('Y-m-d');
 if(isset($_SESSION['complaint_donor']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Your complaint was posted successfully')</script>";
	$_SESSION['complaint_donor'] = false;
	unset($_SESSION['complaint_donor']);
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

    <title>Wall</title>

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
				<form action="search.php" method="post">
				<div class="col-md-3 col-md-offset-4" style="padding-top:10px;">
				<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search for an NGO" name="search1">
                                <span class="input-group-btn">
                                <input class="btn btn-default"  type="submit" name="search">
                                    <i class="fa fa-search"></i>
                                </input>
                            </span>
                </div>
				</div>
				</form>
            <ul class="nav navbar-top-links navbar-right">
			<li class="active" ><a href="donor_Wall.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" > Home</a></li>
              
                <!-- /.dropdown -->
             
                <!-- /.dropdown -->
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofileself.php?did=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" ><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="session/logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="list of all ngos.php" class="sidebarlinkcolor"><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
                        
                        <li>
                            <a href="list of all posts.php"class="sidebarlinkcolor"><i class="fa fa-table fa-fw"></i> My posts</a>
                        </li>
                        
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
 </div>
			<div class="modal fade" id="Adddetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Donation form</h4>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<section class="container">
									<div class="container-page">				
										<div class="col-md-6 row">
										<form method = "post" action = "session/donorsubmit.php"> 
											<h3 class="dark-grey">Details</h3>
											
											<div class="form-group col-lg-12">
                                                
                                                <label>Category</label>
                                                <select name="item" class="form-control">
                                                    <option value="books">Books</option>
                                                    <option value="furniture">Furniture</option>
                                                    <option value="food">Food</option>
                                                    <option value="clothes">Clothes</option>
                                                    <option value="stationery">Stationery</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            
                                            </div>
											
											<div class="form-group col-lg-6">
												<label>Quantity</label>
												<input type="number" name="quantity" class="form-control" id="" value="" required="required">
											</div>
											
																
											<div class="form-group col-lg-6">
												<label>Pincode</label>
												<input type="number" name="pin" class="form-control" id="" value="" required="required" min="100000" max="999999">
											</div>
											
											<div class="form-group col-lg-6">
												<label>Residential Address</label>
												<input type="" name="address" class="form-control" id="" value="" required="required">
											</div>			
												
										

                                            <div class="form-group col-lg-6">
                                                <label>Contact No.</label>
                                                <input type="number" name="contact" class="form-control" id="" value="" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">
                                                    Details</label>
                                                <textarea name="details" id="message" class="form-control" rows="9" cols="10" required="required"
                                                    placeholder="Description"></textarea>
                                            </div>	
											<div class="form-group col-lg-6">
												<label>Image</label>
												<input type="file" />
											</div>
												 
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary"  name="submit" value="Save" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>   
											</form>
										</div>
									</div>
								</section>
							</div>
						</div>
						
					</div>
				</div>
			</div>
        <div id="page-wrapper">
		
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header" style="margin-left: 20px;">Donate Now!</h1>
					
						<button class="btn btn-primary " data-toggle="modal" data-target="#Adddetails" type="button" style="margin-left:20px; margin-top:10pxpx;">Post Donation</button>
						
                </div>
                <!-- /.col-lg-12 -->
            </div>
		
			
            <!-- /.row -->
            <!--remove1-->
            <!-- /.row -->
           
                    <!-- /.panel -->
                    <div class="panel panel-success parth-2">
                    <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> Events nearby
                    </div>
                    <div class="panel-body">
					    <form action="donor_Wall.php" method="post">
					   <p> Set Distance to filter your Posts according to kms range. Default distance is 20kms! <br> <input type="number" name="maxdistance"  required="required" min="0" max="5000"/></p>
						</form>
                    <ul class="timeline ">
                    <?php
                    
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                    die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $counter = 1;
					
					$result6 = mysqli_query($conn,"SELECT * FROM general_user WHERE donor_id = $id");
                    $row6 = mysqli_fetch_array($result6);
                        $to = $row6['address'];
						$to = urlencode($to);
					
                    $result = mysql_query("select * from event order by date1 desc");
                    while($rowval = mysql_fetch_array($result))
                    {
					
					$ngoid5 = $rowval['ngoid'];
					$ngopost1 = "SELECT * FROM ngo where ngo_id = $ngoid5";
					$finalposts1 = mysqli_query($conn,$ngopost1);
					$rowvalue1 = mysqli_fetch_assoc($finalposts1);
					$organiser = $rowvalue1['name'];
                    $time= $rowval['time'];
                    $date= $rowval['date1'];
                    $venue= $rowval['venue'];
                    $details= $rowval['details'];
                    $attend= $rowval['attending'];
                    $post_id = $rowval['eventid'];
                    $supp = $rowval['support'];
					$max = $maxdistance;
					$from = $venue;
				    $from = urlencode($from);

					$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&mode=driving&language=en-EN&sensor=false";
					
                        $data = @file_get_contents($url);
						
                        $data = json_decode($data);
                        $time1 = 0;
                        $distance = 0;
                        
 
                       foreach($data->rows[0]->elements as $road) {
                            $time1 += $road->duration->value;
                            $distance += $road->distance->value;
                        }
                        
                        $distance = $distance/1000;

                    if ($counter%2 != 0 && $distance<=$max) {
                        echo "<li>";
                        
                        echo "<div class=\"timeline-panel\">";
                        echo "<div class=\"timeline-heading\">";
                        echo "<h4 class=\"timeline-title\">"; echo "Details:"; echo $details;echo "</h4>"; 
                        echo "<p><small class=\"text-muted\" ><i class=\"fa fa-clock-o\"></i>";  echo " EVENT AT :";echo  $time; echo "<br>"; echo " EVENT ON: "; echo $date; echo"</small>";
						
						echo "</p>";
                        
                        echo "</div>";
                        echo "<div class=\"timeline-body\">";
						echo "Organiser is : "; echo $organiser; echo "<br>"; 
                        echo "<p>"; echo "Venue : "; echo  $venue; echo "</p>"; echo "Supporters: "; echo $supp; 
						echo "<br>"; 
					    echo "The Event is at a distance of: "; echo $distance; echo " kms<br>";

                        echo "</div>";
						echo "<button class=\"btn btn-primary \" onclick = \"updateAttend($post_id);\" id = \"supp_button\" type=\"button\" style=\"margin-top: 10px; margin-left: 3px;\">JOIN EVENT</button>";
                        echo "<button class=\"btn btn-primary \" onclick = \"updateSupp($post_id);\" id = \"supp_button\" type=\"button\" style=\"margin-top: 10px; margin-left: 10px;\">I SUPPORT</button>";
                        
                        echo "</div>";
                        echo "</li>";
						$counter = $counter + 1;
                    }
                    else if($distance<=$max){
                        echo "<li class=\"timeline-inverted\">";
                        
                        echo "<div class=\"timeline-panel\">";
                        echo "<div class=\"timeline-heading\">";
                        echo "<h4 class=\"timeline-title\">";echo "Details:"; echo $details;echo "</h4>"; 
                        echo "<p><small class=\"text-muted\" ><i class=\"fa fa-clock-o\"></i>";  echo " EVENT AT :";echo  $time; echo "<br>"; echo " EVENT ON: "; echo $date; echo"</small>";
                        echo "</p>";
                        echo "</div>";
                        echo "<div class=\"timeline-body\">";
						echo "Organiser is : "; echo $organiser; echo "<br>";
                        echo "<p>"; echo "Venue : "; echo  $venue; echo "</p>"; echo "Supporters: "; echo $supp;
						echo "<br>";
					    echo "The Event is at a distance of: "; echo $distance; echo " kms<br>";
                        echo "</div>";
						echo "<button class=\"btn btn-primary \" onclick = \"updateAttend($post_id);\" id = \"supp_button\" type=\"button\" style=\"margin-top: 10px; margin-left: 3px;\">JOIN EVENT</button>";
                        echo "<button class=\"btn btn-primary \" onclick = \"updateSupp($post_id);\" type=\"button\" style=\"margin-top: 10px; margin-left: 10px;\">I SUPPORT</button>";
                        
                        echo "</div>";
                        echo "</li>";

                        $counter = $counter + 1;


                    }
					
					
                    }
					
                    mysql_close($con);
 
                    ?>

                    <script type="text/javascript">
                        function updateSupp(post_id){
						   
                           $.post("updatesupp.php", {"variable": post_id})
                           .done(function( data ) {
                                if(!alert( "YOU AND OTHER " + data + " supporters for this event")){window.location.reload();}
								
                            });          
                    }
                    </script>
					
					<script type="text/javascript">
                        function updateAttend(post_id){
                           $.post("mailevent.php", {"variable": post_id})
                           .done(function( data ) {
						   if(!alert( "A mail has been sent to the NGO that you will attend")){window.location.reload();}
                              
                            });          
                    }
                    </script>
                    </ul>
                </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-4 parth-1">
                    <div class="panel panel-success"style="margin-top:60px;border-color:black";>
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Recent NGO posts
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
						$queryevent = "SELECT * FROM ngo_post order by ngo_post_id desc";
									$resultevent = mysqli_query($conn,$queryevent);
									
									$i = 0;
									while($i<3 && $row = mysqli_fetch_assoc($resultevent)) {
										$ngo_id = $row['ngo_id'];
										$ngopost = "SELECT * FROM ngo where ngo_id = $ngo_id";
										$finalposts = mysqli_query($conn,$ngopost);
										$rowvalue = mysqli_fetch_assoc($finalposts);
										$ngo_name = $rowvalue['name'];
										$ngo_contact = $rowvalue['contact'];
									
									//if($diff<0 )
									//continue;
									?>
                            <div class="list-group clearfix">
                                <a href="#" class="list-group-item clearfix">
                                    <i class="fa fa-comment fa-fw"></i> <?php echo $row['details'];echo "<br>" ?>
										 <span class=" text-muted small"><em><?php echo "NGO name: "; echo $ngo_name; echo "<br>"?></em></span>
										 <span class=" text-muted small"><em><?php echo "Contact: "; echo $ngo_contact; echo "<br>"?></em></span>
                                    <span class=" text-muted small"><em>Posted on: <?php echo $row['date1']; echo "<br>"?></em>
									
                                    </span>
                                </a>
                                
                            </div>
							<?php
									$i =$i+1;
							} ?>
                            <!-- /.list-group -->
                            <a href="list of all ngo posts.php" class="btn btn-default btn-block">View All Posts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
                    <!-- /.panel -->
               
                    <!-- /.panel .chat-panel -->
                </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
