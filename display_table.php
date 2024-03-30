<?php
include('config.php');

if (isset($_POST['category'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    // Adjust table names based on your actual database
    $tableName = '';
    if ($category === 'breakfast') {
        $tableName = 'breakfast';
    } elseif ($category === 'lunch') {
        $tableName = 'lunch';
    } elseif ($category === 'dinner') {
        $tableName = 'dinner';
    }
// Fetch products from the database
$sql = "SELECT * FROM $tableName";
$result = mysqli_query($conn, $sql);

// Check if there are any productsa
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
  echo" <div class='tab-content'>
  <div id='' class='tab-pane fade show p-0 active'>
  <div class='row g-4'>";

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-2 col-lg-6">
            <div class="d-flex align-items-center">
                <img class="flex-shrink-0 img-fluid rounded" src="admin/breakfast/<?php echo $row['image']; ?>" alt="" style="width: 80px;">
                <div class="w-100 d-flex flex-column text-start ps-4">
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span><?php echo $row['name']; ?></span>
                        <span class="text-primary">₹<?php echo $row['mrp']; ?></span>
                    </h5>
                    <small class="fst-italic"><?php echo $row['description']; ?></small>
                </div>
            </div>
        </div>
        <?php
    }
    echo ' </div>
    </div>';
} else {
    echo "No products found.";
}
}
// Close the database connection
mysqli_close($conn);
?>
