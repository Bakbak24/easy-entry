<?php

include_once(__DIR__ . '/classes/User.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<h1>Welcome " . $user->getEmail() . "</h1>";
} else {
    header("Location: register.php?message=<h3>You need to create an account before accessing the My Tracker page. <br>Please register to continue.</h3>");
}
