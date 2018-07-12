<?php

//starts the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//this file contains the code which helps in sending email to a given email address

    require_once("class.phpmailer.php");
    require_once("class.smtp.php");
    global $error;

    if(isset($_GET['donor'])){
        $current_email = $_GET['donor'];
        $varificationFor = "DONOR";
    }elseif(isset($_GET['ngo'])){
        $current_email = $_GET['ngo'];
        $varificationFor = "NGO";
    }else{
        header("location: error.php");
    }
    $varificationCode = $_GET['vcode'];
	echo $current_email;    //email address to which activation link has to be sent
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
    $mail->Subject = 'Activate Your Account ';
    $mail->Body = 'You have have been registered on Sampark. copy paste the following link after hi and before the beginging of hello'; 
    $mail->Body .= '<br/><br/><br/><b> Click on this link to activate your account ';

    if($varificationFor == "DONOR"){
         $mail->Body .= 'hi'.$_SESSION['LINK_INDEX'].'?vcode='.$varificationCode.'&demail='.$current_email.'hello';  
    }else{
        $mail->Body .= '<a href="'.$_SESSION['LINK_INDEX'].'?vcode='.$varificationCode.'&nemail='.$current_email.'"> Click Here </a>';
    }
    
    $mail->AddAddress($current_email);
    $mail->IsHTML(true);
    $mail->WordWrap    = 900; 
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        header("refresh:0.001;url=".$_SESSION['LINK_INDEX']);
		return false;
    } else {
        $mail->SmtpClose();
        $_SESSION['JUST_SIGNEDUP'] = true;
        Header("Location: index.php");
		return true;
		}

	?>
