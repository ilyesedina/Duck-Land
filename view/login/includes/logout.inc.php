<?php
    session_start();
    $_SESSION['userid'] = null;
    $_SESSION['useruid'] = null; 

    header("location: ../index.php");
    exit();
