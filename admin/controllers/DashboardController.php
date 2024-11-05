<?php
    include_once 'dashboard.php';
    session_start();

    if(isset($_SESSION['nickname'])) {
        $nickname = $_SESSION['nickname'];
    } else {
        header('Location: ../admin/login.php');
        exit();
    }
?>