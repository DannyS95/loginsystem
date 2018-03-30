<?php

session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $_SESSION = array();
    setcookie(session_name(), "", time() -1, "/");
    session_destroy();
    echo "You have logged out <a href='../login.php'> login <a />";
} else {
    header('Location: ../login.php');
}

 ?>
