<?php
    // DB AND CONFIG
    require_once '../../config/admin-conf.php'; // db and admin object

    if(!$admin->isLoggedIn()) {
        $admin->redirect('./login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

      $pID = $_GET['productID'];
      $pName = $_GET['productName'];

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      $pID = $_POST['i_pID'];
      $cName = $_POST['i_cName']; 
      $cEmail = $_POST['i_cEmail']; 
      $cPhone = $_POST['i_cPhone']; 
      $rForTime = $_POST['i_rTime']; 

      //cosmetics
      $pName = $customer->getProductName($pID);

      $customer->reserveProduct($cName,$cEmail,$cPhone,$pID, $rForTime);
      echo '<p>'.$cName.'! You reserved '.$pName.' for date/time: '.$rForTime.'</p>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Product | T2T</title>
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
                <h1>Edit product: <?php echo $pName; ?></h1>
            <?php
              }
            ?>
              <?php
                $admin->populateEditForm($pID);
              ?>
              <div class="clearfix"></div><hr />
              <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary">
                      Edit Product
                  </button>
              </div>
          </form>
        </div>
  </div>

</body>
</html>