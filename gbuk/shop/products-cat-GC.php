<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games Consoles | Take2Tech</title>
</head>
<body>
    <h1>Our products</h1>
    <?php
        require_once '../../config/database.php';
        $customer->showProducts();
    ?>
</body>
</html>