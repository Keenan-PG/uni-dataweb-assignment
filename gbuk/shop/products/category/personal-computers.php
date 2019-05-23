<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Computers | Take2Tech</title>
</head>
<body>
    <h1>Personal Computers</h1>
    <?php
        require_once '../../config/database.php';

        // setting to pc for switch
        $input="PC";

        // giving input to showProducts
        $customer->showProducts($input);
    ?>
</body>
</html>