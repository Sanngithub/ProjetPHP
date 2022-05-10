<?php
    session_start();
    if(isset($_SESSION)){
        $_SESSION = array();
        setcookie (session_id(), "", time() - 3600);
        session_destroy();
        session_write_close();
        session_start();
    }
?>


