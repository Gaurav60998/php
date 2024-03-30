<?php


session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:Login.html");

}

include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $successMessage = " Query Form submitted successfully!";
        echo "<script>
        alert('Query Form submitted successfully!');
        window.location.href = 'contact.html';
      </script>";
exit();
    } else {
        echo "Error sending message: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
mysqli_close($conn);
?>

