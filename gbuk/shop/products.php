<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Products | Take2Tech</title>
</head>
<body>
    <h1>Our products</h1>

    <p>Products by condition:</p>
    <ul>
        <li><a href="products/condition/new.php">New</a></li>
        <li><a href="products/condition/used.php">Used</a></li>
        <li><a href="products/condition/refurbished.php">Refurbished</a></li>
    </ul>

    <p>Products by category:</p>
    <ul>
        <li><a href="products/category/extended-reality.php">Extended Reality (AR/VR)</a></li>
        <li><a href="products/category/games-consoles.php">Games Consoles</a></li>
        <li><a href="products/category/laptops.php">Laptops</a></li>
        <li><a href="products/category/personal-computers.php">Personal Computers</a></li>
        <li><a href="products/category/other.php">Other</a></li>
    </ul>

    <?php
        // DB AND CONFIG
        include_once '../../classes/Class.Customer.php'; // customer class
        require_once '../../config/customer-conf.php'; // db and customer object

        $customer->showProducts();
    ?>
</body>
</html>