<?php
session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:adminlogin.html");

}
include_once "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data based on the ID
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    // Redirect to usermanage.php if no ID is provided
    header("Location: usermanage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
<body>
<div class="container border border-1 border-dark my-5 p-3">
    <h2>Edit User</h2>
    <form action="edit_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="" name="name"  value="<?php echo $row['name']; ?>" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id=""  name="email"  value="<?php echo $row['email']; ?>" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="" name="address" placeholder="Enter address" style="height: 150px" required><?php echo $row['address']; ?></textarea>
                                            <label for="address">address</label>
                                        </div>
                                    </div>
        <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
        <div><br>
        <a class="btn btn-success w-100 py-3" href="usermanage.php" role="button">Back</a>
</div>
    </form>
</div>
</body>
</html>
