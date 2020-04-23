<?php 
    session_start();
    $_SESSION['active'] = false;
    session_destroy();
    header('Location: index.php');
?>