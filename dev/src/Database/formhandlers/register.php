<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo ("<pre>");
// print_r($_SERVER);
// echo ("</pre>");
// gecheckt (is post method) 

if($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../index.php");
    exit();
 }
//STAP 2 => Ophalen van ingetikte gegevens van user in registerform

$voornaam = htmlentities($_POST['voornaam']);
$tussenvoegsel = htmlentities($_POST['tussenvoegsel']);
$achternaam = htmlentities($_POST['achternaam']);
$email = htmlentities($_POST['email']);
$telefoonnummer = htmlentities($_POST['telefoonnummer']);
$geslacht = htmlentities($_POST['geslacht']);
$plaats = htmlentities($_POST['plaats']);
$postcode = htmlentities($_POST['postcode']);
$huisnummer = htmlentities($_POST['huisnummer']);
$straat = htmlentities($_POST['straat']);
$wachtwoord = htmlentities($_POST['wachtwoord']);
$wachtwoordchek = $_POST['wachtwoordchek'];

// STAP 3 => Beveiligen
//   STAP 4 => verplichte velden aanpassen
//  STAP 5 => Email cheken in database
//   STAP 6 => Opslaan in database

require_once '../Database.php';

$sql = "
   INSERT INTO `customers`(`voornaam`, `tussenvoegsel`, `achternaam`, `email`, `telefoonnummer`, `geslacht`, `plaats`, `postcode`, `huisnummer`,`straat`,`wachtwoord`)
   VALUES (:voornaam, :tussenvoegsel, :achternaam, :email, :telefoonnummer, :geslacht, :plaats, :postcode, :huisnummer, :straat, :wachtwoord)
";
$placeholders = [
    ':voornaam' => $voornaam,
    ':tussenvoegsel' => $tussenvoegsel,
    ':achternaam' => $achternaam,
    ':email' => $email,
    ':telefoonnummer' => $telefoonnummer,
    ':geslacht' => $geslacht,
    ':plaats' => $plaats,
    ':postcode' => $postcode,
    ':huisnummer' => $huisnummer,
    ':straat' => $straat,
    ':wachtwoord' => password_hash($wachtwoord, PASSWORD_DEFAULT),
 ];
 Database::query($sql, $placeholders);

header("Location: ../../../login.php");
?>
