<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laptops | Take2Tech</title>
</head>
<body>
    <h1>Laptops</h1>
    <?php
        require_once '../../config/database.php';

        // setting to lt for switch
        $input="LT";

        // giving input to showProducts
        $customer->showProducts($input);
    ?>
</body>
</html>