<?php
    include_once '../../config/database.php';

    if($admin->isLoggedIn()) {
        $admin->userLogout();
        $admin->redirect('../../gbuk/shop/home.php');
        echo 'Logged out :)';
    }
?>