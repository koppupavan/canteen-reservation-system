<?php 

//include 'auth.php';
include 'includes/db.php';
    
$id = $_GET['id'];

$sql = "DELETE FROM `orders` Where order_id = $id";

$query = mysqli_query($con,$sql);

header('Location: userorder.php');


?>