<?php

session_start();

if(! isset($_GET['product_id']) || ! isset($_SESSION['customer']))
{
    header('../../index.php');
    exit();
}

$product_id = intval($_GET['product_id']);
$customer_id = intval($_SESSION['customer']['id']);

require_once './Database.php';
$sql = "SELECT * FROM `cart` WHERE `customer_id` = :id AND `ordered` = 0";
$placeholders = [':id' => $customer_id];
Database::query($sql, $placeholders);
$cart = Database::get();

if(empty($cart)) {
    // Cart aanmaken
    $sql = "INSERT INTO `cart`(`customer_id`) VALUES(:id)";
    $placeholders = [':id' => $customer_id];
    Database::query($sql, $placeholders);
    // ID van de nieuwe cart ophalen
    $cart_id = Database::LastInsertId();
    // Product toevoegen  aan de cart (cart_items)
    $sql = "INSERT INTO `cart_items`(`cart_id`, `product_id`, `amount`) VALUES(:cart_id, :product_id, 1)";
    $placeholders = [':cart_id' => $cart_id, ':product_id' => $product_id];
    Database::query($sql, $placeholders);
} else {
    // Cart bestaat al: Zoeken of het product al in de cart zit
    $sql = "SELECT * FROM `cart_items` WHERE `cart_id` = :cart_id AND `product_id` = :product_id";
    $placeholders = [':cart_id' => $cart['id'], ':product_id' => $product_id];
    Database::query($sql, $placeholders);
    $cart_item = Database::get();
    if(empty($cart_item)) {
        $sql = "INSERT INTO `cart_items`(`cart_id`, `product_id`, `amount`) VALUES(:cart_id, :product_id, 1)";
        $palceholders = [':cart_id' => $cart['id'], ':product_id' => $product_id];
        Database::query($sql,$placeholders);
    } else {
        $sql = "UPDATE `cart_items` SET `amount` = :amount WHERE `cart_id` = :cart_id AND `product_id` = :product_id";
        $placeholders = [ ':amount' => intval($cart_item['amount']) + 1, ':cart_id' => $cart_item['cart_id'], ':product_id' => $product_id];
        Database::query($sql, $placeholders);
    }
}

header('Location: ../../product.php?product_id='.$product_id);