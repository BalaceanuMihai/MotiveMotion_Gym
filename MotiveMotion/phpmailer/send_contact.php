<?php
require_once('class.phpmailer.php');
require_once('mail_config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    $mail->IsSMTP();

    try {
     
      $mail->SMTPDebug  = 0;                     
      $mail->SMTPAuth   = true; 
    
      $to='dawphp2023@gmail.com';
      $nume='Daw Project';
    
      $mail->SMTPSecure = "ssl";                 
      $mail->Host       = "smtp.gmail.com";      
      $mail->Port       = 465;                   
      $mail->Username   = $username;  			// GMAIL username
      $mail->Password   = $password;            // GMAIL password
      
      
        $mail->SetFrom($email, $name);
        $mail->AddAddress('dawphp2023@gmail.com', 'Daw Project');
        $mail->AddReplyTo($email, $name);

        $mail->Subject = 'Contact Form Submission';
        $mail->AltBody = 'To view this message, please use an HTML compatible email viewer!';
        $mail->MsgHTML("<h1>Contact Form Submission</h1><p><strong>Name:</strong> $name</p><p><strong>Email:</strong> $email</p><p><strong>Message:</strong><br>$message</p>");

        $mail->Send();
        echo "Message Sent OK</p>\n";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>