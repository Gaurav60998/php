
<?php

// Include the database connection file
include("config.php"); // Update with your actual database connection file



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and store form data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $datetime = date('Y-m-d H:i:s', strtotime(mysqli_real_escape_string($conn, $_POST["datetime"])));
    $people = mysqli_real_escape_string($conn, $_POST["people"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    // Insert data into the bookings table
    $sql = "INSERT INTO booking (name, email, datetime, people, request) VALUES ('$name', '$email', '$datetime', '$people', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('tabal booking request is send');
        window.location.href = 'booking.html';
      </script>";
exit();
        // You can redirect the user to a thank you page or perform other actions as needed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

