<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Products | Take2Tech</title>
</head>
<body>
    <?php
        require_once '../../config/database.php';

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $pID = $_GET['productID'];

            $pName = $customer->getProductName($pID);
        }
    ?>
            
        <h1>Reserve product: <?php echo $pName; ?></h1>

        <p>At Take2Tech, we know the value of face-to-face interaction. 
        We don't expect you to buy our products straight from our website - instead, reserve your spot to test it, ensure it's everything you want. 
        Meet the team, actually speak to somebody. That's what makes us Take2Tech.</p>

</body>
</html>