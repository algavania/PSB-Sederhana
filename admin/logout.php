<?php 

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}

$_SESSION = [];
session_unset();
session_destroy();

header('Location: ../index.php');
exit;

?>