<?php
include "db.php";

$product_name = mysqli_real_escape_string($db, $_POST["product_name"]);
$category = mysqli_real_escape_string($db, $_POST["category"]);
$stock_date = mysqli_real_escape_string($db, $_POST["stock_date"]);
$quantity = mysqli_real_escape_string($db, $_POST["quantity"]);
$unit_price = mysqli_real_escape_string($db, $_POST["unit_price"]);

$query = "INSERT INTO products (product_name, category, stock_date, quantity, unit_price) 
          VALUES ('$product_name', '$category', '$stock_date', '$quantity', '$unit_price')";

$result = mysqli_query($db, $query);

if ($result) {
    echo "
    <script>
        alert('Added Success');
        window.location.href='index.php';
    </script>
    ";
} else {
    // Display error message
    echo "Error: " . mysqli_error($db);
}
?>
