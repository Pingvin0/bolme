<?php

require_once 'core.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"])) {
    if(User::authenticate($_POST["password"])) {
        User::login();
        header("Location: index.php");
        die();
    } else {
        include("badpw.php");
    }
} else {
    header("Location: index.php");
    die();
}

?>