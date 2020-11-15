<?php

if (isset($_POST["submit"])) {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $username = filter_var($_POST["uid"], FILTER_SANITIZE_SPECIAL_CHARS);
    $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_SPECIAL_CHARS);
    $pwdRepeat = filter_var($_POST["pwdrepeat"], FILTER_SANITIZE_SPECIAL_CHARS);

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../../signUp.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../../signUp.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../../signUp.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../../signUp.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../../signUp.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}
else{
    header("location: ../../signUp.php");
    exit();
}