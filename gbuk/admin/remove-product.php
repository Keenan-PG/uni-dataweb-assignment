<?php
    // DB AND CONFIG
    require_once '../../config/admin-conf.php'; // db and admin object

    //making sure we're logged in
    if(!$admin->isLoggedIn()) {
        $admin->redirect('./login.php');
    }

    // get is grabbing id & name from home.php, post is actually deleting it with button below
    if($_SERVER['REQUEST_METHOD'] == 'GET') {

      // saving variables passed from admin/home.php
      $pID = $_GET['productID'];
      $pName = $_GET['productName'];

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      // deleting product
      $pID = $_POST['productID'];

      $admin->deleteProduct($pID);
      
      echo '<p>Product Deleted!</p>';
      echo '<a href="home.php">Go back home?</a>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Remove Product | T2T</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
    <a href="home.php">Back</a>
    <div class="container">
        <div class="form-container">
            <form method="post">
                <?php
                  if(isset($pName)) {
                ?>
                    <h1>Delete product: <?php echo $pName; ?></h1>
                <?php
                  }
                ?>
                <p>Are you sure you want to delete this product?</p>
                <input type="hidden" class="form-control" name="productID" value="<?php echo $pID; ?>" required />
                <input type="submit" value="Confirm">
            </form>
                <a href="home.php"><button>No</button></a>
          </div>
    </div>
</body>
</html>