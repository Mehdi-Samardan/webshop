<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(! isset($_SESSION['customer'])){
    header('Location: ../../login.php');
    exit();
}

// Session verwijderen en uitzetten
unset($_SESSION['customer']);
// session_destroy();
$_SESSION['messages']['logout_success'] = 'U bent succesvol uitgelogd';

header('Location: ../../../index.php');