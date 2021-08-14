<?php 
require('../database/DBController.php');
require('../database/product.php');

$db = new DBController();

$product = new Product($db);


if(isset($_POST["item_id"])){
    $result = $product->getitemid($_POST['item_id']);
    echo json_encode($result);
}