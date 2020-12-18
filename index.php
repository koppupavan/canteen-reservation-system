<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Canteen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="bg-dark text-center text-white p-4" style="font-size: 30px; font-weight: bold;">Welcome to Canteen</div>

    <!-- Admin Login -->
    <?php
    require('includes/db.php');
    session_start();
    if (isset($_POST['adminUsername'])){
        $username = stripslashes($_REQUEST['adminUsername']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['adminPassword']);
        $password = mysqli_real_escape_string($con,$password);
            $query = "SELECT * FROM `admin` WHERE adminname='$username'
    and password='$password'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
            $_SESSION['adminUsername'] = $username;
            echo "<script>alert('Welcome to admin portal')</script>";
            header("Location: adminindex.php");
            }else{
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<script>window.location.href = 'index.php'</script>";
        }
        }else{
    ?>
    <div style="display: none;" id="admin">
        <form action="" method="post">
            <h2 class="text-center">Admin Login</h2>       
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter username" name="adminUsername" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter password" name="adminPassword" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="admin">Login</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            </div>        
        </form>
    </div>
    <?php } ?>


    <!-- user login -->
    <?php
    require('includes/db.php');
    if (isset($_POST['userUsername'])){
        $username = stripslashes($_REQUEST['userUsername']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['userPassword']);
        $password = mysqli_real_escape_string($con,$password);
            $query = "SELECT * FROM `users` WHERE username='$username'
    and password='$password'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
            $_SESSION['userUsername'] = $username;
            header("Location: userindex.php");
            }else{
        echo "<script>alert('Invalid Username or Password');</script>";
        echo "<script>window.location.href = 'index.php'</script>";
        }
        }else{
    ?>
    <div style="display: none;" id="user">
        <form action="" method="post">
            <h2 class="text-center">User Login</h2>       
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter username" name="userUsername" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter password" name="userPassword" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="user">Login</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            </div>        
        </form>
    </div>
    <?php } ?>

    <div class="center" style="background-image: url('bg.jpg');">
        <a data-fancybox data-src="#admin" href="javascript:;" class="btn btn-danger btn-lg">Login as Admin</a>
        <p class="p-3" style="font-weight: bold;"></p>
        <a data-fancybox data-src="#user" href="javascript:;" class="btn btn-danger btn-lg">Login as User</a>
    </div>

    <footer class="bg-dark text-center text-white p-4" style="font-size: 15px; font-weight: bold;">
        @2020 Canteen Management System
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body>
</html>