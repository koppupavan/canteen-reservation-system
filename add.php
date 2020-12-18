<?php 


include 'includes/db.php';
    
$id = $_GET['id'];

$sql = "INSERT into `orders`(ticket_id,food_id,order_time) values(1,$id,now())";

$query = mysqli_query($con,$sql);

header('Location: userorder.php');


?>