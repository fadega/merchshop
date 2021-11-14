<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
//   $pathh = dirname( __FILE__ );echo $pathh; die;
  //require_once str_replace("\\","/",dirname(__FILE__)). '/PHPMailer/src/Exception.php';
  //require_once str_replace("\\","/",dirname(__FILE__)) . '/PHPMailer/src/PHPMailer.php';
  //require_once str_replace("\\","/",dirname(__FILE__)) . '/PHPMailer/src/SMTP.php';

 

//   require_once dirname( __FILE__ ) . '';
//   require 'PHPMailer-master/src/Exception.php';
//   require 'PHPMailer-master/src/PHPMailer.php';
//   require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  //$mail->Host       = "smtp.mail.yahoo.com";
  $mail->Username   = "your-email@gmail.com";
  $mail->Password   = "your-app-password";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "recipient-name");
  $mail->SetFrom("your-email@gmail.com", "your-sender-name");
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    //echo "Opps, somthing went wrong. Email not sent";
    //var_dump($mail);
    return false;
  } else {
    //echo "Email sent successfully";
    return true;
  }

}

?>