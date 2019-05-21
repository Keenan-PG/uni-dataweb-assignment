<?php
    include_once '../../config/database.php';

    if($user->is_loggedin()) {
            $user->logout();
            $user->redirect('./login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged out | Take2Tech</title>
</head>
<body>
</body>
</html>