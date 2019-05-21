<?php
    include_once '../../config/database.php';

    if($user->isLoggedIn()) {
        $user->userLogout();
        $user->redirect('../../public/home.php');
        echo 'Logged out :)';
    }
?>