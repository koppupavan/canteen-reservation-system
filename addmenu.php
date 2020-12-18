<?php 

include 'includes/db.php';

if(isset($_POST['done'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `menu`(name,price,status) VALUES('$name',$price,'$status')";

    $query = mysqli_query($con,$sql);

    header('location: addmenu.php');

}

?>

<?php 

include 'includes/db.php';

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "UPDATE `menu` SET name = '$name', price = $price, status = '$status' WHERE food_id = $id ";

    $query = mysqli_query($con,$sql);

    header('location: addmenu.php');

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Canteen Admin Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
</head>
<body>
    
    <?php include('includes/adminnavbar.php') ?>
    <br>
    <div class="container">
        <div class="col-lg-12">
            <div style="display: none;" id="menu">
                <form action="" method="post">
                    <h2 class="text-center">Add Food</h2>       
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter food name" name="name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter food price" name="price" required="required">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required="required">
                            <option value="0">Select status</option>
                            <option value="available">Available</option>
                            <option value="not-available">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="done">Add</button>
                    </div>      
                </form>
            </div>

            <div style="display: none;" id="upmenu">
                <form action="" method="post">
                    <h2 class="text-center">Update Food</h2>   
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" required>
                    </div>    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter food name" name="name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter food price" name="price" required="required">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required="required">
                            <option value="0">Select status</option>
                            <option value="available">Available</option>
                            <option value="not-available">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
                    </div>      
                </form>
            </div>

            <h1>Today's Menu
                <a data-fancybox data-src="#menu" href="" class="btn btn-primary float-right">+Add Food</a>
            </h1>
            <br>
            <table class="table">
                
                <tr class="bg-primary" style="color: white;">

                    <th>Food Id</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php 
                    
                    include 'includes/db.php';
                    $sql = "SELECT * FROM `menu`";

                    $query = mysqli_query($con,$sql);

                    while($res = mysqli_fetch_array($query)){

                ?>

                <tr style="font-weight: bold;">

                    <td> <?php echo $res['food_id']; ?> </td>
                    <td> <?php echo $res['name']; ?> </td>
                    <td> <?php echo $res['price']; ?> </td> 
                    <td> <?php echo $res['status']; ?> </td>
                    
                    <td><a data-fancybox data-src="#upmenu" href="" class="btn btn-info">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $res['food_id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php 

                    }

                ?>

            </table>

        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body>
</html>