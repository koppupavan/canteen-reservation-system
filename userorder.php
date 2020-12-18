
<!DOCTYPE html>
<html>
<head>
    <title>Canteen User Portal</title>
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
    
    <?php include('includes/usernavbar.php') ?>
    <br>
    <div class="container">
        <div class="col-lg-12">
            <div style="display: none;" id="payment">
                <form action="" method="post">
                    <h2 class="text-center">Payment</h2>   
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Radios" id="offline" value="option1">
                      <label class="form-check-label" for="exampleRadios1">
                        Offline
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Radios2" id="online" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                        Online
                      </label>
                    </div>
                    <div class="form-group" id="num">
                        <label>Please send amount in this number</label><br>
                        <strong>1234567890</strong>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="pay" id="paybtn">Pay</button>
                    </div>      
                </form>
            </div>
            <h1>Your Orders
                <a data-fancybox data-src="#payment" href="" class="btn btn-primary float-right">Payment</a>
            </h1>
            <br>
            <table class="table">
                
                <tr class="bg-primary" style="color: white;">

                    <th>Order ID</th>
                    <th>Ticket ID</th>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Cancel</th>

                </tr>
                <?php 
                    
                    include 'includes/db.php';
                    $sql = "SELECT * FROM `menu` Natural Join `orders`";

                    $query = mysqli_query($con,$sql);

                    while($res = mysqli_fetch_array($query)){

                ?>

                <tr style="font-weight: bold;">

                    <td> <?php echo $res['order_id']; ?> </td>
                    <td> <?php echo $res['ticket_id']; ?> </td>
                    <td> <?php echo $res['food_id']; ?> </td> 
                    <td> <?php echo $res['name']; ?> </td>
                    <td> <?php echo $res['price']; ?> </td>
                    <td><a href="cancel.php?id=<?php echo $res['order_id'];?>" class="btn btn-success">Cancel</a></td>
                </tr>

                <?php 

                    }

                ?>

            </table>

        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    $("#num").hide();
$(document).ready(function(){
  $("#online").click(function(){
    $("#num").show();
    $("#paybtn").hide();
    $("#offline").prop("checked", false);
  });
  $("#offline").click(function(){
    $("#num").hide();
    $("#paybtn").show();
    $("#online").prop("checked", false);
  });
  $("#paybtn").click(function(){
    alert("Pay offline");
  });
  
});
</script>
</body>
</html>