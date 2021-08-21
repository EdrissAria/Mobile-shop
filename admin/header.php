<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Document</title>
    <?php
    ob_start();
    require('../database/datetime.php');
    require('../functions.php');
    ?>
</head>
<body>
    <!-- Dashboard header -->
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light navbar_light">
            <div class="container">
            <a class="navbar-brand" href="#">Mobile Shopee</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar_auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sales</a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar_nav">
                        <li class="nav-item">
                            <input type="text" name="search" placeholder="search here.." class="search"><button name="btn-search" class="btn-search"><img src="./img/search.png"></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </nav>
    </header>
    <!-- Dashboard header -->

    <!-- Dashboard sidebar -->
    <aside class="sidebar">
        <img src="img/logo.png" alt="">
        <ul class="sidebar_icon">
            <li><a href='dashboard.php'><img src="./img/home.png"></a></li>
            <li><a href='admins.php'><img src="./img/user.png"></a></li>
            <li><a href='comments.php'><img src="./img/comment.png"></a></li>
            <li><a href='logout.php'><img src="./img/exit.png"></a></li>
             
        </ul>
        <ul class="bottom_sidebar_icon">
            <li><a href="#"><img src="./img/message.png"></a><span class="badge">2</span></li>
            <li>
            <?php foreach($admin->getSessionData($_SESSION['Admin_login']) as $item){
                    printf("<img src='upload/%s' class='profile'>", $item['photo']);
                }
            ;?>
            </li>
        </ul>
    </aside>
    <!-- Dashboard sidebar -->