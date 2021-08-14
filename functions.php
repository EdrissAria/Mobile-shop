<?php

require('database/DBController.php');
require('database/product.php');
require('database/cart.php');
require('database/User.php');
require('database/admin.php');

$db = new DBController();

$product = new Product($db);

$products = $product->getData();

$cart = new Cart($db);

$user = new User($db);

$admin = new Admin($db);


 
