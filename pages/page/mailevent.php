    <?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ngo";
		
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

    //starts the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

 $postid = $_POST['variable'];
  error_log($postid, 0);
    //this file contains the code which helps in sending email to a given email address
$queryevents = "SELECT * FROM event where eventid=$postid";
$resultevents = mysqli_query($conn,$queryevents);
$row = mysqli_fetch_assoc($resultevents);
$ngoid = $row['ngoid'];
error_log($ngoid, 0);
$queryevents1 = "SELECT * FROM ngo where ngo_id=$ngoid";
$resultevents1 = mysqli_query($conn,$queryevents1);
$row1 = mysqli_fetch_assoc($resultevents1);
$mailid1 = $row1['email'];
error_log($mailid1, 0);
echo $mailid1;
        require_once("class.phpmailer.php");
        require_once("class.smtp.php");
        global $error;
		
       // $user = $_GET['username'];
        //$varificationCode = $_GET['vcode'];
    	//echo $current_email;    //email address to which activation link has to be sent
    	$username = "testsen3@gmail.com";   //developers email address
        $password = "dotarocks";   //developers email's password
        $mail = new PHPMailer();  // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
    	$mail->host = 'http://localhost'; 
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->Priority = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = '8bit';
    	$mail->IsHTML(true);
        $mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->SetFrom('np@demo.net', ' NGOportalwebsite.com ');
        $mail->Subject = 'New password ';
     //   $mail->Body = 'You have have been registered on Sampark. copy paste the following link after hi and before the beginging of hello'; 
     //   $mail->Body .= '<br/><br/><br/><b> Click on this link to activate your account ';
    
        $mail->Body .= 'Your new password is :   ';
        echo 'sent';

        $mail->AddAddress($mailid1);
        $mail->IsHTML(true);
        $mail->WordWrap    = 900; 
        if (!$mail->Send()) {
            $error = 'Mail error: ' . $mail->ErrorInfo;
           // header("refresh:0.001;url=".$_SESSION['LINK_INDEX']);
            return false;
        } else {
            $mail->SmtpClose();
           // $_SESSION['JUST_SIGNEDUP'] = true;
            //Header("Location: index.php");
            //return true;
            }
         
       
		header("location: index.php");

    	?>
