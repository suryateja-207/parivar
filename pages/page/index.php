 <?php
//MySQL Database Connect
include 'connect.php';
//include 'database.php';
//session_start();
if(!empty($_SESSION['SESS_TYPE'])){
	if($_SESSION['SESS_TYPE']=="DONOR")
	header("location: donor_Wall.php?did=".$_SESSION['SESS_MEMBER_ID']);
	else if($_SESSION['SESS_TYPE']=="NGO")
	header("location: ngo_wall.php?nid=".$_SESSION['SESS_MEMBER_ID']);
	}
?>
		<?php
if(isset($_SESSION['JUST_SIGNEDUP'])){
			?> 
			<div class="alert alert-warning alert-dismissable" style="display: table; margin: 0 auto; margin-top:-60px;" >
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  			<h2>To activate your account please click on activation link sent to your email</h2>
			</div>
			<?php
			unset($_SESSION['JUST_SIGNEDUP']);
		}

//if($_SESSION['LOGIN_DONOR_ERRMSG_ARR'] )	{	
 
	
	//echo "<script type='text/javascript'>alert('Please fill the empty row')</script>";
	//$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = false;
	//unset();
	   //}
	   if(isset($_SESSION['LOGIN_DONOR_ERRMSG_ARR']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Invalid Email or Password')</script>";
	$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = false;
	unset($_SESSION['LOGIN_DONOR_ERRMSG_ARR']);
	   }
	   if(isset($_SESSION['LOGIN_NGO_ERRMSG_ARR']) )	{	
 
	
	echo "<script type='text/javascript'>alert('Invalid Email or Password')</script>";
	$_SESSION['LOGIN_NGO_ERRMSG_ARR'] = false;
	unset($_SESSION['LOGIN_NGO_ERRMSG_ARR']);
	   }
	   if(isset($_SESSION['not_accepted_yet']))	{	
 
	
	echo "<script type='text/javascript'>alert('NOT A ACCEPTED USER YET')</script>";
	$_SESSION['not_accepted_yet'] = false;
	unset($_SESSION['not_accepted_yet']);
	//unset();
	   }
	   if(isset($_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR']) )	{	
 
	
	echo "<script type='text/javascript'>alert('PLEASE CHOOSE AN OTHER EMAIL')</script>";
	$_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR'] = false;
	unset($_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR']);
	//unset();
	   }
	   if(isset($_SESSION['UNREGDONOR_EMAIL_EXISTS_ERRMSG_ARR']) )	{	
 
	
	echo "<script type='text/javascript'>alert('PLEASE CHOOSE AN OTHER EMAIL')</script>";
	$_SESSION['UNREGDONOR_EMAIL_EXISTS_ERRMSG_ARR'] = false;
	unset($_SESSION['UNREGDONOR_EMAIL_EXISTS_ERRMSG_ARR']);
	//unset();
	   }
	   if(isset($_SESSION['just_donor']) )	{	
 
	
	echo "<script type='text/javascript'>alert('LOGIN WITH YOUR EMAIL AND PASSWORD')</script>";
	$_SESSION['just_donor'] = false;
	unset($_SESSION['just_donor']);
	//unset();
	   }
	   if(isset($_SESSION['just_donor']))	{	
 
	
	echo "<script type='text/javascript'>alert('YOUR ACCOUNT NOT CREATED')</script>";
	$_SESSION['error_donor'] = false;
	//unset();
	unset($_SESSION['error_donor']);
	   }
	   if(isset($_SESSION['just_ngo']))	{	
 
	
	echo "<script type='text/javascript'>alert('ADMIN WILL CONFIRM YOUR REQUEST IN SOME TIME ')</script>";
	unset($_SESSION['just_ngo']);
	//unset();
	   }
	   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Don't Dump, Donate</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR

================================================== -->
 <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Don't Dump, Donate</a>
        </div>
      <div id="navbar" class="navbar-collapse collapse">
      

	  
		<?php if(isset($_POST['fpass'])){
				echo "<script type='text/javascript'>alert('type donor if you are donor or ngo if you are ngo!')</script>";
				
		}
		?>
     	    <button type="button" class="btn btn-outline btn-link pull-right" style="color:white"  data-toggle="modal" data-target="#Forgot">FORGOT PASSWORD??</button>

	 <button class="btn btn-info pull-right" style="pull-down:100px"; data-toggle="modal" data-target="#SignUpNGO">SIGN UP AS NGO</button>
       <button class="btn btn-info pull-right"  data-toggle="modal" data-target="#SignUpDONOR">SIGN UP AS DONOR</button>
       <button class="btn btn-success pull-right"  data-toggle="modal" data-target="#SignInNGO">LOGIN AS NGO</button>
       <button class="btn btn-success pull-right"  data-toggle="modal" data-target="#SignInDONOR">LOGIN AS DONOR</button>

       
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
        
              <!---asdfghjk-->
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" style="top:-162px" src="img2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
             
              
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

	
			  <div class="modal fade" id="SignUpDONOR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Free sign up</h4>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
				<h3 class="dark-grey">Registration</h3>
        <form action="session/signupdonor.php" method="post">
          <p>  Name <br> <input type="text" name="name" required="required"/></p>
		  <p>  Username <br> <input type="text" name="uname" required="required"/></p>
          <p>  Password <br> <input type="password" name="password" required="required" minlength="6"/></p>
          <p>  Email <br> <input type="email" name="email" required="required"/></p>
          <p> Contact <br> <input type="number" name="mobile" required="required"/></p>
          <p> Pin Code <br> <input type="number" name="pincode" required="required" min="100000" max="999999"/></p>
          <p> Address <br> <input type="text" name="address" required="required" /></p>
          <input type="submit" class="btn btn-primary"  name="submit" value="Submit" />
        </form>
			
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
			
			<div class="modal fade" id="Forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-6"style="width:31%">
        <h3 class="dark-grey">Enter Details</h3>
          <form action="forgotpassword.php" method="post">
            <div class="form-group">
              <input type="text" placeholder="ngo or donor" class="form-control" id="type" name="type" required="required">
            </div>
            <div class="form-group">
              <input type="text" placeholder="enter emailID" class="form-control" id="email" name="email" required="required">
              <?php if(isset($_SESSION['LOGIN_NGO_ERRMSG_ARR'])) { ?>
                        <div><p>Incorrect username or password</p></div>
                        <?php } //unset($_SESSION['LOGIN_NGO_ERRMSG_ARR']); ?>

            </div>
			<button input type="submit" class="btn btn-primary" name="dlogin" value="Login" onclick="return submitSignin('emailDonor','passwordDonor')">Send new Password</button>
          </form>
        
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


      <div class="modal fade" id="SignUpNGO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Free sign up</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-6">
        <h3 class="dark-grey">Registration</h3>
        <form action="session/signupunregngo.php" method="post">
		<p>  NGO Name <br> <input type="text" name="name" required="required"/></p>
          <p>  Username<br><input type="text" name="uname" required="required" /></p>
          <p>  Password <br><input type="password" name="password" required="required" minlength="6"/></p>
          <p> Email <br><input type="email" name="email"  required="required"/></p>
          <p> Contact <br><input type="number" name="mobile" required="required"/></p>
      <p>  City<br><input type="text" name="city" required="required"/></p>
      <p>  State<br><input type="text" name="state"  required="required"/></p>
      <p>  Head Person<br><input type="text" name="headperson"  required="required"/></p>
          <p> Pin Code <br><input type="number" name="pin" required="required" min="100000" max="999999"/></p>
          <p> Address<br> <input type="text" name="address" required="required"/></p>
		  <input type="submit" class="btn btn-primary"  name="submit" value="Submit" />
        </form>
    </div>
  </section>
</div>
            </div>
            <p style="margin-left:20px;">If you are an NGO the request of sign up would be sent to admin NGO for approval!!!</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>

<div class="modal fade" id="SignInDONOR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Sign In</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-6">
        <h3 class="dark-grey">Registration</h3>
          <form action="session/login_donor.php" method="post">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" id="emailDonor" name="emailDonor" required="required">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" id="passwordDonor" name="passwordDonor" required="required" minlength="6">
              <?php if(isset($_SESSION['LOGIN_DONOR_ERRMSG_ARR'])) { ?>
                      
                        <?php } //unset($_SESSION['LOGIN_NGO_ERRMSG_ARR']); ?>

            </div>
			<input type="submit" class="btn btn-primary" name="dlogin" value="Login" onclick="return submitSignin('emailDonor','passwordDonor')">
          </form>
        
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


      <div class="modal fade" id="SignInNGO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Sign In</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-6">
        <h3 class="dark-grey">Registration</h3>
        <form action="session/login_ngo.php" method="post">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" id="emailNgo" name="emailNgo" required="required">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" id="passwordNgo" name="passwordNgo" required="required" minlength="6">
              
            </div>
			<input type="submit" class="btn btn-primary" name="dlogin" value="Login" onclick="return submitSignin('emailNgo','passwordNgo')">
          </form>
        
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



      

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <--<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="mission.png" alt="Generic placeholder image" width="140" height="140">
          <h2>OUR MISSION</h2>
		
          <p><a class="btn btn-default" href="Mission.html" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="FAQ.png" alt="Generic placeholder image" width="140" height="140">
          <h2>FREQUENTLY ASKED QUESTION</h2>
          
          <p><a class="btn btn-default" href="FAQs.html" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="contact.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>CONTACTS</h2>
         
          <p><a class="btn btn-default" href="contact.html" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


     


      <!-- FOOTER -->
      <footer>
		
		<div class="row" style="color:black;background-color:white;width:100%";>
			
			<div class="col-sm-5">
				© 2015 Dont Dump,Donate by Titans
			</div><!--/.col-->
			
			
		</div><!--/.row-->	

	</footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
