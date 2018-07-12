    <?php
  
    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
        $response = array();
         
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

    //this file contains the code which helps in sending email to a given email address

        require_once("class.phpmailer.php");
        require_once("class.smtp.php");
        global $error;
		echo "string";
		echo $_POST['type'];
        if($_POST['type']=="donor"){
            $current_email = $_POST['email'];
            $varificationFor = "DONOR";
        }elseif($_POST['type']=="ngo"){
            $current_email = $_POST['email'];
            $varificationFor = "NGO";
        }else{
            //header("location: error.php");
        }
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
        $newpass=randomPassword();
		$newpass1 = sha1($newpass);
        if($varificationFor == "DONOR"){
        $sql = "UPDATE general_user SET password='$newpass1' WHERE email='$current_email'";

        if (mysqli_query($conn, $sql)) {
        $mail->Body .= 'Your new password is :   ' .$newpass;
        echo 'sent';

        $mail->AddAddress($current_email);
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
        } 
        else {
       //error sq;
        }
            
        }

        //NGO
        else{
        $sql = "UPDATE ngo SET password='$newpass1' WHERE email='$current_email'";

        if (mysqli_query($conn, $sql)) {
        $mail->Body .= 'Your new password is :   ' .$newpass;
        echo 'sent';

        $mail->AddAddress($current_email);
        $mail->IsHTML(true);
        $mail->WordWrap    = 900; 
        if (!$mail->Send()) {
          //  $error = 'Mail error: ' . $mail->ErrorInfo;
           // header("refresh:0.001;url=".$_SESSION['LINK_INDEX']);
          //  return false;
        } else {
            $mail->SmtpClose();
           // $_SESSION['JUST_SIGNEDUP'] = true;
		   
            header("location: index.php");
          //  return true;
            } 
        } 
        else {
       
        }
        }
        echo "what is theeeee ";
    header("location: index.php");

    	?>
