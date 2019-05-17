<?php
require_once '../../config/database.php';

if($user->is_loggedin())
{
 $user->redirect('home.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 $uname = $_POST['i_uname'];
 $upass = $_POST['i_password'];
  
 if($user->login($uname,$upass))
 {
  $user->redirect('./home.php');
 }
 else
 {
  $error = "Wrong Details!";
 } 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign in</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  
                    <p>Error: <?php echo $error; ?></p>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="i_uname" placeholder="username" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="i_password" placeholder="password" required />
            </div>
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