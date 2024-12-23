<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEJI</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/Fire.svg">
</head>
<body id="body">

    <div class="nav-container">
        <nav>
            <ul class="mobile-nav">
                <li>
                    <div class="menu-icon-container">
                        <div class="menu-icon">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="link-logo"></a>
                </li>

                <li>
                    <a href="" class="link-bag"></a>
                </li>
            </ul>

            <ul class="desktop-nav">
                <li>
                    <a href="welkom.php" class="link-logo"></a>
                </li>
                <?php if(! ingelogd()): ?>
                <li>
                    <a href="register.php">Register</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="index.php">Account</a>
                </li>
                <li>
                    <a href="#" class="link-search"></a>
                </li>
                <li>
                    <a href="cart.php" class="link-cart"></a>
                </li>
                <li>
                    <a href="">
                    <div class="welkom-div">
                        <div class="link-account"></div>
                        
                        <div><p>Welkom <?= $_SESSION['customer']['voornaam'] ?></p></div>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="./src/Database/auth/logout.php" class="link-logout"></a>
                </li>
                <li>
                    <label class="switch">
                        <input type="checkbox" id="myCheckbox" checked>
                        <span class="slider"></span>
                    </label>
                </li>
            </ul>
             <?php endif; ?>
        </nav>
        <!-- End of navigation menu items -->

        <div class="search-container hide">
            <div class="link-search"></div>
            <div class="search-bar" ><p></p>
                <form action="">
                    <input type="text" placeholder="Opzoeken">
                </form>
            </div>
            <div class="link-close"></div>

            <div class="quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <li>
                        <a href="index.html">Main pagina</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
                        <a href="#">Orders</a>
                    </li>
                    <li>
                        <a href="product.php?product_id=<?= $product['1'] ?>">Laatste product</a>
                    </li>
                    <li>
                        <a href="gemaakt.php">Contact</a>
                    </li>
                    <li>
                        <a href="gemaakt.php">Support</a>
                    </li>
                    <li>
                        <a href="gemaakt.php">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mobile-search-container">
            <div class="link-search"></div>
            <div class="search-bar">
                <form action="">
                    <input type="text" placeholder="Opzoeken">
                </form>
            </div>
            <span class="cancel-btn">Cancel</span>

            <div class="quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <li>
                        <a href="startpagina.html">Main pagina</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="order.html">Orders</a>
                    </li>
                    <li>
                        <a href="product.html">Laatste product</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                    <li>
                        <a href="#">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   