<?php

if (isset($_POST["submit"])) {

    $username = filter_var($_POST["uid"], FILTER_SANITIZE_SPECIAL_CHARS);
    $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_SPECIAL_CHARS);

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $pwd);
}
else{
    header("location: ../../login.php");
    exit();
}