<?php
ob_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

if (isset($_POST["sbmtForgot"]))
{
     $selector = bin2hex(random_bytes(8));
     $token = random_bytes(32);

     $url = "https://the-uocafe.online/admin/securityLogIn/reset/securityReset.php?selector=" . $selector . "&validator=" . bin2hex($token);

     $expires = date("U") + 1800;

     require_once('../../../includes/dbh.inc.php');

     $usrEmail= $_POST["frgtEmail"];
    
     //Deleting existing user token...
     $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?;";
     $stmt = mysqli_stmt_init($conn);
     
     if (!mysqli_stmt_prepare($stmt, $sql))
     {
        echo "There was an error!";
        exit();
     }
     else
     {
         mysqli_stmt_bind_param($stmt, "s", $usrEmail);
         mysqli_stmt_execute($stmt);
     }

     //Inserting user and its tokens...
     $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
     $stmt = mysqli_stmt_init($conn);

     if (!mysqli_stmt_prepare($stmt, $sql))
     {
        echo "There was an error!";
        exit();
     }
     else
     {
         $hashedToken = password_hash($token, PASSWORD_DEFAULT);
         mysqli_stmt_bind_param($stmt, "ssss", $usrEmail, $selector, $hashedToken, $expires);
         mysqli_stmt_execute($stmt);
     }

     mysqli_stmt_close($stmt);
     mysqli_close($conn);

     $to = $usrEmail;
     $subject = "Reset your password for UOCafe.com";
     $message = "<p>We recieved a password reset request. The link to reset your password is below if you did not make this request, you can ignore this email.</p>";
     $message .= "<p>Here is your password reset link: <br>";
     $message .= '<a href = "' . $url . '">' . $url . '</a></p>';

     $headers = "From: Urban Orchard Cafe management <UOC.Management@gmail.com>\r\n";
     $headers .= "Reply-To: UOC.Management@gmail.com\r\n";
     $headers .= "Content-type: text/html\r\n";

    // Load Composer's autoloader
    require '../../../vendor/autoload.php';

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
     header("location: securityForgot.php?reset=success");
     exit();

}
else
{
    header("location: ..securityForgot.php");
    exit();
}