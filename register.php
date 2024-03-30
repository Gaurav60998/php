<?php 

include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\star\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\star\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\star\PHPMailer-master\src\SMTP.php';

$name=$_POST["name"];
$uemail=$_POST["email"];
$address=$_POST["address"];
$pass=$_POST["pass"];


$sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`) VALUES (Null, '$name', '$uemail', '$pass', '$address');";

if (mysqli_query($conn,$sql)) {
    $mail = new PHPMailer(true);

$email = 'gauravdakare8@gmail.com';
$password = 'wgmc cvqn bbeb mzwz';

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient information
    $mail->setFrom($email, 'lab demo');
    $mail->addAddress($uemail, 'demo');
    $mail->addReplyTo($email, 'labdemo');


    $mail->isHTML(true);
    $mail->Subject = 'Wlecome to Star RESTAURANTS';
    $mail->Body    = 'Congratulation, your accout has been successfully created';

    $mail->send();
    header("Location: login.html");
} catch (Exception $e) {
    echo 'Failed to send email: ', $mail->ErrorInfo;
}
} else {
echo "Something went wrong". mysqli_error($conn);
}

mysqli_close($conn);

?>