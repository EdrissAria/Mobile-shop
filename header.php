<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile Shopee</title>
    <!-----  bootstrap  ----->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!--- ion icons -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Roboto:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/ionicons.min.css">
    <!-----  font awsome  ----->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <!-----  owl carousel  ----->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <!---  costum css  -->
    <link rel="stylesheet" href="style.css">   
    <?php
    ob_start();
    require('database/datetime.php');
    require('functions.php');
    ?>
</head>
<body>
    <!-- start header -->
        <header id="header" class="py-0">
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-calibri font-size-12 text-black-50 m-0">Jorden Calderen 430-985 Eleifend St.Duluth Washington 92611(427) 987-98798</p>
                <div class="font-calibri font-size-14">
                    <button type="button" class="btn btn-link font-size-14 py-0 my-0 text-dark border-left" data-toggle="modal" data-target="#modelId">
                    <?php echo isset($_SESSION['login'])? '<a href="database/session.php" class="font-size-14 py-0 px-2 text-danger">Log Out</a>' : 'Login';?>
                    </button>
                 </div>
            </div>
            <!-- primary navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
                <a href="#" class="navbar-brand">Mobile Shopee</a>
                           <button class="navbar-toggler" data-toggle="collapse" data-target="#afg" area-controls="afg" 
                         area-expanded="false" area-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 
                        <div class="collapse navbar-collapse" id="afg">
                            <ul class="navbar-nav m-auto font-calibri">
                                <li class="navbar-item">
                                    <a class="nav-link active" href="index.php">On sale</a>
                                </i> 
                                <li class="navbar-item">
                                    <a class="nav-link" href="#">Orders</i></a>
                                </li>
                                <li class="navbar-item">
                                    <a class="nav-link" href="#"><form>
                                        <input type="text" name="search" placeholder="search" class="input-search"><input type="submit" name="search-btn" class="btn-search" value="Search">
                                    </form></a>
                                </li>
                            </ul>
                            <form action="#" class="font-size-14 font-calibri">
                                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                                    <span class="font-size-16 pr-2 pl-3 text-white"><img scr=""></span>
                                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php if(isset($_SESSION['login'])){ echo count($product->getDataUser($_SESSION['login']));}else{ echo 0;}?>
                                </a>
                            </form>
                        </div>
                    </div>
                </nav>
            <!-- primary navigation -->
        </header>
    <!-- !start header -->

    <!-- start main-site -->
        <main id="main-site">
         
            <!--- modal place for login --->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content border-0 bg-light">
                                <button type="button" class="close pt-4 btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        <div class="text-center">
                            <h1 class="login-header">Login</h1>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" required placeholder="your email">
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="your password">
                            </div>
                            <div class="login-signin">
                                <input type="submit" value="login" name="login_submit" class="btn btn-info">
                                <button type="button" class="btn btn-link py-0 my-0 text-dark" data-toggle="modal" data-target="#modelId2" data-dismiss="modal">Sign In</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--- modal place sing in --->
            <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content border-0 bg-light">
                                <button type="button" class="close pt-4 btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        <div class="text-center">
                            <h1 class="login-header">Sign In</h1>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" required placeholder="your email">
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="your password">
                            </div>
                            <div class="form-group">
                            <input type="submit" value="Sign In" name="signup_submit" class="btn btn-info">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>