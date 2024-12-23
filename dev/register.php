<?php
require_once './src/Database/auth/helper.php';
if(ingelogd()) {
    header('./welkom.php');
    exit();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "template/head.inc.php";
?>
<div class="container-register">
    <div class="wrapper register-div">
        <form method="POST" action="src/Database/formhandlers/register.php">
            <!-- Inputs Start -->
            <h1>Register</h1>
            <div class="personal-container">
                <!-- personal -->
                <div class="input-box">
                    <input name="voornaam" type="text" placeholder="Voornaam" required>
                    <i><img src="img/icon/account2.png" alt=""></i>
                </div>
                <div class="input-box">
                    <input name="tussenvoegsel" type="text" placeholder="Tussenvoegsel ">
                </div>
                <div class="input-box">
                    <input name="achternaam" type="text" placeholder="Achternaam" required>
                </div>
            </div>
            <div class="input-box">
                <input name="email"  type="email" placeholder="Email" required>
                <i><img src="img/icon/email.png" alt=""></i>
            </div>
            <div class="input-box">
                <input name="telefoonnummer"  type="number" placeholder="Telefoonnummer" required>
                <i><img src="img/icon/phone.png" alt=""></i>
            </div>
            <div class="input-box">
                <input name="geslacht" type="" placeholder="Geslacht" >
                <i><img src="img/icon/geslacht.png" alt=""></i>
            </div>
            <div class="input-box">
                <input name="plaats" type="" placeholder="Plaats" >
                <i><img src="img/icon/huis.png" alt=""></i>
            </div>
            <div class="adrees-container">
                <!-- adress -->
                <div class="input-box">
                    <input name="postcode" type="" placeholder="Postcode" >
                    <i><img src="img/icon/location2.png" alt=""></i>
                </div>
                <div class="input-box">
                    <input name="huisnummer"  type="number" placeholder="Huisnummer" >
                    <i><img src="img/icon/huisnummer.png" alt=""></i>
                </div>
            </div>
            <div class="input-box">
                <input  name="straat" type="" placeholder="Straat">
                <i><img src="img/icon/straat.png" alt=""></i>
            </div> 
            <div class="input-box">
                <input name="wachtwoord" type="password" placeholder="Wachtwoord" required>
                <i><img src="img/icon/wachtwoord.png" alt=""></i>
            </div>
            <div class="input-box">
                <input name="wachtwoordchek" type="password" placeholder="Wachtwoord Check" >
                <i><img src="img/icon/wachtwoord.png" alt=""></i>
            </div>
            <!-- Inputs Eind -->

            <div class="submit-login"><button type="submit" class="btn"><p><a href="index.php">Register</a></p></button></div>
            <div class="register-link">
                <p>Heb je al account ? </p> <br>
                <p><a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
<?php
require_once "template/foot.inc.php";
?>