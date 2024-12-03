<?php

$param  = $_GET['id'];
include "db.php";

$product_name = mysqli_real_escape_string($db, $_POST["product_name"]);
$category = mysqli_real_escape_string($db, $_POST["category"]);
$stock_date = mysqli_real_escape_string($db, $_POST["stock_date"]);
$quantity = mysqli_real_escape_string($db, $_POST["quantity"]);
$unit_price = mysqli_real_escape_string($db, $_POST["unit_price"]);


$query = "UPDATE products SET product_name ='$product_name',
                categroy ='$category',
                stock_date ='$stock_date',
                quantity ='$quantity',
                unit_price ='$unit_price'
                WHERE id ='$param' ";

$result = mysqli_query($db, $query);

if ($result) {

    echo "
    <script>
        alert('Update Success');
        window.location.href='index.php';
    </script>}
    ";
} else {
    echo "Error: " . mysqli_error($db);
}
