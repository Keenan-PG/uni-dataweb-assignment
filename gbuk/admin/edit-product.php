<?php
    // DB AND CONFIG
    require_once '../../config/admin-conf.php'; // db and admin object

    if(!$admin->isLoggedIn()) {
        $admin->redirect('./login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

      // saving variables passed from admin/home.php
      $pID = $_GET['productID'];
      $pName = $_GET['productName'];

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      // saving variables from edit from
      $pID = $_POST['edit_pID']; 
      $pName = $_POST['edit_pName']; 
      $pPrice = $_POST['edit_pPrice']; 
      $pDesc = $_POST['edit_pDesc']; 

      // executing edit method
      $admin->editProduct($pID, $pName, $pPrice, $pDesc);

      echo '<p>Edit saved. :)</p>';
      echo '<a href="home.php">Go back home?</a>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Product | T2T</title>
    <link href="https://fonts.googleapis.com/css?family=Mandali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/take2tech/assets/styles/styles.css">
</head>
<body>
    <a href="home.php">Back</a>
  <div class="container">
      <div class="form-container">
          <form method="post">
            <?php
              if(isset($pName)) {
            ?>
                <h1>Edit product: <?php echo $pName; ?></h1>
            <?php
              }
            ?>
              <?php
                $admin->populateEditForm($pID);
              ?>
              <div class="clearfix"></div><hr />
              <div class="form-group">
                  <button type="submit" class="button">
                      Edit Product
                  </button>
              </div>
          </form>
        </div>
  </div>

</body>
</html>