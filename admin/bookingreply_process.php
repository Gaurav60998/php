<?php
session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:adminlogin.html");

}
require_once "config.php";// Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\star\admin\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\star\admin\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\star\admin\PHPMailer-master\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $queryId = $_POST['id'];
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);

    // Update user query with the reply in the database
    $updateQuery = "UPDATE booking SET reply='$reply' WHERE id='$queryId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "Reply sent successfully!";
        
        // Fetch user email from the original query
        $fetchEmailQuery = "SELECT email FROM booking WHERE id = $queryId";
        $emailResult = mysqli_query($conn, $fetchEmailQuery);
        $emailData = mysqli_fetch_assoc($emailResult);
        $userEmail = $emailData['email'];

        // Send reply to the user using PHPMailer
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

            // Recipients
            $mail->setFrom($email, 'Admin');
            $mail->addAddress($userEmail);
            $mail->addReplyTo($email, 'labdemo');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reply to Your Query';
            $mail->Body = $reply;

            $mail->send();
            header("Location:booking.php");
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "Error sending reply: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
?>
