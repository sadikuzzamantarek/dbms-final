<?php
include "./db.php";

$param  = $_GET['id'];

$query = "DELETE FROM products WHERE id=$param";

$result = mysqli_query($db, $query) or die("DIE");

if($result){
    echo "
    <script>
        alert('Delete Success');
        window.location,href='index.php'
    </script>
    ";
}



?>