<?php


class User {
    private static $passwords = [
        '$2y$10$tAaTupsmRU8dEmo51i0.8OM1Bso5xEau88WdwYBvHnZ/8YC6/VoA2'
    ];

    public static function authenticate($password) {
        foreach(User::$passwords as $pw) {
            if(password_verify($password, $pw)) {
                return true;
            }
        }
        return false;
    }

    public static function login() {
        $_SESSION["loggedin"] = true;
    }

    public static function logout() {
        session_destroy();
    }
    
    public static function loggedin() {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) return true;
        return false;
    }
    public static function requireLogin() {
        if(!User::loggedin()) {
            header("Location: index.php");
            die();
        }
    }

}


?>