<?php
    // DB AND CONFIG
    require_once '../../config/admin-conf.php'; // db and admin object

    if($admin->isLoggedIn()) {
        $admin->userLogout();
        $admin->redirect('../../gbuk/shop/home.php');
        echo 'Logged out :)';
    }
?>