<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extended Reality Products | Take2Tech</title>
</head>
<body>
    <h1>Extended Reality products</h1>
    <?php
        include_once '../../../../classes/Class.Admin.php';
        include_once '../../../../classes/Class.Customer.php';
        require_once '../../../../config/database.php';
        
        // setting to xr for switch
        $input="XR";
        
        // giving input to showProducts
        $customer->showProducts($input);
    ?>
</body>
</html>