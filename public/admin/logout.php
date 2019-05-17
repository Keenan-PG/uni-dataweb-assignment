<?php
include_once '../../config/database.php';

if($user->is_loggedin())
    {
        $user->logout();
        $user->redirect('./login.php');
    }
?>