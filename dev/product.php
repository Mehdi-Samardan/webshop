<?php
require_once './src/Database/auth/helper.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['product_id'])) {
   header('location: index.php');
   exit();
}

$product_id = intval($_GET['product_id']);
if($product_id <= 0) {
   header('location: index.php');
   exit();
}

include_once './src/Database/Database.php';

$sql = 'SELECT * FROM products WHERE id = :id';
$placeholders = ['id' => $product_id];
Database::query($sql, $placeholders);

// Database::query("SELECT * FROM `products` WHERE `products`.`id` = :id", [':id' => $product_id]);
$product = Database::get();

require_once 'template/head.inc.php';
?>

<div class="product-div">
        <div class="product-afbeelding">
            <img src="<?= $product['image']?>" alt="">
        </div>
        <div class="product-rest">
            <div class="product-titel"><h1><?= $product['name']?></h1></div>
            <div class="product-description">
                <p>
                    <?= $product['langdesc']?>
                </p>
            </div>
            <div class="product-addcart-button">
                <a href="./src/Database/addtocart.php?product_id=<?= $product_id ?>" class="CartBtn">
                    <span class="IconContainer"> 
                      <img src="img/cart_black.svg" alt="">
                    </span>
                    <p class="text">Voeg toe aan Winkelmandje</p>
                  </a>
                  <div class="card-price product-addcart-price"><p> &euro;  <?= $product['price']?></p></div>
            </div>
        </div>
    </div>
  
<?php
require_once 'template/foot.inc.php';
