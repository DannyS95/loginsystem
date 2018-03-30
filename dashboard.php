<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    echo " Welcome {$_SESSION['name']} <a href='/auth/logout.php'>Logout</a>";
} else {
   exit("no my friend <a href=\"login.php\">login</a>");
}

 ?>
