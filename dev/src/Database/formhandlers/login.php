<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// TODO : STAP 1 - POST methode cheken 
if($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../../login.php");
    exit();
 }
// TODO : STAP 2 - Variable maken voor gegevens
$email = htmlentities($_POST['email']);
$wachtwoord = $_POST['wachtwoord'];

// TODO : STAP 3 - Klant in db zoeken (customer table)
require_once '../Database.php';


$sql = "SELECT * FROM customers WHERE email = :ids";
$placeholders = [':ids' => $email];

Database::query($sql, $placeholders);
$customer = Database::get();


// TODO : STAP 4 - Wachtwoorden cheken (Bool)
if(! password_verify($wachtwoord, $customer['wachtwoord'])) {
    header("Location: ../../../login.php");
    exit();
 }
 
// TODO : STAP 5 - Sessie maken en klant gegevens inzetten
$_SESSION['customer'] = $customer;
unset($_SESSION['customer']['wachtwoord']);
$_SESSION['messages']['login_success'] = "U bent succesvol ingelogd.";
$_SESSION['messages']['uitgeloogd'] = "U bent succesvol uitgelogd.";
print_r($customer);

// TODO : STAP 6 - Naar index met bericht dat succesvol is
header("Location: ../../../index.php");



