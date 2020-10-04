<?php
    
    require("database/classes.php");
    session_start();
    
    $user = $_SESSION['user'];
    $user->setLogin(OFFLINE);
    unset($_SESSION['user']);
    session_destroy();
    header("Location:signin.php");
?>