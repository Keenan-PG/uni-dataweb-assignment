<?php
require_once '../../config/database.php';

if($user->is_loggedin()!="")
{
 $user->redirect('home.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 $pName = $_POST['i_pName'];
 $pType = $_POST['i_pType'];
 $pCondition = $_POST['i_pCondition'];
 $pPrice = $_POST['i_pPrice'];
 $pDescription = $_POST['i_pDescription'];
 $pImg = $_POST['i_pImgURL'];
  
 $user->saveProduct($pName,$pType,$pCondition,$pPrice,$pDescription,$pImg);
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
            <h2>Create a product</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  
                    <p>Error: <?php echo $error; ?></p>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="i_pName" placeholder="product name" required />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="i_pType" placeholder="product type" required />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="i_pImgURL" placeholder="product img url" required />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="i_pPrice" placeholder="product price" required />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="i_pCondition" placeholder="product condition" required />
            </div>
            <div class="form-group">
             <input type="textarea" class="form-control" name="i_pDescription" placeholder="product description" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    Create Product
                </button>
            </div>
        </form>
       </div>
</div>

</body>
</html>