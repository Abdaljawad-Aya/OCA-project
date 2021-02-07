<?php
    session_start();
    $product_id    =$_GET["id"];
    if(isset($_SESSION["order_products"])){
        unset($_SESSION["order_products"][$product_id]);
    }
    header("location:cart.php");
?>