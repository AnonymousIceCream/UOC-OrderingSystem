<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

include('constants.inc.php');
if ($_SESSION['status'] = 'Catering')
{
    $usrEmail= $_GET["email"];
	$to = $usrEmail;
     $subject = "We are currently catering your order, UOCManagement";
     $message = "<p style='text-align: justify;font-size: large;font-weight: bold;'>We are currently processing your order!!</p>";
     $message .= "<p style='text-align: justify;'>Good day dear customer, <br><br> We hope that you enjoyed our services, for any questions or order cancellation please contact the number below: <br><br>";
     $message .= 'Cel: 09277027997</p>';

     $headers = "From: Urban Orchard Cafe management <UOC.Management@gmail.com>\r\n";
     $headers .= "Reply-To: UOC.Management@gmail.com\r\n";
     $headers .= "Content-type: text/html\r\n";

    // Load Composer's autoloader
    require '../vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'UOC.Management@gmail.com'; // email
$mail->Password = 'U0C4dm1n'; // password
$mail->setFrom('UOC.Management@gmail.com', 'Admin'); // From email and name
$mail->addAddress($to); // to email and name
$mail->Subject = $subject;
$mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
// $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}
    header('location:'.SITEURL.'admin/manage_order.php');
    exit();

}