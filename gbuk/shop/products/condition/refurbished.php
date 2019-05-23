<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Refurbished Products | Take2Tech</title>
</head>
<body>
    <a href="../category/all.php">Back</a>
    <h1>Refurbished Products</h1>
    <?php
    
        // DB AND CONFIG
        include_once '../../../../classes/Class.Customer.php'; // customer class
        require_once '../../../../config/customer-conf.php'; // db and customer object

        // setting to refurb for switch (filtering)
        $input="refurb";

        // giving input to showProducts
        $customer->showProducts($input);
    ?>
</body>
</html>