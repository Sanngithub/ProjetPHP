<?php
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
        session_unset();
        $_SESSION['error_login'] = 'Authentification requise pour accéder au site !';
        header('location:../vue/index.php');
    }
?>