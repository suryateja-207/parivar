<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Complaints</title>

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
				<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search for an NGO">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
			</div>
            <ul class="nav navbar-top-links navbar-right">
			<li class="active"><a href="admin.php"> Home</a></li>
            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Notifications
                        <i class="fa fa-caret-down"></i>
                    </a>
                <ul class="dropdown-menu dropdown-user">
                 <li><a style = "margin-left: 10px;" href = "acceptngos.php">Accept NGOs</a>
                    </li>
                </ul>
            </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="list of all ngos-NGO.php"  class="sidebarlinkcolor" ><i class="fa fa-dashboard fa-fw"></i> View List of all NGOs</a>
                        </li>
                        
                        <li>
                            <a href="list of all events-NGO.php"  class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Upcoming Events</a>
                        </li>
						
						<li>
                            <a href="list of all donations-NGO.php"  class="sidebarlinkcolor" ><i class="fa fa-table fa-fw"></i> View All Donations</a>
                        </li>
                        
                        <li>
                            <a href="list of all donors-NGO.php"  class="sidebarlinkcolor"><i class="fa fa-table fa-fw"></i> View all Donors</a>
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
                        <h1 class="page-header">List of all Complaints </h1>
						<div class="col-lg-3" style="width:50%; padding-left:50px;">
					<div class="panel panel-default">
					 
						<div class="panel-body">
						 
						  
						  <div >
                            <?php
                    
                                $con = mysql_connect("localhost","root","");
                                if (!$con)
                                {
                                    die('Could not connect: ' . mysql_error());
                                }
                                mysql_select_db("ngo", $con);
                    
                                //$sql="select * from accountdtl";
                                $result = mysql_query("select * from complaint order by complaint_id desc");
                                while ($rowval = mysql_fetch_array($result)) {
                                    # code...
                                
                                    $item= $rowval['subject'];
                                    $name= $rowval['name'];
                                    $email= $rowval['email'];
                                    $details= $rowval['details'];
                                    $id= $rowval['complaint_id'];

                                    if($rowval['accept'] == 0 && $rowval['reject'] == 0) {

                                        echo "<div class=\"media\" >";
                                        echo "<div class=\"media-body\">";
                                        echo "<h4 class='media-heading'>Subject: "; echo $item;
                                        echo "</h4>"; 
                                        
                                        echo "By: ".$name; 
                                        echo "<br>"; 
                                        echo $details; 
                                        echo "<p style = 'margin-top: 10px;'>"; 
                                        echo "<button href=\"#\" class=\" btn btn-primary\" onclick=\"this.disabled=true; updateStatus($id);\" style=\"margin-right:10px;\">SEEN</button>";
                                        echo "<button href=\"#\" class=\" btn btn-danger\" onclick=\"this.disabled=true; updateStatusr($id);\" style=\"margin-right:10px;\">Ignore Complaint</button>";
                                                            
									   echo "</p>";
                                        echo "</div>";
                                        echo "</div>";

                                    
                                    }
                                }
                            ?>

                            <script type="text/javascript">

                            function updateStatus(id){
                                
                                 $.post("updatecomplaintA.php", {"variable": id})
                           .done(function( data ) {
                                if(!alert(data)){window.location.reload();}
                                
                            });       
                            }

                            </script>
                            <script type="text/javascript">

                            function updateStatusr(id){
                              
                                 $.post("updatecomplaintR.php", {"variable": id})
                           .done(function( data ) {
                                if(!alert(data)){window.location.reload();}
                                
                            });       
                            }

                            </script>
							
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
