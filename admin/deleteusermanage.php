<?php
session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:adminlogin.html");

}
include_once "config.php";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete user based on the ID
    $query = "DELETE FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    // Redirect to usermanage.php after deletion
    header("Location: usermanage.php");
    exit();
} else {
    // Redirect to usermanage.php if no ID is provided
    header("Location: usermanage.php");
    exit();
}
?>
