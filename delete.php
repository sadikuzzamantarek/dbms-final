<?php
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    echo "<script>alert('No ID specified');</script>";
    exit;
}
 
$query = "DELETE FROM students WHERE id = $id";
$result = $db->query($query);

if($result){
    echo "<script>alert('Record deleted successfully');</script>";
    header("Location: index.php");
} else {
    echo "<script>alert('Error deleting record from the database');</script>";
    header("Location: index.php");
}

$db->close();
?>

