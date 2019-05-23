<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extended Reality Products | Take2Tech</title>
</head>
<body>
    <a href="../../products.php">Back</a>
    <h1>Extended Reality products</h1>
    <?php
    
        // DB AND CONFIG
        include_once '../../../../classes/Class.Customer.php'; // customer class
        require_once '../../../../config/customer-conf.php'; // db and customer object
        
        // setting to xr for switch (filtering)
        $input="XR";
        
        // giving input to showProducts
        $customer->showProducts($input);
    ?>
</body>
</html>