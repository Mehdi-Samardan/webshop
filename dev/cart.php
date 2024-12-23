<?php
session_start();
require_once './src/Database/auth/helper.php';
require_once './src/Database/Database.php';
// require_once './src/Database/addtocart.php';

$products = [];
require_once(__DIR__ . '/template/head.inc.php');
?>
<div class="shopping-card-div">
<div class="shopping-card-left">
<?php foreach ($products as $product) : ?>
    <div class="div-1">
                <div class="cart-image">
                    <img src="img/macbook.png" alt="">
                </div>
                <div class="cart-info">
                    <div class="cart-titel"><h1>Macbook Pro</h1></div>
                    <div class="card-row"></div>
                    <div class="cart-aantal">
                        <div class="counter-container">
                            <button class="counter-button" onclick="changeAmount(-1)">-</button>
                            <div id="counter" class="counter-display">0</div>
                            <button class="counter-button" onclick="changeAmount(1)">+</button>
                          </div>
                        <button><img src="img/wishlist.png" alt="">Wishlist</button>
                        <button><img src="img/trash.png" alt="">verwijderen</button>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>     
        </div>
        <div class="shopping-card-right">
            <div class="overzicht-div">
               <h1>Overzicht</h1>
            </div>
            <div class="artikelen-div">
                <div class="tam-oturma">
                    <p class="">Artikelen (2)</p>
                    <p class="euro-right">&euro; 19.95</p>
                </div>
                <div class="tam-oturma">
                    <p class="">Verzendkosten</p>
                    <p class="euro-right">&euro; 4.95</p>
                </div>
                <div class="tam-oturma" >
                    <p class="">Te betalen</p>
                    <p class="euro-right">&euro; 24.90</p>
                </div>
            </div>
            <div class="naar-order-button-div">
                <button class="order-button">Verder naar bestellen</button>
            </div>
        </div>
    </div>    
    <!-- Shopping cart End  -->




<?php
require_once(__DIR__ . '/template/foot.inc.php');
?>