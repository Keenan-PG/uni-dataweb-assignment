<?php
include_once '../../config/database.php';

if(!$user->is_loggedin())
    {
        $user->redirect('.././home.php');
    }
    $user_id = $_SESSION['user_session'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE ID=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['Username']); ?></title>
</head>

<body>

<div class="header">
    <div class="right">
     <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
welcome : <?php print($userRow['Username']); ?>
</div>
</body>
</html>