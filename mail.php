<?php 
session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
  
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username = "akashnayakakash125@gmail.com";           
    $mail->Password = "";
    $mail->IsHTML(true);
    
    $mail->addCustomHeader("List-Unsubscribe:<akashnayakakash125@gmail.com> <http://localhost/task/send%20image%20attachment%20email/index.php");
    $mail->SetFrom("akashnayakakash125@gmail.com","xkdc Comic");
    $mail->AddReplyTo("akashnayakakash125@gmail.com","xkdc Comic");

if(isset($_POST['btn2'])){
    $otp=$_SESSION['otp'];
    $otp2=$_POST['otp'];
    if($otp==$otp2){
    $email = $_SESSION['email'];
    
    $randno=rand(1,2490);
    $mail->AddAddress($email);

    $api_url = 'https://xkcd.com/'.$randno.'/info.0.json';

	$json_data = file_get_contents($api_url);

	$response_data = json_decode($json_data);

    $mail->Subject = "xkdc Comic :".$response_data -> title;
    
    $content = " <p style='color:green;'>".$response_data->alt."<p><br><img alt='".$response_data->transcript."' src='".$response_data->img."'>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.$mail->ErrorInfo.";
  
    } else {
        
unset($_SESSION['otp']);
unset($_SESSION['otp']);
        header('location: index.php?id=1');
    }
}else{
        
        header('location: index.php?id=2');
    }
  
}
if(isset($_POST['btn'])){
   $email = $_POST['email'];
    $mail->AddAddress($email);

 $mail->Subject = "xkdc Comic : OTP";
    $otp=rand(111111,999999);
    $content = " <p style='color:green;'>Your otp <b>".$otp."</b></p>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.$mail->ErrorInfo.";
  
    } else {
         $_SESSION['email']=$email;
        $_SESSION['otp']=$otp;
        header('location: index.php');
    }
  
}
    



?>