<?php
    include_once '../../config/database.php';

    if($admin->isLoggedIn()) {
        $admin->userLogout();
        $admin->redirect('../../public/home.php');
        echo 'Logged out :)';
    }
?>