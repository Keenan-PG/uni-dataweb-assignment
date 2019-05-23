<?php
    // DB AND CONFIG
    require_once '../../config/admin-conf.php'; // db and admin object

  if($admin->isLoggedIn()) {
    $admin->redirect('home.php');
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    
    if($admin->login($uname,$upass)) {
      $admin->redirect('./home.php');
    } else {
      $error = "Wrong Details!";
    }
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee login | Take2Tech</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign in</h2><hr />
          <?php
            if(isset($error)) {
          ?>
            <p>Error: <?php echo $error; ?></p>
          <?php
            }
          ?>
            <div class="form-group">
            <label for="username">Enter username:</label>
             <input type="text" class="form-control" name="username" placeholder="username" value="gnidloGnaneeK" required />
            </div>
            <div class="form-group">
            <label for="adminname">Enter password:</label>
             <input type="password" class="form-control" name="password" placeholder="password" value="12ad34mi56n" required />
            </div>
            <small><i>*pre-populated for easy login (would not do this real world)</i></small>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                </button>
            </div>
        </form>
       </div>
</div>

</body>
</html>