<?php
session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:adminlogin.html");

}
include('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "Error: Missing or invalid 'id' parameter.";
    exit();
}

$sql = "DELETE FROM contact WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location:q.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
