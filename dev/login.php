<?php
require_once './src/Database/auth/helper.php';
if(ingelogd()) {
    header('./index.php');
    exit();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'template/head.inc.php';
?>

<div class="container-login">
            <div class="wrapper">
                <form method="POST" action="src/Database/formhandlers/login.php">
                    <h1>Login</h1>
                    <div class="input-box">
                        <input name="email" type="email" placeholder="Username" required>
                        <i><img src="img/icon/account2.png" alt=""></i>
                    </div>
                    <div class="input-box">
                        <input name="wachtwoord" type="password" placeholder="Password" required>
                        <i><img src="img/icon/wachtwoord.png" alt=""></i>
                    </div>
                    <div class="remember-forgot">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        <a href="#">Forgot Password</a>
                    </div>
                    <div class="submit-login"><button type="submit" class="btn">Login</button></div>
                    <div class="register-link">
                        <p>Heb je geen account ? </p> <br>
                        <p><a href="">Register</a></p>
                  
                    </div>
                    
                </form>
            </div>

        </div>



<?php
require_once 'template/foot.inc.php';
?>