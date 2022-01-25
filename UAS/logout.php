<?php
    session_start();
    $_SESSION=[];
    $_SESSION['username'] = null;
    session_unset();
    session_destroy();

    header("Location:login.php");
?>