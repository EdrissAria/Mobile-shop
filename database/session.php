<?php
session_start();
if(isset($_SESSION["login"])){
    $_SESSION["login"] = null;
    unset($_SESSION["login"]);
    header("location: ../index.php");
}



