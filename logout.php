<?php

require_once 'core.php';

User::logout();
header("Location: index.php");
die();

?>