<?php 

//include 'auth.php';
include 'includes/db.php';
    
$id = $_GET['id'];

$sql = "DELETE FROM `menu` Where food_id = $id";

$query = mysqli_query($con,$sql);

header('Location: addmenu.php');


?>