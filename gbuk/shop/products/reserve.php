<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserve a product | Take2Tech</title>
    <link href="https://fonts.googleapis.com/css?family=Mandali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/take2tech/assets/styles/styles.css">
</head>
<body>
    <a href="../home.php">Home</a>
    <a href="category/all.php">Products</a>
    <?php
        // DB AND CONFIG
        include_once '../../../classes/Class.Customer.php'; // customer class
        require_once '../../../config/customer-conf.php'; // db and creating customer object

        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $pID = $_GET['productID'];

            $pName = $customer->getProductName($pID);

        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $pID = $_POST['i_pID'];
            $cName = $_POST['i_cName']; 
            $cEmail = $_POST['i_cEmail']; 
            $cPhone = $_POST['i_cPhone']; 
            $rForTime = $_POST['i_rTime']; 

            //cosmetics
            $pName = $customer->getProductName($pID);

            $customer->reserveProduct($cName,$cEmail,$cPhone,$pID, $rForTime);
            echo '<p>Thank you '.$cName.'! You reserved '.$pName.' for date/time: '.$rForTime.'</p>';
        }
    ?>

        <?php
            if(isset($pName)) {
          ?>
          <h1>Reserve product: <?php echo $pName; ?></h1>
          <?php
            }
          ?>
        <p>At Take2Tech, we know the value of face-to-face interaction. 
        We don't expect you to buy our products straight from our website - instead, reserve your spot to test it, ensure it's everything you want. 
        Meet the team, actually speak to somebody. That's what makes us Take2Tech.</p>

        <h6>Reserve now</h6>
        <form method="post">
            <div class="form-group">
                <label for="i_cName">Customer name:</label>
                <input type="text" class="form-control" name="i_cName" placeholder="Full name" required />
            </div>
            <div class="form-group">
                <label for="i_cEmail">Customer email:</label>
                <input type="email" class="form-control" name="i_cEmail" placeholder="Email" required />
            </div>
            <div class="form-group">
                <label for="i_cPhone">Customer phone:</label>
                <input type="phone" class="form-control" name="i_cPhone" placeholder="Phone #" required />
            </div>
            <div class="form-group">
                <label for="i_rTime">Day/Time:</label>
                <input type="datetime-local" class="form-control" name="i_rTime" required />
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="i_pID" value="<?php echo $pID; ?>" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    Reserve Product
                </button>
            </div>
        </form>
</body>
</html>