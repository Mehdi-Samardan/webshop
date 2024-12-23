<?php
session_start();
require_once './src/Database/auth/helper.php';
require_once './src/Database/Database.php';

$products = [];

$logout_success = '';
if(isset($_GET['logout_success']))
    $logout_success = $_GET['logout_success'];

Database::query("SELECT * FROM products");
$products = Database::getAll();


require_once(__DIR__ . '/template/head.inc.php');

?>
<!--
     @ ==> o ifadede meydana gelebilecek herhangi bir hata veya uyarı gizlenir. 
                    kullanilmasi hatayi bulmakta zorlar.
-->
<!--
      __DIR__  ==> o ifadede meydana gelebilecek herhangi bir hata veya uyarı gizlenir. 
--> 

<!-- Producten  -->
<div class="container">
        <?php if(hasMessage('login_success')): ?>
                <div class="message-succes">
                    <p><?= getMessage('login_success') ?></p>
            </div>
        <?php endif; ?>

        <?php if(hasMessage('logout_success')): ?>
                <div class="message-succes">
                    <p class="red"><?= getMessage('logout_success') ?></p>
            </div>
        <?php endif; ?>
        
<?php foreach ($products as $product) : ?>
    <div class="card">
                <a href="product.php?product_id=<?= $product['id'] ?>">
                    <div class="card-img"><img src="<?= $product['image']?>" alt=""></div>
                </a>
                <div class="card-title"><?= $product['name']?></div>
                <div class="card-subtitle"><?= $product['description']?></div>
                <hr class="card-divider">
                <div class="card-footer">
                    <div class="card-price"><p>&euro; <?= $product["price"] ?></p></div>
                    <button class="card-btn">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path><path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path></svg>
                    </button>
                </div>
        </div>
    <?php endforeach; ?>
    
<?php
require_once(__DIR__ . '/template/foot.inc.php');
?>

<!-- 
root password
self in DB
db 26-33
 -->