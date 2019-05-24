<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products | Take2Tech</title>
    <link href="https://fonts.googleapis.com/css?family=Mandali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/take2tech/assets/styles/styles.css">
</head>
<body>
    <a href="../../home.php">Back</a>
    <h1>All products</h1>
    <div class="cats">
        <p>Products by condition:</p>
        <ul>
            <li><a href="../condition/new.php">New</a></li>
            <li><a href="../condition/used.php">Used</a></li>
            <li><a href="../condition/refurbished.php">Refurbished</a></li>
        </ul>
    </div>

    <div class="cats">
        <p>Products by category:</p>
        <ul>
            <li><a href="../category/extended-reality.php">Extended Reality (AR/VR)</a></li>
            <li><a href="../category/games-consoles.php">Games Consoles</a></li>
            <li><a href="../category/laptops.php">Laptops</a></li>
            <li><a href="../category/personal-computers.php">Personal Computers</a></li>
            <li><a href="../category/other.php">Other</a></li>
        </ul>
    </div>

    <div class="cats">
        <p>Type:</p>
        <ul>
            <li><a href="../sort/price-low-to-high.php">Price Low to High</a></li>
            <li><a href="../sort/price-high-to-low.php">Price High to Low</a></li>
        </ul>
    </div>

    <?php
        // DB AND CONFIG
        include_once '../../../../classes/Class.Customer.php'; // customer class
        require_once '../../../../config/customer-conf.php'; // db and customer object

        $customer->showProducts();
    ?>
</body>
</html>